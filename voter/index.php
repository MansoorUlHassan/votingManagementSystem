<?php 
require_once('./inc/auth.php');
require_once('../admin/inc/config.php');
require_once('../admin/inc/header.php');
require_once('./inc/navigation.php');
if(isset($_GET['logout'])){
    ?><script>
location.assign('../admin/logout.php');
</script> <?php
}else if(isset($_GET['vote'])){
  require_once('./voter.php'); 
}
require_once('../admin/inc/footer.php');