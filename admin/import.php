<html>
<head>
	<title>Import Data</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1 align="center" color="blue"> Imported CSV DATA</h1>
    <h2>Data Uploaded Successfull </h2>
    <?php 

        $servername = "localhost";
        $username = "tpotsco_euphotel";
        $password = "S5yusXQh7zkyhRPb";
        $dbname = "tpotsco_euphotel";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    print_r($_POST);
    print_r($_POST[filename]);

    $firstRow = true;
    if (($file = fopen($_POST[filename], "r")) !== FALSE) {
    while (($data = fgetcsv($file, 5000, ",")) !== FALSE) {
        if($firstRow){
            $firstRow = false;
            continue;
        }
        $data = array_map('trim', $data);
        // data will be received here in $data row wise
        $query = "INSERT INTO forums (`forum_id`, `forum_name`, `venue`, `president_name`, `vice_president_name_1`, `vice_president_name_2`, `created_at`, `updated_at`, `status`) 
                        VALUES ('" . $data[$_POST['forum_id']] . "',
                        '" . $data[$_POST['forum_name']] . "',
                        '" . $data[$_POST['venue']] . "',
                        '" . $data[$_POST['president_name']] . "',
                        '" . $data[$_POST['vice_president_name_1']] . "',
                        '" . $data[$_POST['vice_president_name_2']] . "',
                        '" . $data[$_POST['created_at']] . "',
                        '" . $data[$_POST['updated_at']] . "',
                        '" . $data[$_POST['status']] . "')";
        if (!mysqli_query($conn, $query)) {
            printf("Error: %s\n", mysqli_error($conn));
        }
    }
    fclose($file);
}

    ?>
<h1></h1>
<?php
    $firstRow = true;
    if (isset($_POST['import'])){

    }

?>
<?php include_once('../layout/html_end.php'); ?>