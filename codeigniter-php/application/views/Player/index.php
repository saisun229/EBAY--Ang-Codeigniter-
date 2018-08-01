<?php
	
	$this->load->view("Includes/player/header.php");
	$this->load->view("Includes/player/menu.php");
	
?>

<div class="container secondary-page">

  <div class="general general-results players" >
    <div class="top-score-title right-score col-md-12">
      <div class="top-score-title player-vs">
        <div class="main">
          <div class="tabs standard single-pl">
            
            <div class="tab-content single-match">
              <div id="tab1" class="tab active">
                <!--<h3 class="tab-match-title">Singles</h3>-->
		<div class="panel custom-panel panel-default">
            <div class="panel-heading">
				<strong>Tournament Schedule</strong>
				<span class="pull-right" id="pull-right">
					<!-- Tabs -->
					<ul class="nav panel-tabs" id="panel-tabs">
						<li><a class="clickable"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
					</ul>
				</span>
			</div>
            <div class="panel-body for_scroll">
                <div class="tabs standard">
					<div class="col-lg-12" >
					  <ul class="tab-links-match">
					 
						<li class="module-title"><b>2016 Player Activity</b></h2>
						<li class="ftp"><a class="button_example" href="#tab2a">Singles</a>

						<li class="ftp"><a class="button_example" href="#tab3a">Doubles</a></li>
						<li class="ftp"><a class="button_example" href="#tab4a">Mixed</a></li>
						
					  </ul>
					  </div>
				 </div>
    <div class="tab-content" style="border:1px solid #e7e7e7">
        <div id="tab2a" class="tab active" style="display: block;">
                         
	  <table  border='0' cellpadding='0' cellspacing='0' class="tournament_schedule_table" >
		<tr class='days'style="background-color:#505356">
		  <th></th>
		  <th >5-oct-2016</th>
		
		  <th>7-oct-2016</th>
		  <th>8-oct-2016</th>
		  <th>9-oct-2016</th>
		
		 <th>11-oct-2016</th>
		
		</tr>
		<tr>
		  <td class='time'>9.00 AM</td>
		  <td class='cs335 blue' data-tooltip='League 1'><b>Opponent</b>: Adrin <br><b>Ground</b>:Arthur Ashe <br><b> City</b> New York</td>
		 
		  <td></td> <td></td>
		  <td class='cs426 purple' data-tooltip='League 4'><b>Opponent</b>: Joe <br><b>Ground</b>:O2 Arena<br><b> City</b> London</td>
		 
		 
		  <td></td>
		
		</tr>
		<tr>
		  <td class='time'>10.00 AM</td>
		  <td></td>
	   
		<td class='md352 green' data-tooltip='League 3'><b>Opponent</b>: Kim Renna<br><b>Ground</b>:Indian Wells Tennis Garden<br><b> City</b> Indian Wells</td>
		  <td></td>
		  <td></td>
		  <td></td>
		
		  
		  
		</tr>
		<tr>
		  <td class='time'>11.00 AM</td>
		  <td></td>
		 
		   <td></td>
		   <td class='cs335 blue lab' data-tooltip='League 2'><b>Opponent</b>: John<br><b>Ground</b>:Ahoy Rotterdam<br><b> City</b>: Rotterdam</td>
		 
		  <td></td>
		
		  <td></td>
	   
		</tr>
		<tr>
		  <td class='time'>12.00 AM</td>
		  <td></td>
	  
		  <td></td>
		  <td></td>
		  <td></td>

		  <td class='cs335 blue lab' data-tooltip='League 5'><b>Opponent</b>: Michal<br><b>Ground</b>:Indian Wells Tennis Garden<br><b> City</b>:Indian Wells</td>
		 
		</tr>
	   
	  </table>
  </div>
                    
                      
                     
					  
    <div id="tab3a" class="tab active" style="display: none;">
	  <table  border='0' cellpadding='0' cellspacing='0' class="tournament_standings_table" >
		<tr class='days' style="background-color:#505356">
		  <th></th>
		  <th>15-oct-2016</th>
		
		  <th>17-oct-2016</th>
		  <th>18-oct-2016</th>
		  <th>19-oct-2016</th>
		
		 <th>21-oct-2016</th>
		
		</tr>
		<tr>
		  <td class='time'>9.00 AM</td>
		  <td class='cs335 blue' data-tooltip='League 1'><b>Opponent</b>: Adrin <br><b>Ground</b>:Arthur Ashe <br><b> City</b> New York</td>
		 
		  <td></td> <td></td>
		  <td class='cs426 purple' data-tooltip='League 4'><b>Opponent</b>: Joe <br><b>Ground</b>:O2 Arena<br><b> City</b> London</td>
		 
		 
		  <td></td>
		
		</tr>
		<tr>
		  <td class='time'>10.00 AM</td>
		  <td></td>
	   
		<td class='md352 green' data-tooltip='League 3'><b>Opponent</b>: Kim Renna<br><b>Ground</b>:Indian Wells Tennis Garden<br><b> City</b> Indian Wells</td>
		  <td></td>
		  <td></td>
		  <td></td>
		
		  
		  
		</tr>
		<tr>
		  <td class='time'>11.00 AM</td>
		  <td></td>
		 
		   <td></td>
		   <td class='cs335 blue lab' data-tooltip='League 2'><b>Opponent</b>: John<br><b>Ground</b>:Ahoy Rotterdam<br><b> City</b>: Rotterdam</td>
		 
		  <td></td>
		
		  <td></td>
	   
		</tr>
		<tr>
		  <td class='time'>12.00 AM</td>
		  <td></td>
	  
		  <td></td>
		  <td></td>
		  <td></td>

		  <td class='cs335 blue lab' data-tooltip='League 5'><b>Opponent</b>: Michal<br><b>Ground</b>:Indian Wells Tennis Garden<br><b> City</b>:Indian Wells</td>
		 
		</tr>
	   
	  </table>
  </div>
  
    <div id="tab4a" class="tab" style="display: none;">
	  <table  border='0' cellpadding='0' cellspacing='0' class="tournament_leagues_table" >
		<tr class='days' style="background-color:#505356">
		  <th></th>
		  <th>25-oct-2016</th>
		
		  <th>27-oct-2016</th>
		  <th>28-oct-2016</th>
		  <th>29-oct-2016</th>
		
		 <th>30-oct-2016</th>
		
		</tr>
		<tr>
		  <td class='time'>9.00 AM</td>
		  <td class='cs335 blue' data-tooltip='League 1'><b>Opponent</b>: Adrin <br><b>Ground</b>:Arthur Ashe <br><b> City</b> New York</td>
		 
		  <td></td> <td></td>
		  <td class='cs426 purple' data-tooltip='League 4'><b>Opponent</b>: Joe <br><b>Ground</b>:O2 Arena<br><b> City</b> London</td>
		 
		 
		  <td></td>
		
		</tr>
		<tr>
		  <td class='time'>10.00 AM</td>
		  <td></td>
	   
		<td class='md352 green' data-tooltip='League 3'><b>Opponent</b>: Kim Renna<br><b>Ground</b>:Indian Wells Tennis Garden<br><b> City</b> Indian Wells</td>
		  <td></td>
		  <td></td>
		  <td></td>
		
		  
		  
		</tr>
		<tr>
		  <td class='time'>11.00 AM</td>
		  <td></td>
		 
		   <td></td>
		   <td class='cs335 blue lab' data-tooltip='League 2'><b>Opponent</b>: John<br><b>Ground</b>:Ahoy Rotterdam<br><b> City</b>: Rotterdam</td>
		 
		  <td></td>
		
		  <td></td>
	   
		</tr>
		<tr>
		  <td class='time'>12.00 AM</td>
		  <td></td>
	  
		  <td></td>
		  <td></td>
		  <td></td>

		  <td class='cs335 blue lab' data-tooltip='League 5'><b>Opponent</b>: Michal<br><b>Ground</b>:Indian Wells Tennis Garden<br><b> City</b>:Indian Wells</td>
		 
		</tr>
	   
	  </table>
  </div>
					
					
      </div>
      </div>
      </div>
	  
    </div> 
			
	<div class="clearfix"></div>
	<div id="tab1" class="tab active" >
                <!--<h3 class="tab-match-title">Singles</h3>-->
                <div class="tabs standard">
				<div class="panel custom-panel panel-default">
				<div class="panel-heading">
					<strong>Tournaments Standings</strong>
					<span class="pull-right" id="pull-right">
						<!-- Tabs -->
						<ul class="nav panel-tabs" id="panel-tabs">
							<li><a class="clickable"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
						</ul>
					</span>
				</div>
				<div class="panel-body for_scroll">
				<div class="col-lg-12" >
                  <ul class="tab-links-match">
				 
					<li class="module-title"><b>2016 Player Activity</b></h2>
                    <li class=""><a class="button_example" href="#tab2b">Singles</a></li>
                    <li class=""><a class="button_example" href="#tab3b">Doubles</a></li>
                    <li class=""><a class="button_example" href="#tab4b">Mixed</a></li>
                    
                  </ul></div>
				
                  <div class="tab-content">
                    <div id="tab2b" class="tab active" style="display: block;">
                       
                      <div class="bgs">
