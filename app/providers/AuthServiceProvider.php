<?php
namespace App\Providers;

use Clicalmani\Flesco\Auth\Authenticate;
use Clicalmani\Database\DB;

class AuthServiceProvider extends Authenticate
{
	protected $db;

    public function __construct(protected $user_id = null)
    {
        parent::__construct( $user_id );
		$this->db = DB::getInstance();
    }

	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetExists()
	 */
	public function offsetExists(mixed $user_id) : bool
	{ 
		// ...
		
		return false;
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetGet()
	 */
	public function offsetGet(mixed $user_id) : mixed
	{ 
		// ...
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetSet()
	 */
	public function offsetSet(mixed $user_id, mixed $value) : void
	{
		//...
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetUnset()
	 */
	public function offsetUnset(mixed $user_id) : void
	{
		// ...
	}
}
