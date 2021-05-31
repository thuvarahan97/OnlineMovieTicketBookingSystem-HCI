<html>
<body>
<?php
include('header.php');

?>


<!--------------------------- Custom Styles - start ---------------------------->
<link rel="stylesheet" href="css/style_thuva.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/style_thuva_multi_carousel.css" type="text/css" media="all" />
<!--------------------------- Custom Styles - end ------------------------------>


<!---------------------------- Carousel Banner -start -------------------------------->
<?php
$qry1=mysqli_query($con,"SELECT B.movie_id, B.movie_name, A.banner_img FROM tbl_banners A INNER JOIN tbl_movie B ON A.movie_id = B.movie_id");
$count1=mysqli_num_rows($qry1);
if ($count1 > 0) {
	$data_array1 = array();
	while ($data = mysqli_fetch_array($qry1)) {
		$data_array1[] = $data;
	}
?>

<div id="bannerCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php
		$first_row1 = true;
		$i1 = 0;
		foreach($data_array1 as $d1)
		{
		?>
		<li data-target="#bannerCarousel" data-slide-to="<?php echo $i1; $i1 += 1;?>" <?php if ($first_row1) { echo 'class="active"'; $first_row1 = false; } ?>></li>
		<?php
		} 
		?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php
		$first_row1 = true;
		foreach($data_array1 as $d1)
		{
		?>
		<div class="item <?php if ($first_row1) { echo 'active'; $first_row1 = false; } ?>">
			<img class="carousel-banner-img" src="<?php echo $d1['banner_img'];?>" alt="<?php echo $d1['movie_name'];?>">
			<div class="carousel-caption carousel-banner-title">
				<h3><a href="about.php?id=<?php echo $d1['movie_id'];?>"><?php echo $d1['movie_name'];?></a></h3>
			</div>
		</div>
		<?php
		} 
		?>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#bannerCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#bannerCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<?php
}
?>
<!----------------------------- Carousel Banner - end ------------------------------->





