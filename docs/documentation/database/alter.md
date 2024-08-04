**Data manipulation**

The same entity used to store the data may be also used to manipulate the stored data.

To alter a database table, you must add AlterOption attribute to the entity class and then implement alter() method of the class.

```php
<?php
namespace Database\Entities;

use Clicalmani\Database\Factory\Entity;
use Clicalmani\Database\Factory\AlterOption;

#[AlterOption]
class UserEntity extends Entity
{
    public function alter(AlterOption $table) : string
    {
        $table->alter()->addColumn('sni')->char(10)->nullable(false)->after('user_name');

        return $table->render();
    }
}
?>
```

Tonka support data manipulation out of the box through its command `php tonka migrate:entity <entity_model>`.

!> With `migrate:entity` command you can migrate a single entity any time there is an update in the entity file.