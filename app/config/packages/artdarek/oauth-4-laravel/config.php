<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '',
            'client_secret' => '',
            'scope'         => array(),
        ),
        'Twitter' => array(
            'client_id'     => '',
            'client_secret' => '',
            'scope'         => array(),
        ),
        'Google' => array(
            'client_id'     => '224324691909-9tot2a7a60h6pbh40kuvfmh40u0hrm18.apps.googleusercontent.com',
            'client_secret' => 'ltF-lh4l7FK-WJd0kEPL-deA',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),

	)

);