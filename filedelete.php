<?php
require_once 'functions.php';
$filename = './tests/' . $_GET['file'];
unlink($filename);  
redirect ('list');