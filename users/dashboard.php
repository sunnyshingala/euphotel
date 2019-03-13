<?php include_once('../layout/html_start.php');

 $name = $_SESSION['user']['name'];
 $role = $_SESSION['user']['role'];
 ?>
 
    <div class="row">
        <div class="side dashboard-side">
            <h2 class="w3-xxlarge">About you</h2>
            <p class="w3-large"> </p>

            <div class="fakeimg">
                <img src="../img/caller.jpg" alt="image" height="200px" /></div>
            <label>Name : <?php echo $name;  ?></label>
            <h3 class="w3-xxlarge">News</h3>
            <p>only for HDFC and RBI Banks card.</p>
        </div>
        <div class="main-dashboard">
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

<?php include_once('../layout/html_end.php'); ?>
