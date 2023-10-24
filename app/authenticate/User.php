<?php
namespace App\Authenticate;

use App\Providers\AuthServiceProvider;
use Clicalmani\Database\DB;

class User extends AuthServiceProvider
{
    function __construct( $username = null )
    {
        parent::__construct( $username );
    }

    function user($id)
    {
        return (object) \App\Models\User::find($id)?->profile;
    }

    static function exists($username, $password = null)
    {
        $collection = DB::table('COMPTE')
                        ->where(self::criteria($username))
                        ->get();
        
        if ($collection->count()) {
            $hash = $collection->first()['code_acces'];
            
            if ( is_null($password) ) {
                return $collection->first()['id_compte'];
            }
            
            if ( password_verify($password, $hash)) {
                return $collection->first()['id_compte'];
            }
        }

        return false;
    }

    function isOnline()
    {
        $statement = $this->db->query("SELECT estConnecte('{$this->user_id}')");
		$row = $this->db->getRow($statement);
		
		return $row[0];
    }

    private function setState($state, $reset_counter = false)
    {
        $this->db->query("UPDATE {$this->db->getPrefix()}COMPTE c SET etat = '$state'" . 
        ($reset_counter ? ', login_count = 0': ', login_count = login_count') . " WHERE login_count >= 3 AND " . self::criteria($this->user_id));
    }

    function lock()
    {
        $this->setState('B');
    }

    function unlock()
    {
        $this->setState('A', true);
    }

    function accessLevel()
    {
        $statement = $this->db->query("SELECT privilegeCompte('$this->user_id')");
        $row = $this->db->getRow($statement);

        return $row[0];
    }

    function countFailure()
    {
        $this->db->query("UPDATE {$this->db->getPrefix()}COMPTE c SET login_count = login_count + 1 WHERE " . self::criteria($this->user_id));
    }

    function getNumFailure()
    {
        $statement = $this->db->query("SELECT login_count FROM {$this->db->getPrefix()}COMPTE WHERE " . self::criteria($this->user_id));
        return $this->db->getRow($statement)[0];
    }

    function isLocked()
    {
        $statement = $this->db->query("SELECT IF(etat = 'B', TRUE, FALSE) `state` FROM {$this->db->getPrefix()}COMPTE WHERE " . self::criteria($this->user_id));

        return $this->db->getRow($statement)[0];
    }

    static function criteria($value, $field = 'matricule')
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
