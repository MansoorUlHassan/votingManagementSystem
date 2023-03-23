<?php 
//Get data from table named candidates
$fetchingData = mysqli_query($db, 'SELECT * FROM `candidates`') or die(mysqli_error($db));
//Check if data is present 
$isDataAvailable = mysqli_num_rows($fetchingData);
//Condition
if($isDataAvailable>0){
    //Maybe there are multiple elections are present
    $sno = 0;
    while($candidate = mysqli_fetch_assoc($fetchingData)){
        //Get values of Election topic from election where election id is equal
        $fetchElection = mysqli_query($db, 'SELECT `election_topic` FROM `elections` WHERE `s_no`="' . $candidate['ElectionId'] . '"') or die(mysqli_error($db));
        //Get value by fetching assoc
        $electionValue = mysqli_fetch_assoc($fetchElection);
        $electionName = $electionValue['election_topic'];
        ?> <tr class="text-white bg-dark">
    <th class="bg-red text-black"> <?php echo ++$sno;?> </th>
    <td>
        <img src="<?php echo $candidate['CandidatePhoto'];?>" class='candidate-photo' />
    </td>
    <td><?php echo $candidate['CandidateName'];?> </td>
    <td colspan="6"><?php echo $candidate['CandidateDetails'];?> </td>
    <td><?php echo $electionName;?> </td>
    <td>
        <a href=" #" class="btn btn-sm btn-warning">Edit</a>
        <a href="#" class="btn btn-sm btn-danger">Delete</a>
    </td>
</tr> <?php
    } 
} 
//Otherwise display no election is added 
else {?><tr>
    <th class="btn-success text-center text-yellow" colspan="12">No Data Found</th>
</tr>
<tr>
    <th class="bg-yellow text-center text-white" colspan="6"> <a href="index.php?AddCandidates#candidates"
            class="btn btn-success">Please Enter Candidates</a>
    </th>
    <th class="bg-yellow text-center text-white" colspan="6"> <a href="index.php?AddElection"
            class="btn btn-success">Please Enter Election</a>
    </th>
</tr><?php
}?>