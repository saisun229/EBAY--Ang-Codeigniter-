<?php //$this->load->view("Player/draw.php"); die;
 $player_firstname = $this->session->userdata('player_firstname');
?>
 <?php 
	
$player_id_sess = $this->session->userdata('player_id'); 
//echo "<pre>" ;print_r($player_id_sess);die;
?>

<!DOCTYPE html>
<html lang="en-gb">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>S2tennis</title>
<link rel="icon" type="images/png" sizes="16x16" href="<?php echo base_url()."custom/new_design/"?>images/favicon.ico">
<link rel="stylesheet" href="<?php echo base_url()."custom/new_design/"?>css/players2893.css" />
 <script type="text/javascript" src="<?php echo base_url(); ?>custom/home/standing-js/jquery-1.2.6.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>custom/home/standing-js/style-table.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="<?php echo base_url()."custom/new_design/"?>css/theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()."custom/new_design/"?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url()."custom/new_design/"?>css/style.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,200,500,600,700,800,900' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--Video Porfolio-->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="<?php echo base_url()."custom/new_design/"?>css/style_dir.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/home/css/new_css/style_schedule.css" />

</head>
<body class="tm-isblog tt-gallery-page">
<?php 
	$this->load->view("Includes/player/menu_schedule.php");
	$player_img = $this->session->userdata('player_img'); 
 ?> 
<!--- for enter score --->
	
<style>
	.score_box {
		width: 36px;
		height: 44px;
		border: 2px solid #d4d4d4;
		color: #000;
		padding: 5px !important;
		font-size: 18px;
	}
	.modal-footer{
		border-top: 0px solid #e5e5e5;
	}
	 .all_boxs{
		 margin-top: 69px;
	 }
</style>
	<script>
	
		function play_off_scores(id,leag_id,round,team,match_number){
			$("#play_off_id").val(id);
			$("#leag_id").val(leag_id);
			$("#round").val(round);
			$("#team_playoff").val(team);
			$("#match_number").val(match_number);
			
		}
		
		function score_id(id,name,leag_id,opp_player_id,week_number,division,skill_level,team){
			//alert(id);
			$("#record_sco_id").val(id);
			$("#opp_name").text(name);
			$("#leag_sco_id").val(leag_id);
			$("#opp_player_id").val(opp_player_id);
			$("#week_number").text(week_number);
			var week = "Week"+week_number ; 
			$("#week_val").val(week);
			$("#division").val(division);
			$("#skill_level").val(skill_level);
			$("#team").val(team);
		}
		
		
		function check_max(max_val,max_id){
			$("#error_disp").text("");
			if(max_val>7){
				
				$("#error_disp").text("Max 7 ");
				$("#"+max_id).val("");
				$("#"+max_id).focus();
			}
		}
		
		function check_diff(max_val,max_id,before_id){
				
				var before_val  = $("#"+before_id).val();
				var diff = before_val-max_val ; 
				var diff1 = max_val-before_val ; 
				
				if(before_val==max_val){
					
					$("#error_disp").text("Both values same will not accept.");
				}
				/*else if(diff<2 && before_val!=6 && max_val!=7 && before_val!=7 && max_val!=6){
					$("#error_disp").text("Min difference 2.");
					$("#"+max_id).val("");
					$("#"+max_id).focus();
				} else if(diff1<2 && before_val!=7 && max_val!=6){
					alert("ww");
					$("#error_disp").text("Min difference 2.");
					$("#"+max_id).val("");
					$("#"+max_id).focus();
				} */
			}
			function opp_player_about_det(player_id,opp_name){
				//alert(player_id);
				$("#opp_player_details").html(opp_name);
				var base_url = "<?php echo base_url().'player/player_opp_details';?> ";
					$.ajax(
					{
						type: "POST",
						url: base_url,
						data:{opp_id:player_id},
						success: function(data) { 
							$("#opp_cmplt_details").html(data); 
						} 
					});	
			}
	</script>
	<script>
	 function insert_score()
	{ 
	//alert('login');
		var set1 = document.getElementById('set1').value;
		 var set1_2 = document.getElementById('set1_2').value;
		 var set2 = document.getElementById('set2').value;
		var set2_2 = document.getElementById('set2_2').value;
		var set3 = document.getElementById('set3').value;
		var set3_2 = document.getElementById('set3_2').value;
		
		
		
		
		var set1_status = cal_left_right(set1,set1_2) ;
		var set2_status = cal_left_right(set2,set2_2) ;
		var set3_status = cal_left_right(set3,set3_2) ;
		
		if(set1_status=="True" && set2_status=="True"){
			var left_win = "You Win" ;

			
		}else if(set2_status=="True" && set1_status=="False" && set3_status=="True" ){
			var left_win = "You Win" ;
			
		}else if(set2_status=="False" && set1_status=="True" && set3_status=="True" ){
			var left_win = "You Win" ;
			
		}else if(set2_status=="False" && set1_status=="False"  ){
			var left_win = "You Loss" ;
			
		}else if(set2_status=="False" && set1_status=="True" && set3_status=="False" ){
			var left_win = "You Loss" ;
			
		}else if(set2_status=="True" && set1_status=="False" && set3_status=="False" ){
			var left_win = "You Loss" ;
			
		}
		//alert(left_win);
		document.getElementById('check_status').innerHTML=left_win;
		
		document.getElementById('check_submit').style.display='none';
		
		document.getElementById('check_submit1').style.display='block';
		
		
		
		return false;
		
		
		
	}
	function get_back(){
		document.getElementById('check_submit').style.display='block';
		
		document.getElementById('check_submit1').style.display='none';
		
	}
	
		function cal_left_right(left,right){
		if(left>right){
			return "True";
		}else {
			return "False";
		}
	}
	
	</script>
	
	
