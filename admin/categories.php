<?php 
	include "includes/header.php";
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
						
						
						<div class="col-xs-6">
							<?php //insert categories inside table 
								insert_category();
								delete_category();
							
					?>
							<form action="" method="post">
								<div class="form-group">
									<label>Category Name</label>
									
						<?php 	
									
								update_category();	
								
							?>
						<input type="text" name="cat_title" class="form-control" 
							   value="<?php 
									  		 get_textField();
									  ?>">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary" value="Add ">
									<input type="submit" name="delete" class="btn btn-primary" value="Delete">
									<input type="submit" name="update" class="btn btn-primary" value="Update">
								</div>
							</form>
						</div><!--add category form-->
						
						<div class="col-xs-6">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Category</th>
									</tr>
								</thead>
								<tbody>
									<?php 
						$query = "SELECT * FROM categories";
						$select_all_categories = mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($select_all_categories)){
						$cat_id = $row['cat_id'];
						$title = $row['cat_title'];
						echo "<tr><td>{$cat_id}</td>
									<td>{$title}</td>
									<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
									<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
							</tr>";
					}
					
					?>
						<?php
								
									// deleting category
								if(isset($_GET['delete'])){
								$cat_id = $_GET['delete'];
								
								$query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
								
								$result = mysqli_query($connect,$query);
								header("Location:categories.php");
								if(!$result){
									die("Error in deleting category".mysqli_error($connect));
								}
									
							  }
							
									
						?>
									
									
									
								</tbody>
							</table>
						
						</div>

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