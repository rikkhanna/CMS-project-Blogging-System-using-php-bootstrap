<?php include "include/db.php"?> 
<?php include "include/header.php"?>

    <!-- Navigation -->
   <?php include "include/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
				
				<?php 
					if(isset($_GET['id'])){
						$post_id = $_GET['id'];
					$query = "SELECT * FROM posts WHERE post_id = $post_id";
					$select_all_posts = mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($select_all_posts)){
						
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = $row['post_content'];
				?>
				
				  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content;?>.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
				 <!-- Posted Comments -->
					<?php
						if(isset($_POST['submit'])){
							
							$comment_author = $_POST['comment_author'];
							$comment_email = $_POST['comment_email'];
							$comment_content = $_POST['comment_content'];
						
//							$query = "SELECT * FROM posts WHERE post_title  = {$post_title}";
//							$post_id_comment = mysqli_query($connect,$query);
//								while($row = mysqli_fetch_assoc($post_id_comment)){
//									$post_id = $row['post_id'];
//									
//							}
							$comment_post_id = $post_id;
							
							
							$query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
							$query .= "VALUES ('{$comment_post_id}','{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";
							
							$result_comment = mysqli_query($connect,$query);
							if(!$result_comment){
								die('Query failed'.mysqli_error($connect));
							}
$query = "UPDATE posts SET post_comment_count = post_comment_count + 1";
$query .= " WHERE post_id = $post_id";
			$comment_count = mysqli_query($connect,$query);
						if(!$comment_count){
							die('query failed'.mysqli_error($connect));
						}

							
				}
						?>
				<!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
						<div class="form-group">
							<label>Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
						<div class="form-group">
							<label>Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
							<label>Content</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Comment -->
				<?php
					$query = "SELECT * FROM comments WHERE comment_post_id={$post_id} ";
					$query .= "AND comment_status = 'approved'";
					$query .= "ORDER BY comment_id";
						
					$result = mysqli_query($connect,$query);
						if(!$result){
							die('Query failed'.mysqli_error($connect));
						}
					while($row = mysqli_fetch_assoc($result)){
						
						$author = $row['comment_author'];
						$date = $row['comment_date'];
						$content = $row['comment_content'];
					
				?>
								
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author ; ?>
                            <small><?php echo $date ; ?></small>
                        </h4>
                       <?php echo $content ; ?>
                    </div>
                </div>	
	<?php } 

					
		}
	}?>

              </div>

            <!-- Blog Sidebar Widgets Column -->
          	<?php include "include/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "include/footer.php"?>