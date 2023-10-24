<?php 
namespace App\Authenticate;

use Clicalmani\Flesco\Providers\TPS;

/**
 * Route redirect
 * 
 * @package clicalmani/flesco 
 * @author @clicalmani
 */
class Redirect extends TPS
{
    public function __construct(protected &$route)
    {
        parent::__construct();

        /**
         * If route not found then redirect
         */
        if (!$this->route) $this->redirect();
    }

    /**
     * Issue a redirect
     * 
     * @return void
     */
    public function redirect()
    {
        /**
         * On API request just set route property value to redirect
         */
        // $this->route = '/404';

        // Web routing
        $this->request->redirect()->route('/404');
    }
}
