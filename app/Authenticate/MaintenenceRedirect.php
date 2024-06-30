<?php 
namespace App\Authenticate;

use Clicalmani\Fundation\Providers\RouteTPS;

/**
 * Route redirect
 * 
 * @package clicalmani/flesco 
 * @author @clicalmani
 */
class MaintenenceRedirect extends RouteTPS
{
    /**
     * Constructor
     * 
     * @param \Clicalmani\Routing\Route $route
     */
    public function __construct(protected $route)
    {
        parent::__construct();
    }

    /**
     * Issue a redirect
     * 
     * @return void
     */
    public function redirect()
    {
        /**
         * |-------------------------------------------------------
         * | Maintenence Redirect
         * |-------------------------------------------------------
         * Maintenance redirect is usefule when in maintenence mode.
         * Here we just set a tempory redirect for all request. You
         * may redirect on request base or on user base.
         */
        if ($this->route) $this->route->redirect = 302;
    }
}
