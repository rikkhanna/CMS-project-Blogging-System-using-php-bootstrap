<?php 
function confirmQuery($result){
	global $connect;
	if(!$result){
		die('Query Fails'.mysqli_error($connect));
	}
}
function insert_category(){
	global $connect;
if(isset($_POST['submit'])){
	$cat_title = $_POST['cat_title'];
	if($cat_title ==""||empty($cat_title)){
		echo "Field can not be empty!";
	}else{
		$query = "INSERT INTO categories(cat_title)";
		$query .= "VALUES('{$cat_title}')";
		$result = mysqli_query($connect,$query);
			if(!$result){
				die("Error in inserting category".mysqli_error($connect));
			}
	}
}
	
}
function delete_category(){
		global $connect;

	if(isset($_POST['delete'])){
								$cat_title = $_POST['cat_title'];
								if($cat_title ==""||empty($cat_title)){
									echo "Field can not be empty!";
								}else{
								$query = "DELETE FROM categories WHERE cat_title = '{$cat_title}'";
								
								$result = mysqli_query($connect,$query);
								if(!$result){
									die("Error in deleting category".mysqli_error($connect));
								}
							  }
							}
	
	
}

function update_category(){
	
	global $connect;
	if(isset($_GET['edit'])){
								$cat_id = $_GET['edit'];
								
								$query = "SELECT * from categories WHERE cat_id = {$cat_id}";
								$result = mysqli_query($connect,$query);
									while($row = mysqli_fetch_assoc($result)){
										$title = $row['cat_title'];
									
								}
									
							  }
	if(isset($_POST['update'])){
								$cat_title = $_POST['cat_title'];
								
								$query = "UPDATE categories set cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
								
								$result = mysqli_query($connect,$query);
								
								if(!$result){
									die("Error in updating category".mysqli_error($connect));
								}
								header("Location:categories.php");	
							  }	
									
}
function get_textField(){
	global $connect;
	if(isset($_GET['edit'])){
												$cat_id = $_GET['edit'];
												$query = "SELECT * from categories WHERE cat_id = 	{$cat_id}";
												$result = mysqli_query($connect,$query);
											while($row = mysqli_fetch_assoc($result)){
													$title = $row['cat_title'];
													}
										  }
									  		if(isset($title)){echo $title;} 
	
}




?>