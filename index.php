<?php include('header.php') ?>
<?php include('db_connect.php') ?>
<div class="boxnew">
	<h2>USER DETAILS</h2>
	<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
</div>
	<table class="table table-hover table-bordered table-striped">
		<thead>
		<tr>
			<th>ID</th>
			<th>Full Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Age</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	    </thead>
	    <tbody>
	    	
	    	<?php 

$query ="select * from userdetails";
$result = mysqli_query($connection,$query);

if($result){
	//print_r($result);
	while ($row= mysqli_fetch_assoc($result)) {
		?>
        <tr>
        	<td><?php echo $row['ID'] ?></td>
        	<td><?php echo $row['FirstName'] ?></td>
        	<td><?php echo $row['LastName'] ?></td>
        	<td><?php echo $row['PhoneNumber'] ?></td>
        	<td><?php echo $row['Age'] ?></td>
        	<td><a href="update.php?id=<?php echo $row['ID'] ?>" class="btn btn-success">Update</a></td>
        	<td><a href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
		<?php
	}
   }
else {
	die("Query Faild".mysqli_error);
}

	    	?>

	    </tbody>
</table>
<?php 
if(isset($_GET['message'])){
	echo "<h3>".$_GET['message']."</h3>";
}
?>
<?php 
if(isset($_GET['insert_msg'])){
	echo "<h3>".$_GET['insert_msg']."</h3>";
}
?>
<?php 
if(isset($_GET['update_msg'])){
	echo "<h3>".$_GET['update_msg']."</h3>";
}
?>
<?php 
if(isset($_GET['delete_msg'])){
	echo "<h3>".$_GET['delete_msg']."</h3>";
}
?>
<!-- Modal -->
 <form action="insert.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
       	<div class="form-group">
       		<label> First Name </label>
       		<input type="text" name="f_name" class="form-control">
       	</div>
       	
       	<div class="form-group">
       		<label> Last Name </label>
       		<input type="text" name="l_name" class="form-control">
       	</div>
       	<div class="form-group">
       		<label> Phone Number </label>
       		<input type="text" name="phone_number" class="form-control">
       	</div>
       	<div class="form-group">
       		<label> Age </label>
       		<input type="Number" name="age" class="form-control">
       	</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add_student" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>


		
		
	
<?php include('footer.php') ?>