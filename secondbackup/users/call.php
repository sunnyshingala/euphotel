<?php

include_once('../includes/session.php');
include_once('../includes/constants.php');
include_once('../includes/database.php');

$start_time= MICROTIME(TRUE);
$limit = 1;
if (isset($_POST["page"])) {
	$page = $_POST["page"];
} else {
	 $page = 1;
}

$start_from = $page -  1;
$query = mysqli_query($connection, "SELECT map_id, name, mobile, company, salary, location FROM mapdatatbl LIMIT $start_from, $limit") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>EuphoTel Call </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="../img/finaleuphotel.png" alt="logo" />
    </div>
    <!-- Navigation Bar -->
    <div class="navbar w3-container">
        <a href="../users/dashboard.php"><i class="material-icons">home</i></a>

    </div>
    <!-- The flexible grid (content) -->
    <div class="row">
        <div class="side">
            <h2 class="w3-xxlarge ">CUSTOMER DETAILS</h2>
            <div class="container">

                <div class="form-group">
                    <label class="w3-xlarge labelmiddle">Name</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['name']?></label>
                </div>
                <div class="form-group">
                    <label class="w3-xlarge">CompanyName</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['company']?></label>
                </div>
                <div class="form-group">
                    <label class="w3-xlarge">Salary</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['salary']?></label>
                </div>
                <div class="form-group">
                    <label class="w3-xlarge">Location</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['location']?></label>
                </div>
                <hr>
                <div class="form-group ">
                    <label class="w3-xlarge">Contact</label>
                    <label class="w3-xlarge labelmiddle"></label>
                    <label class="w3-xxlarge right-inline show_number" id="viewnumber" onclick="loadDoc()"> View Contact
                    </label>
                    <label class="w3-xxlarge right-inline show_number hidden" id="show_number">
                        <?php echo $row['mobile']?></label>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary active" id="comment">Update Status</button>

                    <form method="post" id="nextcall">
                        <button type="button" class="btn btn-primary" type="submit" id="nextcall"
                            onclick="saveTimer()">Next Call</button>
                        <input type="hidden" value="<?php echo $row['map_id'] ?>" id="data_id" />
                        <input type="hidden" value="<?php echo $page + 1; ?>" name="page" />
                        <input type="hidden" value="<?php echo $start_time ?>" id="start_time">

                    </form>
                </div>
            </div>

        </div>
        <div class="main">
            <h2>Audit Trail</h2>
            <div class="navbar" class="mainnavbar">
                <a href="javascript:void(0)" onclick="loadAuditTrail()" class="active at-all">All</a>
                <a href="javascript:void(0)" onclick="loadAuditTrail(1)" class="at-message">Message</a>
                <a href="javascript:void(0)" onclick="loadAuditTrail(2)" class="at-activity">Activity</a>
                <a href="javascript:void(0)" onclick="loadAuditTrail(3)" class="at-timer">Timer</a>
            </div>
            <div class="w3-container audit-trail">
                <img src="image/loader.gif" alt="loading..." class="hidden loader" />
                <ul class="w3-ul w3-card-4 audit-trail-response" id="audit-trail-response">
                </ul>
            </div>
        </div>
</body>

</html>

<script>
//view contact
$(function() {
    $("#viewnumber").click(function() {
        $(".show_number").removeClass('hidden');
        $(this).addClass('hidden');
    });
});

//update status
$(function() {
    $("#comment").click(function() {
        console.log("click on tag info");
        swal({
            title: 'Update Status',
            html: '<select id="status">' +
                '<option value="">Select Status</option>' +
                '<option value="<?php echo CONTACT_STATUS_LEAD ?>"> <?php echo CONTACT_STATUS_1 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_FUTURE_LEAD ?>"> <?php echo CONTACT_STATUS_2 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_NO_LEAD ?>"> <?php echo CONTACT_STATUS_3 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_ON_HOLD ?>"> <?php echo CONTACT_STATUS_4 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_OTHER ?>"> <?php echo CONTACT_STATUS_5 ?></option></select><br><br>' +
                ' <textarea id="note" rows="4" cols="50" placeholder="Enter your comment"></textarea>',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    resolve([
                        $('#status').val(),
                        $('#note').val(),
                        $('#data_id').val()
                    ])
                })
            }
        }).then(function(result) {
            $.ajax({
                type: 'POST',
                url: '../users/updatestatus.php',
                data: {
                    status: result[0],
                    note: result[1],
                    data_id: result[2]
                },
                success: function(response) {
                    swal(response);
                },
                error: function(response) {
                    console.error(response.message);
                    swal(response.message);
                }
            });
        }).catch(swal.noop);
    });
});

function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {}
    };
    xhttp.open("POST", "../users/datetime.php", true);
    xhttp.send();
}

function saveTimer() {
    var xhttp = new XMLHttpRequest();
    var params = 'start_time=<?php echo $start_time; ?>&data_id=' + $('#data_id').val();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById("show_number").innerHTML = this.responseText;
            $('#nextcall').submit();
        }
    };
    xhttp.open("POST", "../users/timer.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(params);
}

function loadAuditTrail(type) {
    type = (typeof type !== 'undefined') ? type : 0;
    $('.at-all').removeClass('active');
    $('.at-message').removeClass('active');
    $('.at-activity').removeClass('active');
    $('.at-timer').removeClass('active');

    if (type == 1) {
        $('.at-message').addClass('active');
    } else if (type == 2) {
        $('.at-activity').addClass('active');
    } else if (type == 3) {
        $('.at-timer').addClass('active');
    } else {
        $('.at-all').addClass('active');
    }
    $('.loader').removeClass('hidden');
    var xhttp = new XMLHttpRequest();
    var params = 'type=' + type + '&data_id=' + $('#data_id').val();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('.loader').addClass('hidden');
            document.getElementById("audit-trail-response").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "../includes/ajax/audit_trail.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(params);
}
loadAuditTrail();
</script>