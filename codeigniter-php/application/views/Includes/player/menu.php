<?php
 $player_img = $this->session->userdata('player_img'); 
 $player_firstname = $this->session->userdata('player_firstname'); 
 $player_lastname = $this->session->userdata('player_lastname'); 
 $player_city = $this->session->userdata('player_city'); 
 
//echo $_SERVER['REQUEST_URI'] ;die;

//echo $_SERVER['REQUEST_URI'] ; die;

if (strpos($_SERVER['REQUEST_URI'], "player/leags") !== false)
{
	$tournements="active";
}
else if (strpos($_SERVER['REQUEST_URI'], "player/match_record") !== false)
{
	$match_record="active";
}
else if (strpos($_SERVER['REQUEST_URI'], "player/titles") !== false)
{
	$titles="active";
}
else if (strpos($_SERVER['REQUEST_URI'], "player/schdule") !== false)
{
	$leags="active";
}
else if (strpos($_SERVER['REQUEST_URI'], "player/player_status") !== false)
{
	$player_status="active";
}else if (strpos($_SERVER['REQUEST_URI'], "player/champions") !== false)
{
	$champions="active";
}else if (strpos($_SERVER['REQUEST_URI'], "player/player_status") !== false)
{
	$wallet="active";
}	

 
?>
<body class="tm-isblog tt-gallery-page">
    <div class="over-wrap">
        <div class="toolbar-wrap">
            <div class="uk-container uk-container-center">
                <div class="tm-toolbar uk-clearfix uk-hidden-small">


                   <div class="uk-float-right">
                        <div class="uk-panel">
                            
                        </div>
                    </div>
                    <div class="uk-float-right">
                        <div class="uk-panel">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tm-menu-box">

            <div style="height: 70px;" class="uk-sticky-placeholder">
                <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;">
				<nav style="margin: -30px;" class="tm-navbar uk-navbar nav_after_login" data-uk-sticky="">
                    <div class="uk-container uk-container-center">
                        <a class="tm-logo uk-float-left" href="index.html">
                            <img src="<?php echo base_url(); ?>custom/home/images/logo-img.png" alt="logo" title="logo"> <span>S2tennis</span>
                        </a>
						
						
                        <ul class="uk-navbar-nav uk-hidden-small">
							
							
							<li data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="<?php echo base_url(); ?>player/account"><span >My Account</span></a>
							<li data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="<?php echo base_url(); ?>login/logout">Sign out</a></li>
						</ul>
                        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
                    </div>
                </nav>
				</div>
            </div>

        </div>
       

     <!--Close Top Match--> 

<!--Right Column-->




<div class="container" id="profile_content">
<div class="col-lg-12  atp-single-player" style="margin-top:75px;">
     <div class="col-lg-10 " style="color:#000;">
		<img class="img-djoko profile_img"	src="<?php echo base_url().'uploads/player/'.$player_img ?>" alt=""> 
	
		
		<h3 class="player_name" ><?php echo $player_firstname ?> <span><?php //echo $player_lastname ?></span></h3>

        <h5 class="player_city" ><?php //echo $player_city ?></h5>

		
	
		
        <ul class="nav nav-pills profile_boxs" id="pills-first" >
			<!--<li>
				<span class="t_count">0</span> <br>
				Seasons
			</li>---->
			<li>
			<span class="t_count"> <?php echo $this->session->userdata('tour_count'); ?></span><br>
				Tournaments
				
		</li>
			
			<li >
			<span class="t_count"><?php echo $this->session->userdata('win_count'); ?></span><br>
				Devisinal Wins
				
			</li>
			
			<li >
			<span class="t_count"><?php echo $this->session->userdata(''); ?></span><br>
				Finalist 
			</li>
			<li >
			<span class="t_count"><?php echo $this->session->userdata('match_count'); ?></span><br>
				Matches
				
			</li>
			
			<li >
			<span class="t_count"><?php echo $this->session->userdata(''); ?></span><br>
				Champion
			</li><br>
			
				
		</ul>
		
		<a class= "my_profile" href="<?php echo base_url(); ?>player/profile">My Profile</a>
				<form action="<?php echo base_url()?>player/updated_img?redirect=player/account"method="post" enctype="multipart/form-data">
						 <input  type="hidden" value="<?php echo $this->session->userdata('player_id');  ?>" name="hidden_id"  >
						 <input type="file" id="myFile"	name="profile_img" required>
						 <input  class="btn btn-primary "  type="submit"  name="update_img" value="Update Profile" style="    width: 107px;height: 28px;margin-top: 5px;" >
						</form>
		<!--<a class= "my_profile" href="<?php //echo base_url(); ?>player/leags">List of Tournaments</a>
		<br>
		<h4 class="tournement_name" >Tournement : <a class= "my_profile"  > <?php echo $this->session->userdata('leag_name'); ?></a> </h4>		--->
      
	  </div>
	  <h4 style="text-tranform:capitalize" > Upcoming Leagues </h4>
	   <div class="col-lg-2">
	 
				<a class="" style="text-tranform:capitalize"  >
							Winter 2016 Mixed
						</a>
				<a class="" style="text-tranform:capitalize"  >
							Winter 2016 Doubles's
						</a>
	 
	  
	  </div>
	</div>
