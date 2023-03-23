<?php 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    //Apply sha1 hash on password because we stored data in hash
    $password = sha1($_POST['password']);
    //Get username and password from database
    $getData = mysqli_query($db, 'SELECT * FROM `users` WHERE `name`="'.$username.'"');
    //If data exist in database
    if(mysqli_num_rows($getData)>0){
        //get username and password
        $data= mysqli_fetch_assoc($getData); 
        //If username and password match
        if($username == $data['name'] && $password==$data['password']){
            session_start();
            $_SESSION['user_name'] = $data['name'];
            $_SESSION['id'] = $data['s_no'];
            $_SESSION['user_role'] = $data['user_type'];
            //If user who login is admin display admin panel
            if($_SESSION['user_role']=="Admin"){
                $_SESSION['key'] = "Admin_Panel34";
                //Redirect to admin page
        ?> <script>
location.assign("admin/index.php?Home");
</script> <?php 
}
            //Otherwise display user's page
            else{
            $_SESSION['key'] = "Users_Panel_For_Voters330";
                      //Redirect to admin page
        ?> <script>
location.assign("voter/index.php?Home");
</script> <?php 
}
        }
        //Password does not match
        else{
        ?><script>
location.assign("index.php?incorrectPassword=1");
</script> <?php    
}
}
//UserName not found
else {
    ?> <script>
location.assign("index.php?signup&userNotFound=1");
</script> <?php } }?>