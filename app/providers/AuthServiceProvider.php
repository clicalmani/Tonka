<?php
namespace App\Providers;

use Clicalmani\Flesco\Auth\Authenticate;
use Clicalmani\Database\DB;

class AuthServiceProvider extends Authenticate
{
	/**
	 * Database instance
	 * 
	 * @var \Clicalmani\Database\DBQuery
	 */
	protected $db;

    public function __construct(mixed $user_id = null)
    {
        parent::__construct( $user_id );
		$this->db = DB::getInstance();
    }

	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetExists()
	 */
	public function offsetExists(mixed $matricule) : bool
	{ 
		return true;
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetGet()
	 */
	public function offsetGet(mixed $username) : mixed
	{ 
		//
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetSet()
	 */
	public function offsetSet(mixed $username, mixed $new_status) : void
	{
		//
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetUnset()
	 */
	public function offsetUnset($username) : void
	{
		//
	}
}
