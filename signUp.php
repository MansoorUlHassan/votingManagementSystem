 <div class="d-flex justify-content-center form_container">
     <form method="POST">
         <div class="input-group mb-2">
             <div class="input-group-append">
                 <span class="input-group-text"><i class="fas fa-user"></i></span>
             </div>
             <input type="text" name="su_name" class="form-control input_user" autofocus required
                 placeholder="Username">
         </div>
         <div class="input-group mb-2">
             <div class="input-group-append">
                 <span class="input-group-text"><i class="fas fa-key"></i></span>
             </div>
             <input type="text" name="su_contact" class="form-control input_pass" required placeholder="Contact No.">
         </div>
         <div class="input-group mb-2">
             <div class="input-group-append">
                 <span class="input-group-text"><i class="fas fa-user"></i></span>
             </div>
             <input type="password" name="su_password" class="form-control input_user" required placeholder="Password">
         </div>
         <div class="input-group mb-2">
             <div class="input-group-append">
                 <span class="input-group-text"><i class="fas fa-key"></i></span>
             </div>
             <input type="password" name="su_retype_password" class="form-control input_pass" required
                 placeholder="Retype Password">
         </div>
         <div class="d-flex justify-content-center mt-3 login_container">
             <button type="submit" name="sign_Up" class="btn login_btn">Signup</button>
         </div>
     </form>
 </div>
 <div class="mt-3">
     <div class="d-flex justify-content-center links"> Already have an account? <a href="index.php" class="ml-2">Sign
             In</a>
     </div><?php
     //If both passwords doesnot match
    if(isset($_GET['invalid'])){
?> <span class="text-danger text-center">
         <h6>Password Does not match</h6>
     </span> <?php 
     include_once('returnSignUp.php'); 
     }
      //If user not found
    if(isset($_GET['userNotFound'])){
?> <span class="text-danger text-center">
         <h6>User not found</h6>
     </span> <?php 
     include_once('returnSignUp.php'); 
     }
     //If password length is less than 4
     else if(isset($_GET['lessThan4'])){
?> <span class="text-danger text-center">
         <h6>Please Enter At-Least 4 Digit Password</h6>
     </span> <?php
     include_once('returnSignUp.php'); 
    }
     ?>
 </div>