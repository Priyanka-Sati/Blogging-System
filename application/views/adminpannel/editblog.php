<?php
// echo "<pre>";
  //print_r($result); die();
?>
<?php $this->load->view("adminpannel/header"); ?>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
          <a class="navbar-brand" href="#">Album</a>
          
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url().'admin/login/logout' ?>">Logout</a>
            </li> 
          </ul>
    </nav>

 

  <div class="sidebar col-2" >
    <ul class="navbar-nav">
       <li> <a class="active" href="<?=base_url().'admin/homepage'?>" >Home</a></li>
        <li><a  href="<?=base_url().'admin/blog/addblog'?>">Add Blog</a></li>
        <li><a  href="<?=base_url().'admin/blog'?>">View Blog</a></li>
    </ul>
</div>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Blog</h1>
        
      </div>

     <form enctype="multipart/form-data"  action="<?= base_url().'admin/blog/editblog_post' ?>" method="post">

          <input type="hidden" name="blog_id" value="<?= $blog_id ?>">
          
          <div class="form-group" >
            <input type="text" value= "<?= $result[0]['blog_title']?>" class="form-control" name="blog_title" placeholder="Title">
          </div>

          <div class="form-group" >
            <textarea class="form-control" name="desc" placeholder="Blog Description"><?= $result[0]['blog_desc']?></textarea> 
          </div>

          <div class="form-group" >
            <img width = "100" src="<?= base_url().$result[0]['blog_img']?>">
            <input type="file" class="form-control" name="file" placeholder="Title">
          </div>

          <button tyoe="submit" class="btn btn-primary">Edit Blog</button>
          
      </form>

    </main>







<?php $this->load->view("adminpannel/footer"); ?>    
    

<script type="text/javascript">
  <?php
    if(isset($_SESSION['inserted'])){
      if($_SESSION['inserted']=="yes"){
        echo "alert('Data Inserted successfully')";
      }
      else{
        echo "alert('Data Not Inserted')";
      }
    }
  ?>
</script>>