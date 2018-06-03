<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>First-Name</th>
			<th>Last-Name</th>
<!--			<th>Image</th>-->
			<th>Role</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		global $connect;
		$query = "SELECT * FROM users";
		$select_all_users = mysqli_query( $connect , $query);
		while($row = mysqli_fetch_assoc($select_all_users)){
			$user_id = $row['user_id'];
			$user_name = $row['user_name'];
			$user_password = $row['user_password'];
			$user_email = $row['user_email'];
			$user_fname = $row['user_fname'];
			$user_lname = $row['user_lname'];
			$user_image = $row['user_image'];
			$user_role = $row['user_role'];
						
			echo"<tr>";
			echo "<td>$user_id</td>";
			echo"<td>$user_name</td>";
			
			echo"<td>$user_email</td>";
			echo"<td>$user_fname</td>";
			echo"<td>$user_lname</td>";
//			echo"<td><img src='../images/$user_image' width = '100px' class='image-responsive'></td>";
			echo "<td>$user_role</td>";
			echo"<td><a href='/../CMS/admin/users.php?admin=$user_id'>admin</a></td>";
			echo"<td><a href='/../CMS/admin/users.php?subscriber=$user_id'>subscriber</a></td>";
			echo"<td><a href='/../CMS/admin/users.php?delete=$user_id'>Delete</a></td>";
			echo"<td><a href='users.php?edit=$user_id'>Edit</a></td>";
			echo "</tr>";
		}
			// deleting category
			if(isset($_GET['delete'])){
				$post_id = $_GET['delete'];
				$query = "DELETE FROM posts WHERE post_id = {$post_id}";
				$result = mysqli_query($connect,$query);
				if(!$result){
					die("Error in deleting category".mysqli_error($connect));
				}
				$delete_comments = "DELETE FROM comments WHERE comment_post_id = $post_id";
				$del_com_res = mysqli_query($connect,$delete_comments);
					if(!$del_com_res){
						die('Query Failed'.mysqli_error($connect));
					}
				header("Location:posts.php");
		  }
	?>
	</tbody>
</table>