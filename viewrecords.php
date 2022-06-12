<?php 
$title = 'View Records';
//in the header the session starts
require_once 'includes/header.php';
//check if there's a session
require_once 'includes/auth_check.php';
require_once 'db/conn.php';


$result = $crud->getAttendees();
?>

<table  class="table">
    <tr>
        <th>#</th>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Specialty </th>
        <th>Actions</th>
    </tr>
    <tr>
        <?php 
        while($r = $result->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $r['attendee_id']?></td>
            <td><?php echo $r['firstname']?></td>
            <td><?php echo $r['lastname']?></td>
            <td><?php echo $r['name']?></td>
            <td><a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>        
        <?php } ?>
    </tr>
</table>


<?php 
require_once 'includes/footer.php';
?>