<div class="content">
	<div class="wrap">

		<!----------------------------- Carousel Screening Movie List - start ------------------------->
		<div class="nowshowing-movies-section">
			<h2 class="custom-main-title">Films in Theaters</h2>
			<div class="col-xs-12 col-md-12 col-centered">

				<div id="movieCarousel_nowshowing" class="carousel movieCarousel slide" data-ride="carousel" data-type="multi" data-interval="false">
					<div class="carousel-inner">
						<?php
						$today=date("Y-m-d");
						$qry2=mysqli_query($con,"select * from  tbl_movie where status='0'");
						
						$first_row = true;
						while($m=mysqli_fetch_array($qry2))
						{
						?>

						<div class="item <?php if($first_row) { echo 'active'; $first_row = false; } ?>">
							<div class="carousel-col">
								<div class="block-box img-responsive">
									<a href="about.php?id=<?php echo $m['movie_id'];?>">
										<div class="movie-carousel-poster-box">
											<img class="moviecarousel-poster-img" src="<?php echo $m['image'];?>" alt="<?php echo $m['movie_name'];?>">
										</div>
									</a>
									<div class="moviecarousel-caption moviecarousel-poster-title">
										<h3 class="movie-title"><a href="about.php?id=<?php echo $m['movie_id'];?>"><?php echo $m['movie_name'];?></a></h3>
										<a class="btn btn-danger ticket-button" href="about.php?id=<?php echo $m['movie_id'];?>" role="button">Buy Tickets</a>
										<br><br>
										<div class="data">Release Date :<?php echo $m['release_date'];?></div>
										<span style="text-color:#000" class="data"><strong>Cast :<?php echo $m['cast'];?></strong><br>
										<span class="text-top">Description: <?php echo $m['desc'];?></span>
									</div>
								</div>
							</div>
						</div>
						
						<?php
						}
						?>

					</div>

					<!-- Controls -->
					<div class="left carousel-control">
						<a href="#movieCarousel_nowshowing" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
					</div>
					<div class="right carousel-control">
						<a href="#movieCarousel_nowshowing" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

			</div>
		</div>
		<!----------------------------- Carousel Screening Movie List - end --------------------------->


		<div class="home-section-separator"></div>


		<!----------------------------- Carousel Upcoming Movie List - start ------------------------->
		<div class="upcoming-movies-section">
			<h2 class="custom-main-title">Upcoming Movies</h2>
			<div class="col-xs-12 col-md-12 col-centered">

				<div id="movieCarousel_upcoming" class="carousel movieCarousel slide" data-ride="carousel" data-type="multi" data-interval="false">
					<div class="carousel-inner">
						<?php 
						$qry3=mysqli_query($con,"SELECT * FROM tbl_news LIMIT 5");
						
						$first_row = true;
						while($n=mysqli_fetch_array($qry3))
						{
						?>

						<div class="item <?php if($first_row) { echo 'active'; $first_row = false; } ?>">
							<div class="carousel-col">
								<div class="block-box img-responsive">
									<div class="movie-carousel-poster-box">
										<img class="moviecarousel-poster-img" src="admin/<?php echo $n['attachment'];?>" alt="<?php echo $n['name'];?>">
									</div>
									<div class="moviecarousel-caption moviecarousel-poster-title">
										<h3 class="movie-title"><?php echo $n['name'];?></h3>
										<span style="text-color:#000" class="data"><strong>Cast :<?php echo $n['cast'];?></strong><br>
										<div class="data">Release Date :<?php echo $n['news_date'];?></div>
										<span class="text-top"><?php echo $n['description'];?></span>
									</div>
								</div>
							</div>
						</div>
						
						<?php
						}
						?>

					</div>

					<!-- Controls -->
					<div class="left carousel-control">
						<a href="#movieCarousel_upcoming" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
					</div>
					<div class="right carousel-control">
						<a href="#movieCarousel_upcoming" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right custom-arrow" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

			</div>
		</div>
		<!----------------------------- Carousel Upcoming Movie List - end --------------------------->


		<div class="home-section-separator"></div>

		
		<!-- <div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Upcoming Movies</h2>
					<?php 
					$qry3=mysqli_query($con,"SELECT * FROM tbl_news LIMIT 5");
					
					while($n=mysqli_fetch_array($qry3))
					{
					?>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="admin/<?php echo $n['attachment'];?>">
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
						  	<span style="text-color:#000" class="data"><strong><?php echo $n['name'];?></strong><br>
						  	<span style="text-color:#000" class="data"><strong>Cast :<?php echo $n['cast'];?></strong><br>
                                <div class="data">Release Date :<?php echo $n['news_date'];?></div>
                                
                                
                                
                                <span class="text-top"><?php echo $n['description'];?></span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				}
				?>
				
			
		</div>				
		<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Movie Trailers</h2>
						<div class="middle-list">
					<?php 
					$qry4=mysqli_query($con,"SELECT * FROM tbl_movie ORDER BY rand() LIMIT 6");
				
					while($nm=mysqli_fetch_array($qry4))
					{
					?>
					
						<div class="listimg1">
							 <a target="_blank" href="<?php echo $nm['video_url'];?>"><img src="<?php echo $nm['image'];?>" alt=""/></a>
							 <a target="_blank" href="<?php echo $nm['video_url'];?>" class="link" style="text-decoration:none; font-size:14px;"><?php echo $nm['movie_name'];?></a>
						</div>
						<?php
					}
					?>
					</div>
					
					
		</div>			
		<?php include('movie_sidebar.php');?> -->
	</div>
</div>



<!--------------------------- Custom Scripts - start ---------------------------------->
<script src='js/script_thuva_multi_carousel.js'></script>
<!--------------------------- Custom Scripts - start ---------------------------------->



<?php include('footer.php');?>
</div>
<?php include('searchbar.php');?>