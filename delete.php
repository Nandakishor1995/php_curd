<?php include('db_connect.php'); ?>

<?php 

if(isset($_GET['id'])){
	$id = $_GET['id'];

$query = "delete from `userdetails` where `id`='$id'";
$result = mysqli_query($connection, $query);

if(!$result){
	die("Query Faild".mysql_error());
}
else{
	header('location:index.php?delete_msg=You have deleted the record.');
}

}
?>