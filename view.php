<?php 
$title = 'View Record';
require_once 'includes/header.php';
//check if there's a session
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

if(!isset($_GET['id'])){
    include 'includes/errormessage.php';  
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
?>

<img class="img-thumbnail rounded-circle" width="200" height="200" src="<?php echo empty($result["avatar_path"]) ? "uploads/username.png" : $result["avatar_path"]?>" alt="profile image"/>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $result["firstname"] . ' ' . $result["lastname"];?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php echo $result["name"]; ?>
    </h6>
    <p class="card-text">
        <?php  echo $result["dateofBirth"]; ?>
    </p>
    <p class="card-text">
        <?php  echo $result["emailaddress"]; ?>
    </p>
    <p class="card-text">
        <?php  echo $result["contactnumber"]; ?>
    </p>
  </div>
</div>
</br>
    <a href="viewrecords.php?" class="btn btn-info">Back to List</a>
    <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Delete</a>
<?php } ?>
<?php 
require_once 'includes/footer.php';
?>