
<?php $this->load->view("adminpannel/header"); ?>
<style type="text/css">
  body {
                background-color: #A9A9A9;
              }
</style>>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  
          <a class="navbar-brand" href="<?=base_url().'admin/homepage'?>">Home</a>
          <ul class="navbar-nav">
			    <li class="nav-item">
			      <a class="nav-link" href="<?=base_url().'admin/blog/addblog'?>">Add Blog</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="<?=base_url().'admin/blog'?>">View Blog</a>
			    </li>
  		  </ul>
          
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url().'admin/login/logout' ?>">Logout</a>
            </li> 
          </ul>
    </nav>


  <div class="jumbotron">
      <h1></h1>
  </div>

 
<div class="container row center " style="background-color: white;">
<?php
  foreach ($result as $key => $value) {
?>
    <div class="container col-lg-6">
          <div class="card" style="width: 100%;">
          <img class="card-img-top" src="<?= base_url().$value['blog_img']?>">
          <div class="card-body">
            <h5 class="card-title"><?=$value['blog_title']?></h5>
      
            <a href="<?= base_url().'admin/BlogList/blog_detail/'. $value['blogid'] ?>" class="btn btn-primary">View</a>
            <p>created <?=$value['created_on']?></p>
          </div>
        </div>

    </div>
        

      	<?php
      		}
      	?>
</div>



 





<?php $this->load->view("adminpannel/footer"); ?>    
    