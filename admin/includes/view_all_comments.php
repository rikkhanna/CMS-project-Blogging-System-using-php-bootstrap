<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Author</th>
										<th>Comment</th>
										<th>Email</th>
										<th>Status</th>
										<th>In Response to</th>
										<th>Date</th>
										<th>Approve</th>
										<th>Unapprove</th>
										<th>Delete</th>
										<th>Edit</th>
										
									</tr>
								</thead>
								<tbody>
									<?php 
									global $connect;
									$query = "SELECT * FROM comments";
										$select_all_posts = mysqli_query( $connect , $query);
										while($row = mysqli_fetch_assoc($select_all_posts)){
											$comment_id = $row['comment_id'];
											$comment_post_id = $row['comment_post_id'];
											$comment_author = $row['comment_author'];
											$comment_email = $row['comment_email'];
											$comment_content = $row['comment_content'];
											$comment_status = $row['comment_status'];
											$comment_date = $row['comment_date'];	
											
											echo"<tr>";
										echo "<td>$comment_id </td>";
										echo"<td>$comment_author</td>";
										echo"<td>$comment_content</td>";
										echo"<td>$comment_email</td>";
										echo"<td>$comment_status</td>";

											$query = "SELECT * FROM posts WHERE post_id  = {$comment_post_id}";
											$post_of_comment = mysqli_query($connect,$query);
										while($row = mysqli_fetch_assoc($post_of_comment)){
											$post_id = $row['post_id'];
											 $post_title = $row['post_title'];
										
//										echo"<td><a href='/../CMS/post.php?id={$post_id}'>{$post_title}</a></td>";  //mistake remember this 
							echo"<td><a href='/../CMS/post.php?id=$post_id'>{$post_title}</a></td>";
											
										}
											

							echo"<td>$comment_date</td>";
										
							echo"<td><a href='/../CMS/admin/comments.php?approve=$comment_id'>Approve</a></td>";
				echo"<td><a href='/../CMS/admin/comments.php?unapprove=$comment_id'>Unapprove</a></td>";
						echo"<td><a href='/../CMS/admin/comments.php?delete=$comment_id'>Delete</a></td>";
							echo"<td><a href='posts.php?edit=$comment_id'>Edit</a></td>";
							echo "</tr>";
						}
									
							
						?>
									
								</tbody>
							
							</table>