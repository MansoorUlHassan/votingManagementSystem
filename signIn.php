<div class="d-flex justify-content-center form_container">
    <form method="POST">
        <div class=" input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control input_user" autofocus required
                placeholder="User Name">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control input_pass" required placeholder="Password">
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Show Password</label>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
            <button type="submit" name="login" class="btn login_btn">Login</button>
        </div>
    </form>
</div>
<div class="mt-4">
    <div class="d-flex justify-content-center links"> Don't have an account? <a href="index.php?signup=1"
            class=" ml-2">Sign Up</a>
    </div>
    <div class="d-flex justify-content-center links">
        <a href="#">Forgot your password?</a>
    </div> <?php
    //If user registered successfully 
     if(isset($_GET['registered'])){ 
        ?> <span class="text-success text-center">
        <h6>Registered Successfully</h6>
    </span> <?php 
     include_once('returnSignIn.php'); 
     }
     //If user already exist
     else if(isset($_GET['alreadyRegistered'])){ 
        ?> <span class="text-success text-center">
        <h6>User Already Exist, Login</h6>
    </span> <?php 
     include_once('returnSignIn.php'); 
     }
     //If password not match
     else if(isset($_GET['incorrectPassword'])){ 
        ?> <span class="text-danger text-center">
        <h6>Incorrect Password</h6>
    </span> <?php 
     include_once('returnSignIn.php'); 
     }
     
 ?>
</div>