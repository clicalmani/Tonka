The `Clicalmani\Database\DB` class uses the PHP Data Objects ([PDO](https://www.php.net/manual/fr/book.pdo.php)) extension interface to access the database. It creates a single [PDO](https://www.php.net/manual/fr/book.pdo.php) instance when connecting to the database and makes it available to all queries. In case you want to access the single instance and live the real experience with [PDO](https://www.php.net/manual/fr/book.pdo.php), Tonka ORM provides you with the static `getPDO()` method.

```php
$pdo = \Clicalmani\Database\DB::getPdo();
```

**table() method**

Not only can a database query be made on multiple tables, but also they will have to be selected. To achieve this, `Tonka ORM` provides you with the `table()` method which returns the `Clicalmani\Database\DBQuery` object.

```php
public static function table(string|array $tables) : \Clicalmani\Database\DBQuery;
```

***DBQuery methods***

`Clicalmani\Database\DBQuery` class has a multitude of methods for making a database query easier without using a model (we will see models later).

#### select()

Gets a result set of the query to the database. An optional comma-separated list of query fields can be specified as a single argument.

```php
DB::table('users')->select('first_name, last_name');
```

#### insert()

Inserts one or more records into the selected database table.

```php
DB::table('user')->insert([
    [
        'first_name' => 'First Name', 
        'last_name' => 'Last Name'
    ]
]);
```
#### insertOrFail()

Insert a new record into the selected table ignoring duplicates.

```php
DB::table('user')->insertOrFail([
    [
        'first_name' => 'First Name', 
        'last_name' => 'Last Name'
    ]
]);
```

#### where()

Specify the query condition. This method can be used in three (3) different ways, depending on whether you want to obtain a prepared query or not:

```php
DB::table('users')->where('user_id = 1'); // None prepared request
DB::table('users')->where('user_id = :id', ['id' => 1]); // Prepared request
DB::table('users')->where('user_id = :id', 'AND', ['id' => 1])->where('user_age > :age', ['age' => 20]); // Multiple conditions
```

#### delete()

Deletes one or more occurrences from the selected table:

```php
DB::table('users')->where('user_id = :id', ['id' => 1])->delete();
```

#### update()

This method allows you to put the data in the selected table:

```php
DB::table('users')->where('user_id = :id', ['id' => 1])->update([
    'first_name' => 'John Doe'
]);
```

#### insertOrUpdate()

Inserts new data or updates on failure.

```php
<?php
DB::table('users')->where('user_id = :id', ['id' => 1])->insertOrUpdate([
    [
        'first_name' => 'John Smith'
    ]
]);
?>
```

#### having() and groupBy()

These methods are used in conjunction with aggregation functions.

```php
<?php
DB::table('users')->select('AVG(age) as age_avg')
    ->having('age_avg > :age', ['age_avg' => 20])
    ->groupBy('gender');
?>
```

#### limit()

Allows you to limit the number of results that should be returned by the query.

```php
<?php
DB::table('users')->select()->limit(0, 10);
?>
```

#### join()

It allows you to join several tables.

```php
<?php
DB::table('users')->join('role')->select();
?>
```