<table id="travel" style="color:#000;width:100%;padding-right:30px;">

	
    
    <thead>    
    	<tr>
            <th scope="col" rowspan="2">Player Name</th>
            <th scope="col" colspan="7"style="text-align:center">Week Wise Analysis</th>
        </tr>
        
        <tr style="text-align:center;">
            <th scope="col">Week-1</th>
            <th scope="col">Week-2</th>
            <th scope="col">Week-3</th>
            <th scope="col">Week-4</th>
            <th scope="col">Week-5</th>
            <th scope="col">Points</th>
            <th scope="col">Rating</th>
        </tr>        
    </thead>
    
    
    
  	<tbody>
				
						<?php 
						//echo "<pre>" ;print_r($div_stad) ;
						for($i=0;$i<count($div_stad);$i++) { $total_points = '' ?> 
						
								<th scope="row"> <?php echo $div_stad[$i][0]['player_name'] ; ?>  </th>
								<?php for($j=0;$j<5;$j++) { 
										
										if($div_stad[$i][$j]['player']=='Yes')
											
												$total_points = $total_points+$div_stad[$i][$j]['points'] ;
											else 
												$total_points = $total_points+$div_stad[$i][$j]['points_opp'] ;
											?>
										<td>
											<?php 
											//echo $div_stad[$i][$j]['player'] ; 
											if($div_stad[$i][$j]['player']=='Yes')
												echo $div_stad[$i][$j]['points'];
											else 
												echo  $div_stad[$i][$j]['points_opp'] ; 
											?>
										</td>
									<?php }  ?> 

									<td><?php echo $total_points ; ?> </td>
									<td><?php echo round(($total_points/45)*100) ; ?> </td>
								</tr>
						<?php } ?> 
					</tbody> 

