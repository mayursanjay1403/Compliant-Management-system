<?php
require_once('assets/php/header.php');
?>
<div class="container">
 <div class="row">
 <div class="col-lg-12">
 <h4 class="text-center text-primary mt-2">Write Your Complaints Here!</h4>
 </div>
 </div>
 <div class="card border-primary">
 <h5 class="card-header bg-primary d-flex justify-content-between">
 <span class="text-light lead align-self-center">All Complaints</span>
 <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addNoteModal">&nbsp;<li class="fas fa-plus-circle fa-lg"></li>&nbsp;Add new Complaints here!</a>
 </h5>
 <div class="card-body">
 <div class="table-responsive" id="showNote">
   <p class="text-center lead mt-5">Please Wait...</p>
 </div>
 </div>
 </div>
 </div>

<!-- Modal -->
<div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Complaint</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="add-note-form" class="px-3" enctype="multipart/form-data">
        <div class="form-group">
        <input type="text" name="title" class="form-control form-control-lg " placeholder="Title" required>
        </div>
        <div class="form-group">
        <textarea name="note" class="form-control form-control-lg" placeholder="Complaint description"  rows="6" required></textarea>
        </div>
        <div class="form-group">
        <input type="submit" name="addNote"class="btn btn-success btn-block btn-lg" id="addNoteBtn" value="Add Complaint"name="addNote">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End add new modal -->



<!-- Modal Edit-->
<div class="modal fade"  id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Edit Complaint</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form action="#" method="post" id="edit-note-form" class="px-3">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
        <input type="text" name="title" class="form-control form-control-lg " id="title" placeholder="Enter Title" required>
        </div>
        <div class="form-group">
        <textarea name="note" class="form-control form-control-lg" id="note" placeholder="Write Your Note Here.."  rows="6" required></textarea>
        </div>
        <div class="form-group">
        <input type="submit" name="editNote"class="btn btn-info btn-block btn-lg" id="editNoteBtn" value="Edit Note">
        </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<!-- End edit modal -->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  displayAllNotes();
    

    //add new note ajax request
    $("#addNoteBtn").click(function(e)
    {
      if($("#add-note-form")[0].checkValidity())
    {
     e.preventDefault();
      $("#addNoteBtn").val("Please Wait");
      $.ajax({
        url:'assets/php/process.php',
        data:$("#add-note-form").serialize()+'&action=add_note',
        method:'post',
        success:function(response)
        {
          $("#addNoteBtn").val("Add complaint");
          $("#add-note-form")[0].reset();
          $("#addNoteModal").modal("hide");
           Swal.fire({
             title:'complaint added successfully!',
             type:'success'
           });
           displayAllNotes();
           
        }
      })

    }

    });




  

//update note of user
$("#editNoteBtn").click(function(e)
{
  e.preventDefault();
  $.ajax({
    url:'assets/php/process.php',
    data:$("#edit-note-form").serialize()+'&action=update_note',
    method:'post',
    success:function(response)
    {
   
    Swal.fire({
      title:'Note updated successfully!',
      type:'success'
    });
 
    $("#edit-note-form")[0].reset();
    displayAllNotes();
    $("#editNoteModal").modal("hide");
   
   
    }
 
  });
 
});

//delete a note of user
$('body').on("click",".deleteBtn",function(e)
{
  e.preventDefault();
  delete_id=$(this).attr('id');

  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    $.ajax({
    url:'assets/php/process.php',
    method:'post',
    data:{delete_id:delete_id},
    success:function(response)
    {
      Swal.fire({
      title:'Note Deleted successfully!',
      type:'failure'
     });
      displayAllNotes();

    }
  });
  }
})
 
});
//Display note of an user in details
$("body").on('click','.infoBtn',function(e)
{
  e.preventDefault();
  info_id=$(this).attr('id');
  $.ajax({
    url:'assets/php/process.php',
    method:'post',
    data:{info_id:info_id},
    success:function(response)
    {
     data=JSON.parse(response);//converts json into javascript object
     Swal.fire({
       title:'<strong>Note :ID('+data.id+')</strong>',
       type:'info',
       html:'<b>Title :</b>'+data.title+'<br><br><b>Note :</b>'+data.note+'<br><br>'+
       '<b>Written On :</b>'+data.created_at+'<br><br><b>Updated At :</b>'+data.updated_at+'<br><br><b>Status :</b>'+data.status+"<br>",
       showCloseButton:true,

     })
    }
  })
})

    //display all note of an user
function displayAllNotes(){
  $.ajax({
    url:'assets/php/process.php',
    method:'post',
    data:{
      action:'display_notes'
    },
    success:function(response)
    {
   $("#showNote").html(response);
   $("table").DataTable({
     order:[0,'desc']
   })
    }
  });

    }
    

//edit note of an user ajax request
$('body').on("click",".editBtn",function(e)
{
  e.preventDefault();
  edit_id=$(this).attr('id');
  $.ajax({
    url:'assets/php/process.php',
    method:'post',
    data:{edit_id:edit_id},
    success:function(response)
    {
      data=JSON.parse(response);
      $("#id").val(data.id);
      $("#title").val(data.title);
      $("#note").val(data.note);
    }
  })
});
//check notification
checkNotification();
function checkNotification(){
    $.ajax({
url:'assets/php/process.php',
method:'post',
data:{
    action:'checkNotification'
},
success:function(response)
{
    $("#checkNotification").html(response);
}

    });
}

});


</script>

</body>
</html>