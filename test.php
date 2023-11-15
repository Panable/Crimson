<?php
// Include the necessary classes
require_once 'crimsonmvc/app/libraries/database.php';
require_once 'crimsonmvc/app/libraries/core.php';
require_once 'crimsonmvc/app/controllers/pages.php';
require_once 'crimsonmvc/app/models/menumodel.php';

try {
    // Test the Database connection
    $db = new Database();
    echo "Database Connection Test Passed. \n";
} catch(Exception $e) {
    echo "Database Connection Test Failed: ". $e->getMessage(). "\n";
}

try {
    // Test Controller instantiation
    $core = new Core();
    $pagesController = new Pages();
    echo "Pages Controller Instantiation Test Passed. \n";
} catch(Exception $e) {
    echo "Pages Controller Instantiation Test Failed: ". $e->getMessage(). "\n";
}

try {
     // Test Model operation
     $menuModel = new MenuModel();
     $menuItems = $menuModel->getMenu();
     if (is_array($menuItems)) {
         echo "Menu Model Operation Test Passed. \n";
     } else {
         echo "Menu Model Operation Test Failed. \n";
     }
} catch(Exception $e) {
    echo "Menu Model Operation Test Failed: " . $e->getMessage() . "\n";
}