</table>
</div></div>
                      <div id="tab3b" class="tab" style="display: none;">
                      
                     <div class="bgs">
<table id="travel" style="color:#000;width:100%;padding-right:30px;">

	
    
    <thead>    
    	<tr>
            <th scope="col" rowspan="2">Player Name</th>
            <th scope="col" colspan="6" style="text-align:center">Week Wise Analysis</th>
        </tr>
        
        <tr>
            <th scope="col">Week-1</th>
            <th scope="col">Week-2</th>
            <th scope="col">Week-3</th>
            <th scope="col">Week-4</th>
            <th scope="col">Points</th>
            <th scope="col">Rating</th>
        </tr>        
    </thead>
    
    
    
    <tbody>
    	<tr>
    		<th scope="row">Smith</th>
            <td>48</td>
            <td>32</td>
            <td>25</td>
            <td>29</td>
            <td>20</td>
            <td>20</td>
        </tr>
        
        <tr>
        	<th scope="row">Dante</th>
            <td>36</td>
            <td>29</td>
            <td>27</td>
            <td>31</td>
            <td>19</td>
            <td>21</td>
        </tr>
        
        <tr>
        	<th scope="row">Anne</th>
            <td>33</td>
            <td>24</td>
            <td>20</td>
            <td>25</td>
            <td>15</td>
            <td>17</td>
        </tr>
        
        <tr>
        	<th scope="row">Fletch</th>
            <td>47</td>
            <td>39</td>
            <td>36</td>
            <td>40</td>
            <td>33</td>
            <td>34</td>
        </tr>
        
        <tr>
        	<th scope="row">Fletcher</th>
            <td>69</td>
            <td>66</td>
            <td>43</td>
            <td>66</td>
            <td>47</td>
            <td>58</td>
        </tr>
        
        <tr>
        	<th scope="row">Lanc</th>
            <td>49</td>
            <td>45</td>
            <td>37</td>
            <td>47</td>
            <td>42</td>
            <td>46</td>
        </tr>
        
        <tr>
        	<th scope="row">Randy</th>
            <td>21</td>
            <td>16</td>
            <td>13</td>
            <td>15</td>
            <td>12</td>
            <td>13</td>
        </tr>
        
    </tbody>

