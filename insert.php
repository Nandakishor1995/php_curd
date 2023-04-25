<?php 
include 'db_connect.php';
if(isset($_POST['add_student'])){
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$phone =$_POST['phone_number'];
	$age = $_POST['age'];

	if ($f_name == "" || empty($f_name)){

		header('location:index.php?message=You need to fill in the first name');
	}

	else{

		echo "clicked";

		 $query = "INSERT INTO `userdetails` (`FirstName`,`LastName`,`PhoneNumber`,`Age`) 
		 VALUES ('$f_name','$l_name','$phone','$age')";

         $result = mysqli_query($connection,$query);

	    //$result1 = mysqli_query($connection, $query);

		if(!$result){

			die("Query Faild".mysqli_error());

		}

		else{

			header('location:index.php?insert_msg=Your Data has been  added successfully');
		}
	}
}

?>


