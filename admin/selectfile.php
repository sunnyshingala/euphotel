
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    .block {
    text-align: center;
    font-size: 40px;
    white-space: nowrap;

    
    /* border: 2px solid #000080;
    border-style: ridge;
    border-radius: 8px; */
    }
.block:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -0.25em; /* Adjusts for spacing */
}
.centered {

  display: inline-block;
  vertical-align: middle;
  width: 400px;
  margin: auto;  
  padding: 20px;
text-align: center;
 
}
#btnuoload{
    background-color: #000080;
    color: #fff;
}
.textsize{
    /* padding:200px; */
    /* height:50px; */
    font-size:15pt; 
}
.sizeup{
    padding:15px; 
}

.header {
  padding: 10px;
  text-align: center;
  background: #fff;
  color: white;
}
/* Style the top navigation bar */
.navbar {
  display: flex;
  background-color: #002e5a;
  justify-content: flex-start ;
  align-items: center;
}
.navbar.mainnavbar {
  display: flex;
  background-color: #000000;
  justify-content: center;
}

/* Style the navigation bar links */
.navbar a {
  color: white;
  padding: 14px 20px;
  text-decoration: none;
  text-align: center;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}


</style>
<title>File Upload with PHP</title>
</head>
<body>
    <form action="/admin/upload.php" method="post" enctype="multipart/form-data">
    
        <!-- <div class="block" style="height: 600px;">

            <div class="centered">
                <div>
                <label id="labelofblock">Upload File</label><br><br>
                </div>
                <input type="file" name="file" class="textsize" >
            </div>
            <div>
             -->
            <div class="header">
                 <img src="img/finaleuphotel.png" alt="logo" />
            </div>
            <div class="navbar w3-container">
                <a href=""><i class="material-icons">home</i></a>
                <a href="#">View Lead</a>
                <a href="#"></a>
            </div>
            <div class="block" style="height: 600px;">
            <div class="field centered">
                <div class="file is-centered is-large is-boxed has-name">
                    <label class="file-label">
                    <input class="file-input" type="file" name="file">
                    <span class="file-cta">
                        <span class="file-icon">
                        <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            CSV file…
                        </span>
                    </span>
                    </label>
                    <input id="btnuoload" name="btnupload" type="submit" class="sizeup" value="UPLOAD" required>
                </div>
            </div>
            
        </div>

    </form>
</body>
</html>