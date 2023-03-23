<div class="row bg-green">
    <div class="col-12">
        <table class="table">
            <thead>
                <th colspan='4'>
                    <h3>Voter Panel<small><b> (Current Election)</b></small>
                    </h3>
                </th>
            </thead>
            <tbody> <?php
            $fetchElection = mysqli_query($db, 'SELECT * FROM `elections` WHERE `status`="Active"') or die(mysqli_error($db));
            $isElection = mysqli_num_rows($fetchElection);
            if($isElection>0){
                while ($data = mysqli_fetch_assoc($fetchElection)) {
                    $electionId = $data['s_no'];
                    $electionName = $data['election_topic'];
                    //get candidates data
                    $fetchCandidate = mysqli_query($db, 'SELECT * FROM `candidates` WHERE  `ElectionId`="' . $electionId . '"') or die(mysqli_error($db));
                    $isCandidatePresent = mysqli_num_rows(($fetchCandidate));

                    //If Any Candidate is Present then 
                    if ($isCandidatePresent > 0) {
                        ?> <tr>
                    <th colspan='4' class="bg-red text-yellow text-center">
                        <h3>Election <small><b><?php echo $electionName; ?> </b></small> </h3>
                    </th>
                </tr>
                <tr class="bg-black text-white">
                    <th>CANDIDATE PHOTO</th>
                    <th>CANDIDATE DETAILS</th>
                    <th>NO. OF VOTES</th>
                    <th>GIVE VOTE</th>
                </tr>
                <tr><?php
                //if candidates are present
                while ($candidateData = mysqli_fetch_assoc($fetchCandidate)) {
                    $candidatePhoto = $candidateData['CandidatePhoto'];
                    $candidateId = $candidateData['s_no'];
                    $candidateName = $candidateData['CandidateName'];
                    $candidateDetails = $candidateData['CandidateDetails'];
                    //check votes for specific candidate
                    $fetchVote = mysqli_query($db, 'SELECT * FROM `votes` WHERE  `candidateId`="' . $candidateId . '"') or die(mysqli_error($db));
                    $totalVotes = mysqli_num_rows(($fetchVote));

                    ?> <td class="bg-black"><img src=" <?php echo $candidatePhoto; ?>" class='candidate-photo'>
                    </td>
                    <td class="bg-yellow"><?php echo "<b>" . $candidateName . "</b></br>" . $candidateDetails ?></td>
                    <td class="bg-yellow"> <?php echo $totalVotes; ?></td>
                    <td class="bg-yellow"> <?php 
                    //get votes caster details
                    $voter = mysqli_query($db, 'SELECT * FROM `votes` WHERE `voterId`="'.$_SESSION['id'].'" AND `electionId`="'.$electionId.'"') or die(mysqli_error($db));
                    $voteCasted = mysqli_num_rows($voter);
                    $election = mysqli_fetch_assoc($voter);
                        if($voteCasted>0 && $election['electionId']==$electionId){
                    ?>Casted <?php
            } else{ ?> <a onclick="
                        CastVote(<?php echo $electionId; ?>,<?php echo $candidateId; ?>,<?php echo $_SESSION['id']; ?>)"
                            class=" btn btn-success"><?php echo "VOTE"; ?></a> <?php
                        }?> </td>
                </tr><?php
                }

                    } //If no candidate is added for election
                    else {
                        ?> <tr>
                    <th colspan='4' class="bg-red text-yellow text-center">
                        <h3>Election <small><b><?php echo $electionName; ?> </b></small> </h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="4" class="text-red bg-white text-center">
                        <h3>No Candidate is present For this election </h3>
                    </th>
                </tr><?php
                    }
                }
            }   //If no election is active
            else {
                ?><tr>
                    <th>
                        <h3>No Election Present</h3>
                    </th>
                </tr> <?php    
            }?>
            </tbody>
        </table>
    </div>
</div>
<script>
const CastVote = (e_id, c_id, v_id) => {
    $.ajax({
        type: " POST",
        url: "./inc/ajaxCall.php",
        data: "e_id=" + e_id + "&c_id=" + c_id + "&v_id=" + v_id,
        success: function(response) {
            if (response == 'success') {
                location.assign('index.php?vote&?voteCasted=1');
            }
        }
    })
}
</script>