<?php include_once('../layout/html_start.php'); ?>
<?php
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

<!-- The flexible grid (content) -->
<div class="row">   
  <div class="side">
      <h2 class= "w3-xxlarge ">CUSTOMER DETAILS</h2>
        <div class="container">

                <div class="form-group">
                    <label class="w3-xlarge labelmiddle" >Name</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['name']?></label>
                  </div>
                <div class="form-group">
                    <label class="w3-xlarge" >CompanyName</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['company']?></label>
                  </div>
                <div class="form-group">
                    <label class="w3-xlarge" >Salary</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['salary']?></label>
                  </div>
                <div class="form-group">
                    <label class="w3-xlarge" >Location</label>
                    <label class="w3-xxlarge right-inline"><?php echo $row['location']?></label>
                  </div>
                  <hr>
                  <div class="form-group ">
                    <label class="w3-xlarge" >Contact</label>
                    <label class="w3-xlarge labelmiddle" ></label>
                    <label class="w3-xxlarge right-inline show_number" id="viewnumber" onclick="loadDoc()"> View Contact </label>
                    <label class="w3-xxlarge right-inline show_number  hidden" id="show_number"> <?php echo $row['mobile']?></label>
                  </div>

               <div class="form-group">
                    <button type="button" class="btn btn-primary active" id="updateStatus">Update Status</button>
                   
                    <form method="post" id="data_call" name="data_call">
                    <button type="button" name="nextcall" class="btn btn-primary " type="submit" id="nextcall">Next Call</button>
                    <!-- <button name="nextcall" type="submit" id="nextcall">Next Call</button> -->
                    <input type="hidden" value="<?php echo $row['map_id'] ?>" id="data_id" />
                     <input type="hidden" value="<?php echo $page + 1; ?>" name="page" />
                    </form>
              </div>
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
<script>

//view contact
$(function () {
            $("#viewnumber").click(function () {
                    $(".show_number").removeClass('hidden');
                    $(this).addClass('hidden');
                  });      
});

$(function() {
    $("#updateStatus").click(function() {
        console.log("click on tag info");
        swal({
            title: 'Update Status',
            html: '<select id="status" onChange="showTimer();" required>' +
                '<option value="">Select Status</option>' +
                '<option value="<?php echo CONTACT_STATUS_FUTURE_LEAD ?>"> <?php echo CONTACT_STATUS_1  ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_LEAD ?>"> <?php echo CONTACT_STATUS_10 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_NO_LEAD ?>"> <?php echo CONTACT_STATUS_2 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_ON_HOLD ?>"> <?php echo CONTACT_STATUS_3 ?></option>' +
                '<option value="<?php echo CONTACT_STATUS_OTHER ?>"> <?php echo CONTACT_STATUS_4 ?></option></select><br><br>' +
                ' <textarea id="user-call-note" rows="4" cols="50" placeholder="Enter your comment" required></textarea>' +

                // '<div class="document-collection form-group hidden" id="date">'+
                    // '<label type="picktime" class="w3-large hidden">Pick Time</label>'+
                    // <input type="text" value="" id="datetimepicker">/
                    // '<label class="w3-large right-inline hidden" id="on-hold-time"><input type="datetime" class="w3-large" id="datetime" name="date-time"value="<?php echo print date('d/m/y : h:m As'); ?>"> </label>',
                    '<label class="w3-large right-inline hidden" id="on-hold-time"><input type="text" value="" id="datetimepicker"/></label>',

                    // '</div>',
                allowOutsideClick: false,
                showCloseButton: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    resolve([
                        $('#status').val(),
                        $('#note').val(),
                        $('#data_id').val(),
                        $('#datetimepicker').val()
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
                    data_id: result[2],
                    datetimepicker: result[3]
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

function showTimer() {
    $("#on-hold-time").addClass('hidden');
    if ($("#status").val() == <?php echo CONTACT_STATUS_ON_HOLD ?>) {
        $("#on-hold-time").removeClass('hidden');
        $('#datetimepicker').datetimepicker({value:"+ '<?php echo date('d/m/y : h:m As'); ?>'", minDate:0 ,minTime:'10:00', maxTime:'21:00',daysOfWeekDisabled: [0],step:10});
    }
  
}

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
    var params = 'start_time=<?php echo $start_time; ?> &data_id=' + $('#data_id').val() +'&on_hold_time=' + $('#on-hold-time').val();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            $('#data_call').submit();
        }
    };
    xhttp.open("POST", "../users/timer.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(params);
}

$('#nextcall').click(function(){
    saveTimer();
});

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



<?php include_once('../layout/html_end.php'); ?>