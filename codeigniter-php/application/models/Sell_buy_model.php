<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell_buy_model extends CI_Model {
	
	
	public function user_signup($data){
											
							if(isset($data['id']) && $data['id'] !='')
								{
									$upd_id=$data['id'];
									unset($data['id']);
									
									$this->db->where('id',$upd_id);
									if($this->db->update('login',$data)){
										$res = "Updated";
									}
								}else
								{
									//echo "<pre>";print_r($table);die;
									$uid=$this->create_guid->new_id();
									$data['id']=$uid;
									      
									if($this->db->insert('login',$data)){
										$res = "Inserted";
									}else {
										$res = "Fail";
									}
								
								}
								return $res;
						}
									
									
	public function user_login($data)
							{
								$mobile= $data['mobile'];
								$pswrd= $data['pswrd'];
							
								 $sql="SELECT * from login where mobile like '$mobile' and pswrd ='$pswrd' ";
								$query=$this->db->query($sql);
								
								if($query->num_rows()==1)
								{
									return $query->row();
								}else {
									return 0;
								}
								
							}

	public function update_profile($data)
									{
											
										
										$upd_id=$data['id'];
										unset($data['id']);
										
										$this->db->where('id',$upd_id);
										if($this->db->update('login',$data)){
											$res = "Updated";
										}
										return $res;
									}

						
																									
	public function add_product($data){
											$data['date_updated']=date('Y-m-d H:i:s');
										if(isset($data['id']) && $data['id'] !='')
											{
												$upd_id=$data['id'];
												unset($data['id']);
												
												$this->db->where('id',$upd_id);
												if($this->db->update('add_products',$data)){
													$res = $data;
												}
											}else
											{
												$uid=$this->create_guid->new_id();
														$data['id']=$uid;
														
															  
														if($this->db->insert('add_products',$data)){
															$res = $data;
															
														}else {
															$res = "Fail";
														}
											
											}
										return $res;
									  }					
	public function get_products_list($data)
										{

										$user_id = $data['user_id'];
										//print_r($user_id);die;
										//$final3 = array();
                                        //$final3=$this->bid_products_list($data);

										if($user_id != ''){
											$sql = "select * from add_products where user_id like '$user_id'";
										}else{
											$sql = "select * from add_products ";
										}
											
											$query=$this->db->query($sql);
											$result  =  $query->result_array();
											//echo "<pre>";print_r(count($result));die;
											$final =array();
											foreach($result as $res){
												$get_bid_status = $this->get_bid_status($res['id'],$res['user_id']);
												$get_mobile= $this->get_mobile($res['user_id']);
												$get_bid_winner= $this->get_bid_winner($res['id']);
												
												$get_winner= $this->get_mobile($get_bid_winner['user_id']);
												$bidding_persons[]=$this->bidding_persons($res['id']);
												//echo "<pre>";print_r($get_bid_winner);
												//$res['bid_name'] = $bidding_persons['name'];
												//$res['bid_amount'] = $bidding_persons['bid_amount'];
												$final2=array();
												foreach($bidding_persons as $bid){
													$sss = $bid;
													$final2[]= $sss;
												}
												
												$res['bid_statusb'] = $get_bid_status['bid_status'];
												
												$res['mobile'] = $get_mobile['mobile'];
												$res['winner_name'] = $get_winner['name'];
												$res['winner_mobile'] = $get_winner['mobile'];
												$res['winner_bid_amount'] = $get_bid_winner['bid_amount'];
												$row_data = $res;
												$final[]=$row_data;
											}
											//echo "<pre>";print_r($final2);die;

											 return array("products"=>$final,"bid_persons"=>$final2);
										}
			public function bid_products_list($data){
				$user_id = $data['user_id'];
				$t=$this->get_products_list($date);
			 $sql = "select * from bid_products where  user_id like '$user_id'";
				$query=$this->db->query($sql);
				$result = $query->result_array();
				
				$final_names=array();
				
					foreach($result as $bid){
						$sss = $bid;
						$product_user_id = $this->product_user_id($bid['product_id']);
						//$get_mobile = $this->get_mobile($product_user_id['user_id']);
						$get_mobile = $this->get_mobile($product_user_id['user_id']);
						$sss['product_image1'] = $product_user_id['item_image1'];
						$sss['product_image2'] = $product_user_id['item_image2'];
						$sss['product_image3'] = $product_user_id['item_image3'];
						
						$sss['product_name'] = $product_user_id['title'];
						$sss['name'] = $get_mobile['name'];
						$sss['product_mobile'] = $get_mobile['mobile'];
						$final_names[]= $sss;
						
					}
					 return  array("promise"=>$t,"break"=>$final_names);
					
					
					//echo "<pre>";print_r($final_names);die;

			} 
			function get_bid_status($product_id,$user_id){

			//	$sql = "select * from bid_products where user_id like '$user_id' and product_id like '$product_id'";
				$sql= "select * from bid_products where product_id like '$product_id' and bid_status= 'winner';";
				$query=$this->db->query($sql);
				return $query->row_array();

			}
			function product_user_id($product_id){

				$sql = "select * from add_products where id like '$product_id'";
				$query=$this->db->query($sql);
				return $query->row_array();

			} 
			function get_bid_winner($product_id){

				$sql = "select * from bid_products where bid_status='winner' and product_id like '$product_id'";
				$query=$this->db->query($sql);
				return $query->row_array();

			}
			function get_mobile($user_id){

				$sql = "select * from login where id like '$user_id'";
				$query=$this->db->query($sql);
				return $query->row_array();

			} 
			function bidding_persons($product_id){

			 	$sql = "select * from bid_products where product_id like '$product_id'";
				$query=$this->db->query($sql);
				$result =  $query->result_array();
				//echo "<pre>";print_r($result);
				$final =array();
				foreach($result as $res){ //echo "<pre>";print_r($res);
					$id = $res['user_id'];
					//echo "<pre>";print_r($res['user_id']);
				 $sql1 = "select name from login where id like '$id' ";
					$query=$this->db->query($sql1);
					$result1 =$query->row_array();
					//echo "<pre>";print_r($result1);
					$res['name'] = $result1['name'];
					
					$ss = $res;
					$final[]=$ss;
				}
				//echo "<pre>";print_r($final);die;
				return $final;

			}


	public function bidding_products($data){
							$p_id = $data['product_id'];
							$u_id = $data['user_id'];
							$sql = "select count(*) as count from bid_products where product_id like '$p_id' and user_id like '$u_id'";
							$query=$this->db->query($sql);
							$result  =  $query->row_array();
							//print_r($result);die;
							//$this->db->where('product_id',$p_id);
							//$this->db->select_max('bid_amount', 'time');
                          //$result = $this->db->get('students');  
                         //echo $result->row()->time;
							//
							$data['date_created'] = date("y-m-d H:i:s");	
							$data['bid_status'] = 'active';	
							$bid_amont = $data['bid_amount'];	
							if($result['count'] != 0)
								{
									$product_id=$data['product_id'];
									$user_id=$data['user_id'];
									//unset($data['product_id']);
									//unset($data['user_id']);
									
									$this->db->where('product_id',$product_id);
									$this->db->where('user_id',$user_id);
									if($this->db->update('bid_products',$data)){
										$res = $data;
										$bid_update = "update add_products set min_bid='$bid_amont' where id like '$product_id'";
										$query=$this->db->query($bid_update);
									}
								}else
								{
									//echo "<pre>";print_r($table);die;
									//$uid=$this->create_guid->new_id();
									//$data['id']=$uid;
									      
									if($this->db->insert('bid_products',$data)){
										$res = $data;
										$bid_update = "update add_products set min_bid='$bid_amont' where id like '$product_id'";
										$query=$this->db->query($bid_update);

									}else {
										$res = "Fail";
									}
								
								}
								
								return $res;
						}
	public function bidding_products_buy($data)
									{
											$product_id=$data['product_id'];
										$user_id = $data['user_id'];
										$sql = "update add_products set bid_status = 'sold' where id like '$product_id';";
											$queryy=$this->db->query($sql);
											//$this->complete_bidding($data);
											
                                        $this->direct_winner($data);
                                        $this->set_loser($data);


                                        $this->send_cmail($data);
                                        // $this->cancel_bidding($data);
                                       //  $this->send_email($data);
                                       //  $this->send_gmail($data);



                                         $sqli= "select * from add_products where id like '$product_id';";
                                         $query=$this->db->query($sqli);
                                          $row = $query->row_array();
                                          $named =$row['title'];
                                          $pdes =$row['description'];
                                          $pcat =$row['department'];
                                          $price =$row['price'];
                                          $id=$row['id'];


                                   $get_login = $this->get_mobile($user_id);
        $name= $get_login['name'];
		$email = $get_login['email'];

	    $msg = "Congratulations $name you have succesfully purchased  $named:\n from Auto Auction.\nInvoice:\nProduct name:$named\nDescription:$pdes\nCategory:$pcat\nPrice:$price\nThanks";

        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);  
        
        $this->update_checker($data);

										return "1";
									}
							



