<?php include('db_connect.php') ?>
<?php include('header.php') ?>

<?php
 if(isset($_GET['id'])){
 	$id=$_GET['id'];

 	$query="select * from `userdetails` where `id` ='$id'";
 	$result=mysqli_query($connection,$query);
 	if(!$result){
 		die("Query Faild".mysqli_error());
 	}
 	else{
 		
 		$row = mysqli_fetch_assoc($result);
 		//print_r($row);
 	}
 }

?>

<?php 
if(isset($_POST['update_student'])){

if(isset($_GET['id_new'])){
	$idnew = $_GET['id_new'];
}

	$fname =$_POST['f_name'];
	$lname =$_POST['l_name'];
	$phone =$_POST['phone_number'];
	$age =$_POST['age'];



	$query="update `userdetails` set `FirstName` ='$fname',`LastName` ='$lname',`PhoneNumber` ='$phone',`Age` = '$age' where `id` = $idnew";
$result = mysqli_query($connection,$query);
if (!$result){
	die("Query Faild".mysqli_error());
}
else{
	header('location:index.php?update_msg=you have updated successfully');
}

}
?>


<form action="update.php?id_new=<?php echo $id;?>" method="POST">
	<div class="form-group">
       		<label> First Name </label>
       		<input type="text" name="f_name" class="form-control" value="<?php echo $row['FirstName'] ?>">
       	</div>
       	
       	<div class="form-group">
       		<label> Last Name </label>
       		<input type="text" name="l_name" class="form-control" value="<?php echo $row['LastName'] ?>">
       	</div>
       	<div class="form-group">
       		<label> Phone Number </label>
       		<input type="text" name="phone_number" class="form-control" value="<?php echo $row['PhoneNumber'] ?>">
       	</div>
       	<div class="form-group">
       		<label> Age </label>
       		<input type="Number" name="age" class="form-control" value="<?php echo $row['Age'] ?>">
       	</div>
       <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <input type="submit" class="btn btn-primary" name="update_student" value="UPDATE">
      </div>
  </form>

<?php include('footer.php') ?>