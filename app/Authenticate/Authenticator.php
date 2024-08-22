<?php
namespace Clicalmani\Authenticator;

use Clicalmani\Database\DB;
use Clicalmani\Fundation\Auth\AuthServiceProvider;

abstract class Authenticator
{
	/**
	 * Token expiry in days
	 * 
	 * @var int
	 */
	protected int $expiry = 1;

	/**
	 * Max session inactivity time in minutes
	 * 
	 * @var int
	 */
	protected int $turnarround = 0;

	/**
	 * Authenticated user
	 * 
	 * @var \App\Models\User
	 */
	protected $user;

	/**
	 * Auth Object
	 * 
	 * @var \Clicalmani\Fundation\Auth\AuthServiceProvider
	 */
	private $auth;

	/**
	 * Token
	 * 
	 * @var string
	 */
	private $token;

	/**
	 * Payload
	 * 
	 * @var array
	 */
	private $payload;
	 
	/**
	 * Constructor
	 *
	 * @param mixed $user_id 
	 */
	public function __construct(protected mixed $user_id)
	{
		// Cast user ID to int
		$this->user_id = (int) $this->user_id;

		/**
		 * Set user to user model
		 * 
		 * @var \App\Models\User
		 */
		$this->user = \App\Models\User::find($this->user_id);
		$this->auth = new AuthServiceProvider($this->user_id, $this->expiry);
		$this->token = @DB::table('auth_access')->where('user_id = :id', ['id' => $this->user_id])->get('token')->first()['token'] ?? '';
		
		if ($this->auth->verifyToken($this->token)['iat'] + $this->turnarround/60 > time()) 
			@DB::table('auth_access')->where('user_id = :id', ['id' => $this->user_id])->delete();
	}
	
	/**
	 * @override
	 * 
	 * @param string $attribute
	 * @return mixed
	 */
	public function __get(string $attribute)
	{
		return $this->user->{$attribute};
	}

	/**
	 * Authenticate user or renew user authentication.
	 * 
	 * @return void
	 */
	public function authenticate() : void
	{
		DB::table('auth_access')
			->insert([
				['user_id' => $this->user_id, 'token' => $this->auth->generateToken()]
			], true);
	}

	/**
	 * Is user online
	 * 
	 * @return bool
	 */
	public function isOnline() : bool
	{
		if ($this->auth->verifyToken($this->token)) return true;

		return false;
	}
}
