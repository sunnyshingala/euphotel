<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input, select {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #002e5a;;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
label{
    margin:10px;
}

.hidden { display: none !important;}

.flex-outer, .flex-inner { list-style-type: none; padding: 0;}
  
  .flex-outer { max-width: 800px; margin: 0 auto;}
  
  .flex-outer li, .flex-inner { display: flex; flex-wrap: wrap; align-items: center; }
  
  .flex-inner { padding: 0 8px; justify-content: space-between;  }
  
  .flex-outer > li:not(:last-child) {margin-bottom: 20px;}
  
  .flex-outer li label, .flex-outer li p { padding: 8px; font-weight: 300; letter-spacing: .09em; text-transform: uppercase; }

  .flex-outer > li > label, .flex-outer li p { flex: 1 0 120px;  max-width: 220px;}
  
  .flex-outer > li > label + *, .flex-inner { flex: 1 0 220px; }
  
  .flex-outer li p { margin: 0;}
  
  .flex-outer li input:not([type='checkbox']), .flex-outer li textarea { padding: 15px; width: 395px;}
  
  .flex-outer li button { margin-left: auto; padding: 8px 16px; border: none; background: #002e5a; color: #f2f2f2; text-transform: uppercase;  letter-spacing: .09em; border-radius: 2px; }
  
  .flex-inner li { width: 100px;}

</style>
<body>

<form id="regForm" action="/action_page.php">
  <h1>Eligibity:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
              <label for="employement_type">Employement Type:</label>
              <select name="employement_type"oninput="this.className = ''" name="employement_type" required>
                    <option value="salaried">Salaried</option>
                    <option value="c4c">C4C</option>
                  </select>

    <label for="salary">Salary:</label>
    <p><input type="number" placeholder="salary" oninput="this.className = ''" name="salary"></p>

    <label for="comapanytype">Company Type:</label>
    <select name="companytype"oninput="this.className = ''" name="companytype" required>
                    <option value="listed">Listed</option>
                    <option value="nonlisted">Non-Listed</option>
                  </select>
    <label for="pincode">Pincode:</label>
    <input type="number" placeholder="search" required>
  </div>
  <div class="tab">

    <!-- <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
  </div>
  <div class="tab">Birthday:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
  </div>
  <div class="tab">Login Info:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p> -->
    <ul class="flex-outer">
            <label for="chkpickup">
                <input type="checkbox" id="chkpickup" />
                    ANY TIME PICKUP  
            </label>
    <hr />
    <div id="date" hidden>
            <li>
                    <label for="pickup_time">pickup date&time:</label>
                    <input type="datetime_local" id="date-time"
                           name="date-time" value="2019-01-29T10:30">
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
                          <option  value="other">Other</option>
                  </select>
                  </li> 
                          <li id="otherbox_salaried"  class="income_salaried hidden">
                                  <label for="otherbox_salaried">other </label>
                                  <input type="text" id="otherbox_salaried">
                                </li> 
            
  <li  class="income_c4c hidden" >
              <label for="Income proof_c4c "> Income proof </label>
              <select id="income_proof_c4c" name="income_proof_c4c" class="dropdown" required>
                    <option value="select">Select</option>
                    <option value="Salary_slip">Salary Slip </option>
                    <option value="bank_statement">Bank Statement</option>
                    <option value="credit_statement">Credit Card Latest Statement</option>
                    <option  value="other">Other</option>
               <select>
            </li> 
            <li id="otherbox_c4c"  class="income_c4c hidden">
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
            <!-- <li>
              <button type="submit">Submit</button>
            </li> -->
          </ul>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <!-- <span class="step"></span>
    <span class="step"></span> -->
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}



//<script type="text/javascript">
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
 
</script>

</body>
</html>