public function direct_winner($data)
									{
										
										


							$p_id = $data['product_id'];
							$u_id = $data['user_id'];
							$sql = "select count(*) as count from bid_products where product_id like '$p_id' and user_id like '$u_id'";
							$query=$this->db->query($sql);
							$result  =  $query->row_array();
							//print_r($result);die;
							//$this->db->where('product_id',$p_id);
							//$this->db->select_max('bid_amount', 'time');
                          //$result = $this->db->get('students');  
                         //echo $result->row()->time;
							//
							$data['date_created'] = date("y-m-d H:i:s");	
							$data['bid_status'] = 'winner';	
							$data['checker'] = 'checked';
						//	$bid_amont = $this->bid_price($data);
							$bidamount=$this->product_user_id($p_id);
							$bid_amont= $bidamount['price'];
							$data['bid_amount']= $bid_amont;
							if($result['count'] != 0)
								{
									$product_id=$data['product_id'];
									$user_id=$data['user_id'];
								    //unset($data['product_id']);
									//unset($data['user_id']);
									
									$this->db->where('product_id',$product_id);
									$this->db->where('user_id',$user_id);
									$this->db->update('bid_products',$data);
										
								}else
								{
									
									      
									$this->db->insert('bid_products',$data);
										
								
								}
								
								return "success";

										}








							
										
										
									
