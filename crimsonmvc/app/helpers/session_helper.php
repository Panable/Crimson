<?php
session_start();

function privelagedEntry()
{
    if (!isManager())
        die("you are not allowed access");
}

function userEntry()
{
    if (!isLoggedIn()) {
        die("you are not allowed access");
    }
}

function forceAdminLogin()
{
    setSession('user_id', 99);
    setSession('user_email', "Chelton@gmail.com");
    setSession('user_name', 'Chelton');
    setSession('user_position', 'Manager');
}

function isLoggedIn()
{
    return getSession('user_id');
}

function isManager()
{
    return getSession('user_position') == 'Manager';
}

function isHeadChef()
{
    //TODO
}

function unsetSession($key)
{
    unset($_SESSION[$key]);
}

function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function getSession($key)
{
    if (empty($_SESSION[$key])) {
        return false;
    }

    return $_SESSION[$key];
}

function flash($name = '', $message = '', $class = 'alert alert-success')
{
    //session is empty, yet name and message is provided
    $genNewSession = !empty($name) && !empty($message) && getSession($name);

    $flashTheMessage = empty($message) && !getSession($name);

    if ($genNewSession)
        generateNewSession($name, $message, $class);

    if ($flashTheMessage)
        flashMessageFromSessionAndUnset($name);
}

function generateNewSession($name, $message, $class)
{
    setSession($name, $message);
    setSession($name . '_class', $class);
}

function flashMessageFromSessionAndUnset($name)
{
    $class = !getSession($name . '_class') ? getSession($name . '_class') : '';
    echo '<div class="' . $class . '" id="msg-flash">' . getSession($name) . '</div>';
    unset($_SESSION[$name]);
    unset($_SESSION[$name . '_class']);
}
