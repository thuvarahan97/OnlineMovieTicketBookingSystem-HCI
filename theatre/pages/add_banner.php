<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?> 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add Banner</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <form action="process_add_banner.php" method="post" enctype="multipart/form-data" id="form1">
            <div class="form-group">
              <label class="control-label">Movie Name</label>
              <select name="movie_id" class="form-control">
                <?php 
                $qry=mysqli_query($con, "select A.movie_id AS movie_id, A.movie_name AS movie_name from tbl_movie A LEFT JOIN tbl_banners B ON A.movie_id = B.movie_id WHERE B.movie_id IS NULL");
                $count = mysqli_num_rows($qry); 
		            if ($count > 0) {
                ?>
                <option value="" selected="selected">Please Select Movie</option>
                <?php
                while($rw=mysqli_fetch_array($qry))
                {
                ?>
                <option value="<?php echo $rw['movie_id']; ?>"><?php echo $rw['movie_name']; ?></option>
                <?php 
                }
                }
                else
                {
                  echo '<option value="" selected="selected">No Movie Available.</option>';
                }
                ?>
              </select>
              <?php $frm->validate("movie_id",array("required","label"=>"Movie")); // Validating form using form builder written in form.php ?>
            </div>
            <div class="form-group">
              <label class="control-label">Banner Image</label>
              <input type="file" name="image" class="form-control"/>
              <?php $frm->validate("image",array("required","label"=>"Image")); // Validating form using form builder written in form.php ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Add Banner</button>
            </div>
          </form>
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script>
        <?php $frm->applyvalidations("form1");?>
    </script>