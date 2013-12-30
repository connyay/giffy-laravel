<?php

return array(

	'debug' => true,

	'url' => 'http://giffy.dev',

	'api_url' => 'http://api.giffy.dev',
	'api_domain' => 'api.giffy.dev',

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Remote\RemoteServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',
		'Illuminate\Foundation\Providers\PublisherServiceProvider',

		'Artdarek\OAuth\OAuthServiceProvider',
		'Mews\Thumb\ThumbServiceProvider',
		'Giffy\GiffyServiceProvider',
		'JasonNZ\LaravelGrunt\LaravelGruntServiceProvider',
		'Barryvdh\Debugbar\ServiceProvider',
	),

);
