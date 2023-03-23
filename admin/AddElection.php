<div class="row">
    <div class="col-4 my-3">
        <h3>Add New Election</h3>
        <form method="POST">
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" id="name" name="electionTopic" class="form-control  bg-yellow  input_pass" required
                    placeholder="Election Topic">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div> <input type="number" name="candidates" class="form-control bg-yellow input_pass" required
                    placeholder="No. Of Candidates">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" name="startingDate" onfocus="type='date'" class="form-control  bg-yellow  input_pass"
                    required placeholder="Starting Date">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-red"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" name="Ending_Date" onfocus="type='date'" class="form-control  bg-yellow input_pass"
                    required placeholder="Ending Dates">
            </div>
            <div class="mt-3">
                <button type="submit" name="AddElection" class="btn bg-red text-white ">Add Elections</button> <?php
                // Write form is submitted if data is inserted
                if(isset($_GET['inserted'])){
                    ?> <span class="text-success">
                    <h6>Election Added Successfully</h6>
                </span><?php
                include_once('returnElectionPage.php'); 
            }
                //End
              ?>
            </div>
        </form>
    </div>
    <div class="col-8 my-3">
        <h3>Upcoming Elections</h3>
        <table class="table">
            <thead>
                <tr class="bg-red">
                    <th scope="col">S.No </th>
                    <th scope="col"> Election Name</th>
                    <th scope="col"># Candidates </th>
                    <th scope="col"> Starting Date</th>
                    <th scope="col"> Ending Date</th>
                    <th scope="col"> Status</th>
                    <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody> <?php require_once('displayElection.php');?> </tbody>
        </table>
    </div>
</div>
<!--Add logic page--><?php
    require_once('ElectionAdded.php')
?>