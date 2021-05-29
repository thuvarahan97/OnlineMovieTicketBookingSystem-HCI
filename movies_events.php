<?php include('header.php');?>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h1 style="color:#555;">NOW SHOWING</h1>
			
			<?php
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				$today=date("Y-m-d");
				$qry2=mysqli_query($con,"select * from  tbl_movie ");
			
				while($m=mysqli_fetch_array($qry2))
					{
					if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php } 
						$rowCount++;
			?>
                    
				<div class="col-md-<?php echo $bootstrapColWidth; ?>" >
					<div class="thumbnail" >
						<div class="single">
						 
						  	<a href="about.php?id=<?php echo $m['movie_id'];?>">
							  <img style="width:100%" src="<?php echo $m['image'];?>"  />
							</a>
						</div>
						<div class="movie-text">
						  	<center>
								 <h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id'];?>" style="text-decoration:none;"><?php echo $m['movie_name'];?></a></h4>
							</center>
						  	Cast: 
							<Span class="color2" style="text-decoration:none;size: 30px;fontSize:30px;"><?php echo $m['cast'];?></span><br>
						  		
						</div>
		  			</div>
		  		</div>
		  		
  	    	<?php
  	    	if($rowCount % $numOfCols == 0) { ?> </div> <?php } } 
  	    	?>
			
			</div>
				<div class="clear"></div>		
			</div>
		</div>
	<?php include('footer.php');?>
