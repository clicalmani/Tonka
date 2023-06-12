<?php

/**
 * |------------------------------------------------------------
 * |                ***** Composer autoload *****
 * |------------------------------------------------------------
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

try {

    /**
     * |---------------------------------------------------------------
     * |              ***** Bootstrap *****
     * |---------------------------------------------------------------
     * |
     * 
     * Render request response
     */
    return Clicalmani\Flesco\Http\Controllers\RequestController::render(); 

} catch (Clicalmani\Flesco\Exceptions\RouteNotFoundException $e) {

    /**
     * |--------------------------------------------------------------------------
     * |                 ***** Resource files request *****
     * |--------------------------------------------------------------------------
     * |
     */

    if ( file_exists( dirname( __FILE__ ) . $_SERVER['REQUEST_URI'] ) ) {

        /**
         * |----------------------------------------------------------------------
         * |               ***** File rendering *****
         * |----------------------------------------------------------------------
         * 
         * We did not specify the file content type as the browser will guest it.
         */
        header('Location: /public/' . $_SERVER['REQUEST_URI']); 

        exit('__ERROR___');

    } else http_response_code(404); // send a not found status
}
