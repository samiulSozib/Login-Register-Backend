<?php

		require_once 'connect.php'; 

		if ($_SERVER['REQUEST_METHOD']=='POST') {
			if (isset($_POST['email']) and isset($_POST['password'])) {
				
				$email = $_POST['email'];
				$password = $_POST['password'];

				$sql="SELECT * FROM tbl_user WHERE email= '$email' ";

				

				$response=mysqli_query($con,$sql);

				$result=array();
				$result['login']=array();

			if (mysqli_num_rows($response)===1) {
			 	$row=mysqli_fetch_assoc($response);

			 	if (password_verify($password, $row['password'])) {
			 		$index['name']=$row['name'];
			 		$index['email']=$row['email'];

				 	array_push($result['login'], $index);

				 	$result['success']="1";
				 	$result['message']="Success";

				 	echo json_encode($result);
				 	mysqli_close($con);
			 	}else{
					$result['success']="0";
					$result['message']="Error";
				 	echo json_encode($result);
				 	mysqli_close($con);
				}
			 }
		}
	}
?>