<?php
namespace App\Providers;

use Clicalmani\Fundation\Auth\Tokenizer;

class AuthServiceProvider extends Tokenizer
{
	protected string $userModel = \App\Models\User::class;

    public function __construct(protected mixed $user_id = null)
    {
        parent::__construct( $user_id );
    }

	public function boot(): void
	{
		$this->serialize(fn() => $this->user->profile);
	}
}
