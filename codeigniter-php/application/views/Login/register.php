<?php
	
	$this->load->view("Includes/login/header.php");
	$this->load->view("Includes/login/menu.php");
	
?>

 <section id="login" class="container secondary-page">  
      <div class="general general-results players">
           
                    
           <!-- REGISTER BOX -->
           <div class="top-score-title right-score col-md-12">
            <h3>Register <span>Now</span><span class="point-int"> !</span></h3>
                <div class="col-md-12 login-page">
				
				<?php if($this->session->flashdata("user_success")!=""){ ?>

							<div class="alert alert-success alert-dismissible fade in" role="alert">

							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">&times;</span></button>

							<?php echo $this->session->flashdata("user_success");?> </div>

							<?php }?>

							

							<?php if($this->session->flashdata("user_error")!=""){ ?>

							<div class="alert alert-success alert-dismissible fade in user_error" role="alert">

							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">&times;</span></button>

							<?php echo $this->session->flashdata("user_error");?> </div>

							<?php }?>
				
				
				
                    <form method="post" class="register-form" action="<?php echo base_url()?>login/insert_player_details" enctype="multipart/form-data" >
					
                    <div class="name">
                            <label for="name">* First Name:</label><div class="clear"></div>
                            <input id="name" name="first_name" type="text" placeholder="e.g. John" required/>
                        </div>
                        <div class="name">
                            <label for="lastname">* Last Name:</label><div class="clear"></div>
                            <input id="lastname" name="last_name" type="text" placeholder="e.g. Doe" required/>
                        </div>
					<div class="" id="date_of_birth">
                            <label for="date of birth">* Date of Birth</label><div class="clear"></div>
                            <input type="date" name="date_of_birth" class="form-control  " id="exampleInputDOB1" placeholder="Date of Birth" required>
                        </div><br>
						
						<div class="city"><label for="email">*Gender :</label><div class="clear">  </div>       
							<select id="gender" name="gender" required style="height:45px;" >
								<option value="">Select Gender </option>
								<option value="Female">Female</option>
								<option value="Male">Male</option>
							
							</select>
							<br><br>
						 <div class="name">
                            <label for="lastname">* Phone Number:</label><div class="clear"></div>
                            <input required id="number" name="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="phone number" min="10" maxlength="10"/>
                        </div>
                        <div class="email">
                            <label for="email">* Email:</label><div class="clear"></div>
                            <input id="email" name="email" type="email" placeholder="example@domain.com" required/>
                        </div>
                       <!--- <div class="email">
                            <label for="email">* Confirm Email:</label><div class="clear"></div>
                            <input id="confirm" name="confirm_email" type="text" placeholder="example@domain.com" required/>
                        </div>--->
                        
                        
                        <div class="name">
						
                            <label for="password">* Password:</label><div class="clear"></div>
                            <input id="Pasword" name="pswd"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{4,}" title=" Character least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" type="password"  placeholder="********" required/>
                        </div>
                        <div class="confirm_password">
                            <label for="confirm_password">* confirm password:</label><div class="clear"></div>
                            <input id="ConPasword" name="confirm_pswd" type="password" placeholder="********" required/>
                        </div>
						<div class="name">
                            <label for="name">* State:</label><div class="clear"></div>
                            <input id="name" name="state" type="text" value="Georgia" readonly/>
                        </div> 
						<div class="city"><label for="email">* City:</label><div class="clear">  </div>       
							<select id="city" name="city" required style="height:45px;">
								<option value="" selected="selected" >Select Your City</option>
								<option value="Atlanta">Atlanta</option>
								<option value="Cumming">Cumming</option>
								<option value="Suwanee">Suwanee</option>
						<!---		<option value="Dallas">Dallas</option>
								<option value="Ft. Myers, Naples">Ft. Myers, Naples</option>
								<option value="Hilton Head Island">Hilton Head Island</option>
								<option value="Houston">Houston</option>
								<option value="Jacksonville">Jacksonville</option>
								<option value="Los Angeles">Los Angeles</option>
								<option value="Miami-Dade County">Miami-Dade County</option>
								<option value="Orlando">Orlando</option>
								<option value="Palm Beach, Boca">Palm Beach, Boca</option>
								<option value="San Antonio">San Antonio</option>
								<option value="San Francisco Bay Area">San Francisco Bay Area</option>
								<option value="Sarasota, Bradenton">Sarasota, Bradenton</option>
								<option value="Tampa Bay Area">Tampa Bay Area</option>--->
							</select>
							</div><br>
						
				<!---		<div class="name">
                            <label for="name">* Division:</label><div class="clear"></div>
                            <input id="name" name="division" type="text" placeholder="Division" />
                        </div>--->
											  
							
						<div class="confirm_password">
                           <label class=" control-label">*Zipcode</label><div class="clear"></div>
                           <input required type="text" class="form-control" name="zipcode" data-fv-field="code" placeholder="Zip Code" min="5" maxlength="5" >
						   <i class="form-control-feedback" data-fv-icon-for="code" style="display: none;"></i>
						   <small class="help-block" data-fv-validator="zipCode" data-fv-for="code" data-fv-result="NOT_VALIDATED" style="display: none;">The value is not valid %s zipcode</small>
                        </div><br>
						 <div class="name">
                            <label for="profile_img">profile:</label><div class="clear"></div>
                            <input  name="profile_img" type="file" />
                        </div>
		                      <br>                 
                        <div id="register-submit">
                            <input type="submit" name="sub" value="Submit" onclick="return Validate()"/>
                        </div>
                      </form>
                        <div class="ctn-img pull-right">
                            <img src="<?php echo base_url(); ?>custom/home/images/federer.png" />
                       </div><!--Close Images-->
                       <div class="clear"></div>
                </div>
                
           </div><!--Close REgistration-->
          </div> 
        </section>
  
	<script type="text/javascript">
			function Validate() {
				var password = document.getElementById("Pasword").value;
				var confirmPassword = document.getElementById("ConPasword").value;
				if (password != confirmPassword) {
					alert("Passwords do not match.");
					return false;
				}
				return true;
			}
			var tomorrow = new Date();
//tomorrow.setDate(tomorrow.getDate());


$( "#date_of_birth" ).datetimepicker({
	  format:"YYYY-MM-DD ",
	   minDate: tomorrow,
	   useCurrent: true
	   
	});
		</script>	  
	<?php
		$this->load->view("Includes/login/footer.php");
	?>