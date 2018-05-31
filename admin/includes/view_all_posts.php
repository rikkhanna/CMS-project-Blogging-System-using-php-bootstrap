<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Author</th>
										<th>Title</th>
										<th>Category</th>
										<th>Status</th>
										<th>Image</th>
										<th>Tags</th>
										<th>Comments</th>
										<th>Date</th>
										<th>Delete</th>
										<th>Edit</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									global $connect;
									$query = "SELECT * FROM posts";
										$select_all_posts = mysqli_query( $connect , $query);
										while($row = mysqli_fetch_assoc($select_all_posts)){
											$post_id = $row['post_id'];
											$post_title = $row['post_title'];
											$post_author = $row['post_author'];
											$post_status = $row['post_status'];
											$post_image = $row['post_image'];
											$post_tags = $row['post_tags'];
											$post_comments = $row['post_comment_count'];
											$post_date = $row['post_date'];
											$post_category = $row['post_cateogry_id'];
									
									echo"<tr>";
										echo "<td>$post_id</td>";
										echo"<td>$post_author</td>";
										echo"<td>$post_title</td>";
											
											$query = "SELECT * FROM categories WHERE cat_id  = {$post_category}";
											$select_all_categories = mysqli_query($connect,$query);
										while($row = mysqli_fetch_assoc($select_all_categories)){
											 $cat_title = $row['cat_title'];
										
										echo"<td>{$cat_title}</td>";
										}
											

										echo"<td>$post_status</td>";
										echo"<td><img src='../images/$post_image' width = '100px' class='image-responsive'></td>";
										echo "<td>$post_tags</td>";
										echo "<td>$post_comments</td>";
										echo"<td>$post_date</td>";
										echo"<td><a href='posts.php?delete={$post_id}'>delete</a></td>";
										echo"<td><a href='posts.php?edit={$post_id}'>edit</a></td>";
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