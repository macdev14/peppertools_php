<?php
require_once 'activebar.php';

$_SESSION['id_os'] = $_POST['id_os'];
echo "<script type='text/javascript' language='Javascript'>window.open('http://www.example.com');</script>"
header('location: ../view/imp_os');
 ?>
