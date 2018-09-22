<?php
session_start();


function login($login, $password)
{
    $user = getUser($login);
    if ($user && $user['password'] == $password) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

function getUser($login)
{
    $usersData = file_get_contents(__DIR__ . '/data/' . $login . '.json');
    if (!$usersData) {
        return null;
    }
    $users = json_decode($usersData, true);
    if (!$users) {
        return null;
    }
     foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
     }
}
function isAuthorized()
{
    return !empty($_SESSION['user']);
} 

function isAdmin()
{
    
    return $_SESSION['user']['is_admin'];
}  


function redirect($page)
{
    header("Location: $page.php");
    die;
}

function TestDelete ($test) 
{
    $filename = './tests/' . $test;
    unlink($filename);  
}

