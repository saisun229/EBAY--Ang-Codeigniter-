<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Sell_buy extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	  public function __construct()
	{
		
		parent::__construct();
		 $this->load->model('Sell_buy_model');
		 //$this->load->model('player_model'); 
		 date_default_timezone_set('Asia/Kolkata');
	}
	
	////sign up ///
	public function signup_post()
	{

		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
		
            // echo "<pre>";print_r($data);die;
		$user_signup = $this->Sell_buy_model->user_signup($data);
		//echo "<pre>";print_r($user_login);die;

		if($user_signup == 'Inserted' )
		   {					
				$this->response(array('Status'=>true,'Response'=>'Successfully Created User',"code" => 0)); 		
			  
		   }
		  else 
		  {
			  
			    $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 1));     
		  }
		
	}
	
	///// login ///////
	public function signin_post()
	{

		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
		
             //echo "<pre>";print_r($data);die;
		$user_login = $this->Sell_buy_model->user_login($data);
		//echo "<pre>";print_r($user_login);die;
			
		if($user_login == 0 )
		   {					
				$this->response(array('Status'=>false,'Response'=>'Invalid Credentials',"code" => 0)); 		
			  
		   }
		  else 
		  {
			  
			    $this->response(array('Status'=>true,'Response'=>$user_login,"code" => 1));     
		  }
		
	}

	////// Change Password //////

	public function update_profile_post()
	{

		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
		//echo "<pre>";print_r($data);die;
		$update_profile = $this->Sell_buy_model->update_profile($data);

		//echo "<pre>";print_r($update_passwrd);

		if($update_profile == 'Updated' )
		   {					
				$this->response(array('Status'=>true,'Response'=>'Updated Successfully',"code" => 1));				 		
			  
		   }
		  else 
		  {
			  $this->response(array('Status'=>false,'Response'=>'Please Check The Network Coneection',"code" => 0));
			         
		  }


	}

	/////// Add Products ////////

	public function add_product_post()
	{

		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
		//image1//
		/*$dataURL = $data['item_image1'];
		$dataURL = str_replace('data:image/png;base64,', '', $dataURL);
	    $dataURL = str_replace(' ', '+', $dataURL);
	    $image = base64_decode($dataURL);
	    $filename = date("d-m-Y-h-i-s") . '.' . 'png';
	    $path = set_realpath('uploads/product/');
    	file_put_contents($path. $filename, $image);
    	$data['item_image1'] = $filename;
    	///image2
    	$dataURL2 = $data['item_image2'];
		$dataURL2 = str_replace('data:image/png;base64,', '', $dataURL2);
	    $dataURL2 = str_replace(' ', '+', $dataURL2);
	    $image2 = base64_decode($dataURL2);
	    $filename2 = date("d-m-Y-h-i-s") . '.' . 'png';
	    $path2 = set_realpath('uploads/product/');
    	file_put_contents($path2. $filename2, $image2);
    	$data['item_image2'] = $filename2;*/

    	//image1
    	if($data['item_image1'] != ''){
    	$image_name=date("d-m-Y-h-i-s").$data['title'].'-'.'1';
    	$image = $data['item_image1'];
		$path = "uploads/product/$image_name.png";

		 file_put_contents($path,base64_decode($image));
		}
		 //image2
		if($data['item_image2'] != ''){
		 $image_name2=date("d-m-Y-h-i-s").$data['title'].'-'.'2';
    	$image2 = $data['item_image2'];
		$path2 = "uploads/product/$image_name2.png";

		 file_put_contents($path2,base64_decode($image2));
		}

		 //image3\
		if($data['item_image3'] != ''){

		$image_name3=date("d-m-Y-h-i-s").$data['title'].'-'.'3';
    	$image3 = $data['item_image3'];
		$path3 = "uploads/product/$image_name3.png";

		 file_put_contents($path3,base64_decode($image3));
		}




		 unset($data['item_image1']);
		 unset($data['item_image2']);
		 unset($data['item_image3']);
				
		$data['item_image1']= $path;
		$data['item_image2']= $path2;
		$data['item_image3']= $path3;
		//	echo "<pre>";print_r($data);die;
		$add_product = $this->Sell_buy_model->add_product($data);

		//print_r($add_product);die;

		if($add_product == 'Fail' )
		   {					
			
			 $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));					 		
			  
		   }else 
		   {
			   $this->response(array('Status'=>true,'Response'=>$add_product,"code" => 1));
			         
		   }

		 
	}

	/////  Get Products list //////

	public function get_products_list_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
	//echo "<pre>";print_r($data);die;
		$get_products_list = $this->Sell_buy_model->get_products_list($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($get_products_list['products'][0]['id'] != '' )
		   {					
				$this->response(array('Status'=>true,'Response'=>$get_products_list,"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'No Data Available',"code" => 0));
			         
		   }
		
	}

	
/////  Bid Products //////

	public function bidding_products_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$bidding_products = $this->Sell_buy_model->bidding_products($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($bidding_products == 'Fail')
		   {					
				$this->response(array('Status'=>false,'Response'=>'Please try again',"code" => 0));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>true,'Response'=>$bidding_products,"code" => 0));
			         
		   }
		
	}
	
	
	/////  Bid Product Winner //////

	public function bidding_products_buy_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$bidding_products_buy = $this->Sell_buy_model->bidding_products_buy($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($bidding_products_buy != '0')
		   {					
				$this->response(array('Status'=>true,'Response'=>$bidding_products_winner,"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }
		
	}

	///// complete bidding winner
	public function complete_bidding_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$complete_bidding = $this->Sell_buy_model->complete_bidding($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($bidding_products_winner != '0')
		   {					
				$this->response(array('Status'=>true,'Response'=>'Bid Product Winner Declared',"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }
		
	}


		///// declare winner
	public function declare_winner_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$declare_winner = $this->Sell_buy_model->declare_winner($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($declare_winner != '0')
		   {					
				$this->response(array('Status'=>true,'Response'=>'Bid Product Winner Declared',"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }
		
	}
	
		/////  cancel Bid Product Winner //////

	public function cancel_bidding_products_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$cancel_bidding_products = $this->Sell_buy_model->cancel_bidding_products($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($cancel_bidding_products == 'deleted')
		   {					
				$this->response(array('Status'=>true,'Response'=>'Bid Product Cancelled',"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }
		
	}
	
		/////  delete  Product  //////

	public function delete_products_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$delete_products = $this->Sell_buy_model->delete_products($data);

		//echo "<pre>";print_r($barcode_history);die;
		if($delete_products == 'deleted')
		   {					
				$this->response(array('Status'=>true,'Response'=>'Product Deleted Successfully',"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }
		
	}
	
			/////  Bid  Products List  //////

	public function bid_products_list_post()
	{
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);

		$bid_products_list = $this->Sell_buy_model->bid_products_list($data);

		//echo "<pre>";print_r($barcode_history);die;
		if(count($bid_products_list) != '0')
		   {					
				$this->response(array('Status'=>true,'Response'=>$bid_products_list,"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'No Bidders Available',"code" => 0));
			         
		   }
		
	}


	


public function send_mail_post(){
$data = (array) json_decode(file_get_contents('php://input'), TRUE);
$send_mail = $this->Sell_buy_model->send_mail($data);
if($send_mail == 'sended')
		   {					
				$this->response(array('Status'=>true,'Response'=>'mail sended Successfully',"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }

}
public function add_comment_post(){
$data = (array) json_decode(file_get_contents('php://input'), TRUE);
$add_comment = $this->Sell_buy_model->add_comment($data);
if($add_comment == 'success')
		   {					
				$this->response(array('Status'=>true,'Response'=>'Message sent successfully!',"code" => 1));				 		
			  
		   }
		  else 
		   {
			   $this->response(array('Status'=>false,'Response'=>'Please Try Again',"code" => 0));
			         
		   }

}




}

?>