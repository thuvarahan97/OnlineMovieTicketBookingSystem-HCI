
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('form.php');
    $frm=new formBuilder;      
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
            <div >
		    	<center><h3 style="font-family:Georgia;">PAY HERE</h3></center>
            </div>
            
			<form action="bank.php" method="post" id="form1">
            
			<div class="col-md-4 col-md-offset-4">
            <div class="thumbnail" style="padding:20px;background-color:#F8F8F8">
			    <div class="form-group">
                    <label class="control-label" style="font-family:Georgia;">Name on Card</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label class="control-label" style="font-family:Georgia;">Card Number</label>
                     <input type="text" class="form-control" id="number" name="number" required title="Enter 16 digit card number"
                     placeholder='xxxx xxxx xxxx xxxx' maxlength='19'
                    >
                    <script type="text/javascript">     
                        // enable spacing for credit card number     
                        $('#number').on('keyup', function(e){         
                            var val = $(this).val();         
                            var newval = '';         
                            val = val.replace(/\s/g, ''); 
                            
                            // iterate to letter-spacing after every 4 digits   
                            for(var i = 0; i < val.length; i++) {             
                            if(i%4 == 0 && i > 0) newval = newval.concat(' ');             
                            newval = newval.concat(val[i]);         
                            }        

                            // format in same input field 
                            $(this).val(newval);     
                        });   
                    </script>
                </div>      
                <div class="form-group">
                <label class="control-label" style="font-family:Georgia;">Expiration date</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                <label class="control-label" style="font-family:Georgia;">CVV</label>
                    <input type="text" class="form-control" name="cvv" placeholder='xxx' maxlength="3">
                </div>
                <div class="form-group" >
                    <center><button class="btn btn-success" style="font-family:Georgia;">PAY ME</button></center>
                </div>
            </div>
            </div>
            </form>
          
        </div>
`       </div>
			</div>
			
		<div class="clear"></div>	
		
	</div>
    <div style="padding:20px"></div>
<?php include('footer.php');?>

</div>
<?php
    session_start();
    extract($_POST);
    include('config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    header('location:bank.php');
?><?php?>
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Name is required and can\'t be empty'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Name can only consist of alphabets'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Card Number is required and can\'t be empty'
                    },stringLength: {
                    min: 19,
                    max: 19,
                    message: 'The Card Number must 16 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid Card Number'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Expire Date is required and can\'t be empty'
                    } } },
            cvv: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The cvv is required and can\'t be empty'
                    },stringLength: {
                    min: 3,
                    max: 3,
                    message: 'The cvv must 3 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid cvv'
                    } } }}
            });
            });

</script>
