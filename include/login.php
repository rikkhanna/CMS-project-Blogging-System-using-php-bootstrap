<?php include "header.php";


if(isset($_POST['login'])){
	
	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_password'];
	
	$user_name = mysqli_real_escape_string($connect,$user_name);
	$user_password = mysqli_real_escape_string($connect,$user_password);
	
	$query = "SELECT * FROM users WHERE user_name = '{$user_name}'";
	
	if($query){
		
		$_SESSION['wrongName'] = "wrong User name";
				header("Location: ../index.php");
		
	}
		
		
		$result = mysqli_query($connect,$query);

		if(!$result){
			die("Query failed".mysqli_error($connect));
		}

		while($row = mysqli_fetch_assoc($result)){

			$u_pass = $row['user_password'];
			$u_name = $row['user_name'];
			$u_role = $row['user_role'];
			$u_id = $row['user_id'];
			if($u_pass === $user_password && $u_name === $user_name){

				$_SESSION['u_name'] = $u_name;
				$_SESSION['u_role'] = $u_role;
				$_SESSION['u_id'] = $u_id;
				header("Location: /../CMS/admin/admin.php");

			}
			else{

				header("Location: ../index.php");
			}
		}
	
}


?>
