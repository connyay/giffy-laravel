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

        'Reddit' => array(
            'client_id'     => 'KvPfBRpzq0hwbg',
            'client_secret' => 'hvZFSQOBPf6LEV9aExAdp81lGEM',
            'scope'         => array('identity'),
        ),
        'Twitter' => array(
            'client_id'     => 's4bprIQaDwv2SUXQHnq9A',
            'client_secret' => 'p8itL2H03C81lx1BszL1GpxRMNeCr2YXRBtpUavc',
            'scope'         => array(),
        ),

	)

);