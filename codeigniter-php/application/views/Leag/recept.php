<?php	
	//print_r($_SESSION);die;
	$this->load->view("Includes/leagueregister/header.php");
	$this->load->view("Includes/leagueregister/menu.php");		
	$skilllevel=array('','2','2.5','3','3.5','4','4.5');
?>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>S2tennis</title>
<link rel="icon" type="images/png" sizes="16x16" href="images/favicon.ico">
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/myprofile.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/players2893.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/style12.css" />
<link href="<?php echo base_url(); ?>custom/cssnew/css/theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/free.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/style_dir.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>custom/cssnew/css/style-bundelcart.css" />
<link rel='stylesheet' href="<?php echo base_url(); ?>custom/cssnew/css/stylecart.css" type='text/css' media='all' />
<link rel='stylesheet' href="<?php echo base_url(); ?>custom/cssnew/css/responsive-bu.css" type='text/css' media='all' />

<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/application35ed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/facebook35ed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/jquery.easing.1.335ed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/jquery.observe_field35ed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/jquery.validate35ed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/jquery35ed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/underscore35ed.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/index.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/modernizr.custom.17475.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.carouFredSel-6.0.4-packed.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.selectBox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.tooltipster.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/cart/custom.js"></script>

</head>

<br>
<br>
<br>
<br>
<br>
<!-- PRODUCT-OFFER -->

<div class="product_wrap" style="margin-top: 18px;">
  <div class="container">
    <div class="row">
      <div class="span12">
         <h5 class="receipt">Receipt</h5>
        <div id="check-accordion" style="margin-top: 18px;">
          
         
         
		 <div class="clearfix">
            <div class="billing">
              <div class="panel-body">
				 <center><h5><b>Thanks for Registering</b><h5> You are signed up for the summer 2016 Men's Flex Singles League at the 3.0 skill level</center>	
				  <div class="col-lg-12">
				  
				  
				  <div class="col-lg-6">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62535150.894997716!2d-153.88062963675134!3d16.933049436427556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25fd937d0be03%3A0xb0118df7792c6346!2sUSTA+Billie+Jean+King+National+Tennis+Center!5e0!3m2!1sen!2sin!4v1471610902956" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div> 
            
            <div class=" payment">
         
            <div class="col-lg-6">
            <h6>Choose Your Facility</h6>
             <h6>YOU PREVIOUSLY PLAYED AT</h6>
             
             <h6>YNEWPORT BEACH & TENNIS CLUB</h6>
             <!--<input type="submit" value="Use It Again" class="red-button1">-->
             <fieldset>
                <label>Facility Name :</label>
                <input type="text" name="court_name" id="facilities" />
                <ul id="finalResult"></ul>              
             </fieldset>
			 
             <!-- <button class="red-button1" onclick = "get_facilities()" > show all facilities </button>-->
			  
			  <div id="all_faci" ></div>
			  
               <!--<a href="#" style="padding-left: 20px; color: #0f6cb6; font-size: 14px; font-weight: bold; line-height: 77px;">Need help? Contact us</a>-->
             </div>
			 <div class="col-lg-6 ss">
     			 
			<h2>Important dates </h2>
           <ul>
			<li><img src ="<?php echo base_url(); ?>custom/cssnew/images/date1.png ">Schedule posted</li>
			<li><img src ="<?php echo base_url(); ?>custom/cssnew/images/date1.png ">League play begins</li>
			<li><img src ="<?php echo base_url(); ?>custom/cssnew/images/date1.png ">Playoffs begin</li>
		   </ul>		   
          </div>
            
            </div>            
            </div>
          
		   	   
     <!-- <form action="#" method="post">
          <input type="checkbox" name="check_list[]" value="I won the Match By Default"><label>I won the Match By Default</label><br/>
          <input type="checkbox" name="check_list[]" value="The Match was Started But not Completed"><label>The Match was Started But not Completed</label><br/>
          <input type="checkbox" name="check_list[]" value="I Played a Sub or used a sub"><label>I Played a Sub or used a sub</label><br/>
      </form>
     <input  class="btn btn-primary"  type="submit"   value="Submit Score" >  -->		
