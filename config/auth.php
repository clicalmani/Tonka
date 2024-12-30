<?php

/**
 * Application Token Configuration
 *
 * The configuration settings for the application token.
 */

return [
    /**
     * --------------------------------------------------------------------------
     * Application Token Configuration
     * --------------------------------------------------------------------------
     */
    'tokens' => [

        /**
         * --------------------------------------------------------------------------
         * Token Header
         * --------------------------------------------------------------------------
         *
         * The header typically consists of two parts: the type of token (JWT) and the signing algorithm being used (such as HMAC SHA256 or RSA).
         */
        'header' => [

            /**
             * --------------------------------------------------------------------------
             * Token Algorithm
             * --------------------------------------------------------------------------
             *
             * The algorithm used to sign the token. Supported algorithms include HS256, RS256, etc.
             */
            'algo' => 'HS256', // HMAC using SHA-256 hash algorithm

            /**
             * --------------------------------------------------------------------------
             * Token Type
             * --------------------------------------------------------------------------
             *
             * The type of token. It is typically JWT (JSON Web Token).
             */
            'type' => 'JWT'
        ],

        /**
         * --------------------------------------------------------------------------
         * Token Expiry
         * --------------------------------------------------------------------------
         *
         * The token expiry time in seconds. The default is 86400 seconds (24 hours).
         */
        'expire' => 86400,

        /**
         * --------------------------------------------------------------------------
         * Token Signature
         * --------------------------------------------------------------------------
         *
         * The token signature. This is a secret key used to sign the token.
         */
        'algo' => 'sha256'
    ]
];
