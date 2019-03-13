<?php
include_once('../includes/session.php'); 

 $name = $_SESSION['user']['name'];
 $role = $_SESSION['user']['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="header">
        <img src="../img/finaleuphotel.png" alt="logo" />
    </div>

    <div class="navbar">
        <a href="" class="active">Dashboard</a>
        <a href="../logout.php" class="right">Logout</a>
    </div>

    <div class="row">
        <div class="side">
            <h2 class="w3-xxlarge">About you</h2>
            <p class="w3-large"> </p>

            <div class="fakeimg">
                <img src="../users/caller.jpg" alt="image" height="200px" /></div>
            <label>Name : <?php echo $name;  ?></label>
            <h3 class="w3-xxlarge">News</h3>
            <p>only for HDFC and RBI Banks card.</p>
        </div>
        <div class="main">
            <div class="rowone">
                <div class="columnone">
                    <a href="call.php">
                        <div class="card">
                            <p><i class="fa fa-phone" aria-hidden="true"></i></p>
                            <p>Start Call Now</p>
                        </div>
                    </a>
                </div>
                <div class="columnone">
                    <a href="pendingcall.php">
                        <div class="card">
                            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                            <p>Pending Call</p>
                        </div>
                    </a>
                </div>

                <div class="columnone">
                    <a href="viewlead.php">
                        <div class="card">
                            <p><i class='fa fa-clipboard' aria-hidden="true"></i></p>
                            <p>View Lead</p>
                        </div>
                    </a>
                </div>
                <div class="columnone">
                    <a href="accomplishment.php">
                        <div class="card">
                            <p><i class="fa fa-archive" aria-hidden="true"></i></p>
                            <p>Accomplishment</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
</body>

</html>