<?php
require_once('assets/php/header.php');
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8 mt-3">
<div class="card border-primary">
<div class="card-header lead text-center bg-primary text-white">
Send Feedback to Admin!
</div>
<div class="card-body">
<form action="#" method="post" class="px-4" id="feedback-form">
<div class="form-group">
<input type="text" class="form-control-lg form-control rounded-0" name="subject" placeholder="Write Your Subject" required>
</div>
<div class="form-group">
<textarea class="form-control-lg form-control rounded-0" name="feedback" placeholder="Write Your Feedback Here.." rows="8" required></textarea>
</div>
<div class="form-group">
<input class="btn btn-primary btn-block btn-lg rounded-0" name="feedbackBtn" id="feedbackBtn"value="Send Feedback" type="submit" >
</div>
</form>
</div>
</div>

</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">
 $(document).ready(function()
 {
 
     $("#feedbackBtn").click(function(e)
     {
        e.preventDefault();
        if($("#feedback-form")[0].checkValidity())
        {
            $(this).val("Please Wait..");
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:$("#feedback-form").serialize()+'&action=feedback',
                success:function(response)
                {
                    $("#feedback-form")[0].reset();
                    $("#feedbackBtn").val("Send Feedback");
                    Swal.fire({
                        title:'Feedback Successfully sent to the Admin!',
                        type:'success'
                    });
                }
            });
        }

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