<?php 
    //Inserted data in database
if (isset($_POST['AddCandidate'])) {
    //Make variables
    $ElectionValue=$_POST['ElectionValue'];
    $CandidateName =$_POST['CandidateName'];
    $CandidateDetails=$_POST['CandidateDetails'];
    $currentDate = date('Y-m-d');
    $user_id = $_SESSION['id'];
    //Store photopath
    //Give path where you are storing file
    $targatedPath = "../assests/images/candidateImages/";
    //Add file name with path and add some random number from repeating extension
    $candidatePhoto = $targatedPath.rand(1111111,99999999)."_".$_FILES['CandidatePhoto']['name'];
    //Get temp name of file
    $candidatePhotoTemp = $_FILES['CandidatePhoto']['tmp_name'];
    //Get file name
    $candidatePhotoFileType = strtolower(pathinfo($candidatePhoto, PATHINFO_EXTENSION));
    //Get allowed file extensions
    $allowedFiles = array('jpg', 'jpeg', 'png');
    //Get file size
    $candidatePhotoSize = $_FILES['CandidatePhoto']['size'];
    //if file size is less then 3mb
    if($candidatePhotoSize<3000000){
        //If file extension is present in allowed
        if(in_array($candidatePhotoFileType,$allowedFiles)){
         //If file move successfully to desired folder  
             if(move_uploaded_file($candidatePhotoTemp,$candidatePhoto)){
            //Finally insert into database
            mysqli_query($db, 'INSERT INTO `candidates`(
            `CandidateName`,`CandidateDetails`,`CandidatePhoto`,`ElectionId`,`userId`,`inserted_on`)
             VALUES("' . $CandidateName . '","' . $CandidateDetails . '","' . $candidatePhoto . '","' . $ElectionValue . '","' . $user_id . '","' . $currentDate . '")') or die(mysqli_error($db));
    ?> <script>
location.assign('index.php?AddCandidates&inserted=1')
</script> <?php       
            }//Image uploading failed
            else {
            ?> <script>
location.assign('index.php?AddCandidates&failed=1')
</script> <?php
            }
        }
        //Else display file extension is not allowed
        else{ ?> <script>
location.assign('index.php?AddCandidates&extensionNotAllow=1')
</script> <?php
        }
    }
    //Display error file size is large
    else{
         ?> <script>
location.assign('index.php?AddCandidates&largeFile=1')
</script> <?php
    }
    
    //INSERT these values in database
} ?>