<?php 
namespace App\Models;

use Clicalmani\Flesco\Models\Model;

class User extends Model
{
    /**
     * Model database table 
     *
     * @var string $table Table name
     */
    protected $table = "user";

    /**
     * Table primary key(s)
     *
     * @var string|array $primary_keys Table primary key. Use an array if the key is composed with more than one attributes.
     */
    protected $primaryKey = "";

    function __construct( $id = null )
    {
        parent::__construct( $id );
    }
}
