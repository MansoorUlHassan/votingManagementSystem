<div class="row">
    <!--Candidate Form-->
    <div class="col-4 my-3">
        <h3>Add New Candidate</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div><select id="candidates" required name="ElectionValue" class="form-control bg-yellow">
                    <!--Options to add candidate, first value is empty-->
                    <option value="">Select Election</option>
                    <!--Php code to get elections from table--> <?php
                    $get_Election = mysqli_query($db, 'SELECT * FROM elections') or die(mysqli_error($db));
                    //check if any election is present
                    $isElectionFound = mysqli_num_rows($get_Election);
                    //If any election present
                    if ($isElectionFound > 0) {
                     //Run while loop to get values
                        while ($Elections = mysqli_fetch_assoc($get_Election)) {
                            $ElectionName = $Elections['election_topic'];
                            $ElectionId = $Elections['s_no'];
                            $AllowedUser = $Elections['no_of_canidates'];
                            //Get the users from table candidate to make allowed candidate condition
                            $candidate = mysqli_query($db, 'SELECT * FROM `candidates` WHERE `ElectionId`="' . $ElectionId . '"') or die(mysqli_error($db));
                            $candidatesCount = mysqli_num_rows($candidate);
                            //Show this value in dropdown menu and give its id as value
                            if($candidatesCount<$AllowedUser){
                            ?><option value="<?php echo $ElectionId;?>"><?php echo $ElectionName;?></option> <?php
                        }
                    }
                    }else{
                        //Give no value if no election is present
                        ?><option value="">Please Add Elections</option><?php
                    }
                    ?>
                </select>
            </div>
            <div class=" input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div> <input type="text" name="CandidateName" class="form-control bg-yellow input_pass" required
                    placeholder="Candidate Name">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" onfocus='type="file"' name="CandidatePhoto"
                    class="form-control  bg-yellow input_pass" required placeholder="Candidate Photo">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" name="CandidateDetails" class="form-control  bg-yellow  input_pass" required
                    placeholder="Candidate Detail">
            </div>
            <div class="mt-3">
                <button type="submit" name="AddCandidate" class="btn bg-red text-white ">Add Candidate</button> <?php
                // Write form is submitted if data is inserted
                if(isset($_GET['largeFile'])){
                    ?> <span class="text-danger">
                    <h6>You cannot upload file greater than 3mb</h6>
                </span><?php
                include_once('returnCandidatePage.php'); 
            }
              else if(isset($_GET['extensionNotAllow'])){
                    ?> <span class="text-danger">
                    <h6>Only png, jpg and jpeg are allowed</h6>
                </span><?php
                include_once('returnCandidatePage.php'); 
            } else if(isset($_GET['failed'])){
                    ?> <span class="text-danger">
                    <h6>Uploading failed, Please try again</h6>
                </span><?php
                include_once('returnCandidatePage.php'); 
            }else if(isset($_GET['inserted'])){
                    ?> <span class="text-success">
                    <h6>Candidate Added Successfully</h6>
                </span><?php
                include_once('returnCandidatePage.php');
                }
                //End
              ?>
            </div>
        </form>
    </div>
    <!--Candidate List Showing-->
    <div class="col-8 my-3">
        <h3>Candidates List</h3>
        <table class="table">
            <thead>
                <tr class="col-8 bg-red">
                    <th scope="col">S.No </th>
                    <th scope="col">Candidate Photo</th>
                    <th scope=" col">Candidate Name </th>
                    <th scope="col"> Election Type</th>
                    <th scope="col"> Inserted On </th>
                    <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody> <?php require_once('displayCandidate.php');?> </tbody>
        </table>
    </div>
</div>
<!--Add logic page--><?php
    require_once('CandidateAdded.php')
?>