<?php
include 'config.php';
session_start();

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
if (!isset($_SESSION['feedback_submitted'])) {
  header("Location: index.php");
  exit();
}

$table = $_SESSION['Department'] . $_SESSION['Batch'];


$department=$_SESSION['Department'];
 $sql="SELECT * FROM program WHERE department='$department' ";

 $result=mysqli_query($con,$sql);
 
 
 if ($result->num_rows > 0) 
 {  while($row = mysqli_fetch_assoc($result)){
   
 //  $name=  $row["name"];
  // $batch=$row["batch"];
   $question3=$row["question3"];
   $question4=$row["question4"];
   $question5=$row["question5"];
  // $converted=preg_replace('/-/','_',$row["Batch"]);
  // $_SESSION['Batch']=$converted;
 
  }
 }

if (isset($_POST['submit'])) {


// echo "clicked on php";

$name= $_SESSION['name'];
$roll=$_SESSION['rollno'];
$dept= $_SESSION['Department'];
$batch= $_SESSION['Batch'];
$year= $_SESSION['passingYear'];
$degree= $_SESSION['highestDegreeEarn'];
$position= $_SESSION['position'];
$salary= $_SESSION['salary'];
$organisation= $_SESSION['organisation'];
$work= $_SESSION['work'];
$role= $_SESSION['role'];
$noOfYearsWorked= $_SESSION['noOfYearsWorked'];
$number= $_SESSION['number'];
$email= $_SESSION['email'];
$q1=$_SESSION['q1'];
$q2=$_SESSION['q2'];
$q3=$_SESSION['q3'];
$q4=$_SESSION['q4'];
$q5=$_SESSION['q5'];
$q6=$_SESSION['q6'];
$q7=$_SESSION['q7'];
$q8=$_SESSION['q8'];
$q9=$_SESSION['q9'];
$q10=$_SESSION['q10'];
$q11=$_SESSION['q11'];
$q12=$_SESSION['q12'];
$q13=$_SESSION['q13'];
$q14=$_SESSION['q14'];
$q15=$_SESSION['q15'];
$q16=$_SESSION['q16'];
$q17=$_SESSION['q17'];
$q18=$_SESSION['q18'];
$q19=$_SESSION['q19'];
$q20=$_SESSION['q20'];   



    $q21=$_POST['rating1'];
    $q22=$_POST['rating2'];
    $q23=$_POST['rating3'];
    $checkTableQuery = "SHOW TABLES LIKE '$table'";
    $tableExists = $con->query($checkTableQuery)->num_rows > 0;



    $stmt = $con->prepare("INSERT INTO $table (
        name, rollno, department, batch, year_graduation, degree,
        current_position, salary,organization, area_of_work, primary_job,
        worked_as_Engineer, mobile_number, email,
        po1 ,
        po2 ,
        po3 ,
        po4 ,
        po5 ,
        po6 ,
        po7 ,
        po8 ,
        po9 ,
        po10 ,
        po11 ,
        po12 ,
        pso1 ,
        pso2 ,
        ug_pg_course,
        value_added_course,
        training,
        improvements,
        conference_or_journals,
        patent,
        peo1 ,
        peo2 ,
        peo3 
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
              ?,?,?,?,?,?,?,?,?,?,?,?,?,?,
              ?,?,?,?,?,?,?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }
    
    $stmt->bind_param(
        "ssssssssssssssiiiiiiiiiiiiiissssssiii", // Adjusted type string
        $name, $roll, $dept, $batch, $year, 
        $degree, $position, $salary, 
        $organisation, $work, $role, $noOfYearsWorked,
        $number, $email,
        $q1, $q2, $q3, $q4, $q5, 
        $q6, $q7, $q8, $q9, $q10, 
        $q11, $q12, $q13, $q14, $q15, 
        $q16, $q17, $q18, $q19, $q20, 
        $q21, $q22, $q23
    );
    
    if ($stmt->execute()) {
      header("Location: Thankyou.php");
      exit();
  } else {
      error_log("Error: " . $stmt->error); 
      echo "Error: " . $stmt->error; 
      // Temporarily display the error
  }
  

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
    <script src="./script/AssementOfPOE.js"></script>

    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/index.css" />
    <link rel="stylesheet" href="./style/AlumniQuestionnarie.css" />
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
            <div class="card border shadow">
              <div class="card-body">
                <div
                  class="fs-2 alumni-header text-center card-text fw-light card-title"
                >
                  Assessment of Program Educational Objectives
                </div>

                <div class="alumni-intro px-md-5">
                  Please rate the following program educational objectives.
                  These objectives are statements that describe the expected
                  accomplishments of graduate after graduation. Each respondent
                  is asked to rate each item with respect to your knowledge and
                  experience gained. Each scale item has five response
                  categories, ranging from ““1-Lowest”  to    5- High” .
                </div>

                <form   method="post"  onsubmit="validate(event)">
                  <!-- q1 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 pt-3">
                      <p class="fs-6" id="err1">
                     <b>PEO1.</b><?php echo $question3 ?>
                      </p>
                      <div
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="q1-star5"
                          name="rating1"
                          value="5"
                        />
                        <label for="q1-star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q1-star4"
                           name="rating1"
                          value="4"
                        />
                        <label for="q1-star4" title="4 stars" class="fs-1"
                          >
                          ★</label
                        >
                        <input
                          type="radio"
                          id="q1-star3"
                           name="rating1"
                          value="3"
                        />
                        <label for="q1-star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q1-star2"
                           name="rating1"
                          value="2"
                        />
                        <label for="q1-star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q1-star1"
                           name="rating1"
                          value="1"
                        />
                        <label for="q1-star1" title="1 star" class="fs-1"
                          >★</label
                        >
                      </div>
                      <p
                        class="text-center text-muted mt-2"
                        id="rating1-value"
                      ></p>
                    </div>
                  </div>

                  <!-- q2 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 pt-3">
                      <p class="fs-6"  id="err2">
                      <b>PEO2.</b><?php echo $question4 ?>
                      </p>
                      <div
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="q2-star5"
                          name="rating2"
                          value="5"
                        />
                        <label for="q2-star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q2-star4"
                          name="rating2"
                          value="4"
                        />
                        <label for="q2-star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q2-star3"
                          name="rating2"
                          value="3"
                        />
                        <label for="q2-star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q2-star2"
                          name="rating2"
                          value="2"
                        />
                        <label for="q2-star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q2-star1"
                          name="rating2"
                          value="1"
                        />
                        <label for="q2-star1" title="1 star" class="fs-1"
                          >★</label
                        >
                      </div>
                      <p
                        class="text-center text-muted mt-2"
                        id="rating2-value"
                      ></p>
                    </div>
                  </div>

                  <!-- q3 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 pt-3">
                      <p class="fs-6" id="err3">
                      <b>PEO3.</b><?php echo $question5 ?>
                      </p>
                      <div
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="q3-star5"
                          name="rating3"
                          value="5"
                        />
                        <label for="q3-star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q3-star4"
                          name="rating3"
                          value="2"
                        />
                        <label for="q3-star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q3-star3"
                          name="rating3"
                          value="3"
                        />
                        <label for="q3-star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q3-star2"
                          name="rating3"
                          value="4"
                        />
                        <label for="q3-star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="q3-star1"
                          name="rating3"
                          value="5"
                        />
                        <label for="q3-star1" title="1 star" class="fs-1"
                          >★</label
                        >
                      </div>
                      <p
                        class="text-center text-muted mt-2"
                        id="rating3-value"
                      ></p>
                    </div>
                  </div>

                  <!-- button  -->
                  <div class="text-end pe-md-5">
                    <button 
                     class="btn bg-primary-subtle border-primary"
                    value="submit"  name="submit"
                               
                     
                    >
                      Submit
                    </button>
                       <!-- onclick="validate(event)" -->
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-2 col-lg-1"></div>
        </div>
      </div>
    </section>

    <!-- bootstrap cdn script -->
     <script>    function validate(event) {
  //  event.preventDefault(); // Prevent form submission
  console.log("clicked");
  let flag = false;
  let count = 0;
  let qn = ['rating1', 'rating2', 'rating3'];
  let err = ['err1', 'err2', 'err3']; // Define err array

  for(i=0;i<qn.length;i++){
                if(isRadioChecked(qn[i])==false)
                {
                    document.getElementById(err[i]).style.color="red";
                    flag=true;
                    count++;
                }
                else
                {
                    document.getElementById(err[i]).style.color="black";
                }
                if(count=1){
                    document.getElementById(err[i]).scrollIntoView();
                }
            }
 if(flag)
 {
  event.preventDefault();
 }
}

function isRadioChecked (radioName){
            var radioList=document.getElementsByName(radioName);
            for(var i=0; i<radioList.length;i++){
                if(radioList[i].checked){
                    return true;
                }
            }
            return false;
        }
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
  </body>
</html>