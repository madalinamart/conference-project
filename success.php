<?php 
$title = 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname =  $_POST["lastname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contact =  $_POST["phone"];
    $specialty = $_POST["specialty"];
    $password = $_POST["password"];
    

     //PROFILE IMAGE
/*      $orig_file = $_FILES["avatar"]["tmp_name"];
     $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
     $target_dir = 'uploads/';
     $destination = "$target_dir$contact.$ext";
     move_uploaded_file($orig_file, $destination); */
     if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){

        $allowed_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $file_name = $_FILES["avatar"]["name"];
        $file_type = $_FILES["avatar"]["type"];
        $file_dim = $_FILES["avatar"]["size"];
       

        //check extensions
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $destination = "uploads/$contact.$ext";
        if(!array_key_exists($ext, $allowed_ext)) die("Please select a valid image");


        //check for max size
        $max_size = 5 * 1024 * 1024;
        if($file_dim > $max_size) die("Max size is 5MB");

        //check for MIME type
        if(in_array($file_type, $allowed_ext)){
            //check if file already exists
            if(file_exists("uploads/$file_name")){
                echo "<p class='text-danger'> $file_name already exists, choose another name </p>";
            } else {
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination);
            }
        } else {
            echo "<p class='text-danger'> There was an error with your uploading, please try again</p>";
        }
    }else {
        echo 'Error: '.$_FILES["avatar"]["error"];
    }
  
    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);  
    $isRegistered = $user->insertUser(strtolower(trim($email)), $password);
    if($isSuccess && $isRegistered){
        include 'includes/successmessage.php';
    }else {
        include 'includes/errormessage.php';
    }
}
?>
<img class="img-thumbnail rounded-circle" width="200px" height="200px" src="<?php echo empty($destination) ? "uploads/username.png" : $destination?>" alt="profile image"/>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $_POST["firstname"] . ' ' . $_POST["lastname"];?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php echo $_POST["specialty"]; ?>
    </h6>
    <p class="card-text">
        <?php  echo $_POST["dob"]; ?>
    </p>
    <p class="card-text">
        <?php  echo $_POST["email"]; ?>
    </p>
    <p class="card-text">
        <?php  echo $_POST["phone"]; ?>
    </p>
  </div>
</div>
<?php 
require_once 'includes/footer.php';
?>