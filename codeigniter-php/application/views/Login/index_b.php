<?php
	
	$this->load->view("Includes/login/header.php");
	$this->load->view("Includes/login/menu.php");
	
?>

<section id="login" class="container secondary-page">  
      <div class="general general-results players">
           <div class="top-score-title right-score col-md-6">
                <h3>Welcome<span class="point-int"> !</span></h3>
                <div class="col-md-12 login-page login-w-page">
                   <p class="logiin-w-title">The S2tennis Club Tour is proud to present the Fan Credential, Free membership program for fans of Men’s Professional Tennis.</p>
                   <p>With 61 exciting venues in 30 countries, we understand how busy life can get, so tell us your preferences and we’ll create an 
                   experience specifically designed for you. 
                   </p>
                   <h3><img class="ball-tennis" src="<?php echo base_url(); ?>custom/home/images/ball.png" alt=""/> World Tour Insider</h3>
                   <p>Get off-court and go behind the scenes of the tour each week.</p>
                   <h3><img class="ball-tennis" src="<?php echo base_url(); ?>custom/home/images/ball.png" alt=""/> World Tour Weekly</h3>
                   <p>Official report and schedule including results</p>
                </div>
           </div><!--Close welcome-->
           <!-- LOGIN BOX -->
           <div class="top-score-title right-score col-md-6">
               <h3>Login<span> Now</span><span class="point-int"> !</span></h3>
			   <?php print_r($error) ; ?>
                <div class="col-md-12 login-page">
                  <form method="post" action="<?php echo base_url();?>login/signin"  class="login-form">     
						
						<?php if($this->session->flashdata("user_success")!=""){ ?>
							<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">&times;</span></button>
							<?php echo $this->session->flashdata("user_success");?> </div>
							<?php }?>
						
					
                        <div class="name">
                            <label for="name_login">Email:</label><div class="clear"></div>
                            <input  name="email" type="email" placeholder="example@domain.com" required >
                        </div>
                        
                        <div class="pwd">
                            <label for="password_login">Password:</label><div class="clear"></div>
                            <input id="password_login"  name="pswd" type="password" placeholder="Password" required >
                        </div>
						
						<div id="login-submit">
                              <input type="submit" value="Login" name="sub" ><br><br>
							   

                                   <!----<p style="margin-top:40px;"><a class="btn btn-primary btn-lg" href="my.html" role="button">Submit</a></p>-->
                                   <!--<input type="submit" value="Submit" />-->
						 						 
                            	
								<a style="color:#000 !important;" href="<?php echo base_url(); ?>login/register" ><span>New User</span></a><br><br>
								
						
						
							<u><a style="color:#000 !important;" href="<?php echo base_url(); ?>login/forgetpassword" >Forget Password</a></u>
                          </div> 

     			  </div>
				  
							 
							 
                 </div>
				
           </form>
					
         </div>
                
</div><!--Close Login-->
          
          </div> 
        </section>
		
        <?php

	$this->load->view("Includes/login/footer.php");
	
?>


