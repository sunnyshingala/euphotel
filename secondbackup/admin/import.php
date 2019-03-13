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
        $query = "INSERT INTO mapdatatbl (`name`, `mobile`, `address`, `company`, `salary`, `email`, `pincode`, `location`, `date_of_print`) 
                        VALUES ('" . $data[$_POST['name']] . "',
                        '" . $data[$_POST['mobile']] . "',
                        '" . $data[$_POST['address']] . "',
                        '" . $data[$_POST['company']] . "',
                        '" . $data[$_POST['salary']] . "',
                        '" . $data[$_POST['email']] . "',
                        '" . $data[$_POST['pincode']] . "',
                        '" . $data[$_POST['location']] . "',
                        '" . $data[$_POST['date_of_print']] . "')";
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