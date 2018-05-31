<?php

	if(isset($_POST['submit'])){
		$post_title = $_POST['post_title'];
		$post_author = $_POST['post_author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		
		
		move_uploaded_file($post_image_temp,"../images/$post_image");
		
		
		$query = "INSERT INTO posts(post_cateogry_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
		$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
		
		$result = mysqli_query($connect,$query);
		if(!$result){
			die('query failed'.mysqli_error($connect));
		}
		header("Location:posts.php");	
	}

	if(isset($_GET['edit'])){
		$post_id = $_GET['edit'];
		$query = "SELECT * from posts WHERE post_id = 	{$post_id}";
		$result = mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($result)){
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_category_id = $row['post_cateogry_id'];
		$post_status = $row['post_status'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_content = $row['post_content'];
		$post_date = $row['post_date'];
		$post_comment_count = $row['post_comment_count'];
													}
	}

if(isset($_POST['update'])){
		$post_title = $_POST['post_title'];
		$post_author = $_POST['post_author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = $_POST['date'];
move_uploaded_file($post_image_temp,"../images/$post_image");
	
	if(empty($post_image)){
		$query = "SELECT * FROM posts where post_id = {$post_id}";
		$select_image = mysqli_query($connect,$query);
		while($row = mysqli_fetch_assoc($select_image)){
			$post_image = $row['post_image'];
		}
	}
		$query = "UPDATE posts set post_title = '{$post_title}',post_author = '{$post_author}',post_cateogry_id = '{$post_category_id}',post_status = '{$post_status}',post_image = '{$post_image}',post_tags = '{$post_tags}',post_content = '{$post_content}',post_date = '{$post_date}' WHERE post_id = {$post_id}";
								
								$result = mysqli_query($connect,$query);
								
								if(!$result){
									die("Error in updating category".mysqli_error($connect));
								}
								header("Location:posts.php");	
							  }	
?>



<html>
	<head>
		<style>
		
			.file-choose{
				border: none !important;
				width:30rem !important;
			}
		</style>
	</head>
	<body>
		
	<form action="" method="post" enctype="multipart/form-data">					
		
		<div class="form-group">
			<label>Post Title</label>
			<input type="text" class="form-control" name="post_title" value="<?php if(isset($post_title)){echo $post_title;}?>">
		</div>
		<div class="form-group">
			<label>Post Category</label>
			<select name="post_category">
				<?php
					$query = "SELECT * FROM categories";
					$category = mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($category)){
						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];
				
				
				echo"<option value='{$cat_id}'>$cat_title</option>";
					}
				?>
			</select>

		</div>
		<div class="form-group">
			<label>Post Author</label>
			<input type="text" class="form-control" name="post_author" value="<?php if(isset($post_author)){echo $post_author;}?>">
		</div>
		<div class="form-group">
			<label>Post Status</label>
			<input type="text" class="form-control" name="post_status" value="<?php if(isset($post_status)){echo $post_status;}?>">
		</div>
		<div class="form-group">
			<label>Post Image</label>
			<input type="file" name="image" value="<?php if(isset($post_image)){echo $post_image;}?>">
		</div>
		<div class="form-group">
			<label>Post Tags</label>
			<input type="text" class="form-control " name="post_tags" value="<?php if(isset($post_tags)){echo $post_tags;}?>">
		</div>
		<div class="form-group">
			<label>Post Content</label>
			<textarea  class="form-control" name="post_content" cols="30" rows="10"><?php if(isset($post_content)){echo $post_content;}?></textarea>
		</div>
		<div class="form-group">
			<label>Date</label>
			<input type="date" class="form-control" name="date" value="<?php if(isset($post_date)){echo $post_date;}?>">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary" value="Publish post ">
			<input type="submit" name="update" class="btn btn-primary" value="Update post ">
		</div>
	</form>

	</body>
</html>

