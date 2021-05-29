<?php include('header.php');?>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h1 style="color:#555;font-family:Georgia;">NOW SHOWING</h1>
			
		<?php
			function wordlimit($string, $limit) {

			$overflow = true;
			
			$array = explode(" ", $string);
			
			$output = '';
			
			for ($i = 0; $i < $limit; $i++) {
			
				if (isset($array[$i])) $output .= $array[$i] . " ";
				else $overflow = false;
			}
			
			return trim($output) . ($overflow ? "..." : '');
			}
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
					<div class="thumbnail" style="background-color:#F0F0F0" >
						<div class="single">
						 
						  	<a href="about.php?id=<?php echo $m['movie_id'];?>">
							  <img style="width:100%" src="<?php echo $m['image'];?>"  />
							</a>
						</div>
						<div class="movie-text">
						  	<center>
								 <h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id'];?>" style="text-decoration:none;font-family:Georgia;"><?php echo $m['movie_name'];?></a></h4>
							</center>
						  	<!-- <label style="text-decoration:none;font-family:Georgia;">Cast:</label> 
							<Span class="color2" style="text-decoration:none;font-family:Georgia;"><?php echo $m['cast'];?></span><br> -->
							<center>	
								<h4 style="font-family:Georgia;">
								
								<?php
								$string=$m['desc'];
							
								echo wordlimit($string, 10);

		
								?>
								</h4>
							</center>
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
