<?php include "includes/header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php if(isset($_SESSION['u_name'])) echo $_SESSION['u_name'] ?></small>
                        </h1>
                              
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$query = "SELECT * FROM posts";
$count = mysqli_query($connect,$query);
if(!$count){
	die('Query failed'.mysqli_error($connect));
}
$no_of_posts = mysqli_num_rows($count)	;
?>
                  		<div class='huge'><?php echo $no_of_posts;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$query = "SELECT * FROM comments";
$count = mysqli_query($connect,$query);
if(!$count){
	die('Query failed'.mysqli_error($connect));
}
$no_of_comments = mysqli_num_rows($count)	;
?>
                     <div class='huge'><?php echo $no_of_comments;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$query = "SELECT * FROM users";
$count = mysqli_query($connect,$query);
if(!$count){
	die('Query failed'.mysqli_error($connect));
}
$no_of_users = mysqli_num_rows($count)	;
?>
                    <div class='huge'><?php echo $no_of_users;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$query = "SELECT * FROM categories";
$count = mysqli_query($connect,$query);
if(!$count){
	die('Query failed'.mysqli_error($connect));
}
$no_of_categories = mysqli_num_rows($count)	;
?>
                        <div class='huge'><?php echo $no_of_categories;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
						
<?php
						
$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
$post_status = mysqli_query($connect,$query);
$draft_type_status = mysqli_num_rows($post_status);
						
$query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
$comment_status = mysqli_query($connect,$query);
$comment_type_status = mysqli_num_rows($comment_status);
						
$query = "SELECT * FROM users WHERE user_role = 'admin' ";
$user_role1 = mysqli_query($connect,$query);
$user_type1 = mysqli_num_rows($user_role1);
			
$query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
$user_role2 = mysqli_query($connect,$query);
$user_type2 = mysqli_num_rows($user_role2);
						
?>						
<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date','count'],
			<?php
				$element_text = ['Active Posts','Draft status', 'Comment Unapproved','Comments' , 'Admins', 'Subscribers', 'Users','Categories' ];
				$element_count = [$no_of_posts, $draft_type_status, $comment_type_status, $no_of_comments , $user_type1, $user_type2, $no_of_users, $no_of_categories ];
			for($i=0; $i<count($element_text); $i++){
				
				echo "['{$element_text[$i]}'".", "."{$element_count[$i]}],";
			}
			
			?>
          
        
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>						
</div>
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>						
                <!-- /.row -->
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