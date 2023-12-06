<?php 
namespace App\Authenticate;

use Clicalmani\Flesco\Providers\TPS;
use Clicalmani\Routes\Route;

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
        if (Route::isApi()) $this->route = '/404';
        else $this->request->redirect()->route('/404');
    }
}