</table>
</div></div>
                      
                     
					  <div id="tab4b" class="tab" style="display: none;">
                        <div class="bgs">
<table id="travel" style="color:#000;width:100%;padding-right:30px;">

	
    
    <thead>    
    	<tr>
            <th scope="col" rowspan="2">Player Name</th>
            <th scope="col" colspan="6" style="text-align:center">Week Wise Analysis</th>
        </tr>
        
        <tr>
            <th scope="col">Week-1</th>
            <th scope="col">Week-2</th>
            <th scope="col">Week-3</th>
            <th scope="col">Week-4</th>
            <th scope="col">Points</th>
            <th scope="col">Rating</th>
        </tr>        
    </thead>
    
    
    
    <tbody>
    	<tr>
    		<th scope="row">Anne</th>
            <td>48</td>
            <td>32</td>
            <td>25</td>
            <td>29</td>
            <td>20</td>
            <td>20</td>
        </tr>
        
        <tr>
        	<th scope="row">Fletch</th>
            <td>36</td>
            <td>29</td>
            <td>27</td>
            <td>31</td>
            <td>19</td>
            <td>21</td>
        </tr>
        
        <tr>
        	<th scope="row">Smith</th>
            <td>33</td>
            <td>24</td>
            <td>20</td>
            <td>25</td>
            <td>15</td>
            <td>17</td>
        </tr>
        
        <tr>
        	<th scope="row">Dante</th>
            <td>47</td>
            <td>39</td>
            <td>36</td>
            <td>40</td>
            <td>33</td>
            <td>34</td>
        </tr>
        
        <tr>
        	<th scope="row">Fletcher</th>
            <td>69</td>
            <td>66</td>
            <td>43</td>
            <td>66</td>
            <td>47</td>
            <td>58</td>
        </tr>
        
        <tr>
        	<th scope="row">Lanc</th>
            <td>49</td>
            <td>45</td>
            <td>37</td>
            <td>47</td>
            <td>42</td>
            <td>46</td>
        </tr>
        
        <tr>
        	<th scope="row">Randy</th>
            <td>21</td>
            <td>16</td>
            <td>13</td>
            <td>15</td>
            <td>12</td>
            <td>13</td>
        </tr>
        
    </tbody>

