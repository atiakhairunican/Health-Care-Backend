<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {
    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();

    /**
     * Read services
     */
    include APP_PATH . '/config/services.php';

    /**
     * Handle routes
     */
    include APP_PATH . '/config/router.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}


// use Phalcon\Mvc\Micro;

// $app = new Micro();

// // Retrieves all robots
// $app->get(
//     '/api/users',
//     function () use ($app) {
//         $phql = 'SELECT * FROM users ORDER BY id';

//         $robots = $app->modelsManager->executeQuery($phql);

//         $data = [];

//         foreach ($robots as $robot) {
//             $data[] = [
//                 'id'   => $robot->id,
//                 'nik' => $robot->nik,
//             ];
//         }

//         echo json_encode($data);
//     }
// );

// $app->handle();