</form>	 
              </div>
              </div>
					           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- PRODUCT-OFFER -->		
		
    </div>
	
	<?php
	
	$this->load->view("Includes/leagueregister/header.php");
	$this->load->view("Includes/leagueregister/footer.php");
	
    ?> 
	
<script>
	 //for get facilities
	 function get_facilities()
	 {
        var base_url = "http://localhost:8085/S2tennisuser/player/get_facilities";
		var inpu_val = $("#facilities").val();
		//alert(inpu_val);
		$.ajax(
		{
		 type: "POST",
		 url: base_url,
		 data:{facility:inpu_val},
		 success: function(data) { 
			//console.log(data);
			$("#all_faci").html(data);
		 } 
		});	 	 
	 }
	
    function customizeIconDisplay() {
        function setCardFoldType() {
            $(".folded-card-holder>img.img-responsive.main-image").each(function (i, el) {
                var $el = $(el);
                var imgSrc = $el.prop("src");
                var inImgSrc = imgSrc.replace(/front_large_icon/i, "inside_icon");
                var inImg = new Image();
                inImg.onload = function () {
                    if (inImg.height > inImg.width) {
                        $el.parent().addClass("hfold");
                    }
                }
                inImg.src = inImgSrc;
            });
        }
		function setCardZoom() {
			$(".product").each(function(i,el) {
				var $el = $(el);
				var elSize = $el.attr("cardsize");
				var dims = elSize.split("x");
				var dim1 = parseFloat(dims[0]), dim2 = parseFloat(dims[1]);  
				var BASE_DIM = 7.5;
				if (dim1 != BASE_DIM && dim2 != BASE_DIM) {
					var largerDim = (dim1 > dim2) ? dim1 :dim2;
					$el.find(".card-holder").css("transform", "scale("+ largerDim/BASE_DIM +")")
				}
			});
		}
		
        setCardFoldType();
        setCardZoom();
    }
    
    function loadProducts(filterUrl, datastring) {
        $("#productsList").load(filterUrl, datastring, function (responseText, statusText, xhr) {
            $("#productsList").data("jscroll", null);
            if (responseText.search("No Results Found") < 0) {
                $("#productsList").jscroll({
                    loadingHtml: '<img src="/assets/images/icons/bx_loader.gif"  style="text-align: center;" alt="Loading" /> Loading...',
                    padding: 20,
                    callback: customizeIconDisplay
                });
            }
            customizeIconDisplay();
        });
    };
    
    function loadFilterFacets(facetfilterUrl, datastring)
    {
    	
    	$.ajax({
            url: facetfilterUrl,
            type: "POST",
            data: datastring,
            dataType : 'json',
            success: processFacetFilterResponse,
            error: function (jqXHR, textStatus, errorThrown) {
                //alert("Unable to Filter facets");
            }
        });
    	
    }
    
    function updateCheckBoxes(selectedBoxes, type) {

        var field = document.filterselected[type];
        var tempType = type ;
     	
     	if(type==="categories")
     		{
     		tempType = "type";
     		
     		}
     	
     	else if(type === "productColors")
     		{
     		tempType = "color";
     		}
     	
        if (typeof field == "undefined") {        	         	
         	$("#"+tempType).parents("li").hide();        	
         	return;
            
        }
        var checkBoxes = {};
        if (typeof selectedBoxes != "undefined") { //Spliting the available options 
            checkBoxes = getCheckBoxes(selectedBoxes);//.split(',');
        }
        
        var disableBox = window.location.href.indexOf("filter")>0?true:false;
        
        if(!disableBox){
        	
        	 if(checkBoxes.length == undefined || checkBoxes.length==1||checkBoxes.length==0)//If only one checkbox is available ..dont show it at all.
         	{
         	
         	$(field[0]).parents(".card-filters").hide();         	
         	$("#"+tempType).parents("li").addClass('hide');
         	return;       	
         	} 
        	
        }    
         
        for (i = 0; i < field.length; i++) {
        	
        	if(type==="photo")
        		{
        		
        			if(field[i].value === "3+")
        				{
        				
        				if(findValueGreaterPresent(checkBoxes,3))
        					{
        					field[i].disabled = false;
                			field[i].parentNode.disabled = false;
                			$(field[i].parentNode).removeClass("disabled"); 
        					}
        				
        				else
        					{
        					if(disableBox) //On applying Filters
        						{
        						field[i].parentNode.disabled = true;
        						if(field[i].checked)
        							{
        							field[i].checked = false;
        							}
        						
                            	field[i].disabled = true;
                            	$(field[i].parentNode).addClass("disabled");
        						}
        					
        					else //Hide the Boxes Happens on Page Load
        						{
        						field[i].parentNode.disabled = true;
                            	$(field[i]).hide();
                            	$(field[i].parentNode.parentNode).hide();
        						}
        					
        					
        					}
        				
        				}
        			else
        				{
        				
	       				if ($.inArray(field[i].value, checkBoxes) != -1)
	       					{
	       					field[i].disabled = false;
	               			field[i].parentNode.disabled = false;
	               			$(field[i].parentNode).removeClass("disabled");             
                      		 }
                       else {                    		
	                        	if(disableBox) //On applying Filters
	    						{
	    						field[i].parentNode.disabled = true;
	    						if(field[i].checked)
    							{
    							field[i].checked = false;
    							}
	                        	field[i].disabled = true;
	                        	$(field[i].parentNode).addClass("disabled");
	    						}
    					
	    					else //Hide the Boxes Happens on Page Load
	    						{
	    						field[i].parentNode.disabled = true;
	    						$(field[i]).hide();
	    						$(field[i].parentNode.parentNode).hide();
	    						}
                        	
                   		 	}
        				
        				}
        		
        		}
        	
        	else
        		{
        		
        		if ($.inArray(field[i].value, checkBoxes) != -1)
        			{
        			
        			//field[i].disabled = false;
        			field[i].parentNode.disabled = false;
        			$(field[i].parentNode).removeClass("disabled");
        			if(!field[i].disabled && type==="productColors")
    					{
    					field[i].disabled = false;
    					} else {
    						if (type!="productColors") {
    							field[i].disabled = false;
    						}
    					}
                	}
                else 
               		 {			
		               	if(disableBox) //On applying Filters
						{
						field[i].parentNode.disabled = true;
						if(field[i].checked)
						{
						field[i].checked = false;
						}
		               	field[i].disabled = true;
		               	$(field[i].parentNode).addClass("disabled");
						}
			
					else //Hide the Boxes Happens on Page Load
						{
						field[i].parentNode.disabled = true;
						$(field[i]).hide();
						if( type!=="productColors")
							{
							$(field[i].parentNode.parentNode).hide();
							}
						else
							{
							$(field[i].parentNode).hide();
							}
	                	
						}    			
    				}
        		
        		}          

        }
    }
    
    function getCheckBoxes(selectedBoxes) {
    	var valueArray = [];
    	if (selectedBoxes && selectedBoxes.length > 0) {
    		for (var i = 0; i < selectedBoxes.length; i++) {
    			valueArray[i] = selectedBoxes[i].value;
    		}
    	}
    	return valueArray;
    }
    
   /*  function disabledField(field)
    {
    	field.parentNode.disabled = true;
    	field.disabled = true;
    	$(field.parentNode).addClass("disabled");
    	
    }
    
    
    function enableField(field)
    {
    	field.disabled = false;
    	field.parentNode.disabled = false;
		$(field.parentNode).removeClass("disabled");
    	
    } */
    
    
    function findValueGreaterPresent(array,value)
    {
    	var present = false;
    	
    	for(var i=0; i < array.length; i++){
    		
    		if(parseInt(array[i])!=NaN && parseInt(array[i])>=value)
    			{
    			present = true;
    			return present;
    			}
    		
    		
    	}
    	
    	return present ;
    	
    }
    
    
    
	function processFacetFilterResponse(data) {
		if (typeof data != "undefined") {
			updateCheckBoxes(data.format,"format");				
			updateCheckBoxes(data.category_id, "categories");
			updateCheckBoxes(data.size, "size");
			updateCheckBoxes(data.photo, "photo");
			updateCheckBoxes(data.color_category, "productColors");
			updateCheckBoxes(data.price, "price");
			updateCheckBoxes(data.print_type, "print");
		}		
		
    }    
    
    function parseParameterValues() {

        var a = window.location.search.substr(1).split('&');
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i) {
            var p = a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " ")) + ((typeof b[p[0]] == "undefined") ? "" : ',' + b[p[0]]);
        }
        
        return b;

    }
    
    function enableCheckBoxes(selectedBoxes, type) {

        var field = document.filterselected[type];
        if (typeof field == "undefined") {
            return;
        }
        var checkBoxes = {};
        if (typeof selectedBoxes != "undefined") {
            checkBoxes = selectedBoxes.split(',');
        }
        for (i = 0; i < field.length; i++) {
            if ($.inArray(field[i].value, checkBoxes) != -1) {
                field[i].checked = true;
                toggleFilterSection(field[i]);
            }
            else {
                field[i].checked = false;
                toggleFilterSection(field[i]);
            }

        }
    }
    
    function enableColorPallets(selectedColors, type) {

        var field = document.filterselected[type];
        if (typeof field == "undefined") {
            return;
        }
        var selectedFields = {};
        if (typeof selectedColors != "undefined") {
        	selectedFields = selectedColors.split(',');
        }
        for (i = 0; i < field.length; i++) {
        	var anchorTag = $(field[i]).siblings('a');
            if ($.inArray(field[i].value, selectedFields) != -1) {
            	$(anchorTag).addClass('active');
                field[i].disabled = false;
            } else {
            	$(anchorTag).removeClass('active');
                field[i].disabled = true;
            }
            toggleFilterSection(anchorTag);
        }
    }
    
    function enableAllCheckBoxes() {
        var b = parseParameterValues();
        if (typeof b == 'undefined' || b.length == 0 || b == [])
            return;
        enableCheckBoxes(b["format"], "format");
        enableCheckBoxes(b["categories"], "categories");
        enableCheckBoxes(b["size"], "size");
        enableCheckBoxes(b["photo"], "photo");
        enableCheckBoxes(b["price"], "price");
        enableCheckBoxes(b["print"], "print");
        enableCheckBoxes(b["productColors"], "productColors");
		enableColorPallets(b["productColors"], "productColors");
    }
    ;

    $(document).ready(function () {
    	
        datastring = 'parentCategoryId=21';
        filterUrl = '../api/filter/products.html';
        facetfilterUrl = '../api/filter/facetFilter.html';
        pageLoaded = true;
        if (sessionStorage.getItem("FilterSelected") && window.location.pathname.indexOf("filter") < 1) {
    	    sessionStorage.removeItem("FilterSelected");
        }
        loadProducts(filterUrl, datastring);
        loadFilterFacets(facetfilterUrl, datastring);
        try {
            enableAllCheckBoxes();
        	bindColorPalletsEvent();        	
        } catch(e) {
        	
        }

        $('.card-filters input:checkbox, .card-filters #colorPallets a').click(function (e) {
        	if ($(e.currentTarget).is('a')) {
        		if ($(e.currentTarget).parent().hasClass('disabled')){
        			return;	
        		}
        	}
        	toggleFilterSection(e.currentTarget);
            filterProducts();            
        });
        
        $(window).on("popstate", function (e) {
        	var pathName = window.location.pathname;
    		var data = datastring;
        	if (pathName.indexOf("filter") > 0) {
        		pageLoaded = false;
	            if (e.originalEvent.state != null) {
	            	data = e.originalEvent.state;
	            }
	        	sessionStorage.setItem("FilterSelected", "True");
	            loadProducts(filterUrl, data);
                enableAllCheckBoxes();
                loadFilterFacets(facetfilterUrl, data);
        	} else {
        		if (!e.originalEvent.state && !pageLoaded) {
        			window.location.reload(true);
        		}
        	}
        });
        

        $("#productsList").on("mouseover", ".product-card-colors li", function () {
            var filename = "fr_file_0_0_" + $(this).index() + "_0.png";
            var $thumbContainer = $(this).parents(".productarea").find(".product-img");
            var $cardColor= $(this).find('a').css('background-color');
            var $prodThumb = $thumbContainer.find("a img.img-responsive");
            if ($prodThumb.length > 1) {
                $prodThumb = $prodThumb.filter(".main-image");
            }
            var filepath = $prodThumb.attr("src");
            filepath = filepath.substring(0, filepath.lastIndexOf("../index.html"));
            function getImgURL(filepath, filename) {
                return filepath + "/LargeIcon_" + filename;
            }

            var imgUrl = getImgURL(filepath, filename);
            $prodThumb.attr("src", imgUrl);

        });

        //show hide card filters
//        if (window.innerWidth < 768) {
//            $('#cardFilters').collapse('hide');
//        }
    });
