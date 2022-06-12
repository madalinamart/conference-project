<?php
include_once 'includes/session.php';
?>
<?php 
//DESTROY THE SESSION
session_destroy();
header('Location: index.php');
?>