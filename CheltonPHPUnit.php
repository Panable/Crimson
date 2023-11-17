<?php
// Include the necessary classes
require_once __DIR__ . '/crimsonmvc/app/bootstrap.php';

// Force admin login for testing API (credentials needed)
forceAdminLogin();

// Tally to track tests
$passed = 0;
$total = 0;

// Run all tests and display results
runAllTests();
echo "$passed out of $total";


/////////////////////////TEST FUNCTIONS////////////////////////////////

// Runs all tests
function runAllTests()
{
    // Define controller actions
    $controllerActions = [
        ['controller' => 'menu', 'action' => 'index'],
        ['controller' => 'pages', 'action' => 'index'],
        ['controller' => 'user', 'action' => 'login'],
    ];

    // Loop through all actions and test routing
    foreach ($controllerActions as $controllerAction) {
        testRouting($controllerAction['controller'], $controllerAction['action']);
    }

    // Assuming you have an existing menu item, provide its ID for editing and deleting
    $menuItemID = 1;

    // Test the CRUD operations
    testCreate();
    testRead();
    testEdit($menuItemID);
    testDelete(5);
}

// Tests URL routing on core
function testRouting($controller, $method, $params = '')
{
    global $total, $passed;
    $total = $total + 1;
    try {
        // Test URL routing
        $_GET['url'] = "$controller/$method/";

        ob_start();
        $core = new core();
        ob_end_clean();
        $core->routeUrl();
        if (get_class($core->currentController) == $controller) {
            echo "TEST PASSED - testRouting $controller\n";
            $passed = $passed + 1;
        } else {
            echo "TEST FAILED\n";
        }
    } catch (Exception $e) {
        // Handle any exceptions if needed
    }
}

// Function to make HTTP requests
function makeRequest($url, $method = 'GET', $data = [], $callingFunction = '')
{
    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    // If method is POST or PUT, set the request data
    if ($method == 'POST' || $method == 'PUT') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    // Set the Accept header to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));

    // Execute cURL request and get result
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL session
    curl_close($ch);

    // Check for HTTP status code indicating an error
    if ($httpCode >= 400) {
        echo "Error Response from $callingFunction: HTTP Status Code $httpCode" . PHP_EOL;
        // You can handle the error response further if needed
        return null;
    }

    // Return the result
    return $result;
}

// Function to test the create method
function testCreate()
{
    global $total, $passed;
    $total = $total + 1;

    // Test data for creating a menu item
    $createData = [
        'name' => 'Test Item',
        'price' => 9.99,
        'description' => 'Crikey',
        'photo' => 'chelton_winning.png'
        // Add other fields as needed
    ];

    // URL for the create test
    $createUrl = 'http://localhost/crimsonmvc/menu/create';

    // Make the create request
    $createResult = makeRequest($createUrl, 'POST', $createData);

    // Check the result and display test status
    if ($createResult == null) {
        echo "TEST FAILED - CREATE\n";
    } else {
        $passed += 1;
        echo "TEST PASSED - CREATE\n";
    }
}

// Function to test the read method
function testRead()
{
    global $total, $passed;
    $total = $total + 1;

    // URL for the read test
    $readUrl = 'http://localhost/crimsonmvc/menu/read';

    // Make the read request
    $readResult = makeRequest($readUrl, 'GET');

    // Check the result and display test status
    if ($readResult == null) {
        echo "TEST FAILED - READ\n";
    } else {
        $passed += 1;
        echo "TEST PASSED - READ\n";
    }
}

// Function to test the edit method
function testEdit($itemId)
{
    global $total, $passed;
    $total = $total + 1;

    // Test data for editing a menu item
    $editData = [
        'name' => 'Test Item',
        'price' => 9.99,
        'description' => 'Crikey',
        'photo' => 'chelton_winning.png'
    ];

    // URL for the edit test
    $editUrl = 'http://localhost/crimsonmvc/menu/edit/' . $itemId;

    // Make the edit request
    $editResult = makeRequest($editUrl, 'PUT', $editData);

    // Check the result and display test status
    if ($editResult == null) {
        echo "TEST FAILED - EDIT\n";
    } else {
        $passed += 1;
        echo "TEST PASSED - EDIT\n";
    }
}

// Function to test the delete method
function testDelete($itemId)
{
    global $total, $passed;
    $total = $total + 1;

    // URL for the delete test
    $deleteUrl = 'http://localhost/crimsonmvc/menu/delete/' . $itemId;

    // Make the delete request
    $deleteResult = makeRequest($deleteUrl, 'DELETE');

    // Check the result and display test status
    if ($deleteResult == null) {
        echo "TEST FAILED - DELETE\n";
    } else {
        $passed += 1;
        echo "TEST PASSED - DELETE\n";
    }
}
