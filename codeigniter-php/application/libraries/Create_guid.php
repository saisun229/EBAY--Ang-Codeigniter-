<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Create_guid 
{
 	public function new_id(){
	
	$microTime = microtime();
	list($a_dec, $a_sec) = explode(" ", $microTime);

	$dec_hex = dechex($a_dec* 1000000);
	$sec_hex = dechex($a_sec);

	$this->ensure_length($dec_hex, 5);
	$this->ensure_length($sec_hex, 6);

	$guid = "";
	$guid .= $dec_hex;
	$guid .= $this->create_guid_section(3);
	$guid .= '-';
	$guid .= $this->create_guid_section(4);
	$guid .= '-';
	$guid .= $this->create_guid_section(4);
	$guid .= '-';
	$guid .= $this->create_guid_section(4);
	$guid .= '-';
	$guid .= $sec_hex;
	$guid .= $this->create_guid_section(6);

	return $guid;

	}
	
	public function create_guid_section($characters)
   {
	$return = "";
	for($i=0; $i<$characters; $i++)
	{
		$return .= dechex(mt_rand(0,15));
	}
	return $return;
	}
	
	public function ensure_length(&$string, $length)
	{
	$strlen = strlen($string);
	if($strlen < $length)
	{
		$string = str_pad($string,$length,"0");
	}
	else if($strlen > $length)
	{
		$string = substr($string, 0, $length);
	}
	}
}
    
  


?>