</script> 
<script type="text/javascript">
  //<![CDATA[
    var FHChat = {product_id: "389ece0332a2"};
    FHChat.properties={};FHChat.set=function(key,data){this.properties[key]=data};!function(){var a,b;return b=document.createElement("script"),a=document.getElementsByTagName("script")[0],b.src="https://chat-client-js.firehoseapp.com/chat-min.js",b.async=!0,a.parentNode.insertBefore(b,a)}();
  //]]>
</script>
</div>
</div>
</div>
<script type="text/javascript">
  //<![CDATA[
    var _gaq = [['_setAccount', 'UA-15350674-2'], ['_trackPageview']];
    (function(d, t) {
     var g = d.createElement(t),
         s = d.getElementsByTagName(t)[0];
     g.async = true;
     g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     s.parentNode.insertBefore(g, s);
    })(document, 'script');
  //]]>
</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script> 
<script>
        $('#pills-first a').hover(function (e) {
          e.preventDefault()
          $(this).tab('show')
       });
    </script> 
	<script type='text/javascript' src="<?php echo base_url(); ?>custom/cssnew/js/bootstrap.min.js"></script> 	
	<script type='text/javascript' src="<?php echo base_url(); ?>custom/cssnew/js/jquery.js"></script> 	
    <script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/uikit.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/SimpleCounter.js"></script> 	
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/grid.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/slider.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/slide a.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/accordion.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/slideset.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/sticky.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/components/lightbox.js"></script> 			
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/isotope.pkgd.min.js"></script> 	
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/main.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/vendor/modernizr.js"></script> 
<!--<script src="js/vendor/vendor.js"></script>--> 

