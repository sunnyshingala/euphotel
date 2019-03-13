<!DOCTYPE html>
<html>
 <head>
  <title>CSV File to HTML Table Using AJAX jQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    
        .sizeup{
            background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                    background-color: #000080;
                    color: #fff;
            
        }
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
         padding: 5px;
        text-align: left;    
        }
        .container{
            background-color: #0000;
        }
        .button1 {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
        
        </style>
 </head>
 <body>
    <form action="/admin/import.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="table-responsive">
                <h1 align="center">Map CSV Columns </h1>
                <br />
                <!-- <div>
                <button type="button" name="load_data" id="load_data" class="btn btn-info">Load Data</button> -->
            </div>
            <br />
            <div id="employee_table">
            </div>
        </div>
  </div>
  
    
  


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

$csvColumnsCount = 0;
if ( isset($_POST["btnupload"]) ) {
    if ( isset($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {

            if (file_exists("../import/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            }
            else {
                //Store file in directory "upload" with the name of "uploaded_file.txt"
                // $storagename = "uploaded_file.txt";
                move_uploaded_file($_FILES["file"]["tmp_name"], "../import/" . $_FILES["file"]["name"]);
                // echo "Stored in: " . "import/" . $_FILES["file"]["name"] . "<br />";
                $firstRow = true;
                if (($file = fopen("../import/" . $_FILES["file"]["name"], "r")) !== FALSE) {
                    echo '<table style="width:100%">';
                    while (($data = fgetcsv($file, 5000, ",")) !== FALSE) {
                        $data = array_map('trim', $data);
                        if($firstRow) {
                            $firstRow = false;
                            $csvColumnsCount = count($data);
                            // continue;
                            echo '<tr>';  
                            for($index=1; $index <= $csvColumnsCount; $index ++){
                                echo '<th>'. $index .'</th>';  
                            }
                            echo '</tr>';
                            echo '<tr>';  
                            for($index=0; $index < $csvColumnsCount; $index ++){
                                echo '<th>'.$data[$index].'</th>';  
                            }
                            echo '</tr>';
                        } else if (!$firstRow) {
                            echo '<tr>';  
                            for($index=0; $index < $csvColumnsCount; $index ++){
                                echo '<td>'.$data[$index].'</td>';  
                            }
                            echo '</tr>';
                            break;
                        }
                    }
                    echo '</table>';
                    fclose($file);
                }
            }
        }
    } else {
        echo "No file selected <br/>";
    }
}

?>

<h1 align="center">Select Your Colums</h2>

<?php


$sql = "SHOW COLUMNS FROM mapdatatbl";
$result = mysqli_query($conn,$sql);
$excludeColumns = array('map_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status');
echo '<table align="center" style="width:25%">';    
    echo '<tr>';
        echo '<th>';
            echo "Data Field";
        echo '</th>';
        echo '<th>';
            echo "Select Index Value";
        echo '</th>';
while($row = mysqli_fetch_array($result)){
    if (!in_array($row['Field'], $excludeColumns)) {
        echo '<tr>';
            echo '<th>';    
                echo $row['Field'];
            echo '</th>';
            echo '<th>';
                echo '<select name="' . $row['Field'] . '" required>'. '*';
                    echo '<option value="">Select Column</option>';
                    echo '<option value="-1">Not required</option>';
                    for ($itr = 0; $itr < $csvColumnsCount; $itr++) {
                        echo '<option value="' . $itr . '">' . ($itr + 1) . '</option>';
                    }
                echo '</select>';
            echo '</th>';
        echo '</tr>';
    }
}
echo '</table>';
?>
<br>
<div align="center">
<input type="hidden" id="filename" name="filename" value="<?php echo '../import/' . $_FILES["file"]["name"]?>">
<input type="submit" align="center" name="import" value="IMPORT" onclick="confirmpopup()" class="button1 sizeup"> 

<script>
function confirmpopup() {
  confirm("Are you sure want to proceed?");
}
</script>
</div>
</form>

 </body>
</html>