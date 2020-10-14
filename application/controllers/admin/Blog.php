<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
		$id = $_SESSION['user_id'];
		//print_r($id);die();
		$query=$this->db->query("SELECT * FROM `articles` WHERE `publisher`='$id'");
		$data['result'] = $query->result_array();
		$this->load->view('adminpannel/viewblog',$data);
	}

	function addblog(){
		$this->load->view('adminpannel/addblog');
	}

	function addblog_post(){
	//	print_r($_POST);
	//	print_r($_FILES);

		if($_FILES){

				$config['upload_path']          = './assets/upload/blogimg';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $blog_title = $_POST['blog_title'];
                        $desc = $_POST['desc'];
                        $pub = $_POST['publisher'];

                       $query = $this->db->query("INSERT INTO `articles`( `blog_title`, `blog_desc`,`publisher`) VALUES ('$blog_title','$desc','$pub')");

                        if($query){
                       		$this->session->set_flashdata('inserted','yes');
                       		redirect('admin/blog/addblog');
                       }
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
/*
                        echo "<pre>";
                        print_r($data);
                        echo $data['upload_data']['file_name'];
*/
                        $fileurl = "assets/upload/blogimg/" .$data['upload_data']['file_name'];
                        $blog_title = $_POST['blog_title'];
                        $desc = $_POST['desc'];
                        $pub = $_POST['publisher'];

                       $query = $this->db->query("INSERT INTO `articles`( `blog_title`, `blog_desc`, `blog_img`,`publisher`) VALUES ('$blog_title','$desc','$fileurl','$pub')");

                       if($query){
                       		$this->session->set_flashdata('inserted','yes');
                       		redirect('admin/blog/addblog');
                       }
                       else{
                       	$this->session->set_flashdata('inserted','no');
                       		redirect('admin/blog/addblog');
                       }
                       // $this->load->view('upload_success', $data);
                }

		}else{

		}

	}

	function editblog($blog_id){
		//print_r($blog_id);
		$query = $this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img` FROM `articles` WHERE `blogid`='$blog_id'");

		$data['result'] = $query->result_array();
		$data['blog_id'] = $blog_id;

		$this->load->view("adminpannel/editblog",$data);
	}

	function editblog_post(){
		//print_r($_POST); 
		//print_r($_FILES);
		if($_FILES['file']['name']){
			//die("Update File");
				$config['upload_path']          = './assets/upload/blogimg';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        die("Error");
                       // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                     //   echo "<pre>";
                       // print_r($data);

                        $filename_location = "assets/upload/blogimg/".$data['upload_data']['file_name'];
                        $blog_title = $_POST['blog_title'];
                        $desc = $_POST['desc'];
                        $blog_id = $_POST['blog_id'];

                        $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$desc',`blog_img`='$filename_location' WHERE `blogid`='$blog_id'");

                        if($query){
                       		$this->session->set_flashdata('updated','yes');
                       		redirect('admin/blog');
                       }
                       else{
                       	$this->session->set_flashdata('updated','no');
                       		redirect('admin/blog');
                       }
                 }

		}else{
						$blog_title = $_POST['blog_title'];
                        $desc = $_POST['desc'];
                        $blog_id = $_POST['blog_id'];

                        $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$desc' WHERE `blogid`='$blog_id'");

                        if($query){
                       		$this->session->set_flashdata('updated','yes');
                       		redirect('admin/blog');
                       }
			//die("Updete without file");
		}
	}

	function deleteblog(){
		//print_r($_POST);

		$delete_id = $_POST['delete_id'];

		$query = $this->db->query("DELETE FROM `articles` WHERE `blogid`= '$delete_id'");

		if($query){
			echo "deleted";
		}
		else{
			echo "not deleted";
		}

	}
}
