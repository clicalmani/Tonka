<?php
namespace App\Authenticate;

use App\Providers\AuthServiceProvider;

/**
 * User class
 * AuthServiceProvider is the default user authenticator and its only purpose is to provide the authenticated user 
 * even though it doesn't authenticate the user. To add user authentication, you must use third party package like 
 * clicalmani/Authenticator which is a token based authenticator.
 */
class UserAuth extends AuthServiceProvider
{
    /**
	 * User Model
	 * 
	 * @var string
	 */
	protected string $userModel = \App\Models\User::class;

    public function __construct(protected mixed $user_id = null)
    {
        parent::__construct( $user_id );
    }
}
