<?php
namespace App\Authenticate;

use App\Providers\AuthServiceProvider;
use Clicalmani\Database\DB;
use App\Models\User as UserModel;

/**
 * User class
 * AuthServiceProvider is the default user authenticator and its only purpose is to provide the authenticated user 
 * even though it doesn't authenticate the user. To add user authentication, you must use third party package like 
 * clicalmani/Authenticator which is a token based authenticator.
 */
class UserAuth extends AuthServiceProvider
{
    public function __construct(protected mixed $user_id = null)
    {
        parent::__construct( $user_id );
    }

    /**
     * @deprecated
     */
    public function user($id)
    {
        return (object) \App\Models\User::find($id)?->profile;
    }
    
    /**
     * Verify wether user exists by user name and/or password
     * 
     * @param string $username
     * @param ?string $password
     * @return int|bool
     */
    public static function exists(string $username, ?string $password = null) : int|bool
    {
        if ($user = UserModel::where('email = :email', ['email' => $username])->first()) {
            if ( is_null($password) ) {
                return (int) $user->account;
            }
            
            if ( password_verify($password, $user->account()->account_id)) {
                return (int) $user->account;
            }
        }

        return false;
    }

    /**
     * Set user state
     * 
     * @param string $state
     * @param ?bool $reset_counter Default false
     * @return void
     */
    private function setState(string $state, ?bool $reset_counter = false) : void
    {
        $this->db->query("UPDATE {$this->db->getPrefix()}accounts c SET etat = '$state'" . 
        ($reset_counter ? ', login_count = 0': ', login_count = login_count') . " WHERE login_count >= 3 AND " . self::criteria($this->user_id));
    }

    /**
     * Lock the current user
     * 
     * @return void
     */
    public function lock() : void
    {
        $this->setState('B');
    }

    /**
     * Unlock the current user
     * 
     * @return void
     */
    public function unlock() : void
    {
        $this->setState('A', true);
    }

    /**
     * Get user access level
     * 
     * @return string User access level
     */
    public function accessLevel()
    {
        $statement = $this->db->query("SELECT privilegeCompte('$this->user_id')");
        $row = $this->db->getRow($statement);

        return $row[0];
    }

    /**
     * Log user authentication failure
     * 
     * @return void
     */
    public function countFailure() : void
    {
        $this->db->query("UPDATE {$this->db->getPrefix()}COMPTE c SET login_count = login_count + 1 WHERE " . self::criteria($this->user_id));
    }

    /**
     * Returns authentication failure count
     * 
     * @return int|null
     */
    public function getNumFailure() : int|null
    {
        $statement = $this->db->query("SELECT login_count FROM {$this->db->getPrefix()}COMPTE WHERE " . self::criteria($this->user_id));
        return $this->db->getRow($statement)[0];
    }

    /**
     * Check wether user is locked out
     * 
     * @return bool
     */
    public function isLocked() : bool
    {
        $statement = $this->db->query("SELECT IF(etat = 'B', TRUE, FALSE) `state` FROM {$this->db->getPrefix()}COMPTE WHERE " . self::criteria($this->user_id));

        return $this->db->getRow($statement)[0];
    }

    /**
     * Account selection criteria
     * 
     * @param string $value Field value
     * @param string $field Field
     * @return string
     */
    public static function criteria(string $value, ?string $field = 'matricule') : string
    {
        $db = DB::getInstance();
        return <<<CRITERIA
        id_compte = (SELECT 
            id_compte
        FROM
            {$db->getPrefix()}APPRENANT
        WHERE
            $field = '$value')
        OR id_compte = (SELECT 
            id_compte
        FROM
            {$db->getPrefix()}ENSEIGNANT
        WHERE
            $field = '$value')
        OR id_compte = (SELECT 
            id_compte
        FROM
            {$db->getPrefix()}PARENT
        WHERE
            $field = '$value')
        OR id_compte = (SELECT 
            id_compte
        FROM
            {$db->getPrefix()}ADMINISTRATEUR
        WHERE
            $field = '$value')
        CRITERIA;
    }
}
