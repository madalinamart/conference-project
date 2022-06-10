<?php 
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();
?>
    <h1 class='text-center'>Registration for IT Conference</h1>

    <form method="POST" action="success.php">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
      </div>
      <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
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
        <input type="email" class="form-control" id="email" name="email" >
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" >
      </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
<br>
<?php 
require_once 'includes/footer.php';
?>