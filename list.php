<?php
require_once 'functions.php';
if (isAuthorized() or (!empty($_POST['name']))) {
    if(isAuthorized()) {
      echo "Добро пожаловать, " . $_SESSION['user']['login'] . "!<br><br>";  
    } else {
        echo "Добро пожаловать, " . $_POST['name']  . "!<br><br>";
    }
    
$dir = "./tests";
if ($handle = opendir($dir)) {

    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            if (isAuthorized()) {
                if (isAdmin()) {
                     echo "<a href='test.php?test=" . $file . "'>" . $file . "</a>&nbsp;&nbsp;";
                    echo "<a href='filedelete.php?file=" . $file . "'>" . '(удалить тест)' .  "</a>" . "<br>";
                               }
               }  else {
            echo "<a href='test.php?test=" . $file . "'>" . $file . "</a><br>";
}
}
}
}
echo "<ul>";
if (isAuthorized()) {
if (isAdmin()) {
    echo "<li><a href='admin.php'>Загрузить тест</a></li>";
    }
}
echo "<li><a href='logout.php'>Выход</a></li></ul>";

if (isAuthorized() == false) {
$username = $_POST['name'];
$_SESSION['username'] = $username;
}
}
else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden'); 
    echo '403 Forbidden';
}

