<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">"
</head>

<body>
  <div class="mainlogo">
    <img src="euphotel.png" alt="logo">
  </div>
  <!-- Navigation Bar -->
  <div class="navbar">
    <a href=""><i class="material-icons">home</i></a>
    <!-- <a href="#">Login</a>
    <a href="#">Registration</a> -->
    <a href="#">Start calling</a>
    <a href="../users/logout.php" >Logout</a>
  </div>
  <div class="register">
    <h1>Document Collection</h1>
  </div>
  <br>
  <div class="container">
    <form>
      <ul class="flex-outer">
        <label for="chkpickup">
          <input type="checkbox" id="chkpickup" />
          ANY TIME PICKUP
        </label>
        <hr />
        <div id="date" hidden>
          <li>
            <label for="pickup_time">pickup date&time:</label>
            <input type="datetime_local" id="date-time" name="date-time" value="2019-01-29T10:30">
          </li>
        </div>
        <br>
        <li>
          <label for="type">type</label>
          <select id="type" name="type" class="dropdown" required>

            <option value="Salaried">Salaried</option>
            <option value="c4c">C4C (Card for Card)</option>
          </select>
        </li>
        <li>
          <label for="idproof">id proof</label>
          <select name="idproof" class="dropdown" required>
            <option value="select">Select</option>
            <option value="aadharcard">AadharCard</option>
            <option value="pancard">PanCard</option>
            <option value="votingid">Voting ID</option>
            <option value="Drivinglicence">Driving Licence</option>
          </select>
        </li>
        <li>
          <label for="addressproof">address proof</label>
          <select name="idproof" class="dropdown" required>
            <option value="select">Select</option>
            <option value="aadharcard">AadharCard</option>
            <option value="votingid">Voting ID</option>
            <option value="Drivinglicence">Driving Licence</option>
          </select>
        </li>
        <li class="income_salaried">
          <label for="Incomeproof">Income proof (3 Months)</label>
          <select id="income_proof_salaried" name="income_proof_salaried" class="dropdown" required>
            <option value="select">Select</option>
            <option value="Salary_slip">Salary Slip </option>
            <option value="bank_statement">Bank Statement</option>
            <option value="other">Other</option>
          </select>
        </li>
        <li id="otherbox_salaried" class="income_salaried hidden">
          <label for="otherbox_salaried">other </label>
          <input type="text" id="otherbox_salaried">
        </li>
        <li class="income_c4c hidden">
          <label for="Income proof_c4c "> Income proof </label>
          <select id="income_proof_c4c" name="income_proof_c4c" class="dropdown" required>
            <option value="select">Select</option>
            <option value="Salary_slip">Salary Slip </option>
            <option value="bank_statement">Bank Statement</option>
            <option value="credit_statement">Credit Card Latest Statement</option>
            <option value="other">Other</option>
            <select>
        </li>
        <li id="otherbox_c4c" class="income_c4c hidden">
          <label for="otherbox_c4c">other </label>
          <input type="text" id="otherbox_c4c">
        </li>
        <li>
          <label for="notes">notes</label>
          <textarea></textarea>
        </li>
        <label for="chklocation">
          <input type="checkbox" id="chklocation" />
          PICKUP FROM ANOTHER LOCATION
        </label>
        <hr />
        <div id="anotherlocation" style="display: none">

          <li>
            <label for="Name">Name</label>
            <input type="text" id="name" placeholder="Enter your name here" required>
          </li>
          <li>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" placeholder="Enter your phone here" required>
          </li>
          <li>
            <label for="address">address</label>
            <textarea></textarea>
          </li>
          <li>
            <label for="pin code">pin code</label>
            <input type="number" id="pincode" placeholder="Enter your area pincode here" required>
          </li>
        </div>
        <br>
        <li>
          <label for="deliveryboy">delivery boy</label>
          <select name="deliveryboy" class="dropdown" required>
            <option value="select">Select</option>
            <option value="">Amit</option>
            <option value="">Gopal</option>
            <option value="">Raj</option>
          </select>
        </li>
        <li>
          <button type="submit">Submit</button>
        </li>
      </ul>
    </form>
  </div>
</body>

</html>


<script type="text/javascript">
  // hide date
  $(function () {
    $("#chkpickup").click(function () {
      if ($(this).is(":checked")) {
        $("#date").hide();
      } else {
        $("#date").show();
      }
    });
  });

  // $(function () {
  // for type section -->
  $("#type").change(function () {
    if ($(this).val() == 'c4c') {
      $(".income_c4c").removeClass('hidden');
      $(".income_salaried").addClass('hidden');
    } else {
      $(".income_salaried").removeClass('hidden');
      $(".income_c4c").addClass('hidden');
    }
    $("#otherbox_c4c").addClass('hidden');
    $("#otherbox_salaried").addClass('hidden');
  });
  // });

  //-- income for Salaried -->
  //  $(function () {
  $("#income_proof_salaried").change(function () {
    if ($(this).val() == 'other') {
      $("#otherbox_salaried").removeClass('hidden');
    } else {
      $("#otherbox_salaried").addClass('hidden');
    }
  });
  //});


  //-- income for c4c -->
  //$(function () {
  $("#income_proof_c4c").change(function () {
    if ($(this).val() == 'other') {
      $("#otherbox_c4c").removeClass('hidden');
    } else {
      $("#otherbox_c4c").addClass('hidden');
    }
  });
  //});

  ///-- check another location -->
  //$(function () {
  $("#chklocation").click(function () {
    if ($(this).is(":checked")) {
      $("#anotherlocation").show();
    } else {
      $("#anotherlocation").hide();
    }
  });
  // });
</script>