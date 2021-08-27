<?php
require_once('assets/php/header.php');
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="card rounded-0 mt-3 border-primary">
<div class="card-header border-primary">
<ul class="nav nav-tabs card-header-tabs">
<li class="nav-item">
<a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">Profile</a>
</li>
<li class="nav-item">
<a href="#editProfile" class="nav-link font-weight-bold" data-toggle="tab">Edit Profile</a>
</li>
<li class="nav-item">
<a href="#changePass" class="nav-link font-weight-bold" data-toggle="tab">Change Password</a>
</li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">

<!-- profile tab content -->
<div class="tab-pane container active" id="profile"> 
<div class="card-deck">
<div class="card border-primary">
<div class="card-header bg-primary text-light text-center lead">
User ID: <?php echo $cid;?>
</div>
  <div class="card-body">
<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Name:</b><?php echo $cname;?></p>
<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>E-mail:</b><?php echo $cemail;?></p>
<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Gender:</b><?php echo $cgender;?></p>
<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Data of Birth:</b><?php echo $cdob;?></p>
<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Phone:</b><?php echo $cphone;?></p>
<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Registered On:</b><?php echo $reg_on;?></p>
<div class="clearfix"></div>
  </div>
  </div>
<div class="card border-primary align-self-center">
<?php 
if(!$cphoto)
{
?>
<img src="https://png.pngtree.com/png-vector/20190704/ourmid/pngtree-vector-user-young-boy-avatar-icon-png-image_1538408.jpg" alt="" class="img-thumbnail img-fluid" width="408px">

<?php

}
else
{
  ?>
    <img src="assets/php/<?php echo $cphoto; ?> ?>" alt="" class="img-thumbnail img-fluid"  width="408px">
   <?php
   
}

?>
</div>
</div>
</div>
<!-- profile tab end -->
<!-- Edit profile tab content start -->
<div class="tab-pane container fade" id="editProfile">
<div class="card-deck">
<div class="card border-danger align-self-center">
<?php 
if(!$cphoto)
{
?>
<img src="https://png.pngtree.com/png-vector/20190704/ourmid/pngtree-vector-user-young-boy-avatar-icon-png-image_1538408.jpg" alt="" class="img-thumbnail img-fluid" width="408px">

<?php

}
else
{
  ?>
    <img src="assets/php/<?php echo $cphoto; ?>"class="img-thumbnail img-fluid" width="408px">
   <?php
   
}
?>
</div>
<div class="card border-danger">
<form action="" method="post" class="px-3 mt-2" id="profile-update-form"enctype="multipart/form-data">
<input type="hidden" name="oldimage" value="<?php echo $cphoto;?>" >
<div class="form-group m-0">
<label for="profilePhoto" class="m-1">Uplaod Profile Image</label>
<input type="file" name="image" id="profilePhoto">
</div>
<div class="form-group m-0">
<label for="name" class="m-1">Name</label>
<input type="text" name="name" id="name" class="form-control" value="<?php echo $cname;?>">
</div>
<div class="form-group m-0">
<label for="gender" class="m-1">Gender</label>
<select name="gender" id="gender" class="form-control">
<option value="" disabled<?php if($cgender==null){echo 'selected';}?>>Select</option>
<option value="Male"<?php if($cgender=='Male'){
  echo 'selected';
}?> >Male</option>
<option value="Female" <?php if($cgender=='Female'){
  echo 'selected';
}?>>Female</option>
</select>
</div>
<div class="form-group m-0">
<label for="dob" class="m-1">Date of Birth</label>
<input type="date" name="dob" id="dob" class="form-control" value="<?php echo $cdob;?>">
</div>
<div class="form-group m-0">
<label for="phone" class="m-1">Phone</label>
<input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $cphone;?>" placeholder="Phone">
</div>
<div class="form-group m-2">
<input type="submit" name="profile_update" value="Update Profile" class="btn btn-danger btn-block" id="profileUpdateBtn">
</div>
</form>
</div>
</div>
</div>
<!-- Edit profile tab end -->
<!-- Change password tab -->
<div class="tab-pane  container fade" id="changePass">
<div id="changepassAlert"></div>
<div class="card-deck">
<div class="card border-success">
<div class="card-header bg-success text-white text-center lead">
Change Password
</div>
<form action="#" method="post" class="px-3 mt-2" id="change-pass-form">
<div class="form-group">
<label for="curpass">Enter Your Current Password</label>
<input type="password" name="curpass" placeholder="Current Password" class="form-control form-control-lg" id="curpass" required minlength="5">
</div>
<div class="form-group">
<label for="newpass">Enter Your New Password</label>
<input type="password" name="newpass" placeholder="New Password" class="form-control form-control-lg" id="newpass" required minlength="5">
</div>
<div class="form-group">
<label for="cnewpass">Confirm Your New Password</label>
<input type="password" name="cnewpass" placeholder="Confirm New Password" class="form-control form-control-lg" id="cnewpass" required minlength="5">
</div>
<div class="form-group">
<div class="text-danger" id="changepassError"></div>
</div>
<div class="form-group">
<input type="submit" name="changepass" value="Change Password" class="btn btn-success btn-block btn-lg" id="changePassBtn" >
</div>
</form>
</div>
<div class="card border-success align-self-center">
<img src="https://www.cusd80.com/cms/lib/AZ01001175/Centricity/Domain/6122/password.jpg" class="img-thumbnail img-fluid" width="408px" alt="">
</div>
</div>
</div>
<!--End Change password tab -->
</div>
</div>
</div>
</div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

 <script type="text/javascript">
 $(document).ready(function(){
$("#profile-update-form").submit(function(e)
{

  e.preventDefault();
  $.ajax({
    url:'assets/php/process.php',
    method:'post',
    data:new FormData(this),
    contentType:false,
    processData:false,
    cache:false,
    success:function(response)
    {
      location.reload();
    }
  });
});
//change password ajax
$("#changePassBtn").click(function(e)
{
  e.preventDefault();
  $("#changePassBtn").val('Please Wait..');
  if($('#newpass').val()!=$("#cnewpass").val())
  {
    $("#changepassError").text("*Password did not matched!");
    $("#changePassBtn").val('Change Password');
    
  }
  else
  {
    $("#changepassError").text("");
  $.ajax({
    url:'assets/php/process.php',
    data:$("#change-pass-form").serialize()+'&action=change_pass',
    method:'post',
    success:function(response)
    {
   if(response==='password_changed')
   {
    Swal.fire({
      title:'Password updated successfully ',
      type:'success'
    });
   }
   else
   {
    $("#changePassBtn").val('Change Password');
    $("#changepassAlert").html(response);
   }
    }
  });
  }
})
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