<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Blogging</title>

    <style>
        .jumbotron{ 
                background-image: url('https://tandsgo.com/wp-content/uploads/2020/02/Businessman-working-with-calculator-680x170.jpg'); 
                background-size: cover; 
                background-repeat: no-repeat; 
                height: 300px;
              }  
              body {
                background-color: #A9A9A9;
              }

        .center {
                  margin: auto;
                  width: 95%;
                  padding: 10px;
                  border-radius: 10px;
                }



     </style>   

     </head>
     <body>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Album</a>
  
  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link active" href="<?=base_url().'admin/login' ?>">Login</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link active" href="<?=base_url().'admin/login/newacc' ?>">Create account</a>
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