public function declare_winner($data)
									{

									$product_id=$data;
                                   
                                   // unset($data['product_id']);
                                    $sql= "SELECT user_id, product_id FROM bid_products WHERE product_id like '$product_id' ORDER BY bid_amount DESC;";
                                
                                 
                                 $query=$this->db->query($sql);
				                $result =  $query->result_array();

                                  foreach($result as $res){



								$this->set_winner($res);
								$this->set_loser($res);
							//$email=  $this->get_mobile($res['user_id']);

								$this->send_email($res);
								 $this->send_gmail($res);
											
											break;														
										}
									}
									

public function set_winner($data)
									{
										$product_id=$data['product_id'];
										$user_id = $data['user_id'];

										$date = date("y-m-d H:i:s");
									


                                         $this->db->set('bid_status', 'winner');
                                         $this->db->set('date_created', $date);
                                         $this->db->where('product_id', $product_id);
                                         $this->db->where('user_id', $user_id);
                                         $this->db->update('bid_products');
                                        // $this->send_email($data);
								 
										
										return "success";

                                        }
public function set_loser($data)
									{
										$product_id=$data['product_id'];
										
                                            $date = date("y-m-d H:i:s");
											$sql = "update bid_products set bid_status = 'loser',date_created = '$date' where product_id like '$product_id' and bid_status != 'winner';";
											$query=$this->db->query($sql);
										  //    $this->send_gmail($data);

										return "success";

                                        }




