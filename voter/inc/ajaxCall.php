<?php
//Get config file
require_once('../../admin/inc/config.php');
//Set data in database
if(isset($_POST['e_id']) && isset($_POST['c_id']) && isset($_POST['v_id'])){
    mysqli_query($db, 'INSERT INTO `votes`(`electionId`,`candidateId`,`voterId`)
    VALUES("'.$_POST['e_id'].'","'.$_POST['c_id'].'","'.$_POST['v_id'].'")
    ') or die(mysqli_error($db));
}
echo "success";

?>