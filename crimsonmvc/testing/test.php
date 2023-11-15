<?php
// Include the necessary classes
require_once '../app/config/config.php';
require_once '../app/bootstrap.php';

try {
    //test url routing
    $_GET['url'] = URLROOT;
    echo ($_GET['url']);

    $core = new core();
    echo ($core->currentController);

} catch(Exception $e) {
}
