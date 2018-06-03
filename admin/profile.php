<?php include "includes/header.php";
 	include "functions.php";
?> 
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to course
                            <small>Author</small>
                        </h1>
						
					<?php if(isset($_SESSION['u_name'])){
			$user_name = $_SESSION['u_name'];
			$query = "SELECT * from users WHERE user_name = '{$user_name}'";
		$result = mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($result)){
		$user_name= $row['user_name'];
		$user_password = $row['user_password'];
		$user_email = $row['user_email'];
		$user_fname = $row['user_fname'];
		$user_lname = $row['user_lname'];
		$user_image = $row['user_image'];
		$user_role = $row['user_role'];

					}
}
		
			if(isset($_POST['update'])){
		$user_name= $_POST['user_name'];
		$user_password = $_POST['user_password'];
		$user_email = $_POST['user_email'];
		$user_fname = $_POST['user_fname'];
		$user_lname = $_POST['user_lname'];
		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image']['tmp_name'];
		$user_role = $_POST['user_role'];
		
		move_uploaded_file($post_image_temp,"../images/$post_image");
	if(empty($user_image)){
		$query = "SELECT * FROM users where user_id = {$user_id}";
		$select_image = mysqli_query($connect,$query);
		while($row = mysqli_fetch_assoc($select_image)){
			$user_image = $row['user_image'];
		}
	}
		$query = "UPDATE users set user_name = '{$user_name}',
		user_password = '{$user_password}',
		user_fname = '{$user_fname}',
		user_lname = '{$user_lname}',
		user_image = '{$user_image}',
		user_role = '{$user_role}' 
		WHERE user_name = '{$_SESSION['u_name']}'";
								
		$result = mysqli_query($connect,$query);
								
		if(!$result){
				die("Error in updating category".mysqli_error($connect));
		}
		header("Location:users.php");	
}	

						?>
	<form action="" method="post" enctype="multipart/form-data">					
		
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="user_name" value="<?php if(isset($user_name)){echo $user_name;}?>">
		</div>
		<div class="form-group">
			<label>User Password</label>
			<input type="password" class="form-control" name="user_password" value="<?php if(isset($user_password)){echo $user_password;}?>">
		</div>
		<div class="form-group">
			<label>User email</label>
			<input type="email" class="form-control" name="user_email" value="<?php if(isset($user_email)){echo $user_email;}?>">
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" class="form-control" name="user_fname" value="<?php if(isset($user_fname)){echo $user_fname;}?>">
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" class="form-control " name="user_lname" value="<?php if(isset($user_lname)){echo $user_lname;}?>">
		</div>
		<div class="form-group">
			<label>Upload an image</label>
			<input type="file" class="form-control file-choose" name="user_image">
		</div>
		<div class="form-group">
			<label>Role</label>
			<select name="user_role">
				<?php
				if(isset($_SESSION['u_role'])){
					$query = "SELECT * FROM users";
					$role = mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($role)){
						$user_role = $row['user_role'];
						if(count($user_role) >= 2)
						echo"<option value='{$user_role}'>$user_role</option>";
						else{
							echo"<option value='admin'>admin</option>";
							echo"<option value='subscriber'>subscriber</option>";
						}
				}
				}

				?>
				
			</select>

		</div>
		<div class="form-group">
			<input type="submit" name="update" class="btn btn-primary" value="Update post ">
		</div>
	</form>
						
							
						
						</div>

                
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"?>