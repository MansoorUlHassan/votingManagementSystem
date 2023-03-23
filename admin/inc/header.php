<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class='row bg-black text-white'>
            <div class='col-1 my-2'>
                <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png"
                    width="80px" class="brand_logo" alt="Logo">
            </div>
            <div class='col-11 my-auto'>
                <h3>Online - Voting System - <small class="text-red">Welcome <?php echo $_SESSION['user_name']; ?>!
                    </small>
                </h3>
            </div>
        </div>