<?php
require_once('assets/php/header.php');
?>
<div class="container">
<div class="row justify-content-center my-2">
<div class="col-lg-6 mt-4" id="showAllNotification">

</div>
</div>
</div>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
$(document).ready(function()
{
    fetchNotification();
    //fetch Notification of user type
function fetchNotification(){
    $.ajax({
url:'assets/php/process.php',
method:'post',
data:{
    action:'fetchNotification'
},
success:function(response)
{
   $("#showAllNotification").html(response);
}

    });
}
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
//remove notification
$("body").on("click",".close",function(e)
{
    e.preventDefault();
    $nid=$(this).attr('id');
    $.ajax({
        url:'assets/php/process.php',
        method:'post',
        data:{notification_id:$nid},
        success:function(response)
        {
            checkNotification(); 
            fetchNotification();
        }
    })

})
});
</script>
</body>
</html>