**Database seeding**

Seeders are nothing more than initial records ​​that we store in some tables before deploying and running the application. They are useful for creating initial records such as administrator account. A seeder is created using the `make:seeder` console command.

```bash
php tonka make:seeder UserSeeder [--factory=factory_name]
```

Once the command is executed, the seeder will be created at the root of the `database/seeders` folder containing minimal code for creating the seed.

```php
<?php
namespace Database\Seeders;

use Clicalmani\Database\Seeders\Seeder;
use Clicalmani\Database\Seeders\DisableEventsTrigger;

class UserSeeder extends Seeder
{
    use DisableEventsTrigger;

    /**
     * Run the seeder 
     *
     * @return void
     */
    public function run() : void
    {
        // ...
    }
}
?>
```

You can call the DB class or any model in the seeder. Dependencies are auto-injected by the container. In this little example we will initialize the application administrator account.

```php
<?php
namespace Database\Seeders;

use Clicalmani\Database\Seeders\Seeder;
use Clicalmani\Database\Seeders\DisableEventsTrigger;
use Clicalmani\Database\DB;

class UserSeeder extends Seeder
{
    use DisableEventsTrigger;

    /**
     * Run the seeder 
     *
     * @return void
     */
    public function run() : void
    {
        DB::table('users')->insert([
            [
                'given_name' => faker()->name(),
                'family_name' => faker()->name(),
                'email' => faker()->email(),
                'password' => 'password'
            ]
        ]);
    }
}
?>
```

It is possible to use a factory to generate the seeder data.

## Factories
Factories are classes to encapsulate seeder data. That is to say, the data will be passed to the seeders through factories. Let's return to the previous example with a factory.

```bash
php tonka make::factory --model=User
```

With this command we have just created a factory on the User model. User must therefore be informed of the presence of UserFactory. That being said, we can call the User model and ask it to generate a seed.

```php
<?php
// User.php

use Clicalmani\Database\Factory\Models\HasFactory;

class User extends Model
{
    use HasFactory;
}
?>
```

Once the factory is created we can repeat the creation of the seeder by specifying its factory.

```bash
php tonka make:seeder UserSeeder –factory=UserFactory
```

After executing this command, the User Seeder.php file is recreated with minimal code, this time a little different:

```php
<?php
namespace Database\Seeders;

use Clicalmani\Database\Seeders\Seeder;
use Clicalmani\Database\Seeders\DisableEventsTrigger;
use App\Models\User;

class UserSeeder extends Seeder
{
    use DisableEventsTrigger;

    /**
     * Run the seeder 
     *
     * @return void
     */
    public function run() : void
    {
        User::seed()
            ->count(1)
            ->make();
    }
}
?>
```

The count() method allows you to repeat the process several times, this is the advantage of factories.

## Faker
As its name suggests, faker allows you to enter false data into the database. Its main objective is to generate the data corresponding to the different data types in the database. Faker can be called through the faker() helper method, accessible anywhere in the code. As you wish, you can create a faker instance from the Faker class.

Here is the complete list of Faker methods.

- Numbers
```php
faker()->integer(int $min = 0, int $max = 1); # Generate an integer between min and max
faker()->float(int $min = 0, int $max = 1, int $decimal = 2) # Generate a decimal number between min and max with $decimal digits after the decimal point.
```

- Strings
```php
faker()->alpha(int $length = 10) # Generate a string composed of the letters from a to z with a size $length.
faker()->alphaNum(int $length = 10) # Generate a character string composed of numbers and letters of size $length.
faker()->num(int $length = 10) # Generate a string composed only of numbers and of size $length.
```

- Lorem Ipsum
```php
faker()->word(int $count = 1) # Generate $count words
faker()->sentence(int $count = 1) # Generate $count sentences
faker()->Paragraph(int $count = 1) # Generate $count paragraphs
```

- Date
```php
faker()->date(int $min_year = 1900, int $max_year = 2000) # Generate a date between $min_year and $max_year
faker()->datetime(int $min_year = 1900, int $max_year = 2000) # Generate a date with the time part between $min_year and $max_year
faker()->time(bool $with_seconds = true) # Generate the time part of a date. The optional parameter $with_seconds allows you to activate or deactivate the seconds part.
```

- Person
```php
faker()->name() # Generates a person's name
faker()->email() # Generate an email address
faker()->phone(string $format = ‘(+ddd) dd dd dd dd’) # Generates a phone number in a given format.
faker()->address(bool $short = true) # Generates a street address
```

- Address
```php
faker()->country() # Randomly generates the name of a country
faker()->city(?string $country = null) # Generates the name of a city with the name of the country of the city as an option
faker()->lat() # Generates the geographic coordinate latitude
faker()->lon() # Generates the longitude geographic coordinate
```

## Sequence
Sequences allow you to repeat the data entry process with different values. A sequence is a series of values ​​that are passed successively to each call. Let’s go back to the example of initializing the administrator account. Let's assume that this time we want to initialize 3 accounts at once: 1 administrator, 1 supervisor and 1 moderator. The user_level attribute will be used to specify the user type.

We will add the users() method in UserFactory:

```php
<?php
// UserFactory.php

public function users()
{
    return $this->state(function() {
        return [
            'given_name' => new Sequence($this->faker()->name(), $this->faker()->name(), $this->faker()->name()),
            'family_name' => new Sequence($this->faker()->name(), $this->faker()->name(), $this->faker()->name()),
            'email' => new Sequence($this->faker()->email(), $this->faker()->email(), $this->faker()->email()),
            'birth_date' => new Sequence($this->faker()->date(), $this->faker()->date(), $this->faker()->date()),
            'password' => new Sequence('password'),
            'user_level' => new Sequence('admin', 'supervisor', 'moderator')
        ];
    });
}
```

This method allows you to create the 3 types of users specified above. It will be called in UserSeeder and repeated 3 times as follows:

```php
<?php
// UserSeeder.php

/**
 * Run the seeder
 * 
 * @return void
 */
public function run() : void
{
    User::seed()
        ->count(3)
        ->users()
        ->make();
}
?>
```

Sequences occur wherever data must be entered repetitively; We will encounter them once again when testing the controllers.