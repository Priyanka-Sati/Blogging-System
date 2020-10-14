<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		if(isset($_SESSION['user_id'])){
			redirect("admin/homepage");
		}
		$data=[];
		if(isset($_SESSION['error'])){
			$data['error']=$_SESSION['error'];
		}else{
			$data['error']="No error";
		}
		$this->load->view('adminpannel/loginview',$data);
	}

	function login_post(){

		if (isset($_POST)) {
				$email=$_POST['email'];
				$password=$_POST['password'];

				$query = $this->db->query("SELECT * FROM `users` WHERE `username`='$email' AND password='$password'");

				if ($query->num_rows()) {
				
					$result = $query->result_array();
					$this->session->set_userdata('user_id', $result[0]['id']);

					redirect('admin/homepage',$data);

				}
				else{
					
					$this->session->set_flashdata('error', 'Invalid Credentials');
					redirect("admin/login");
				}

		}else{
			die("Invalid Input!");
		}
	}

	


	function logout(){
		session_destroy();

		redirect('admin/login');
	}


	function newacc(){
		
		$data=[];
		if(isset($_SESSION['error'])){
			$data['error']=$_SESSION['error'];
		}else{
			$data['error']="No error";
		}
		$this->load->view('adminpannel/createacc',$data);
	}



		function create_account(){
			//print_r($_POST);die();
			if (isset($_POST)) {
				$email=$_POST['email'];
				$password=$_POST['password'];
				$conpass=$_POST['confirmpassword'];

				$query = $this->db->query("SELECT * FROM `users` WHERE `username`='$email'");

				if ($query->num_rows()) {
					redirect("admin/login/newacc");
				}
				else{
						if($password==$conpass){
							$query = $this->db->query("INSERT INTO `users`( `username`, `password`) VALUES ('$email','$password')");
							$this->session->set_flashdata('inserted','yes');
							redirect('admin/bloglist');
						}
				}
			}
		}



}
	
	