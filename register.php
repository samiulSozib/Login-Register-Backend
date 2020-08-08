<?php
	
	if ($_SERVER['REQUEST_METHOD']=='POST') {

		if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password'])) {
		
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		$password=password_hash($password, PASSWORD_DEFAULT);

		require_once 'connect.php'; 

		$sql="INSERT INTO tbl_user(name,email,password) VALUES ('$name','$email','$password') ";


		if (mysqli_query($con,$sql)) {
			$result['success']="1";
			$result['message']="success";

			echo json_encode($result);
			mysqli_close($con);
		}
		else{
			$result['success']="0";
			$result['message']="error";

			echo json_encode($result);
			mysqli_close($con);
		}

	}
}

?>