<?php
//CHECK IF SESSION EXISTS = if user is logged in
//if user is not logged in redirect to login page
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
?>