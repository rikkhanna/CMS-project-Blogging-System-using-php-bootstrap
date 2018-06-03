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
	<?php
		if(isset($_GET['source'])){
			$source = $_GET['source'];
			
		}else if(isset($_GET['edit'])){
			
			$source = 'update';
		}else{
			$source = '';
		}
		
		switch($source){
				
			case 'add_user':
				include"includes/add_update_user.php";
					break;
			case 'update':
				include"includes/add_update_user.php";
				break;
			 
			default:
				include "includes/view_all_users.php";
				break;
			}
											// deleting category
						if(isset($_GET['delete'])){
							$user_id = $_GET['delete'];
								
							$query = "DELETE FROM users WHERE user_id = {$user_id}";
								
							$result = mysqli_query($connect,$query);
							header("Location:users.php");
							if(!$result){
								die("Error in deleting category".mysqli_error($connect));
							}
									
					 }
		//update comment unapprove section
		if(isset($_GET['admin'])){
							$user_id = $_GET['admin'];
								
							$query = "UPDATE users set user_role = 'admin' WHERE user_id = {$user_id}";
								
							$result = mysqli_query($connect,$query);
							header("Location:users.php");
							if(!$result){
								die("Error in deleting category".mysqli_error($connect));
							}
									
					 }
		if(isset($_GET['subscriber'])){
							$user_id = $_GET['subscriber'];
								
							$query = "UPDATE users set user_role = 'subscriber' WHERE user_id = {$user_id}";
								
							$result = mysqli_query($connect,$query);
							header("Location:users.php");
							if(!$result){
								die("Error in deleting category".mysqli_error($connect));
							}
									
					 }
						
	?>		
						
							
						
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