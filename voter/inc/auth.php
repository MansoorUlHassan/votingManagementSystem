<?php
session_start();
if($_SESSION['key'] != "Users_Panel_For_Voters330"){
   //Redirect to login page
   ?><script>
location.assign("../index.php");
</script> <?php   
    //Then die the program
    die();
}
?>