<div class="modal fade" id="opp_player_about" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="opp_player_details" >Modal Header</h4>
        </div>
        <div class="modal-body">
          <p id="opp_cmplt_details" ></p>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>
  
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report score for week <span id="week_number" ></span></h4>
        </div>
        <div class="modal-body">
          <p>
		  <form action="<?php echo base_url()?>player/insert_scores" method="post" >
			<input type="hidden" id="record_sco_id" name="record_sco_id" >   
			<input type="hidden" id="leag_sco_id" name="leag_sco_id" >   
			<input type="hidden" id="opp_player_id" name="opp_player_id" >   
			<input type="hidden" id="week_val" name="week_val" >   
			<input type="hidden" id="division" name="division" >   
			<input type="hidden" id="skill_level" name="skill_level" >   
			<input type="hidden" id="team" name="team" >   
			
			<div class="col-md-12">
				<div class="col-md-3">
					<p id="opp_name"></p>
					 <img src="<?php echo base_url();?>/custom/home/images/weee.gif" alt=""> 
				</div>
				
				<div class="col-md-9 all_boxs">	
					<p id="error_disp" style="color:red"> </p>
					<div class="col-md-4 text-center">
						<input type="text" class="score_box" id="set1" name="set1" maxlength="1" onkeyup ="check_max(this.value,this.id)" onKeyPress="get_back()" > - <input maxlength="1" name="set1_2" id="set1_2" type="text" class="score_box" onKeyPress="get_back()" onKeyUp="check_max(this.value,this.id);check_diff(this.value,this.id,'set1')"><br>Set-1
					</div>
					<div class="col-md-4 text-center">
						<input type="text" class="score_box" id="set2" name="set2" maxlength="1" onKeyPress="get_back()" onKeyUp="check_max(this.value,this.id)" > - <input name="set2_2" type="text" id="set2_2" class="score_box" maxlength="1" onKeyPress="get_back()" onKeyUp="check_max(this.value,this.id);check_diff(this.value,this.id,'set2')" ><br>Set-2
						<br><br>
						<p id="check_status" style="color:green"></p>
					</div>
					
					<div class="col-md-4 text-center">
						<input type="text" maxlength="1" class="score_box" id="set3" name="set3" onKeyPress="get_back()" onKeyUp="check_max(this.value,this.id)" > - <input name="set3_2" id="set3_2" maxlength="1" type="text" class="score_box" onKeyPress="get_back()" onKeyUp="check_max(this.value,this.id);check_diff(this.value,this.id,'set3')" ><br>Set-3
					</div>
					
				</div>	
				
				<div class="clearfix"></div> 
				<br>
				<div class="col-md-12">
					
					 <input type="radio" name="won_status" value="1"><label> I won the Match By Default</label><br/>
					<input type="radio" name="won_status" value="2"><label> The Match was Started But not Completed</label><br/>
					<input type="radio" name="won_status" value="3"><label> I Played a Sub or used a sub</label><br/>
				</div>
				
				 <input  class="btn btn-primary pull-right"  type="button" id="check_submit"  value="checking score" onClick="insert_score();">
				 
				 <input  class="btn btn-primary pull-right "  type="submit" id="check_submit1"   value="Submit Score" style="display:none">
			</div>
			</form>
		  </p>
        </div>
        <div class="modal-footer">
          <!---<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--->
        </div>
      </div>
      
    </div>
  </div>

  
  
   <!-- Modal -->
  <div class="modal fade" id="play_off" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report score for week <span id="week_number" ></span></h4>
        </div>
        <div class="modal-body">
          <p>
		  <form action="<?php echo base_url()?>player/play_off_scores_save" method="post" >
		  <input type="hidden" name="play_off_id" id="play_off_id" >   
		  <input type="hidden" name="leag_id" id="leag_id" >   
		  <input type="hidden" name="round" id="round" >   
		  <input type="hidden" name="team" id="team_playoff" >   
		  <input type="hidden" name="match_number" id="match_number" >   
			<div class="col-md-12">
				<div class="col-md-3">
					<p id="opp_name"></p>
					 <img src="<?php echo base_url();?>/custom/home/images/weee.gif" alt=""> 
				</div>
				
				<div class="col-md-9 all_boxs">	
				
					<div class="col-md-4 text-center" >
						<input type="text" class="score_box" style="border-radius: 61%" name="set1" maxlength="1" > - <input maxlength="1" name="set1_2" type="text" style="border-radius: 61%" class="score_box"><br>Set-1
					</div>
					<div class="col-md-4 text-center">
						<input type="text" class="score_box" style="border-radius: 61%" name="set2" maxlength="1" > - <input name="set2_2" type="text" style="border-radius: 61%" class="score_box" maxlength="1" ><br>Set-2
					</div>
					<div class="col-md-4 text-center">
						<input type="text" maxlength="1" class="score_box" style="border-radius: 61%" name="set3" > - <input name="set3_2" maxlength="1" type="text" style="border-radius: 61%" class="score_box"><br>Set-3
					</div>
				</div>	
				
				<div class="clearfix"></div> 
				<br>
				<div class="col-md-12">
					
					 <input type="radio" name="won_status" value="1"><label> I won the Match By Default</label><br/>
					<input type="radio" name="won_status" value="2"><label> The Match was Started But not Completed</label><br/>
					<input type="radio" name="won_status" value="3"><label> I Played a Sub or used a sub</label><br/>
				</div>
				<br>
				<div class="col-md-12">
					
					<!---- <input type="radio" name="won_status" value="1"><label> I won the Match By Default</label><br/>
					<input type="radio" name="won_status" value="2"><label> The Match was Started But not Completed</label><br/>
					<input type="radio" name="won_status" value="3"><label> I Played a Sub or used a sub</label><br/>--->
				</div>
				
				 <input  class="btn btn-primary pull-right"  type="submit"   value="Submit Score" >
			</div>
			</form>
		  </p>
        </div>
        <div class="modal-footer">
          <!---<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--->
        </div>
      </div>
      
    </div>
  </div>
