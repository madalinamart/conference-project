<?php 
$title = 'User Login';
require_once 'includes/header.php';
require_once 'db/conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];

    $result = $user->getUser($username);

    if(!password_verify($password, $result['password'])){
        echo '<div class="alert alert-danger">Username or Password is incorrect! Please, try again. </div>';
    } else {
        //SET SESSION FOR THE USER
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header('Location: viewrecords.php');
    }
}
?>

<h1 class="text-center"><?php echo $title ?> </h1>
<!-- ACTION = login and do action on the same page -->
<!-- htmlentities = remove vulnerabilities for sql injections -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
<table class="table table-sm mb-4">
    <tr>
        <td>
            <label for="username">Email: *</label>
        </td>
        <td>
            <!-- VALUE makes so that when I relog page the username stays in the input-->
            <input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'];?>">
            <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>";?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="password">Password: *</label>
        </td>
        <td>
            <input type="password" name="password" class="form-control" id="password">
            <?php if (empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>";?>
        </td>
    </tr>    
</table>
<input type="submit" value="Login" class="btn btn-primary btn-block"/>
<a href="#">Forgot password</a>
</form>

<?php 
include_once 'includes/footer.php';
?>