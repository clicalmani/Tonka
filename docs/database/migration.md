**Migration**

Migration is nothing more than the creation of database resources: tables (entities), procedures, functions and views.

### Entities

The `php tonka db:entity <argument>` console command allows the creation of a database entity. It accepts a single argument which is the name of the entity to create.

```bash
php tonka db:entity UserEntity
```

The above command creates the UserEntity file. When you dive into `database/entities` folder a file named **UserEntity.php** will be created with this default content:

```php
<?php
<?php
namespace Database\Entities;

use Clicalmani\Database\Factory\Entity;

class UserEntity extends Entity
{
    // ...
}
?>
```

Each database entity must be created using the same command.

### Data types

A data type in Tonka is a class representing one of the database driver data types. Most of the type bears the same name. 

Entity attributes are public properties of the entity class. Each property must specify a type which is the data type.

```php
<?php
namespace Clicalmani\Database\Factory;

use Clicalmani\Database\Factory\Entity;
use Clicalmani\Database\Factory\Property;
use Clicalmani\Database\DataTypes\VarChar;

class UserEntity extends Entity
{
    #[Property(
        length: 100,
        nullable: false,
        default: 'John Doe'
    )]
    public VarChar $name;
}
?>
```

#### Caracter data types
```php
#[Property(
    length: 5,
    nullable: false
)]
public Char $code;

#[Property(
    length: 200,
    nullable: false,
    default: 'Guest'
)]
public VarChar $username;

#[Property(
    nullable: true
)]
public Text $description;

#[Property(
    nullable: true
)]
public TinyText $short_description;

#[Property(
    nullable: true
)]
public LongText $long_description;

#[Property(
    nullable: true
)]
public TinyText $medium_description;

#[Property(
    nullable: true
)]
public TinyBlob $data;

#[Property(
    nullable: true
)]
public MediumBlob $data;

#[Property(
    nullable: true
)]
public LongBlob $data;

#[Property(
    nullable: true
)]
public Binary $data;

#[Property(
    nullable: true
)]
public CharByte $data;

#[Property(
    nullable: true
)]
public VarBinary $data;

#[Property(
    nullable: true
)]
public Blob $data;

#[Property(
    values: ['value1', 'value2', 'value3', '...'],
    nullable: false,
    default: 'value2'
)]
public Enum $data;

#[Property(
    values: ['value1', 'value2', 'value3', '...'],
    nullable: false,
    default: 'value2'
)]
public Set $data;
```
#### Number data type

```php
#[Property(
    length: 10,
    unsigned: true,
    nullable: false
)]
public Integer $user_id;

#[Property(
    length: 10,
    unsigned: true,
    nullable: false
)]
public MediumInt $visits;

#[Property(
    length: 10,
    unsigned: true,
    nullable: false
)]
public BigInt $post_id;

#[Property(
    length: 10,
    unsigned: true,
    nullable: false
)]
public SmallInt $visits;

#[Property(
    length: 2,
    unsigned: true,
    nullable: false,
    default: 1
)]
public TinyInt $visits;

#[Property(
    scale: 10,
    precision: 2,
    nullable: false
)]
public Decimal $visits;

#[Property(
    scale: 10,
    precision: 2,
    nullable: false
)]
public Fixed $visits;

#[Property(
    scale: 10,
    precision: 2,
    nullable: false
)]
public Double $visits;
```
#### Date and time

```php
#[Property(
    nullable: false
)]
public Date $birth_date;

#[Property(
    nullable: false
)]
public DateTime $visit_date;

#[Property(
    nullable: false
)]
public Timestamp $created_at;
```
#### JSON 

Tonka ORM automatically encode en decode Json data type.

```php
#[Property(
    nullable: false
)]
public Json $meta_value;
```
Here is an exemple of user entity with data types specified:

```php
<?php
namespace Database\Entities;

use Clicalmani\Database\DataTypes\DateTime;
use Clicalmani\Database\DataTypes\Enum;
use Clicalmani\Database\DataTypes\Integer;
use Clicalmani\Database\DataTypes\TinyInt;
use Clicalmani\Database\DataTypes\VarChar;
use Clicalmani\Database\Factory\Entity;
use Clicalmani\Database\Factory\PrimaryKey;
use Clicalmani\Database\Factory\Property;
use Clicalmani\Database\Factory\Validate;

class UserEntity extends Entity
{
    #[Property(
        length: 10,
        unsigned: true,
        nullable: false,
        autoIncrement: true
    ), PrimaryKey]
    public Integer $user_id;

    #[Property(
        length: 200,
        nullable: false
    )]
    public VarChar $first_name;

    #[Property(
        length: 200,
        nullable: false
    )]
    public VarChar $last_name;

    #[Property(
        values: ['online', 'offline'],
        nullable: false
    )]
    public Enum $status;

    #[Property(
        nullable: false
    )]
    public DateTime $birth_date;

    #[Property(
        nullable: false,
        default: 0
    )]
    public TinyInt $login_count;

    #[Property(
        length: 10,
        unsigned: true,
        nullable: true
    )]
    public Integer $role;
}
?>
```

### Indexes and foreign keys

Indexes and foreign keys are entity class attributes. There is only one class for that purpose: `Clicalmani\Database\Factory\Index`.

A unique index may be specified as follow:

```php
<?php
namespace Database\Entities;

use Clicalmani\Database\Factory\Entity;
use Clicalmani\Database\Factory\Property;
use Clicalmani\Database\Factory\Index;
use Clicalmani\Database\Factory\DataTypes\VarChar;

#[Index(
    name: 'nameUNIQUE',
    key: 'name',
    unique: true
)]
class Category extends Entity
{
    #[Property(
        length: 100,
        nullable: false
    )]
    public VarChar $name;
}
?>
```

!> If index is composed with more than one key, separate them with commas.

A constraint index (foreign key) may be specified as follow:

```php
<?php
namespace Database\Entities;

use Clicalmani\Database\Factory\Entity;
use Clicalmani\Database\Factory\Property;
use Clicalmani\Database\Factory\Index;
use Clicalmani\Database\Factory\DataTypes\VarChar;

#[Index(
    name: 'fk_user_role1_idx',
    key: 'role',
    unique: false,
    constraint: 'fk_user_role1',
    references: \App\Models\Role::class,
    onUpdate: Index::ON_UPDATE_CASCADE,
    onDelete: Index::ON_DELETE_CASCADE
)]
class Category extends Entity
{
    #[Property(
        length: 100,
        nullable: false
    )]
    public VarChar $role;
}
?>
```

!> `onUpdate` and `onDelete` arguments default to `Index::ON_UPDATE_CASCADE` and `Index::ON_DELETE_CASCADE` respectively, if not specified.