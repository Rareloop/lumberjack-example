<?php

return [
/**
 * The current application environment
 */
    'environment' => getenv('WP_ENV'),

    /**
     * Is debug mode enabled?
     */
    'debug' => WP_DEBUG ?? false,

    /**
     * List of providers to initialise during app boot
     */
    'providers' => [
        Rareloop\Lumberjack\Providers\RouterServiceProvider::class,
        Rareloop\Lumberjack\Providers\WordPressControllersServiceProvider::class,
        Rareloop\Lumberjack\Providers\TimberServiceProvider::class,
        Rareloop\Lumberjack\Providers\ImageSizesServiceProvider::class,
        Rareloop\Lumberjack\Providers\CustomPostTypesServiceProvider::class,
        Rareloop\Lumberjack\Providers\MenusServiceProvider::class,
        Rareloop\Lumberjack\Providers\LogServiceProvider::class,
        Rareloop\Lumberjack\Providers\ThemeSupportServiceProvider::class,
        Rareloop\Lumberjack\Providers\LogServiceProvider::class,
        Rareloop\Lumberjack\Providers\QueryBuilderServiceProvider::class,
        Rareloop\Lumberjack\Providers\SessionServiceProvider::class,
        Rareloop\Lumberjack\Providers\EncryptionServiceProvider::class,

        App\Providers\OptionPagesProvider::class,
    ],

    /**
     * Logs enabled, path and level
     *
     * When path is `false` the default Apache/Nginx error logs are used. By setting path to a string, no logs will be sent
     * to the default and instead a file will be created. To disable all logging output set `enabled` to `false`.
     */
    'logs' => [
        'enabled' => true,
        'path' => false,
        'level' => Monolog\Logger::ERROR,
    ],

    'themeSupport' => [
        'post-thumbnails',
    ],
];
