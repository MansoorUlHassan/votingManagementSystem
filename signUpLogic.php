<?php
if (isset($_POST['sign_Up'])) {
    $su_name = $_POST['su_name'];
    $su_contact = $_POST['su_contact'];
    $su_password = $_POST['su_password'];
    $su_retype_password = $_POST['su_retype_password'];
    $su_type = "Voter";
    //Get username and password from database
    $getData = mysqli_query($db, 'SELECT * FROM `users` WHERE `name`="'.$su_name.'"');
    //If data exist in database
    if(mysqli_num_rows($getData)>0){
        $found = 1; 
    }
    //If data not exist in database
    else{
        $found = 0;
    }
    //If Both Passwords Match Then
    if($su_password==$su_retype_password && strlen($su_password)>=4 && $found==0){
        //Apply sha1  on password for hashing
        $su_password = sha1($su_password);
        //Run query to insert data
        mysqli_query($db,"INSERT INTO `users`(`name`,`contact`,`password`,`user_type`) VALUES('".$su_name."','".$su_contact."','".$su_password."','".$su_type."')") or die(mysqli_error($db));
        //Display that data inserted successfully
    ?><script>
location.assign("index.php?registered=1");
</script> <?php
   }
   //Already registered
   else if($found>0){
     ?><script>
location.assign("index.php?alreadyRegistered=1");
</script> <?php
   }
    //Show error if password length is less than 4
    else if(strlen($su_password)<4){
    ?><script>
location.assign("index.php?signup&lessThan4=1");
</script> <?php
    }
    //Show error that passwords does not match
    else{
        ?><script>
location.assign("index.php?signup&invalid=1");
</script> <?php
}
} ?>