</table>
</div>                    </div>
					
					
                  </div>
                  </div>
                  </div>
                </div>
	<!--- end TOURNAMENTS STANDINGS ---- >			
			<div class="clearfix"></div>
				<div id="tab1" class="tab active" style="margin-top:30px">
                <!--<h3 class="tab-match-title">Singles</h3>-->
                <div class="tabs standard">
				<div class="panel custom-panel panel-default">
				<div class="panel-heading">
					<strong>Tournaments Leagues</strong>
					<span class="pull-right" id="pull-right">
						<!-- Tabs -->
						<ul class="nav panel-tabs" id="panel-tabs">
							<li><a class="clickable"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
						</ul>
					</span>
				</div>
				<div class="panel-body for_scroll">
				<div class="col-lg-12" >
                  <ul class="tab-links-match">
					<li class="module-title"><b>2016 Player Activity</b></h2>
                    <li class=""><a class="button_example" href="#tab2c">Singles</a></li>
                    <li class=""><a class="button_example" href="#tab3c">Doubles</a></li>
                    <li class=""><a class="button_example" href="#tab4c">Mixed</a></li>
                    
                  </ul>
				</div>
                  <div class="tab-content gig">
                    <div id="tab2c" class="tab active" style="display: block;">
							<div class="component">
				
				<table style="color:#000;" class="tourment_leage">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Div Rank</th>
							<th>Points</th>
							<th>Ratings</th>
							<th>Division</th>
							<th>Matches</th>
							<th>Available</th>
							<th>First Season</th>
							<th>Playoff Eligible</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							
							<td>1</td>
							<td>Anne</td>
							<td>1</td>
							<td>86</td>
							<td>5.29</td>
							<td>65020</td>
							<td>25</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
							
						</tr>
						<tr>
							<td>2</td>
							<td>John</td>
							<td>1</td>
							<td>78</td>
							<td>6.39</td>
							<td>58020</td>
							<td>18</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
							
						</tr>
						<tr>
							
							<td>3</td>
							<td>smith</td>
							<td>2</td>
							<td>75</td>
							<td>5.29</td>
							<td>53020</td>
							<td>15</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						<tr>
							
							<td>4</td>
							<td>French</td>
							<td>3</td>
							<td>66</td>
							<td>4.29</td>
							<td>52020</td>
							<td>13</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						<tr>
							
							<td>5</td>
							<td>joe</td>
							<td>5</td>
							<td>54</td>
							<td>3.49</td>
							<td>48020</td>
							<td>7</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						
					</tbody>
				</table>
			</div></div> 
			<div id="tab3c" class="tab" style="display: none;"><div class="component">
				
				<table style="color:#000;" class="tourment_leage">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Div Rank</th>
							<th>Points</th>
							<th>Ratings</th>
							<th>Division</th>
							<th>Matches</th>
							<th>Available</th>
							<th>First Season</th>
							<th>Playoff Eligible</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							
							<td>1</td>
							<td>smith</td>
							<td>1</td>
							<td>86</td>
							<td>5.29</td>
							<td>65020</td>
							<td>25</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
							
						</tr>
						<tr>
							<td>2</td>
							<td>John</td>
							<td>1</td>
							<td>78</td>
							<td>6.39</td>
							<td>58020</td>
							<td>18</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
							
						</tr>
						<tr>
							
							<td>3</td>
							<td>Joe</td>
							<td>2</td>
							<td>75</td>
							<td>5.29</td>
							<td>53020</td>
							<td>15</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						<tr>
							
							<td>4</td>
							<td>Anne</td>
							<td>3</td>
							<td>66</td>
							<td>4.29</td>
							<td>52020</td>
							<td>13</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						<tr>
							
							<td>5</td>
							<td>John</td>
							<td>5</td>
							<td>54</td>
							<td>3.49</td>
							<td>48020</td>
							<td>7</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			</div>
			<div id="tab4c" class="tab" style="display: none;"><div class="component">
				
				<table style="color:#000;" class="tourment_leage">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Div Rank</th>
							<th>Points</th>
							<th>Ratings</th>
							<th>Division</th>
							<th>Matches</th>
							<th>Available</th>
							<th>First Season</th>
							<th>Playoff Eligible</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							
							<td>1</td>
							<td>smith</td>
							<td>1</td>
							<td>86</td>
							<td>5.29</td>
							<td>65020</td>
							<td>25</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
							
						</tr>
						<tr>
							<td>2</td>
							<td>John</td>
							<td>1</td>
							<td>78</td>
							<td>6.39</td>
							<td>58020</td>
							<td>18</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
							
						</tr>
						<tr>
							
							<td>3</td>
							<td>Joe</td>
							<td>2</td>
							<td>75</td>
							<td>5.29</td>
							<td>53020</td>
							<td>15</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						<tr>
							
							<td>4</td>
							<td>Anne</td>
							<td>3</td>
							<td>66</td>
							<td>4.29</td>
							<td>52020</td>
							<td>13</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
						</tr>
						<tr>
							
							<td>5</td>
							<td>John</td>
							<td>5</td>
							<td>54</td>
							<td>3.49</td>
							<td>48020</td>
							<td>7</td>
							<td>Yes</td>
							<td>Yes</td>
							<td>Yes</td>
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
			  </div>
			  
            </div>
			
          </div>
		  
<?php
	
	$this->load->view("Includes/player/footer.php");
	
	
?>