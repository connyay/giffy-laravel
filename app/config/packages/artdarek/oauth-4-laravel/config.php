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
        'Reddit' => array(
            'client_id'     => '',
            'client_secret' => 'hvZFSQOBPf6LEV9aExAdp81lGEM',
            'scope'         => array('identity'),
        ),
        'Twitter' => array(
            'client_id'     => 's4bprIQaDwv2SUXQHnq9A',
            'client_secret' => 'p8itL2H03C81lx1BszL1GpxRMNeCr2YXRBtpUavc',
            'scope'         => array(),
        ),
        'Google' => array(
            'client_id'     => '224324691909-9tot2a7a60h6pbh40kuvfmh40u0hrm18.apps.googleusercontent.com',
            'client_secret' => 'ltF-lh4l7FK-WJd0kEPL-deA',
            'scope'         => array('profile'),
        ),

	)

);