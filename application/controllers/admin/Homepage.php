<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

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
		$this->load->model('ArticleModel',"am");
		$result = $this->am->fetch_all_articles();
		//print_r($result);die();
		
		$data['result'] = $result;
		$this->load->view('adminpannel/homepageview', $data);
		}
		else{
		redirect('admin/login');
		}
	}
}