<script type="text/javascript" src="<?php echo base_url(); ?>custom/cssnew/js/theme.js"></script> 

<script type="text/javascript">
    new SimpleCounter("countdown4", 1476154800, {
      'continue': 0,
      format: '{D} {H} {M} {S}',
      lang: {
          d: {
              single: 'day',
              plural: 'days'
          }, //days
          h: {
              single: 'hr',
              plural: 'hrs'
          }, //hours
          m: {
              single: 'min',
              plural: 'min'
          }, //minutes
          s: {
              single: 'sec',
              plural: 'sec'
          } //seconds
      },
      formats: {
          full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:'>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
          shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
      }
  });
</script> 
<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script> 

<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
<script>
 $(document).ready(function(){
   $("#search").keyup(function(){
  if($("#search").val().length>3){
  $.ajax({
   type: "post",
   url: "http://localhost/S2tennisuser:8085/player/leagregister",
   cache: false,    
   data:'search='+$("#search").val(),
   success: function(response){
    $('#finalResult').html("");
    var obj = JSON.parse(response);
    if(obj.length>0){
     try{
      var items=[];  
      $.each(obj, function(i,val){           
        <!--  items.push($('<li/>').text(val.FIRST_NAME + " " + val.LAST_NAME)); -->
      }); 
      $('#finalResult').append.apply($('#finalResult'), items);
     }catch(e) {  
      alert('Exception while request..');
     }  
    }else{
     $('#finalResult').html($('<li/>').text("No Data Found"));  
    }  
    
   },
   error: function(){      
    alert('Error while request..');
   }
  });
  }
  return false;
   });
 });
</script>








<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/index.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery-1.9.1.min.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery-ui.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.cycle.all.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/modernizr.custom.17475.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.elastislide.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.carouFredSel-6.0.4-packed.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.selectBox.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.tooltipster.min.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/jquery.prettyPhoto.js"></script> 
<script src="<?php echo base_url(); ?>custom/cssnew/js/cart/cart/custom.js"></script>
<style type="text/css">
.receipt{
	text-align: center;
    font-size: 25px;
}
</style>


</body>
</html>