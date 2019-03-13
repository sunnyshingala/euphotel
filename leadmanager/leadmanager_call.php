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
    <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.js"></script>
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="header">
        <img src="../img/finaleuphotel.png" alt="logo" />
    </div>
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
                <div class="form-group ">
                    <label class="w3-xlarge">Contact</label>
                    <label class="w3-xlarge labelmiddle"></label>
                    <label class="w3-xxlarge right-inline show_number leadmanager" id="viewnumber">
                        <?php echo $row['mobile']?></label>
                </div>

                <form>
                    <div class="form-group ">
                        <label class="w3-xlarge">Eligiblity</label>
                        <label class="w3-xxlarge labelmiddle"></label>
                        <a href="https://rblbank.rupeepower.com/login_lms_loans?redirect=lms-loan" target="_blank">
                            <button type="button" class="btn btn-primary active eligiblity" onclick="loadDoc()"
                                id="eligiblity">Check Eligibity</button></a>
                        </label>
                    </div>
                </form>

                <div class="form-group">
                    <label class="w3-xlarge">Status</label>
                    <label class="w3-large right-inline">
                        <select id="status" required>
                            <option value="">Select Status</option>
                            <option value="<?php echo CONTACT_STATUS_NOT_ELIGILE ?>"> <?php echo CONTACT_STATUS_11 ?>
                            </option>
                            <option value="<?php echo CONTACT_STATUS_DOCUMENTS_COLLECTION ?>">
                                <?php echo CONTACT_STATUS_12 ?></option>
                            <option value="<?php echo CONTACT_STATUS_DOCUMENT_COLLECTED ?>">
                                <?php echo CONTACT_STATUS_13 ?></option>
                            <option value="<?php echo CONTACT_STATUS_APPLICATION_SUBMITTED ?>">
                                <?php echo CONTACT_STATUS_14 ?></option>
                            <option value="<?php echo CONTACT_STATUS_APPROVED_FROM_BANK ?>">
                                <?php echo CONTACT_STATUS_15 ?></option>
                            <option value="<?php echo CONTACT_STATUS_REJECTED_FROM_BANK ?>">
                                <?php echo CONTACT_STATUS_16 ?></option>
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label class="w3-xlarge">Comment</label>
                    <label class="w3-large right-inline"><textarea id="note" rows="4" cols="50"
                            placeholder="Enter your comment" required></textarea></label>
                </div>
                <!-- Document collection form -->
                <form id="doument_collection" class="hidden">
                <ul class="flex-outer">
                    <label for="chkpickup">
                        <input class="w3-large" type="checkbox" id="chkpickup" />
                        <label class="w3-large">ANY TIME PICKUP</label>
                    </label>
                </ul>

                <hr />
                <div class="document-collection form-group hidden" id="date">
                    <label type="picktime" class="w3-large">Pick Time</label>
                    <label class="w3-large right-inline"><input type="datetime-local" id="date-time" name="date-time"
                            value="2019-01-29T10:30"></label>
                </div>
                <div class="document-collection form-group">
                    <label for="type" class="w3-large">Type</label>
                    <label class="w3-large right-inline">
                        <select id="type" required>
                            <option value="">Select Type</option>
                            <option value="Salaried"> Salaried</option>
                            <option value="C4C"> C4C</option>
                        </select>
                    </label>
                </div>
                <div class="document-collection form-group">
                    <label class="w3-large">Id Proof</label>
                    <label class="w3-large right-inline">
                        <select name="idproof" if="idproof" required>
                            <option value="">Select Id proof</option>
                            <option value="aadharcard">AadharCard</option>
                            <option value="pancard">PanCard</option>
                            <option value="votingid">Voting ID</option>
                            <option value="Drivinglicence">Driving Licence</option>
                        </select>
                    </label>
                </div>
                <div class="document-collection form-group">
                    <label class="w3-large">Address Proof</label>
                    <label class="w3-large right-inline">
                        <select name="addressproof" required>
                            <option value="">Select Address proof</option>
                            <option value="aadharcard">AadharCard</option>
                            <option value="votingid">Voting ID</option>
                            <option value="Drivinglicence">Driving Licence</option>
                        </select>
                    </label>
                </div>
                <div class="document-collection form-group income_salaried hidden">
                    <label class="w3-large">Salaried Income</label>
                    <label class="w3-large right-inline">
                        <select id="income_proof_salaried" required>
                            <option value="">Select Salaried Income (3 Months)</option>
                            <option value="Salary_slip">Salary Slip </option>
                            <option value="bank_statement">Bank Statement</option>
                            <option value="other">Other</option>
                        </select>
                    </label>
                </div>
                <div id="otherbox_salaried" class="document-collection form-group income_salaried hidden">
                    <label class="w3-large">Other</label>
                    <label class="w3-large right-inline document-collection"><textarea id="otherbox_salaried" rows="4"
                            cols="10" placeholder="Enter Your Other Proof" required></textarea></label>
                </div>
                <div class="document-collection form-group income_c4c hidden">
                    <label class="w3-large">C4C Income</label>
                    <label class="w3-large right-inline">
                        <select id="income_proof_c4c" required>
                            <option value="select">Select C4C Income</option>
                            <option value="Salary_slip">Salary Slip </option>
                            <option value="bank_statement">Bank Statement</option>
                            <option value="credit_statement">Credit Card Latest Statement</option>
                            <option value="other">Other</option>
                        </select>
                    </label>
                </div>
                <div id="otherbox_c4c" class="document-collection form-group income_c4c hidden">
                    <label class="w3-large">Other</label>
                    <label class="w3-large right-inline document-collection"><textarea id="otherbox_c4c" rows="4"
                            cols="10" placeholder="Enter Your Other Proof" required></textarea></label>
                </div>
                <ul class="flex-outer">
                    <label for="chklocation">
                        <input class="w3-large" type="checkbox" id="chklocation" />
                        <label class="w3-large">Pick up from another location</label>
                    </label>
                </ul>
                <hr />
                <div id="anotherlocation" style="display: none">
                    <div class="document-collection form-group">
                        <label class="w3-large">Name</label>
                        <label class="w3-large right-inline"><input type="text" placeholder="enter name"></label>
                    </div>
                    <div class="document-collection form-group">
                        <label class="w3-large">Phone</label>
                        <label class="w3-large right-inline"><input type="number"
                                placeholder="enter phone number"></label>
                    </div>
                    <div class="document-collection form-group">
                        <label class="w3-large">Address</label>
                        <label class="w3-large right-inline"><input type="text" placeholder="enter address"></label>
                    </div>
                    <div class="document-collection form-group">
                        <label class="w3-large">Pincode</label>
                        <label class="w3-large right-inline"><input type="text" placeholder="enter pincode"></label>
                    </div>
                </div>
                <div class="document-collection form-group">
                    <label class="w3-large">Delivery boy</label>
                    <label class="w3-large right-inline"><select id="status" required>
                            <option value="">Select document boy</option>
                            <option value="amit"> Amit</option>
                            <option value="bhavesh"> Bhavesh</option>
                        </select>
                    </label>
                </div>
                <div class="document-collection form-group">
                    <button type="button" class="btn btn-primary active" id="submit">Submit</button>
                </div>
                </form>
            </div>
            <div class="document-collection form-group">
                <button type="button" class="btn btn-primary active" id="updateStatus">Update Status</button>
                <form method="post">
                    <button type="button" class="btn btn-primary " type="submit" id="nextcall">Next Call</button>
                    <input type="hidden" value="<?php echo $row['map_id'] ?>" id="data_id" />
                    <input type="hidden" value="<?php echo $page + 1; ?>" name="page" />
                </form>
            </div>


        </div>
        <div class="main">
            <div class="navbar" class="mainnavbar">
                <a href="javascript:void(0)" onclick="loadAuditTrail()" class="active at-all">All</a>
                <a href="javascript:void(0)" onclick="loadAuditTrail(1)" class="at-message">Message</a>
                <a href="javascript:void(0)" onclick="loadAuditTrail(2)" class="at-activity">Activity</a>
                <a href="javascript:void(0)" onclick="loadAuditTrail(3)" class="at-timer">Timer</a>
            </div>
            <div class="w3-container audit-trail">
                <img src="../img/loader.gif" alt="loading..." class="hidden loader" />
                <ul class="w3-ul w3-card-4 audit-trail-response" id="audit-trail-response">


                    <!-- <?php
  $auditTrailQuery = "SELECT at.id, at.data_id, at.message, at.action_by, at.created_at, at.type, u.name as user_name FROM audit_trail as at, users as u WHERE at.action_by = u.id AND at.data_id = " . $row['map_id'];
  $auditTrailResult = mysqli_query($connection, $auditTrailQuery);
  if (mysqli_num_rows($auditTrailResult) > 0) {
    while ($auditTrail = mysqli_fetch_assoc($auditTrailResult)) { ?>
        <li class="w3-bar">
          <div class="w3-bar-item">
            <span class="w3-large"><?php echo ucfirst($auditTrail['user_name'])?></span><br>
            <span><?php echo date('d F Y, H:i', strtotime($auditTrail['created_at']))?></span>
            <p><?php echo $auditTrail['message']?></p>
          </div>
        </li>
  <?php  }
  }
  ?> -->
                </ul>
            </div>
        </div>
        <!-- </form> -->
