<?php 
require_once('./inc/AdminAuth.php');
require_once('./inc/config.php');
require_once('./inc/header.php');
require_once('./inc/navigation.php');

if(isset($_GET['AddElection'])){
    require_once('AddElection.php');
}
else if(isset($_GET['Home'])){
    require_once('homepage.php');
}
else if(isset($_GET['AddCandidates'])){
    require_once('AddCandidates.php');
}
else if(isset($_GET['logout'])){
    require_once('logout.php');
}

require_once('./inc/footer.php');

?>