</div>



<!-----<div class="container-fluid" style="margin-top:12px;border: 1px solid #ccc; height: 48px;
    background-color:#ccc;text-transform:uppercase;" >
	
<div class="container" id="profile_content" >
 <ul class="nav nav-tabs"  id="profile_content_tabs" >
 <!-- <li class="<?php// echo $tournements ; ?> "  ><a href="<?php// echo base_url()?>player/leags" ><b></b></a></li>-->
 <!-- <li class="<?php echo $leags ; ?> "  ><a href="<?php echo base_url()?>player/schdule" ><b>Leagues</b></a></li>
    <li class="<?php echo $match_record ; ?> "  ><a href="<?php echo base_url()?>player/match_record" ><b>Match Record</b></a></li>
    <li class="<?php echo $titles ; ?> "  ><a href="<?php echo base_url()?>player/titles" ><b>Titles</b></a></li>
    
	 <li class="<?php echo $player_status ; ?> "  ><a href="<?php echo base_url()?>player/player_status" ><b>Players Stats</b></a></li>
	 <li class="<?php echo $champions ; ?> "  ><a href="<?php echo base_url()?>player/champions" ><b>Champions</b></a></li>
	 <li class="<?php echo $wallet ; ?> "  ><a href="#" ><b>Wallets</b></a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      </div>
    <div id="menu1" class="tab-pane fade">
     </div>
    <div id="menu2" class="tab-pane fade">
      </div>
    <div id="menu3" class="tab-pane fade">
      </div>
  </div>
</div>
</div>------------>
<!----
<div class="middle_nav">
	<div class="container " >
		 <ul class="nav nav-tabs middle_nav_tabs">
		   <li class="active"><a href="my.html" ><b>Overview</b></a></li>
			<li ><a href="mygth.html" ><b>Match Record</b></a></li>
			<li><a href="titles1.html" ><b>Titles</b></a></li>
			<li ><a href="league1.html" ><b>Tournaments</b></a></li>
			 <li><a href="player_directory.html"><b>Players Stats</b></a></li>
			 <li><a href="league.html" ><b>Champions</b></a></li>
			 <li><a href="#" ><b>Wallets</b></a></li>
		  </ul>

		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			  </div>
			<div id="menu1" class="tab-pane fade">
			 </div>
			<div id="menu2" class="tab-pane fade">
			  </div>
			<div id="menu3" class="tab-pane fade">
			  </div>
		  </div>
	</div>
</div>---->

<style>
	.profile_boxs li {
		    border: 1px solid #ccc;
    border-radius: 66px;
    width: 99px;
    height: 96px;
    webkit-box-shadow: 0px 0px 18px 1px rgba(179,170,179,1);
    -moz-box-shadow: 0px 0px 18px 1px rgba(179,170,179,1);
    box-shadow: 0px 0px 12px 1px rgba(179,170,179,1);
    text-align: center;
    /* vertical-align: bottom; */
    padding-top: 23px;
}
.profile_boxs {
    margin-left: 193px;
    margin-top: 29px;
}
.tournement_name {
	margin-left:193px;
}
.t_count{
	font-size:20px;
}
.profile_boxs {
    margin-left: 193px;
    margin-top: 15px;
}

#profile_content_tabs li a {
    color: #000;
}
</style>