</body>

</html>

<script>
// view contact
$(function() {
    $("#CONTACT_STATUS_LEAD").click(function() {
        $(".document-collection").removeClass('hidden');
        $(this).addClass('hidden');
    });
});


//update status
$(function() {
    $("#updateStatus").click(function() {
        console.log("click on tag info");
        swal({
            title: 'Update Status',
            html: '<select id="status" required>' +
                '<option value="">Select Status</option>' +

                '<option value="<?php echo CONTACT_STATUS_NOT_ELIGILE ?>"> <?php echo CONTACT_STATUS_11 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_DOCUMENTS_COLLECTION ?>"> <?php echo CONTACT_STATUS_12 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_DOCUMENT_COLLECTED ?>"> <?php echo CONTACT_STATUS_13 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_APPLICATION_SUBMITTED ?>"> <?php echo CONTACT_STATUS_14 ?></option></select><br><br>' +
                '<option value="<?php echo CONTACT_STATUS_APPROVED_FROM_BANK ?>"> <?php echo CONTACT_STATUS_15 ?></option></select><br><br>' +
                '<option value="<?php echo CONTACT_STATUS_REJECTED_FROM_BANK ?>"> <?php echo CONTACT_STATUS_16 ?></option></select><br><br>' +
                ' <textarea id="note" rows="4" cols="50" placeholder="Enter your comment" required></textarea>',
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

// hide date
$(function() {
    $("#chkpickup").click(function() {
        if ($(this).is(":checked")) {
            $("#date").addClass('hidden');
        } else {
            $("#date").removeClass('hidden');
        }
    });
});

// for type section -->
$("#type").change(function() {
    if ($(this).val() == 'C4C') {
        $(".income_c4c").removeClass('hidden');
        $(".income_salaried").addClass('hidden');
    } else {
        $(".income_salaried").removeClass('hidden');
        $(".income_c4c").addClass('hidden');
    }
    $("#otherbox_c4c").addClass('hidden');
    $("#otherbox_salaried").addClass('hidden');
});

//-- income for Salaried -->
$("#income_proof_salaried").change(function() {
    if ($(this).val() == 'other') {
        $("#otherbox_salaried").removeClass('hidden');
    } else {
        $("#otherbox_salaried").addClass('hidden');
    }
});

//-- income for c4c -->
$("#income_proof_c4c").change(function() {
    if ($(this).val() == 'other') {
        $("#otherbox_c4c").removeClass('hidden');
    } else {
        $("#otherbox_c4c").addClass('hidden');
    }
});

///-- check another location -->
$("#chklocation").click(function() {
    if ($(this).is(":checked")) {
        $("#anotherlocation").show();
    } else {
        $("#anotherlocation").hide();
    }
});

// form
$("#status").change(function() {
    // if (("#status").val()== <?php echo CONTACT_STATUS_DOCUMENTS_COLLECTION ?>">) {
        if ($("#status").val() == <?php echo CONTACT_STATUS_DOCUMENTS_COLLECTION ?>) {
        
        $("#doument_collection").removeClass('hidden');
    } else {
        $("#doument_collection").addClass('hidden');
        
    }
});

</script>