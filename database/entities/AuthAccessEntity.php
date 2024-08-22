<?php
namespace Database\Entities;

use Clicalmani\Database\DataTypes\Integer;
use Clicalmani\Database\DataTypes\VarChar;
use Clicalmani\Database\Factory\Entity;
use Clicalmani\Database\Factory\Index;
use Clicalmani\Database\Factory\PrimaryKey;
use Clicalmani\Database\Factory\Property;

#[Index(
    name: 'fk_user_auth1_idx',
    key: 'user_id',
    unique: false,
    constraint: 'fk_user_auth1',
    references: \App\Models\User::class
)]
class AuthAccessEntity extends Entity
{
    #[Property(
        length: 10,
        unsigned: true,
        nullable: false,
        autoIncrement: true
    ), PrimaryKey]
    public Integer $access_id;

    #[Property(
        length: 10,
        unsigned: true,
        nullable: false
    )]
    public Integer $user_id;

    #[Property(
        length: 64,
        nullable: false
    )]
    public VarChar $token;
}