<!--Close Top Match--> 

<!--Right Column-->
<section id="single-match-pl" class="container secondary-page">
  <div class="general general-results players">
    <div class="top-score-title right-score col-md-12">
      <div class="top-score-title player-vs">
        <div class="main">
          <div class="tabs standard single-pl">
        <!---    <ul class="nav nav-tabs tab-links-match tb-set">
              <li class="active"><a class="first-tabs" href="#tab1">Singles</a></li>
              <li><a class="first-tabs" href="#tab2">Doubles</a></li>
              <li><a href="#tab3">Mixed</a></li>
              <li><a href="#tab4">Juniors</a></li>
            </ul>---->
            <div class="tab-content single-match">
              <div id="tab1" class="tab active">
                <h3 class="tab-match-title">Singles  <?php echo $this->session->userdata('leag_name'); ?></h3>
                <div class="tabs standard">
                  <ul class="nav nav-tabs tab-links-match">
                   
                    <li  class="active" ><a href="#tab2a">Schedule</a></li>
                    <li><a href="#tab3a">Division Standings</a></li>
			<!---		<li > <a  href="#tab1a">Match Details</a></li>---->
                    <li><a href="#tab4a">League Standings</a></li>
                    <li><a href="#tab6a">Playoff Schedule</a></li>
                  <li><a href="#tab5a">Playoff Draw</a></li>
                  </ul></div>
                  <div class="tab-content">
                    
					  
					  
					  
					  
					  
 
                      <div id="tab2a" class="tab active">
                      
                      <table class="table table-reflow">
                        <thead>
                          
                            <tr style="background-color:#000; color:#fff;" >
								<th>Week </th>
								<th>Primary Week </th>
								<th>Deadline </th>
								<th>Opponent </th>
								<th>Scores </th>
								<th>Winstatus </th>
								<th>Facility(click for map) </th>
							</tr>
                        </thead>
                        <tbody>
							<?php   
							$i = 1;
							foreach($schdule as $row)  { //echo "<pre>"; print_r($row);die;  ?>
								
								<tr>
								<td><?php echo $i; ?> </td>
								<td> 
									<?php echo date('Md', strtotime($start_date))." - ". $start_date = date('Md', strtotime($start_date. ' +7 days'));  ?> 
								</td>
								
								<td style="color:red;" ><?php echo date('Md', strtotime($start_date. ' +7 days'));  ?> </td>
								<td><a href="#" onClick="opp_player_about_det('<?php echo $row['player_ida']; ?>','<?php echo $row['player_name']; ?>')" data-toggle="modal" data-target="#opp_player_about" ><?php echo $row['player_name']; ?></a> </td>
								<td>
								<?php
								if($row['score_update_status']=='1')
								{
									if($player_id_sess==$row['player_id_sco'])
									{
										echo $Schedule_Score = $row['scores']; 
									}
									else
									{
										if($row['winstatus']=='win')
										{
											$str = $row['scores'];
											$sss= explode(",",$str);
											 $total_sets=  count($sss);
											 if($total_sets==2)
											 {
												$scores_leag= strrev($sss[0]).','.strrev($sss[1]);
											 }
											  if($total_sets==3)
											  {
												$scores_leag = strrev($sss[0]).','.strrev($sss[1]).','.strrev($sss[2]);
											  }
											  echo $Schedule_Score = $scores_leag;
										}
										else
										{
											echo $Schedule_Score = $row['scores'];
										}
									}
								}
								else
								{
								?> 
									<a href="#" onClick="score_id('<?php echo $row['id'] ; ?> ','<?php echo $row['player_name'] ; ?> ','<?php echo $row['leag_id'] ; ?> ','<?php echo $row['player_ida'] ; ?> ','<?php echo $i ; ?> ','<?php echo $row['division'] ; ?> ','<?php echo $row['skill_level'] ; ?> ','<?php echo $row['team'] ; ?> ')" type="button" data-toggle="modal" data-target="#myModal">Report Scores </a>
								<?php } ?> 
								</td>
								<td>	
									<?php 
									if($row['scores']!='')
									{
										$Array_Score_Level1 = array();
										$Array_Score_Level2 = array();
									
										$Exist_Scores = explode(",",$Schedule_Score);
										$Total_ExistScores =  count($Exist_Scores);
								
									 if($Total_ExistScores==2)
									 {
										 $Score_Set1 = $Exist_Scores[0];
										 $Innser_Scores1 = explode("-",$Score_Set1);
										 array_push($Array_Score_Level1,$Innser_Scores1[0]);
										 array_push($Array_Score_Level2,$Innser_Scores1[1]);
										 
										 $Score_Set2 = $Exist_Scores[1];
										 $Innser_Scores2 = explode("-",$Score_Set2);
										 array_push($Array_Score_Level1,$Innser_Scores2[0]);
										 array_push($Array_Score_Level2,$Innser_Scores2[1]);
									 }
									  if($Total_ExistScores==3)
									  {
										 $Score_Set1 = $Exist_Scores[0];
										 $Innser_Scores1 = explode("-",$Score_Set1);
										 array_push($Array_Score_Level1,$Innser_Scores1[0]);
										 array_push($Array_Score_Level2,$Innser_Scores1[1]);
										 
										 $Score_Set2 = $Exist_Scores[1];
										 $Innser_Scores2 = explode("-",$Score_Set2);
										 array_push($Array_Score_Level1,$Innser_Scores2[0]);
										 array_push($Array_Score_Level2,$Innser_Scores2[1]);
										 
										 $Score_Set3 = $Exist_Scores[2];
										 $Innser_Scores3 = explode("-",$Score_Set3);
										 array_push($Array_Score_Level1,$Innser_Scores3[0]);
										 array_push($Array_Score_Level2,$Innser_Scores3[1]);
									  }
									  
									 $Array_Score_Level1_Count = array_sum($Array_Score_Level1);
									 $Array_Score_Level2_Count = array_sum($Array_Score_Level2);
									if($Array_Score_Level1_Count>$Array_Score_Level2_Count)
									{
										echo 'win';
									}
									else
									{
										echo 'loss';
									}
										/*if($player_id_sess==$row['player_id_sco'])
										{
											echo $row['winstatus'] ; 
										}
										else
										{
											if($row['winstatus']=='loss')
											{
												echo "win";
											}
											else
											{
												echo "loss";
											}
										}*/
									}
									?> 
								</td>
								<td>
									<!---<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#map_popup">Open Map</button>--->
								</td>
								</tr>
								
								
						<?php $i++ ;} ?>
                        </tbody>
                      </table>					  <form action="<?php echo base_url()?>player/player_off_status"  method="post">							<div class="form-group">								<h4 style="color:red;">set your play-off available here : </h4>								<div class="form-group">								<select class="form-control" name="status_value" style="width:181px" >										<option value=""></option>										<option <?php if($leags_list->leag_status =='0'){?> selected <?php }?> value="0">Yes-Iam available for play-off</option>										<option <?php if($leags_list->leag_status=='1'){?> selected <?php }?> value="1">No</option>								</select>								</div>								<input type="hidden" name="leag_id" value="<?php echo $_REQUEST['record_id']; ?>">								<div class="form-group">									<?php if($leags_list->leag_status==''){ ?>									<input class="btn btn-info btn-xs"type="submit" name="play_off_status"> 									<?php } ?> 								 </div>							</form></div>							 <table class="table table-reflow">                        <thead>                          <tr style="background-color:#000; color:#fff;">                         							<th>Name </th>							<th>Div Rank </th>							<th>Points </th>							<th>Rating </th>												<!--		<th>Matches </th>--->							<th>Available </th>														<th>Play off Eligable </th>                                                      </tr>                        </thead>                        <tbody>                        <tbody>												<?php 						$j = 1 ;						foreach ($league_stad as $leag_row)						{							//echo count($leag_row);							//echo "<pre>" ; 							//print_r($leag_row);						for($i=0;$i<count($leag_row);$i++)						{						?> 							<tr>								 															 <td>									<a href="#" onClick="opp_player_about_det('<?php echo $leag_row[$i]['player_id'] ; ?>','<?php echo $leag_row[$i]['first_name'] ; ?>')" data-toggle="modal" data-target="#opp_player_about" ><?php echo $leag_row[$i]['first_name'] ; ?> </a>																	 </td>								  <td><?php echo $j ; ?> </td>								  								 <td><?php echo $leag_row[$i]['player_total_points'] ; ?> </td>								 <?php /*?><td><?php echo  round($leag_row[$i]['rank'], 2, PHP_ROUND_HALF_UP); ; ?> </td><?php */?>								 <td><?php echo $leag_row[$i]['player_total_points_rating'] ; ?> </td>						<!---		 <td><?php //echo "5" ; ?> </td>--->								 <td><?php if($leag_row[$i]['leag_status']==1)echo "No" ;  else echo "-" ; ?></td>																 <td><?php if($leag_row[$i]['player_total_points']>=33) echo "Yes" ;else echo "No"; ?></td>								 								 							</tr>						<?php } ?> 						<?php $j++ ; } ?> 					</tbody>                       </table> 
                      
                     
					  <div id="tab3a" class="tab">
                        <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Name </th>
							<th>Week1 </th>
							<th>Week2 </th>
							<th>Week3 </th>
							<th>Week4 </th>
							<th>Week5 </th>
							<th>Points </th>
							<th>Rating </th>
                          </tr>
                        </thead>
                        <tbody>
                          
						<?php 
						//echo "<pre>" ;print_r($div_stad) ;
							for($i=0;$i<count($div_stad);$i++)
							{
							$total_points = '';
							?> 
								<tr>
								<td><?php echo $div_stad[$i][0]['player_name']; ?>  </td>
								<?php 
								$Total_MainPoints = 0;
								$Total_OppPoints = 0;
								for($j=0;$j<5;$j++)
								{ 
									//echo "<pre>" ;print_r($div_stad) ;
									if($div_stad[$i][$j]['player']=='Yes')
									{
										$total_points = $total_points+$div_stad[$i][$j]['points'] ;
									
										$Total_MainPoints = $Total_MainPoints+$div_stad[$i][$j]['points'];
										$Total_OppPoints = $Total_OppPoints+$div_stad[$i][$j]['points_opp'];
									}
									else
									{
										$total_points = $total_points+$div_stad[$i][$j]['points_opp'] ;
									
										$Total_MainPoints = $Total_MainPoints+$div_stad[$i][$j]['points_opp'];	
										$Total_OppPoints = $Total_OppPoints+$div_stad[$i][$j]['points'];
									}
									$All_Match_Points = $Total_MainPoints+$Total_OppPoints;
									?>
										<td>
											<?php 
											if($div_stad[$i][$j]['player']=='Yes')
												echo $div_stad[$i][$j]['points'];
											else 
												echo  $div_stad[$i][$j]['points_opp'] ; 
											?>
										</td>
									<?php }  ?> 

									<td><?php echo $total_points ; ?> </td>
									<td>
									<?php
									 echo round(($Total_MainPoints/$All_Match_Points)*100); ?> </td>
								</tr>
						<?php } ?> 
                          
                        </tbody>
                      </table>
					  
                    <li style=" font-size: 20px;"> Match Details</li>   
                      <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                           <th>Name </th>
							<th>Week1 </th>
							<th>Week2 </th>
							<th>Week3 </th>
							<th>Week4 </th>
							<th>Week5 </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         
                           
						<?php 
						
						for($i=0;$i<count($div_stad);$i++) { ?> 
						 <tr class="nm-player">
								<td><?php echo $div_stad[$i][0]['player_name'] ; ?>  </td>
								<?php
								for($j=0;$j<5;$j++)
								{ 
								?>
								<td>
									<?php 
									//echo $div_stad[$i][$j]['player'] ; 
									//echo "<br>";
									$scores_leag = '-';
									$str = $div_stad[$i][$j]['scores'] ;
									  $sss= explode(",",$str);
									 $total_sets=  count($sss);
									 if($total_sets==2)
									 {
										 $scores_leag= strrev($sss[0]).','.strrev($sss[1]);
									 }
									  if($total_sets==3)
									  {
										$scores_leag = strrev($sss[0]).','.strrev($sss[1]).','.strrev($sss[2]);
									  }
									  
									//echo $div_stad[$i][$j]['player_id_a'];
									//echo $div_stad[$i][$j]['opp_name'];
									
									/*if($div_stad[$i][$j]['player']=='No')
									{
										echo 'No-'.$div_stad[$i][$j]['scores'];
									}
									else 
									{
										echo 'Yes-'.$div_stad[$i][$j]['scores'];
									}*/
									
									if($div_stad[$i][$j]['player']=='No')
									{
										$Points = '-';
										if($div_stad[$i][$j]['points_opp']!='')
										{
											$Points = 'Points: '.$div_stad[$i][$j]['points_opp'];
										}
										echo $div_stad[$i][$j]['opp_name']."<br>".$div_stad[$i][$j]['scores'] ."<br> ".$Points;
									}
									else 
									{
										$Points = '-';
										if($div_stad[$i][$j]['points']!='')
										{
											$Points = 'Points: '.$div_stad[$i][$j]['points'];
										}
										echo  $div_stad[$i][$j]['opp_name']."<br>".$scores_leag."<br>".$Points; 
									}	
									?>
								</td>
							<?php }  ?> 

								</tr>
						<?php } ?> 
                            
                          
                          
                        </tbody>
                      </table>
                    </div>
					<div id="tab4a" class="tab">
                      
					  
					  
					  	
			 
			 
                    </div>
                    </div>
						
					<div id="tab6a" class="tab">
							<table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
							<th>Round </th>
							<th>Play Between </th>
							<th>Deadline </th>
							<th>Player </th>
							<th>Opponent </th>
							<th>Scores </th>
							<th>Win Status </th>
							<th>Facility(click for map) </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <tbody>
						
						<tr class>
							<td>Round 1</td>
							<?php $round1_dates = explode(",",$play_off->round1_date) ; ?>
							<td><?php echo date('Md', strtotime($round1_dates[0]))." - ".date('Md', strtotime($round1_dates[1]));?></td>
							
							<td style="color:red;"><?php echo date('Md', strtotime($round1_dates[1]));?></td>
							<?php if($play_off_players->player_score_entred== $player_id_sess ) {
								
								
								$win_status = $play_off_players->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								$scores = $play_off_players->scores ;
								
							}else {
								$win_status = $play_off_players->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								
								$scores = $play_off_players->opp_scores ;
							}
							if($play_off_players->player_name==$player_firstname){
								$player_name  =$play_off_players->player_name ; 
								$opp_name  =$play_off_players->opp_name ;
							}else{
								$player_name  =$play_off_players->opp_name ; 
								$opp_name  =$play_off_players->player_name ; 
							}
							?>
						<td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_players->player_id ; ?>','<?php echo $player_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $player_name ; ?></a>
							 </td>
							 <td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_players->opp_id ; ?>','<?php echo $opp_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $opp_name ; ?></a>
							 </td>
							
							
							
							<td>
							
								<?php if($play_off_players->scores=='' && $play_off_players->player_name!=''){?>
									<a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#play_off" onClick="play_off_scores('<?php echo $play_off_players->id ; ?>','<?php echo $_REQUEST['record_id'];?>','<?php echo $play_off_players->roundno ; ?>','<?php echo $play_off_players->team ; ?>','<?php echo $play_off_players->match_number ; ?>')"
									>Report Scors</a>
								<?php } ?> 
								<?php echo $scores ; ?>
							</td>
							<td><?php if($play_off_players->player_name!='' && $play_off_players->scores!='') echo $win_status ; ?></td>
							<td></td>
						</tr>

						<tr class>
						<td>Quarter Final</td>
						<?php $round2_dates = explode(",",$play_off->round2_date) ; ?>
						<td><?php echo date('Md', strtotime($round2_dates[0]))." - ".date('Md', strtotime($round2_dates[1]));?></td>
						
						<td style="color:red;"><?php echo date('Md', strtotime($round2_dates[1]));?></td>
							
								<?php if($play_off_round2->player_score_entred== $player_id_sess ) {
								
								/* $player_name  =$play_off_round2->player_name ; 
								$opp_name  =$play_off_round2->opp_name ; */
								$win_status = $play_off_round2->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								$scores = $play_off_round2->scores ;
								
							}else {
								/* $player_name  =$play_off_round2->opp_name ; 
								$opp_name  =$play_off_round2->player_name ;  */
								$win_status = $play_off_round2->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								
								$scores = $play_off_round2->opp_scores ;
							} 
							if($play_off_round2->player_name==$player_firstname){
								$player_name  =$play_off_round2->player_name ; 
								$opp_name  =$play_off_round2->opp_name ;
							}else{
								$player_name  =$play_off_round2->opp_name ; 
								$opp_name  =$play_off_round2->player_name ; 
							}
							?>
							
							
							<td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_round2->player_id ; ?>','<?php echo $player_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $player_name ; ?></a>
							 </td>
							 <td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_round2->opp_id ; ?>','<?php echo $opp_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $opp_name ; ?></a>
							 </td>
							 
							<td>
							
								<?php if($play_off_round2->scores=='' && $play_off_round2!=''){?>
									<a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#play_off" onClick="play_off_scores('<?php echo $play_off_round2->id ; ?>','<?php echo $_REQUEST['record_id'];?>','<?php echo $play_off_round2->roundno ; ?>','<?php echo $play_off_players->team ; ?>','<?php echo $play_off_players->match_number ; ?>')"
									>Report Scors</a>
								<?php } ?> 
								<?php echo $scores ; ?>
							</td>
							<td><?php if ($play_off_round2!='' && $play_off_round2->scores!='') echo $win_status ; ?></td>
							<td></td>
						</tr>

						<tr class>
						<td>Semi Final</td>
						<?php $round3_dates = explode(",",$play_off->round3_date) ; ?>
						<td><?php echo date('Md', strtotime($round3_dates[0]))." - ".date('Md', strtotime($round3_dates[1]));?></td>
						
						<td style="color:red;"><?php echo date('Md', strtotime($round3_dates[1]));?></td>
							<?php if($play_off_round3->player_score_entred== $player_id_sess ) {
								
								/* $player_name  =$play_off_round3->player_name ; 
								$opp_name  =$play_off_round3->opp_name ; */
								$win_status = $play_off_round3->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								$scores = $play_off_round3->scores ;
								
							}else {
								/* $player_name  =$play_off_round3->opp_name ; 
								$opp_name  =$play_off_round3->player_name ;  */
								$win_status = $play_off_round3->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								
								$scores = $play_off_round3->opp_scores ;
							} 
							if($play_off_round3->player_name==$player_firstname){
								$player_name  =$play_off_round3->player_name ; 
								$opp_name  =$play_off_round3->opp_name ;
							}else{
								$player_name  =$play_off_round3->opp_name ; 
								$opp_name  =$play_off_round3->player_name  ; 
							}
							?>
							<td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_round3->player_id; ?>','<?php echo $player_name; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $player_name ; ?></a>
							 </td>
							 <td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_round3->opp_id ; ?>','<?php echo $opp_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $opp_name ; ?></a>
							 </td>
							 
								
							<td>
							
								<?php if($play_off_round3->scores=='' && $play_off_round3!='' ){?>
									<a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#play_off" onClick="play_off_scores('<?php echo $play_off_round3->id ; ?>','<?php echo $_REQUEST['record_id'];?>','<?php echo $play_off_round3->roundno ; ?>','<?php echo $play_off_players->team ; ?>','<?php echo $play_off_players->match_number ; ?>')"
									>Report Scors</a>
								<?php } ?> 
								<?php echo $scores ; ?>
							</td>
							<td><?php if ($play_off_round3!='' && $play_off_round3->scores!='') echo $win_status ; ?></td>
							<td></td>
						</tr>

						<tr class>
						<td>Final Match</td>
						<?php $round4_dates = explode(",",$play_off->round4_date) ; ?>
						<td><?php //echo date('M-d', strtotime($round4_dates[0]))." - ".date('M-d', strtotime($round4_dates[1]));?></td>
						
						<td style="color:red;"><?php //echo date('M-d', strtotime($round4_dates[1]));?></td>
								<?php if($play_off_round4->player_score_entred== $player_id_sess ) {
								
								/* $player_name  =$play_off_round4->player_name ; 
								$opp_name  =$play_off_round4->opp_name ; */
								$win_status = $play_off_round4->win_status ;
								if($win_status=='win'){
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								}else {
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								}
								$scores = $play_off_round4->scores ;
								
							}else {
								/* $player_name  =$play_off_round4->opp_name ; 
								$opp_name  =$play_off_round4->player_name ;  */
								$win_status = $play_off_round4->win_status ;
								if($win_status=='win')
									$win_status = "<img src='".base_url()."uploads/loss.png' class='win_img' >";
								else 
									$win_status = "<img src='".base_url()."uploads/win.png' class='win_img' >";
								
								$scores = $play_off_round4->opp_scores ;
							} 
							
							if($play_off_round4->player_name==$player_firstname){
								$player_name  =$play_off_round4->player_name ; 
								$opp_name  =$play_off_round4->opp_name ;
							}else{
								$player_name  =$play_off_round4->opp_name ; 
								$opp_name  =$play_off_round4->player_name ; 
							}
							?>
							<td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_round4->player_id ; ?>','<?php echo $player_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $player_name ; ?></a>
							 </td>
							 <td>
								<a href="#" onClick="opp_player_about_det('<?php echo $play_off_round4->opp_id ; ?>','<?php echo $opp_name ; ?>')" data-toggle="modal" data-target="#opp_player_about"><?php echo $opp_name ; ?></a>
							 </td>
							
							<td>
							
								<?php if($play_off_round4->scores=='' && $play_off_round4!=''){?>
									<!---<a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#play_off" onclick="play_off_scores('<?php echo $play_off_round4->id ; ?>','<?php echo $_REQUEST['record_id'];?>','<?php echo $play_off_round4->roundno ; ?>','<?php echo $play_off_players->team ; ?>','<?php echo $play_off_players->match_number ; ?>')"
									>Report Scors</a>--->
								<?php } ?> 
								<?php echo $scores ; ?>
							</td>
							<td><?php if ($play_off_round4!='' && $play_off_round4->scores!='') echo $win_status ; ?></td>
							<td></td>
						</tr>
						
					</tbody> 
                      </table>
					  <?php //$this->load->view("Player/draw.php"); ?>
					</div>

					<div id="tab5a" class="tab">
                       
					<div class="wrapper">
					<br>
						<div class="brackets">
						</div>

					</div>
	<?php  $this->load->view("Player/draw.php"); ?>
	
                    </div>
                  </div>
                </div>
				
				
				
				
				
				
				
				
				
                <div id="tab2" class="tab">
                  <h3 class="tab-match-title">Doubles</h3>
                  <div class="tabs standard">
                    <ul class="tab-links-match">
                     <!--- <li class="active"> <a class="first-tabs" href="#tab1b">History</a></li>--->
                      <li class="active" ><a href="#tab2b">Schedule</a></li>
                      <li><a href="#tab3b">Division Standings</a></li>
                      <li><a href="#tab4b">League Standings</a></li>
                      <li><a href="#tab5b">Playoff Draw</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="tab1b" class="tab ">
                        <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>League</th>
                           
                            <th>Level</th>
                            <th>Score</th>
                            <th>Code</th>
                            <th>Opponent</th>
                            <th>Winner</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  </tbody>
                      </table></div>
                        <div id="tab2b" class="tab active">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Date</th>
                           
                            <th>Time</th>
                            <th>Place</th>
                           
                            <th>Opponent</th>
                            <th>League</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  
						  
                          
                        </tbody>
                      </table></div>
						
						<div id="tab3b" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Name</th>
                           
                            <th>Week1</th>
                            <th>Week2</th>
                           <th>Week3</th>
						   <th>Week4</th>
						   <th>Week5</th>
						   <th>Week6</th>
						   <th>Week7</th>
						   <th>Week8</th>
                            <th>Points</th>
							<th>Rating</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
			</tbody>
                      </table></div>
						
						<div id="tab4b" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Rank</th>
                           
                            <th>Name</th>
                            <th>Div rank</th>
                           <th>Points</th>
						   <th>Rating</th>
						   <th>Division</th>
						   <th>Matches</th>
						   <th>Available</th>
						   <th>First Season</th>
                            <th>Playoff Eligible</th>
							
                            
                          </tr>
                        </thead>
                        <tbody>
                        
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            
							<td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            
							<td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                                 <td>1</td> </a>
							  <td>86</td>
							
                          
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr><tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
							<td>1</td>
                            <td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						
                        </tbody>
                      </table> </div>
					  
						<div id="tab5b" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Draws</th>
                           
                            <th>No.of Players</th>
                            <th>Div rank</th>
                           <th>Schedule</th>
						   <th>Hierarchy</th>
						   <th>Levels</th>
						   <th>Finals</th>
						   <th>Date</th>
						   <th>Time</th>
                            <th>Place</th>
							<th>No.of Matches</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                          <td>2</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>3</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>4</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>5</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							   <td>Dallas</td>
                         <td>6</td>
                          </tr>
						 
                        </tbody>
                      </table> 
                        </div>
						
                      
                  
				  </div>
				  
				  </div>
               </div>
			   
			   
			   
			   
			   
			  <div id="tab3" class="tab">
                  <h3 class="tab-match-title">Mixed</h3>
                  <div class="tabs standard">
                    <ul class="nav nav-tabs tab-links-match">
                     <!---- <li class="active"> <a class="first-tabs" href="<?php //echo base_url()."custom/new_design/"?>#tab1c">History</a></li>---->
                      <li class="active" ><a href="#tab2c">Schedule</a></li>
                      <li><a href="#tab3c">Division Standings</a></li>
                      <li><a href="#tab4c">League Standings</a></li>
                      <li><a href="#tab5c">Playoff Draw</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="tab1c" class="tab ">
                        <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>League</th>
                           
                            <th>Level</th>
                            <th>Score</th>
                            <th>Code</th>


                            <th>Opponent</th>
                            <th>Winner</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
                          
                        </tbody>
                      </table></div>
                        <div id="tab2c" class="tab active">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Date</th>
                           
                            <th>Time</th>
                            <th>Place</th>
                           
                            <th>Opponent</th>
                            <th>League</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  
						  
                          
                        </tbody>
                      </table></div>
						
						<div id="tab3c" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Name</th>
                           
                            <th>Week1</th>
                            <th>Week2</th>
                           <th>Week3</th>
						   <th>Week4</th>
						   <th>Week5</th>
						   <th>Week6</th>
						   <th>Week7</th>
						   <th>Week8</th>
                            <th>Points</th>
							<th>Rating</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>

							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  
						  
						  
                          
                        </tbody>
                      </table>
                      </div>
					  <div id="tab4c" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Rank</th>
                           
                            <th>Name</th>
                            <th>Div rank</th>
                           <th>Points</th>
						   <th>Rating</th>
						   <th>Division</th>
						   <th>Matches</th>
						   <th>Available</th>
						   <th>First Season</th>
                            <th>Playoff Eligible</th>
							
                            
                          </tr>
                        </thead>
                        <tbody>
                        
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            
							<td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            
							<td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                                 <td>1</td> </a>
							  <td>86</td>
							
                          
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr><tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
							<td>1</td>
                            <td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						
                        </tbody>
                      </table> </div>
					 <div id="tab5c" class="tab">
                        <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Draws</th>
                           
                            <th>No.of Players</th>
                            <th>Div rank</th>
                           <th>Schedule</th>
						   <th>Hierarchy</th>
						   <th>Levels</th>
						   <th>Finals</th>
						   <th>Date</th>
						   <th>Time</th>
                            <th>Place</th>
							<th>No.of Matches</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                          <td>2</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>3</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>4</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>5</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							   <td>Dallas</td>
                         <td>6</td>
                          </tr>
						 
                        </tbody>
                      </table> </div>  
                        
                </div>
			  </div>
                  
				  </div>
             
			  
			  
			  <div id="tab4" class="tab">
                  <h3 class="tab-match-title">Juniors</h3>
                  <div class="nav nav-tabs tabs standard">
                    <ul class="tab-links-match">
                      <!---<li class="active"> <a class="first-tabs" href="<?php ///echo base_url()."custom/new_design/"?>#tab1d">History</a></li>--->
                      <li class="active" > <a href="<?php echo base_url()."custom/new_design/"?>#tab2d">Schedule</a></li>
                      <li><a href="<?php echo base_url()."custom/new_design/"?>#tab3d">Division Standings</a></li>
                      <li><a href="<?php echo base_url()."custom/new_design/"?>#tab4d">League Standings</a></li>
                      <li><a href="<?php echo base_url()."custom/new_design/"?>#tab5d">Playoff Draw</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="tab1d" class="tab ">
                        <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>League</th>
                           
                            <th>Level</th>
                            <th>Score</th>
                            <th>Code</th>
                            <th>Opponent</th>
                            <th>Winner</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">2016 Summer Week 7</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>3.5</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1-6,1-6</td>
                            </a>
                            <td>D</td>
                            <td>Anne French-smith</td>
                            <td>Anne French-smith</td>
                            
                          </tr>
                          
                        </tbody>
                      </table></div>
                        <div id="tab2d" class="tab active">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Date</th>
                           
                            <th>Time</th>
                            <th>Place</th>
                           
                            <th>Opponent</th>
                            <th>League</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">22-08-2016</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Dallas</td>
                            </a>
                          
                            <td>Anne French-smith</td>
                            <td>2016 Summer Week 7</td>
                            
                          </tr>
						  
						  
                          
                        </tbody>
                      </table></div>
						<div id="tab3d" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Name</th>
                           
                            <th>Week1</th>
                            <th>Week2</th>
                           <th>Week3</th>
						   <th>Week4</th>
						   <th>Week5</th>
						   <th>Week6</th>
						   <th>Week7</th>
						   <th>Week8</th>
                            <th>Points</th>
							<th>Rating</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">Anne French-smith</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a>
                          
                            <td>3</td>
                            <td>4</td>
							 <td>5</td>
							  <td>6</td>
							   <td>7</td>
							    <td>8</td>
                            <td>1-6,1-6</td>
							<td>-7.8</td>
                          </tr>
						  
						  
						  
                          
                        </tbody>
                      </table></div>
						<div id="tab4d" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Rank</th>
                           
                            <th>Name</th>
                            <th>Div rank</th>
                           <th>Points</th>
						   <th>Rating</th>
						   <th>Division</th>
						   <th>Matches</th>
						   <th>Available</th>
						   <th>First Season</th>
                            <th>Playoff Eligible</th>
							
                            
                          </tr>
                        </thead>
                        <tbody>
                        
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            
							<td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            
							<td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                                 <td>1</td> </a>
							  <td>86</td>
							
                          
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr><tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
							<td>1</td>
                            <td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>Anne French-smith</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>1</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>65020</td>
							 <td>7</td>
							  <td>Yes</td>
							   <td>Yes</td>
							    <td>Yes</td>
                            
                          </tr>
						
                        </tbody>
                      </table> </div>
						<div id="tab5d" class="tab">
                          <table class="table table-reflow">
                        <thead>
                          <tr style="background-color:#000; color:#fff;">
                            
                            <th>Draws</th>
                           
                            <th>No.of Players</th>
                            <th>Div rank</th>
                           <th>Schedule</th>
						   <th>Hierarchy</th>
						   <th>Levels</th>
						   <th>Finals</th>
						   <th>Date</th>
						   <th>Time</th>
                            <th>Place</th>
							<th>No.of Matches</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                          <td>2</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>3</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>4</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							    <td>Dallas</td>
                         <td>5</td>
                          </tr>
						  <tr class="nm-player">
                            <th scope="row">1</th>
                            <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
                            </a> <a href="<?php echo base_url()."custom/new_design/"?>#">
                            <td>2</td>
							<td>86</td>
                            </a>
                          
                            <td>5.29</td>
                            <td>3.5</td>
							 <td>7</td>
							  <td>22-08-2016</td>
							   <td><img href="<?php echo base_url()."custom/new_design/"?>images/clock_icon.png" alt="" /></td>
							   <td>Dallas</td>
                         <td>6</td>
                          </tr>
						 
                        </tbody>
                      </table> 
                          </div>
                        </div>
                      </div>
					 
                    </div>
                  </div>
                </div>
              </div>
			  
			  
            </div>
			
          </div>
        </div>
      </div>
    </div>
    <!--Close Top Match--> 
  </div>
</section>



<?php
	$this->load->view("Includes/player/footer.php");
?>
<style>	

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {  
     text-align: center;
	}
.win_img{
	width:25px;
	heught:25px;
}


</style>
