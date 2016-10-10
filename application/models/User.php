<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{

	public function add_user($data)
	{
		$query="INSERT INTO users
						(name,
						email,
						password)
						VALUES (?,?,?)";

		$values=array(
			$data['name'],
			$data['email'],
			$data['password']
			);
		$this->db->query($query,$values);
	}


public function log_in($data)
	{
		$query="SELECT * FROM users WHERE users.password=? AND users.email=?";
		
		$values=array(
			$data['password'],
			$data['email']
			);
		return $this->db->query($query,$values)->row_array();
	}



}