public function complete_bidding($data)
									{
									$product_id=$data['product_id'];
									unset($data['user_id']);
									unset($data['product_id']);

								$compltd = "update add_products set bid_status = 'completed' where id like '$product_id' 
								and bid_status!= 'sold'; ";
                                $query11=$this->db->query($compltd);


								$this->declare_winner($product_id);
								
	
											$result=1;
								
										
										return $result;
									}



	public function cancel_bidding_products($data){

		                           $product_id=$data['product_id'];
		
																	$date = date("y-m-d H:i:s");
											$sqlii = "update bid_products set bid_status = 'cancelled',date_created = '$date' where product_id like '$product_id' and bid_status != 'winner'";
											$this->db->query($sqlii);
											$sqlid = "update add_products set bid_status = 'completed' where id like '$product_id'";
											$this->db->query($sqlid);


											
                                          $sql = "select * from bid_products where bid_status = 'cancelled' and  product_id like '$product_id' ";
		                          $query=$this->db->query($sql);
		                          $result =  $query->result_array();

                                  foreach($result as $res){
        
        
        $resu= $res['user_id']; 
        $resp= $res['product_id']; 
       // $data['user_id'] =$ress;
        $sqli="select * from bid_products where user_id like '$resu' and product_id like '$resp' ";
        $queryy=$this->db->query($sqli);
         $row = $queryy->row_array();

                  if($row['checker']== 'unchecked')   {

                                        $this->update_checker($res);

        $get_login = $this->get_mobile($resu);
       
		$email = $get_login['email'];
		$name= $get_login['name'];

		$sqlm="select * from add_products where id like '$resp' ";
        $querym=$this->db->query($sqlm);
         $roc = $querym->row_array();

          $product_name=$roc['title'];


	    $msg = " $name Auction is cancelled for product $product_name:\n from Auto Auction.\nThanks for part of AutoAuction";

        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);
							
	}
}
return "success";
}


	public function delete_products($data){
		
									
									$this->db->where('id',$data['id']);
									//$this->db->where('id',$data['id']);
									if($this->db->delete('add_products')){
										$res = "deleted";
									}
									return $res;
	}	



		public function send_mail($data){
		$email = $data['email'];
		
        $msg = "Confirmation email from Auto Auction.\nThanks for part of AutoAuction.\nyour post is succesfully posted";
        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);
        $res="sended";
		return $res;
	}


		public function send_cmail($data){


						$product_id=$data['product_id'];
		                $user_id = $data['user_id'];
							$sql = "select * from bid_products where product_id like '$product_id' and bid_status != 'winner' ";
							$query=$this->db->query($sql);
							$result  =  $query->row_array();


							foreach($result as $res){
							


        
               

		$sqli= "select * from add_products where id like '$product_id';";
                                         $queryy=$this->db->query($sqli);
                                          $roww = $queryy->row_array();
                                          $named =$roww['title'];
                                      
                                          $price =$roww['price'];
                                         
$user= $res['user_id'];

        $get_login = $this->get_mobile($user);
        $name= $get_login['name'];
		$email = $get_login['email'];
		
        $msg = "Hello $name.Sorry! $named product  was already purchased for $price.  email from Auto Auction.\nThanks for part of AutoAuction.";
        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);
         $this->update_checker($data);
        

}
	}



	public function send_email($data){
		$product_id=$data['product_id'];
		$user_id = $data['user_id'];
               

        $sql="select checker from bid_products where user_id like '$user_id' and product_id like '$product_id'; ";
        $query=$this->db->query($sql);

          $row = $query->row_array();

        if($row['checker']== 'unchecked'){
       // if(empty($query['checker'])){

        $this->update_checker($data);

                                         $sqli= "select * from add_products where id like '$product_id';";
                                         $queryy=$this->db->query($sqli);
                                          $roww = $queryy->row_array();
                                          $named =$roww['title'];
                                          $pdes =$roww['description'];
                                          $pcat =$roww['department'];
                                          $price =$roww['min_bid'];
                                        //  $id=$roww['id'];


        $get_login = $this->get_mobile($user_id);
        $name= $get_login['name'];
		$email = $get_login['email'];

	    $msg = "Congratulations $name you have succesfully purchased   $named:\n from Auto Auction.\nInvoice:\nProduct name:$named\nDescription:$pdes\nCategory:$pcat\nPrice:$price\nThanks for choosing AutoAuction.";

        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);
        
        /*$get_login = $this->get_mobile($user_id);

		$email = $get_login['email'];

	    $msg = "Congratulations you are the winner:\n from Auto Auction.\nThanks for part of AutoAuction.";
        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);*/
    }
       // $res="sended";
		return "success";
	
}


		public function update_checker($data){

                                            $product_id=$data['product_id'];
										    $user_id = $data['user_id'];
                                           
											$sql = "update bid_products set checker = 'checked' where product_id like '$product_id' and user_id like '$user_id';";
											 $query=$this->db->query($sql);
										     

										     return "success";

	                                        }


	public function send_gmail($data) {





                                   $product_id=$data['product_id'];
		                           unset($data['user_id']);

		                           

		                          $sql = "select * from bid_products where bid_status = 'loser' and  product_id like '$product_id' ";
		                          $query=$this->db->query($sql);
		                          $result =  $query->result_array();

                                  foreach($result as $res){
        
        
        $resu= $res['user_id']; 
        $resp= $res['product_id']; 
       // $data['user_id'] =$ress;
        $sqli="select * from bid_products where user_id like '$resu' and product_id like '$resp' ";
        $queryy=$this->db->query($sqli);
         $row = $queryy->row_array();

                  if($row['checker']== 'unchecked')   {

                                        $this->update_checker($res);

/*
                                         $sqlm= "select * from add_products where id like '$product_id';";
                                         $queryd=$this->db->query($sqlm);
                                          $roww = $queryd->roww_array();
                                          $named =$roww['title'];
                                          
*/

        $get_login = $this->get_mobile($resu);
       
		$email = $get_login['email'];
		$name= $get_login['name'];

	    $msg = "sorry $name you are not a winner this time:\n from Auto Auction.\nThanks for part of AutoAuction";

        
        $msg = wordwrap($msg,70);

        mail($email,"AutoAuction",$msg);

        
                                    /*    $get_login = $this->get_mobile($res);
                               

		                                 $email = $get_login['email'];
	                                     $msg = "Unfortunately you are not winner: from Auto Auction.\nThanks for part of AutoAuction.";
        
                                         $msg = wordwrap($msg,70);

                                         mail($email,"AutoAuction",$msg);  */





	                             }
       

                                                            	}
        
		return "success";
}

	public function add_comment($data){
		
	$comment= $data['comment'];
	$sql="insert into add_comments(comment) values ('$comment');";
		
	           $query=$this->db->query($sql);
				
														
        $res="success";
		return $res;
	
	}




   
}

?>