<?php
// Include the necessary classes
require_once __DIR__ . '/crimsonmvc/app/bootstrap.php';

try {
    ob_start();
    //test url routing
    $_GET['url'] = URLROOT;
    echo ($_GET['url']);

    $core = new core();
    ob_end_clean();
    if (get_class($core->currentController) == 'pages')
    {
        echo "TEST PASSED";
    }
    else
    {
        echo "TEST FAILED";
    }
} catch (Exception $e) {
}
