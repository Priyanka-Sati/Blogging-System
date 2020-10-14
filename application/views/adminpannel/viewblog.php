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
       <li> <a class="active" href="<?=base_url().'admin/homepage'?>">Home</a></li>
        <li><a  href="<?=base_url().'admin/blog/addblog'?>">Add Blog</a></li>
        <li><a  href="<?=base_url().'admin/blog'?>">View Blog</a></li>
    </ul>
</div>


 
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">View Blog</h1>
      </div>


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>S No.</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              <?php
                  if($result){
                    $counter=1;
                    foreach ($result as $key => $value) {
                      # code...
                      echo "<tr>
                        <td>".$counter."</td>
                        <td>".$value['blog_title']."</td>
                        <td>".$value['blog_desc']."</td>
                        <td><img src='".base_url().$value['blog_img']."' class='img-fluid' width='100'></td>
                        
                        <td><a class=\"btn btn-info\" href='".base_url().'admin/blog/editblog/'.$value['blogid']."'>Edit</a></td>
                        
                        <td><a class=\"btn delete  btn-danger\" href='#.' data-id='".$value['blogid']."'>Delete</a></td>
                      </tr>";

                      $counter++;
                    }
                  }
                  else{
                    echo "<tr><td colspan='6'>No Records found</td></tr>";
                  }

              ?>

            
            
          </tbody>
        </table>
      </div>

     

    </main>






<?php $this->load->view("adminpannel/footer"); ?>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(".delete").click(function(){
      
      var delete_id = $(this).attr('data-id');

      var bool = confirm("Are you sure you want to delete?");
      console.log(bool);

      if (bool){

            $.ajax({
                url: '<?= base_url().'admin/blog/deleteblog/'?>'+delete_id,
                type: 'post',
                data: {'delete_id': delete_id},
                success: function(response){
                      console.log(response);
                      if (response == "deleted"){
                        location.reload();
                      }else if(response == "not delete "){
                        alert("Something went wrong");
                      }
                }

            })
      }
      else{

      }
    });

    <?php
    if(isset($_SESSION['updated'])){
      if($_SESSION['updated']=="yes"){
        echo "alert('Data updated successfully')";
      }
      else{
        echo "alert(''Something went wrong)";
      }
    }
  ?>

</script>>    