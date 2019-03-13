<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 10px;
  text-align: center;
  background: #fff;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Sticky navbar - toggles between relative and fixed, depending on the scroll position. It is positioned relative until a given offset position is met in the viewport - then it "sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 and earlier versions. However, for these versions the navbar will inherit default position */
.navbar {
  overflow: hidden;
  background-color: #002e5a;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #333;
  color: #fff;
}

/* Active/current link */
/* .navbar a.active {
  background-color: #002e5a;
  color: white;
} */

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 20%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 80%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}

/* block css start here*/

.rowone {margin: 0 -5px;}

/* Clear floats after the columnones */
.rowone:after {
  content: "";
  display: table;
  clear: both;
}
/* Float four columnones side by side */
.columnone {
  float: left;
  width: 25%;
  padding: 0 5px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #444;
  color: white;
}
.fa {font-size:50px;}
a{
    color: #fff;
}
/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
        <img src="../img/finaleuphotel.png" alt="logo" />
</div>

<div class="navbar">
  <a href="" class="active">Deshboard</a>
  <!-- <a href="#">Link</a>
  <a href="#">Link</a> -->
  <a href="#" class="right">Logout</a>
</div>

<div class="row">
  <div class="side">
  <h2 class= "w3-xxlarge">About you</h2>
  <p class= "w3-large">Welcome you Sunny to Euphotel </p>
    
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <h3 class= "w3-xxlarge">News</h3>
    <p>Lorem ipsum dolor sit ame.</p>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    
  </div>
  <div class="main">

    
    <!-- <h2>TITLE HEADING</h2>
    <h5>Title description, Dec 7, 2017</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text..</p>
    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    <br>
    <h2>TITLE HEADING</h2>
    <h5>Title description, Sep 2, 2017</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text..</p>
    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p> -->
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
        <a href="call.php">
            <div class="card">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                <p>Pending Call</p>
            </div>
        </a>
        </div>
        
        <div class="columnone">
        <a href="">
            <div class="card">
            <p><i class='fa fa-clipboard' aria-hidden="true"></i></p>
                <p>View Lead</p>
            </div>
        </a>
        </div>
        <div class="columnone">
        <a href="">
            <div class="card">
            <p><i class="fa fa-archive" aria-hidden="true"></i></p>
                <p>Accomplishment</p>
            </div>
        </a>
        </div>
    </div>
</div>


</body>
</html>
