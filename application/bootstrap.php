<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/New_York');

/**
 * Set the default locale.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://docs.kohanaphp.com/about.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

//-- Configuration and initialization -----------------------------------------

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
    'base_url'  => 'http://localhost/kyletreubig/',
    'index_file'=> INDEX_FILE,
    'profile'   => TRUE,
    'errors'    => ! IN_PRODUCTION,
    'profiling' => ! IN_PRODUCTION,
    'caching'   => IN_PRODUCTION,
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 * Attach a file reader to profile-specific config directory.
 */
Kohana::$config->attach(new Kohana_Config_File);
Kohana::$config->attach(new Kohana_Config_File(CONF_DIR), TRUE);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
    // Mine
    //'sentry'    => MODPATH.'sentry',    // Auth Package
    'versioned' => MODPATH.'versioned', // Model Version Control
    'grid'      => MODPATH.'grid',      // Easy table creation
    'sink'      => MODPATH.'sink',      // Database Synchronization

    // Wouter
    //'a2'        => MODPATH.'a2',        // Authorization
    //'a1'        => MODPATH.'a1',        // Authentication
    //'acl'       => MODPATH.'acl',       // Object-level ACL

    // Shadowhand
    'sprig'     => MODPATH.'sprig',     // Sprig models

    // Kohana
    'database'  => MODPATH.'database',  // Database access
    'phpunit'   => MODPATH.'phpunit',   // PHPUnit integration
    //'orm'       => MODPATH.'orm',       // Object Relationship Mapping
    // 'auth'       => MODPATH.'auth',       // Basic authentication
    // 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
    // 'image'      => MODPATH.'image',      // Image manipulation
    // 'pagination' => MODPATH.'pagination', // Paging of results
    // 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
    ));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('default', '(<controller>(/<action>(/<id>)))')
    ->defaults(array(
        'controller' => 'welcome',
        'action'     => 'index',
    ));

if ( ! defined('SUPPRESS_REQUEST')) {

    /**
    * Execute the main request using PATH_INFO. If no URI source is specified,
    * the URI will be automatically detected.
    */
    $request = Request::instance($_SERVER['PATH_INFO']);

    try {
        // Attempt to execute the response
        $request->execute();
    } catch (Exception $e) {
        if ( ! IN_PRODUCTION) {
            throw $e;   // Just re-throw the exception
        }

        // Log the error
        Kohana::$log->add(Kohana::ERROR, Kohana::exception_text($e));

        // Create a 404 response
        $request->status    = 404;
        $request->response  = View::factory('template')
            ->set('title', '404')
            ->set('content', View::factory('errors/404'));
    }

    if ($request->response) {
        // Get the total memory and execution time
        $total = array(
            '{memory_usage}'    => number_format((memory_get_peak_usage() - KOHANA_START_MEMORY) / 1024, 2).'KB',
            '{execution_time}'  => number_format(microtime(TRUE) - KOHANA_START_TIME, 5).' seconds',
        );

        // Insert the totals into the response
        $request->response = strtr((string) $request->response, $total);
    }

    /**
    * Display the request response
    */
    echo $request->send_headers()->response;
}

