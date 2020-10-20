<?php


class ArticleModel extends CI_Model
{

	function fetch_all_articles(){
		$resultQuery=$this->db->query("SELECT `blogid`, `blog_title`,`blog_img`,`blog_desc`,`created_on`,`updated_on` FROM `articles`");

		return $resultQuery->result_array();
	}

	function fetch_blog_details($blog_id){
		$resultQuery=$this->db->query("SELECT `blogid`, `blog_title`,`blog_img`,`blog_desc`,`created_on`,`updated_on` FROM `articles` WHERE blogid= $blog_id");

		return $resultQuery->result_array();
	}
}

?>
