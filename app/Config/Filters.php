<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        // 'csrf'     => CSRF::class,
        'csrf' => \CodeIgniter\Filters\CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'filterauth'  => \App\Filters\FilterAuth::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
			'filterauth' => [
				'except'=> [
					'auth', 'auth/*',
					'home', 'home/*',
					'/'
				]
            ],

			'honeypot',
            'csrf',          
			
		],
		
		'after'  => [
			'filterauth' => [
				'except'=> [
					'admin', 'admin/*',
					'user', 'user/*',
					'master', 'master/*',
					'periode', 'periode/*',
					'rpjmd', 'rpjmd/*',
					'renstra', 'renstra/*',
					'setting', 'setting/*',
					'home', 'home/*',
                    '/',				
				]
			],
			'toolbar',
            // 'csrf',
			'honeypot',
		],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [
        'get'  => ['csrf'],
        'post' => ['csrf'],
        'put' => ['csrf'],
        'delete' => ['csrf'],
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
