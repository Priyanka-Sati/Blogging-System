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
     </style>   

     </head>
     <body>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Album</a>
  
</nav>      


<div class="jumbotron">
      
  </div>



<main role="main">

  <div class="album py-5 bg-light">
    <div class="container">
      <h1><?=$result[0]['blog_title']?></h1>

      <div class="row">
        
      		<div class="col-md-12">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?= base_url().$result[0]['blog_img']?>">
            <div class="card-body">
              <p class="card-text"><?=$result[0]['blog_desc']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 
                </div>
              </div>
            </div>
          </div>
        </div>


        
        

</main>




<?php $this->load->view("adminpannel/footer"); ?>