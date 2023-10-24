<?php
namespace App\Authenticate;

use App\Models\User as UserModel;
use App\Providers\AuthServiceProvider;
use Clicalmani\Database\DB;

class User extends AuthServiceProvider
{
    public function __construct(mixed $username = null )
    {
        parent::__construct($username);
    }

    /**
     * Provide user
     * 
     * @param mixed $id
     * @return \App\Models\UserModel
     */
    public function user(mixed $id) : UserModel
    {
        return UserModel::find($id);
    }
}
