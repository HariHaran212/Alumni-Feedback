<?php

include 'config.php';
session_start();
if (!isset($_SESSION['feedback_submitted'])) {
  header("Location: index.php");
  exit();
}

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['submit'])) {


    
    // $_SESSION['name'] = $_POST['name'];
    // $_SESSION['rollno'] = $_POST['rollno'];
    // $_SESSION['Department'] = $_POST['Department'];
    // $_SESSION['passingYear'] = $_POST['passingYear'];
    // $_SESSION['highestDegreeEarn'] = $_POST['highestDegreeEarn'];
    // $_SESSION['position'] = $_POST['position'];
    // $_SESSION['salary'] = $_POST['salary'];
    // $_SESSION['organisation'] = $_POST['organisation'];
    // $_SESSION['work'] = $_POST['work'];
    // $_SESSION['role'] = $_POST['role'];
    // $_SESSION['noOfYearsWorked'] = $_POST['noOfYearsWorked'];
    // $_SESSION['number'] = $_POST['number'];
    // $_SESSION['email'] = $_POST['email'];
    $_SESSION['name'] = strtoupper($_POST['name']) ;
    $_SESSION['rollno'] = $_POST['rollno'];
    $_SESSION['Department'] = $_POST['Department'];
    $_SESSION['Batch'] = $_POST['Batch'];
    $_SESSION['passingYear'] = $_POST['passingYear'];
    $highestDegreeEarn = $_POST['highestDegreeEarn'];
    if($highestDegreeEarn==="others")
    {
      $highestDegreeEarn= $_POST['highestDegreeEarn1'];
    }
    $_SESSION['highestDegreeEarn'] = $highestDegreeEarn;
    $_SESSION['position'] = $_POST['position'];
    $_SESSION['salary'] = $_POST['salary'];
    $_SESSION['organisation'] = $_POST['organisation']; 


    $areaOfWork = $_POST['work'];
    if($areaOfWork==="Others")
    {
      $areaOfWork= $_POST['work1'];
    }
    $_SESSION['work'] = $areaOfWork;


    // $_SESSION['work'] = 'workasemployyee';
    // $_SESSION['role'] = 'software developer';


    $role = $_POST['primaryJob'];
    if($role==="Others")
    {
      $role= $_POST['otherPrimaryJob1'];
    }
    $_SESSION['role'] = $role;




    $_SESSION['noOfYearsWorked'] = $_POST['workExperience'];
    $_SESSION['number'] = $_POST['number'];
    $_SESSION['email'] =  $_POST['email'];

    header("Location:AlumniQuestionnarie.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Karpagam College Of Engineering</title>
    <!-- favicon link moved inside the head -->
    <link
      rel="shortcut icon"
      href="./assets/images/Logo 1.avif"
      type="image/x-icon"
    />
    <!-- bootstrap cdn css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/index.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <!-- navbar section  -->
    <nav class="navbar navbar-expand-lg bg-body-white border">
      <div class="container">
        <a href="#" class="navbar-brand mx-auto mx-md-0">
          <img
            src="./assets/images/KCE 2024 UPDATED VERSION LOGO.png"
            class="mb-2 navbar-logo mb-sm-0"
            alt="Karpagam College Logo"
          />
        </a>
      </div>
    </nav>

    <section class="my-md-5 my-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-2 col-lg-1"></div>
          <div class="col-12 col-md-8 col-lg-10">
            <div class="card shadow">
              <div class="card-body">
                <div
                  class="fs-2 alumni-header text-center card-text fw-light card-title"
                >
                  Alumni Info
                </div>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-8">
                      <form
                        class="Montserrat needs-validation"
                        novalidate
                       
                        action="" method="post"
                      >
                      <!-- onsubmit="handleInfoForm(event)" -->
                        <!-- Alumni name -->
                        <div class="form-floating mb-3">
                          <input
                            type="text"
                            name="name"
                            class="form-control text-uppercase"
                            id="alumniName"
                            placeholder="Name of the Alumni"
                            required
                          />
                          <label for="alumniName" class="form-label"
                            >Alumni Name</label
                          > 
                          <div class="invalid-feedback" id="name-invalid">
                            Please enter the alumni name.
                          </div>
                        </div>

                        <!-- Alumni roll no -->
                        <div class="form-floating mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="rollNo"
                            placeholder="Roll No"
                            name="rollno"
                            required

                          />
                          <label for="rollNo" class="form-label">Roll No</label>
                          <div class="invalid-feedback">
                            Please enter a valid roll number.
                          </div>
                        </div>

                        <!-- Email -->

                        <!-- Mobile Number -->

                        <!-- Department -->
                        <div class="form-floating mb-3">
                          <select
                            class="form-select"
                            id="departmentSelect"
                            aria-label="Department"
                            name="Department"
                            required
                          >
                            <option value="">Select Department</option>
                            <option value="CS">CSE</option>
                            <option value="IT">IT</option>
                            <option value="EC">ECE</option>
                            <option value="EE">EEE</option>
                            <option value="ET">ETE</option>
                            <option value="AD">AI&DS</option>
                            <option value="CD">CSD</option>
                            <option value="CT">CST</option>
                            <option value="CY">Cyber Security</option>
                            <option value="CE">Civil</option>
                            <option value="ME">Mech</option>
                          </select>
                          <label for="departmentSelect">Department</label>
                          <div class="invalid-feedback">
                            Please select a department.
                          </div>
                        </div>

                        <!-- Batch -->
                        <div class="form-floating mb-3">
                          <select
                            class="form-select"
                            id="batchSelect"
                            aria-label="Batch"
                            name="Batch"
                            required
                          >
                            <option value="">Select Year</option>
                          
                            <option value="2023">2019 - 2023</option>
                            <option value="2024">2020 - 2024</option>
                            <option value="2025">2021 - 2025</option>
                            <option value="2026">2022 - 2026</option>
                            <option value="2027">2023 - 2027</option>
                          </select>
                          <label for="batchSelect">Batch</label>
                          <div class="invalid-feedback">
                            Please select a batch.
                          </div>
                        </div>

                         
                        <!-- Salary -->
                        <div class="form-floating mb-3">
                          <input
                            type="tel"
                            class="form-control"
                            id="salary"
                            placeholder="Salary"
                            name="salary"
                            required
                          />
                          <label for="salary">Salary</label>
                          <div class="invalid-feedback" id="salary-invalid">
                            Please enter your salary.
                          </div>
                        </div>


                        <!-- Year of passing -->
                        <div class="mb-3">
                          <p>Select year of passing from KCE</p>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="passingYear"
                              id="passingYear1"
                              value="a year"
                              required
                            />
                            <label class="form-check-label" for="passingYear1"
                              >A Year</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="passingYear"
                              id="passingYear2"
                              value="less than 5 year"
                            />
                            <label class="form-check-label" for="passingYear2"
                              >Less than 5 Years</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="passingYear"
                              id="passingYear3"
                              value="more than 5 years"
                            />
                            <label class="form-check-label" for="passingYear3"
                              >More than 5 Years</label
                            >
                          </div>
                          <div class="invalid-feedback">
                            Please select a passing year.
                          </div>
                        </div>


                         <!-- Present position -->
                         <div class="form-floating mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="presentPosition"
                            placeholder="Senior Developer"
                            name="position"
                            required
                          />
                          <label for="presentPosition">Present Position</label>
                          <div class="invalid-feedback">
                            Please enter your present position.
                          </div>
                        </div>

                        <!-- Highest degree earned -->
                        <div class="mb-3">
                          <p>Highest Degree</p>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="highestDegreeEarn"
                              id="highestDegree1"
                              value="B.E/B.TECH"
                              required
                            />
                            <label class="form-check-label" for="highestDegree1"
                              >B.E/TECH</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="highestDegreeEarn"
                              id="highestDegree2"
                              value="M.E"
                            />
                            <label class="form-check-label" for="highestDegree2"
                              >M.E</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="highestDegreeEarn"
                              id="highestDegree3"
                              value="M.S"
                            />
                            <label class="form-check-label" for="highestDegree3"
                              >M.S</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="highestDegreeEarn"
                              id="highestDegree4"
                              value="Ph.D"
                            />
                            <label class="form-check-label" for="highestDegree4"
                              >Ph.D</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="highestDegreeEarn"
                              id="others"
                              value="others"
                            />
                            <label class="form-check-label" for="highestDegree5"
                              >Others</label
                            >
                          </div>
                          <div
                            class="form-floating my-md-3 my-2 d-none"
                            id="otherHighestDegree"
                          >
                            <input
                              type="text"
                              id="otherHighestDegreeInput"
                              class="form-control"
                              name="highestDegreeEarn1"
                              placeholder="Enter the degree"
                            />
                            <label for="otherHighestDegreeInput"
                              >Enter the degree</label
                            >
                          </div>
                        </div>

                      
                        <!-- Name of the organization -->
                        <div class="form-floating mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="organisationName"
                            placeholder="Organization Name"
                            name="organisation"
                            required
                          />
                          <label for="organisationName"
                            >Name of the Organization</label
                          >
                          <div class="invalid-feedback">
                            Please enter the organization name.
                          </div>
                        </div>

                        <!-- Area of work -->
                        <div class="form-floating mb-3">
                          <select
                            class="form-select"
                            id="workSelect"
                            aria-label="Area of Work"
                            name="work"
                            required
                          >
                            <option value="">Select Area of Work</option>
                            <option value="Networking">Networking</option>
                            <option value="Instrumentation">
                              Instrumentation
                            </option>
                            <option value="Corporate">Corporate</option>
                            <option value="Design">Design</option>
                            <option value="Project-Manager">
                              Project Manager
                            </option>
                            <option value="Banking">Banking</option>
                            <option value="Developer">Developer</option>
                            <option value="IT">IT</option>
                            <option value="Others">Others</option>
                          </select>
                          <div
                            class="form-floating my-md-3 my-2 d-none"
                            id="areaOfWorkInput"
                          >
                            <input
                              type="text"
                              id="areaOfWorkInput"
                              class="form-control"
                              name="work1"
                              placeholder="Enter other area of work"
                            />
                            <label for="areaOfWorkInput"
                              >Enter other area of work</label
                            >
                          </div>
                          <label for="workSelect">Area of Work</label>
                          <div class="invalid-feedback">
                            Please select an area of work.
                          </div>
                        </div>

                        <!-- Primary job function -->
                        <div class="form-floating mb-3">
                          <select
                            class="form-select"
                            id="primaryJob"
                            aria-label="Primary Job Function"
                            name="primaryJob"
                            required
                          >
                            <option value="">
                              Select Primary Job Function
                            </option>
                            <option value="Technical">Technical</option>
                            <option value="AI/ML">AI/ML</option>
                            <option value="Management">Management</option>
                            <option value="Sales">Sales</option>
                            <option value="Networking">Networking</option>
                            <option value="Instrumentation">
                              Instrumentation
                            </option>
                            <option value="Corporate">Corporate</option>
                            <option value="Design">Design</option>
                            <option value="Project Manager">
                              Project Manager
                            </option>
                            <option value="Education">Education</option>
                            <option value="Banking">Banking</option>
                            <option value="Developer">Developer</option>
                            <option value="IT">IT</option>
                            <option value="Others">Others</option>
                          </select>
                          <div
                            class="form-floating my-md-3 my-2 d-none"
                            id="otherPrimaryJobInput"
                          >
                            <input
                              type="text"
                              id="otherPrimaryJob"
                              class="form-control"
                              name="otherPrimaryJob1"
                              placeholder="Enter other primary job"
                            />
                            <label for="otherPrimaryJob"
                              >Enter Primary Job</label
                            >
                          </div>
                          <label for="primaryJob">Primary Job Function</label>
                          <div class="invalid-feedback">
                            Please select a primary job function.
                          </div>
                        </div>

                        <!-- years worked  -->
                        <div class="mb-3">
                          <p>How many years have you worked as an Engineer?</p>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="workExperience"
                              id="experience1"
                              value="1-2"
                              required
                            />
                            <label class="form-check-label" for="experience1"
                              >1-2 Years</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="workExperience"
                              id="experience2"
                              value="3-4 years"
                              required
                            />
                            <label class="form-check-label" for="experience2"
                              >3-4 Years</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="workExperience"
                              id="experience3"
                              value="5-6 years"
                              required
                            />
                            <label class="form-check-label" for="experience3"
                              >5-6 Years</label
                            >
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="workExperience"
                              id="experience4"
                              value=">7 years"
                              required
                            />
                            <label class="form-check-label" for="experience4"
                              >More than 7 Years</label
                            >
                          </div>
                          <div class="invalid-feedback">
                            Please select your years of experience.
                          </div>
                        </div>

                        <!-- Contact number -->
                        <div class="form-floating mb-3">
                          <input
                            type="tel"
                            class="form-control"
                            id="contactNumber"
                            placeholder="Contact Number"
                            name="number"
                            required
                          />
                          <label for="contactNumber">Contact Number</label>
                          <div
                            class="invalid-feedback"
                            id="phone-invalid"
                          ></div>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                          <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Email"
                            name="email"
                            required
                          />
                          <label for="email">Email</label>
                          <div class="invalid-feedback">
                            Please enter a valid email address.
                          </div>
                        </div>

                        <!-- Submit button -->
                        <div class="text-end">
                          <button
                            class="btn border-primary bg-primary-subtle col-md-3 col-6"
                            id="submit-btn"
                            value="submit" name="submit"
                          >
                            next
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-2 col-lg-1"></div>
        </div>
      </div>
    </section>

    <!-- bootstrap cdn script -->

    <script>
      //userName
      function phoneNumberValidation(str) {
        return /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(str);
      }

      function containsString(str) {
        return /^[a-zA-Z ]{2,30}$/.test(str);
      }
      function salaryFormat(str) {
        return /^\d+$/.test(str);
      }
      const alumniName = document.getElementById("alumniName");

      alumniName.addEventListener("change", () => {
        if (!containsString(alumniName.value)) {
          alumniName.classList.add("is-invalid");
          document.getElementById("name-invalid").innerText =
            "Name cannot contain Numbers and Symbols";
        } else {
          alumniName.classList.remove("is-invalid");
          document.getElementById("name-invalid").classList.add("d-none");
        }
      });
      console.log(alumniName)

      // salary

      const salary = document.getElementById("salary");
      salary.addEventListener("change", () => {
        if (!salaryFormat(salary.value)) {
          document.getElementById("salary").classList.add("is-invalid");
          document.getElementById("salary-invalid").innerText =
            "Salary contains number only";
        } else {
          document.getElementById("salary").classList.remove("is-invalid");
          document.getElementById("salary-invalid").style.display = "none";
        }
      });
      console.log("salary")

      //phone number
      const phoneNumberPattern = /^[6-9]\d{9}$/;
      const phoneNumber = document.getElementById("contactNumber");

      phoneNumber.addEventListener("change", () => {
        const phoneValue = phoneNumber.value;
        const phoneValid = document.getElementById("phone-valid");
        console.log("phone value")

        if (phoneNumberValidation(phoneValue) === false) {
          phoneNumber.classList.add("is-invalid");
          phoneValid.innerText = "Only 10 digits starting with 6-9 are allowed";
          phoneValid.classList.remove("d-none");
        } else {
          phoneNumber.classList.remove("is-invalid");
          phoneValid.classList.add("d-none");
        }
      });
    </script>
    <script>
      (() => {
        "use strict";

        const forms = document.querySelectorAll(".needs-validation");

        Array.from(forms).forEach((form) => {
          form.addEventListener(
            "submit",
            (event) => {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <script>
      const aim_radio = document.querySelectorAll(
        'input[name="highestDegreeEarn"]'
      );
      aim_radio.forEach((radio) => {
        console.log("jhdjdvf");
        radio.addEventListener("change", (event) => {
          console.log("event triggered");
          if (document.getElementById("others").checked) {
            document
              .getElementById("otherHighestDegree")
              .classList.remove("d-none");
            console.log("remove");
          } else {
            document
              .getElementById("otherHighestDegree")
              .classList.add("d-none");
            console.log("add");
          }
        });
      });

      //area of work

      const workSelect = document.getElementById("workSelect");
      const areaOfWorkInput = document.getElementById("areaOfWorkInput");

      workSelect.addEventListener("change", () => {
        // Check if the selected value is "Others"
        if (workSelect.value === "Others") {
          areaOfWorkInput.classList.remove("d-none"); // Show input field
        } else {
          areaOfWorkInput.classList.add("d-none"); // Hide input field
        }
      });

      //primary job
      const primaryJobSelect = document.getElementById("primaryJob");
      const otherJobInput = document.getElementById("otherPrimaryJobInput");

      primaryJobSelect.addEventListener("change", () => {
        if (primaryJobSelect.value === "Others") {
          otherJobInput.classList.remove("d-none");
        } else {
          otherJobInput.classList.add("d-none");
        }
      });
    </script>
  </body>
</html>