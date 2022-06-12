<?php 
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();
?>
    <h1 class='text-center'>Registration for IT Conference</h1>

    <form method="POST" action="success.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
      </div>
      <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input required type="text" class="form-control" id="dob" name="dob">
      </div>
      <div class="form-group">
    <label for="specialty">Specialty</label>
    <select class="form-control" id="specialty" name="specialty">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $r['specialty_id'];?>"><?php echo $r['name']; ?></option>
      <?php } ?>
    </select>
  </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" >
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input required type="text" class="form-control" id="phone" name="phone">
      </div>
      <div class="custom-file mb-4">
        <input required type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
        <label for="avatar" class="custom-file-label">Choose File</label>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" id="password" name="password">
      </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
<?php 
require_once 'includes/footer.php';
?>