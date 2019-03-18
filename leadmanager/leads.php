<?php
include_once('../layout/html_start.php');

$lead = CONTACT_STATUS_LEAD;


?>


    <div class="list-container">
        <table id="lead_data" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Data ID</th>
                    <th>Name</th>
                    <th>Comapany Name</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Lead By</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($connection, "SELECT id, name, mobile, company, salary, data_status, lead_by, lead_time, location FROM mapdatatbl WHERE data_status =" .$lead) or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_assoc($query)){
                    ?>
                   <tr>
                      <td> <?php echo $row['id']?> </td>
                      <td> <?php echo $row['name']?> </td>
                      <td> <?php echo $row['company']?> </td>
                      <td> <?php echo $row['location']?> </td>
                      <td> <?php echo constant('CONTACT_STATUS_' . $row['data_status'])?> </td>
                      <td> <?php echo $row['lead_by']?> </td>
                      <td> <?php echo $row['lead_time']?> </td>
                      <td><a href="leadmanager_call.php?id=<?php echo $row['id']?>">View </a> </td>
                  </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<?php include_once('../layout/html_end.php'); ?> 

<script type="text/javascript" scr="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
$(document).ready(function() {
    $('#lead_data').DataTable();
} );
</script>