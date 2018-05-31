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
				
			case 'add_post':
				include"includes/add_post.php";
					break;
			case 'update':
				include"includes/add_post.php";
				break;
			case 52:
				echo 'undefined code 52';
				break;
			default:
				include "includes/view_all_posts.php";
				break;
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