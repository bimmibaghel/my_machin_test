<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- dataTables link -->
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
   <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

   <!-- font awesomne -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

<!-- toastr link -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

</head>
<body>


  
  
<div class="container mt-5">
   
    <!-- <div class="field" id="searchform">
  <input type="text" id="searchterm" placeholder="Enter Name" />
  <button type="button" id="search">Search</button>
  </div> -->

  </div>
  
  <section class="content">
      <div class="container">
        <div class="row">


 <div align="center" >
      <h3>Crud With Student Details.</h3>
     
    </div>

          <!-- flash div -->

   <div class="col-sm-12">
        <br>
        <?php if($this->session->flashdata('success')!=""){?>
            <div class="alert alert-success alert-dismissable">
           
             <i class="icon fa fa-check"></i>

                <?php echo $this->session->flashdata('success'); ?>
            

        <?php }

            if($this->session->flashdata('error')!=""){ ?>

            <div class="alert alert-danger alert-dismissable">

           
          <i class="icon fa fa-ban"></i>

            <?php echo $this->session->flashdata('error');?>
            </div>
        <?php } ?>
    </div>

  <!--  flasd div end -->

    <div class="table-responsive table-wrap tableFixHead container-fluid">
      <table id="student_tbl">
      <thead>
      <tr>
        <td>S.No</td>
        <td>Student Name</td>
        <td>About</td>
        <td>Image</td>
        <td>Action</td>

        </tr>
      </thead>
      <tbody id="tbl_body">
        
          <?php 
          $i=1;
            foreach($students as $std)
            { 
                      

              
              $tr_id = 'myTr';
            

                  if(($std['file']!=''))
                    {
                       $img_url = base_url().$std['file'];
                    }
                else{
                       //$img_url =  base_url().'asset/img/dummy.jpg';
                       $img_url  = "https://via.placeholder.com/150";
                    }
                 
              ?>
              <tr id='<?= $tr_id.$std['id'];?>' >
              <td><?= $i++; ?></td>
              <td><?= $std['name']; ?></td>
              <td><?= $std['text']; ?></td>
              <td><?php  echo '<img  src="'.$img_url.'" width="150px" height="150px" style="border-radius:3px;border:2px solid #c0c0c0;"/>';?> </td>
              <td>
                <a href="javascript(0);" class="btn btn-info edit_me" data-bs-toggle="modal" data-bs-target="#editModal" 
                data-id="<?php echo $std['id']?>" data-img ="<?php echo $img_url;?>" data-about ="<?php echo $std['text']?>" data-name="<?php echo $std['name']?>">
                <i class="far fa-edit"></i>
                </a>
                <a  class="btn btn-danger" onclick="delete_me('<?= $std['id']?>')" >
                <i class="far fa-trash-alt"></i>
                </a></td>

               </tr>
           <?php }
          ?>
       
      <!--   <?php print_r($students);?> -->
      </tbody>
      </table>
   </div>
</div>
</div></section>
</body>
<!-- Edit modal -->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url('student/edit')?>" method="post" enctype="multipart/form-data" id="form_edit">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
          
            <div class="modal-body">
<!-- show img -->
             <div class="col-sm-8 display_img">  
                 
                  <img id="previewHolder"  width="150px" height="150px" style="border-radius:3px;border:3px solid #c0c0c0;"/>

             </div>
             <br>

<!-- upload img -->

             <div class="form-group">
                  
                  <input type="file" id="image" name="image" class="form-control" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                  </div>
              <br>

           <div class="form-group">
            
             <input type="hidden" id="sid" name="sid" class="form-control">
            <input type="hidden" id="old_img" name="old_img" class="form-control">

            <label for="fname">Name</label>
            <input type="text" id="fname" name="fname" class="form-control">
           <span id="fname_err" style="color:red;"></span>
          </div><br>
           
             <div class="form-group">
            <label for="fabout">About</label>
            <input type="text" id="about" name="about" class="form-control">
            <span id="about_err" style="color:red;"></span>
          </div><br>

          
        
      </div>
    
      <div class="modal-footer">
             <button  type="submit" name ="edit_btn" id="edit_btn" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </form>
    </div>
  </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


<script type="text/javascript">

  var site_url = '<?php echo base_url()?>';

  function readURL(input) 
  {
  
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#previewHolder').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      } 

     else {
        alert('select a file to see preview');
        $('#previewHolder').attr('src', default_url);
      }
 }

$("#image").change(function() {
  readURL(this);
});


  function delete_me(id) {

    if(id!='')
    {
     
      var sure = confirm('Are You Sure');
      {
        if(sure == true)
        {
           $.ajax({
              url:site_url+'student/delete',
              method:'POST',
              dataType:'JSON',
              data:{'id':id},
              success:function(data) {
               if(data.msg == 'ok')
               {
                    

                  $("#myTr"+id).remove();// remove row
                 toastr.success('Deleted Successfully');
               }else
               {
                toastr.success('Response not reflecting');
               }
              }//successs
           })
        }else
        {
          return false;
        }
      }
    }
    // body...
  }
  

  

$(document).ready(function() {
    $('#student_tbl').DataTable({
        "processing": true,
        "paging":true
    });

      toastr.options.timeOut = 1500; // 1.5s
   // toastr.info('Page Loaded!');

     $('#edit_btn').click(function(){
       
        var name = $('#fname').val();
        var about = $('#about').val();
        var flag=1;

        $('#about_err').html('');
        $('#fname_err').html('');

         if(about.trim()=='')
         {
          $('#about_err').html('This Field is required');
          flag = 0;
         }

         if(name.trim()=='')
         {
          $('#fname_err').html('This Field is required');
          flag = 0;
         }
           
           if(flag==0)
           {
             return false;
           }else
           {
              $('#form_edit').submit();
              return true;
           }

   });

     $('.edit_me').click(function(){


   var id = $(this).attr('data-id');
   var name = $(this).attr('data-name');
   var img = $(this).attr('data-img');
   var about = $(this).attr('data-about');

     $('#fname').val(name);
     $('#about').val(about);
     $('#sid').val(id);
     $('#old_img').val(img);


    var default_url = 'https://via.placeholder.com/150';
      if(img)
      {
       $('#previewHolder').attr('src', img);
       
      }else {
      
        $('#previewHolder').attr('src', 'https://via.placeholder.com/150');
      }


}); 


  
});//ready
</script>

</html>
