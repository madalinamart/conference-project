<?php 
$title = 'Edit Record';
require_once 'includes/header.php';
//check if there's a session
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();
if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header('Location: viewrecords.php');
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
?>
    <h1 class='text-center'>Edit Record</h1>

    <form method="POST" action="editpost.php">
        <input required type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>"/>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $attendee['firstname'] ?>">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['lastname'] ?>">
      </div>
      <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input required type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendee['dateofBirth'] ?>">
      </div>
      <div class="form-group">
    <label for="specialty">Specialty</label>
    <select class="form-control" id="specialty" name="specialty">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $r['specialty_id'];?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'?>>
          <?php echo $r['name']; ?>
        </option>
      <?php } ?>
    </select>
  </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" value="<?php echo $attendee['emailaddress'] ?>" >
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input required type="text" class="form-control" id="phone" name="phone" value="<?php echo $attendee['contactnumber'] ?>">
      </div>
    <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </form>
<?php } ?>
<br>
<?php 
require_once 'includes/footer.php';
?>