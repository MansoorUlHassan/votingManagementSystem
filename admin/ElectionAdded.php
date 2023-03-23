<?php 
    //Inserted data in database
if (isset($_POST['AddElection'])) {
    //Make variables
    $Ending_Date = $_POST['Ending_Date'];
    $startingDate = $_POST['startingDate'];
    $candidates = $_POST['candidates'];
    $electionTopic = $_POST['electionTopic'];
    $currentDate = date('Y-m-d');
    $user_id = $_SESSION['id'];
    $diff = date_diff(date_create($currentDate), date_create($startingDate));
    //Check condition if date started
    if (($diff->format("%R%a")) > 0) {
        $status = "InActive";
    } else {
        $status = "Active";
    }

    //INSERT these values in database
    mysqli_query($db, 'INSERT INTO `elections`(
            `election_topic`,`no_of_canidates`,`starting_date`,`ending_date`,`status`,`inserted_on`,`user_no`
            ) VALUES("' . $electionTopic . '","' . $candidates . '","' . $startingDate . '","' . $Ending_Date . '","' . $status . '","' . $currentDate . '","' . $user_id . '")') or die(mysqli_error($db));
    ?><script>
location.assign('index.php?AddElection&inserted=1')
</script> <?php } ?>