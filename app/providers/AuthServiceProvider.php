<?php
namespace App\Providers;

use Clicalmani\Flesco\Auth\Authenticate;
use Clicalmani\Flesco\Database\DB;

class AuthServiceProvider extends Authenticate
{
	protected $db;

    function __construct( $user_id = null )
    {
        // TODO
    }

	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetExists()
	 */
	function offsetExists(mixed $username) : bool
	{ 
		// TODO
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetGet()
	 */
	function offsetGet(mixed $username) : mixed
	{ 
		// TODO
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetSet()
	 */
	#[\ReturnTypeWillChange]
	function offsetSet(mixed $username, mixed $new_status) : int
	{
		// TODO
	}
	 
	/**
	 * (non-PHPdoc)
	 * @see ArrayAccess::offsetUnset()
	 */
	#[\ReturnTypeWillChange]
	function offsetUnset($username) : int
	{
		// TODO
	}
}