<?php
include_once('../layout/html_start.php');

$lead = CONTACT_STATUS_LEAD;

$query = mysqli_query($connection, "SELECT map_id, name, mobile, company, salary, data_status, lead_by, lead_time, location FROM mapdatatbl WHERE data_status =" .$lead) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
?>


    <div class="list-container">
        <table id="example" class="display nowrap" style="width:100%">
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
                <tr>
                    <td> <?php echo $row['map_id']?> </td>
                    <td> <?php echo $row['name']?> </td>
                    <td> <?php echo $row['company']?> </td>
                    <td> <?php echo $row['location']?> </td>
                    <td> <?php echo constant('CONTACT_STATUS_' . $row['data_status'])?> </td>
                    <td> <?php echo $row['lead_by']?> </td>
                    <td> <?php echo $row['lead_time']?> </td>
                    <td><a href="#">View </a> </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<?php include_once('../layout/html_end.php'); ?> 
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ]
    });
});
</script>