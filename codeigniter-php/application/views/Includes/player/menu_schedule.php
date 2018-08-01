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
				Leagues
				
		</li>
			
			<li >
			<span class="t_count"><?php echo $this->session->userdata(''); ?>0</span><br>
				Division Winner
				
			</li>
			<li >
			<span class="t_count"><?php echo $this->session->userdata('match_count'); ?></span><br>
				Matches
			</li>
			<li >
			<span class="t_count"><?php echo $this->session->userdata(''); ?>0</span><br>
				Finalist 
			</li>
			
			
			<li >
			<span class="t_count"><?php echo $this->session->userdata('win_count'); ?></span><br>
				Champion
			</li><br>
			
				
		</ul>
		
		<a class= "my_profile" href="<?php echo base_url(); ?>player/profile">My Profile</a>	<br>	
<!---		<a class= "my_profile" href="<?php echo base_url(); ?>player/leags">List of Tournaments</a>---->
		<br>
	<!---	<h4 class="tournement_name" >Tournement : <a class= "my_profile"  > <?php //echo $this->session->userdata('leag_name'); ?></a> </h4>	--->
      
	  </div>
	   <h5 style="font-size: 18px;" > Upcoming Leagues </h4>
	   <div class="col-lg-2 all_reg_tour">
	   
			<a class="" href="<?php echo base_url(); ?>player/leags" style="text-tranform:capitalize"  >
			<?php echo $this->session->userdata('leag_name'); ?>
			</a><br>
			<a class="" href="<?php echo base_url(); ?>player/leags" style="text-tranform:capitalize"  >
			Winter 2016 Doubles's
			</a>
	  </div>
	</div>
</div>



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
}.all_reg_tour{	border:1px solid #ddd;	    padding: 11px;}
</style>