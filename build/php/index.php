<!DOCTYPE html>
<html>
<head>
    <title>LAMP Test Page</title>
</head>
<body>
    <h1>Hello, LAMP Environment!</h1>
    <p>This is a test page served by the LAMP stack.</p>
    <?php
    $currentDate = date("Y-m-d H:i:s");
    echo "<p>Current server date and time: $currentDate</p>";
    ?>
    <?php
    echo "<p>Server IP address: " . $_SERVER['SERVER_ADDR'] . "</p>";
    ?>
</body>
</html>

