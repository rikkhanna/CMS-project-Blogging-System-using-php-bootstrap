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
	  					if(isset($_POST['submit'])){
						$search_content = $_POST['search'];
							
						$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search_content%' ";
						$search_result = mysqli_query($connect,$query);
							
							if(!$search_result){
								die("Query Failed".mysqli_error($connect));
							}
							
							$count = mysqli_num_rows($search_result);
							
							if($count == 0){
								echo"<h1>No Result</h1>";
							}else{
//								$query = "SELECT * FROM posts";
//							$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search_content%' ";
//					$select_all_posts = mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($search_result)){
						
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

                  <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
<?php } //while end
	} //else end
}//if end
				
?>
				
				
				
					

              </div>

            <!-- Blog Sidebar Widgets Column -->
          	<?php include "include/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "include/footer.php"?>