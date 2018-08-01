<?php //echo "<pre>" ; print_r($edit);die; ?>
<?php	
	//print_r($_SESSION);die;
	$this->load->view("Includes/leagueregister/header.php");
	$this->load->view("Includes/leagueregister/menu.php");		
	$skilllevel=array('','2','2.5','3','3.5','4','4.5');
?>
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB55rVMHYhYWwpR2_tK4EfBclAZPLWiH3Q&libraries=places"></script>
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

 <script>
  function initialize() {
	 
        var address = (document.getElementById('pac-input'));
        var autocomplete = new google.maps.places.Autocomplete(address);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
			console.log(place);
            if (!place.geometry) {
                return;
            }

        var address = '';
		var max_count = place.address_components.length;
     
	   $("#lattitude").val(place.geometry.location.lat());
	   $("#longitude").val(place.geometry.location.lng());
	 
	   
	   if(!$.isNumeric(place.address_components[max_count-1].short_name)){
		   $("#zipcode").val("");
	   }
		else{
		   $("#zipcode").val(place.address_components[max_count-1].short_name);
	   }
    });
  }

   google.maps.event.addDomListener(window, 'load', initialize);

    </script>

<div class ="container for_margin_top">
		<h3><?php echo $leag_name ; ?> </h3>
  <form action="<?php echo base_url()?>player/leag_register" method="post" >
  <div class="panel-group" id="accordion">
 
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Contact Information
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
	     <input type="hidden" name="leag_id" value="<?php echo $_REQUEST['record_id'] ?> " >    
		
		<div class="col-md-3">
			<fieldset>
                <label>Primary Phone</label>
                <input type="text" name="primary_phone" value="<?php echo $edit->primary_phone; ?>"  readonly>               
            </fieldset>
		 </div>	 
		 
		 <div class="col-md-3">
			<label>Phone Type</label>
			<select id="transaction_credit_card_expiration_month" >
				<option value="2">Landline</option>
				<option value="3">Mobile number</option>
			</select>    
		 </div>
		 
		 <div class="col-md-3">
			<fieldset>
                <label>Secondary Phone</label>
                <input type="text" name="secondary_phone" value="<?php echo $edit->primary_phone;  ?>" readonly>               
              </fieldset>
		 </div>
		 
		 <div class="col-md-3">
			<fieldset class="last">
				<label>Phone Type</label>
				<select id="transaction_credit_card_expiration_month" >
					<option value="2">Landline</option>
					<option value="3">Mobile number</option>
				</select>            
		  </fieldset>
		 </div>
		
		 <div class="col-md-3">
			<fieldset>
                <label>Address</label>
                <textarea cols="10" rows="10" readonly><?php echo $edit->address ;  ?></textarea>          
              </fieldset>
		 </div>
		  <div class="col-md-3">
			<fieldset>
                <label>City</label><br>
                <input type="text"  value="<?php echo $edit_play->city;  ?>" readonly>               
              </fieldset>
		 </div>
		 <div class="col-md-3">
			<fieldset>
                <label>State/Province</label>
                <input type="text" value="<?php echo $edit_play->state;  ?>" readonly>               
              </fieldset>
		 </div>
		 <div class="col-md-3">
			<fieldset>
                <label>Zip Code</label>
                <input type="text"  value="<?php echo $edit_play->zipcode;  ?>" readonly>               
              </fieldset>
		 </div>
		 
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
         Skill Level
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
		<h3>Your skill level</h3>
		 <div class="col-md-3">
			
			 <select name="skill_level" class="form-control" required >
				
					<?php
						foreach($skilllevel as $row)
						{	?>
							 <option value="<?php echo $row ; ?>" ><?php echo $row ; ?></option>
					<?php }
					?>
		 </select>
			
		 </div>
		 
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Choose Facility
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	  
			<div class="row-fluid">
			
			  <select class="selectpicker" data-show-subtext="true" data-live-search="true" onchange="get_zipcode(this.value)" >
				<option value=""> Select Facility</option>
				<?php 
				foreach($court_list as $list) { //echo "<pre>" ; print_r($list);?> 
					<option value="<?php echo $list['id'] ; ?> " ><?php  echo $list['court_name'] ; ?></option>
				<?php } ?>
			  </select>
		<!--	  <input type="text"  style="width: 194px;"  required >
			   <span onclick="enable_auto_search()"  class="add_faci controls auto_search" >Search</span>-->
			  <span   onclick="enable_auto_search()" class="add_faci controls auto_search" >Add facility</span>
			</div>
		<br>
			<input id="pac-input"   style="display:none"class="controls auto_search" type="text" placeholder="Enter a location">
		
			<div class="col-md-3">
				<fieldset>
					<label style="display:none"class="controls auto_search">Zipcode</label>
						<input type="text" id="zipcode" style="display:none"class="controls auto_search" name="zipcode" required >
				  </fieldset>
			</div>
			
			<div class="col-md-3">
				<fieldset>
					<label style="display:none"class="controls auto_search">Lattitude</label>
						<input type="text" id="lattitude" style="display:none"class="controls auto_search" name="lattitude" readonly >
				  </fieldset>
			</div>
			<div class="col-md-3">
				<fieldset>
					<label style="display:none"class="controls auto_search">Longitude</label>
						<input type="text" id="longitude" style="display:none"class="controls auto_search" name="longitude" readonly >
				  </fieldset>
			</div>
		
      </div>
	
	  
    </div>
	
  </div> 

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
			Payment
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
			
			<div class="col-md-3">
				<fieldset>
					<label>Card Holder Name</label>
						<input type="text" id="" name=""  >
				  </fieldset>
			</div>
			
			<div class="col-md-3">
				<fieldset>
					<label>Card Number</label>
						<input type="text" id="" name=""  >
				  </fieldset>
			</div>
			
			<div class="col-md-3">
				<fieldset>
					<label>Card Number</label>
						<input type="text" id="" name=""  >
				  </fieldset>
			</div>
		<div class="clearfix"></div>
		<br>
			<div class="col-md-3">
				<fieldset>
					<input type="submit"  name="add"  value="Register" >
				  </fieldset>
			</div>
			
      </div>
    </div>
  </div>
  </form>
</div>
  
  
</div> <!-- end container -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<style>
	.for_margin_top{
		margin-top:75px;
	}
	
	.panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;         /* adjust as needed */
}
.panel-heading .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}
.toolbar-wrap {
    position: relative;
}
.btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    color: #333;
    background: none;
    border-color: #8c8c8c;
}
textarea {
    resize: vertical;
    height: 47px;
}
</style>

<script>
	function enable_auto_search(){
		//alert("DFf");
		$(".auto_search").show();
	}
	function get_zipcode(facility){
		//alert(facility);
		  var base_url = "<?php echo base_url().'player/get_facilities';?> ";
		 // alert(base_url);
		$.ajax(
		{
			type: "POST",
			url: base_url,
			data:{facility:facility},
			success: function(data) { 
				var result = data.split(',');
				var lattitude = result[0].trim() ;
				 $("#lattitude").val(lattitude);
				 $("#longitude").val(result[1]);
				 $("#zipcode").val(result[2]);
				//console.log(data);
				//$("#all_faci").html(data);
			} 
		});	
	}
</script>
<style>
	.add_faci{
		padding: 10px;
		background: #eae8e8;
		cursor: pointer;
	}
</style>
<?php 
		$this->load->view("Includes/leagueregister/footer.php");
    ?> 