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
$roll=$_SESSION['rollno'];
$question="SELECT * FROM alumni_questionnaire";

$res = $con->query($question);
$i=1;

if ($res->num_rows > 0) {
    // Output data of each row
    while($row = $res->fetch_assoc() ) {
        ${"q$i"} =  $row["question"] ;
        $i=$i+1;
        
    }
} 
$checkTableQuery = "SHOW TABLES LIKE '$table'";
$tableExists = $con->query($checkTableQuery)->num_rows > 0;
$currentCount=0;
if($tableExists){
   
    $check = "SELECT rollno FROM $table WHERE rollno = '$roll' ";
    $resultt=$con->query($check);
    if($resultt->num_rows>0)
    {
        while($row=$resultt->fetch_assoc())
        { $currentCount=  1;
        }
    }
    if($currentCount == 1)
    { header("Location:Already.php");
       exit();
    }
    }                   


// echo $_SESSION['name'];
// echo $_SESSION['rollno'];
// echo $_SESSION['Department'];
// echo $_SESSION['Batch'];
// echo $_SESSION['passingYear'];
// echo $_SESSION['highestDegreeEarn'];
// echo $_SESSION['position'];
// echo $_SESSION['salary'];
// echo $_SESSION['organisation'];
// echo $_SESSION['work'];
// echo $_SESSION['role'];
// echo $_SESSION['noOfYearsWorked'];
// echo $_SESSION['number'];
// echo $_SESSION['email'];
$department=$_SESSION['Department'];
 $sql="SELECT * FROM program WHERE department='$department' ";

 $result=mysqli_query($con,$sql);
 
 
 if ($result->num_rows > 0) 
 {  while($row = mysqli_fetch_assoc($result)){
   
 //  $name=  $row["name"];
  // $batch=$row["batch"];
   $question1=$row["question1"];
   $question2=$row["question2"];
 
  // $converted=preg_replace('/-/','_',$row["Batch"]);
  // $_SESSION['Batch']=$converted;
 
  }
 }



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


     $table = $_SESSION['Department'] . $_SESSION['Batch'];
     if (isset($_POST['submit'])) {



        $_SESSION['q1']=$_POST['Q1'];
        $_SESSION['q2']=$_POST['Q2'];
        $_SESSION['q3']=$_POST['Q3'];
        $_SESSION['q4']=$_POST['Q4'];
        $_SESSION['q5']=$_POST['Q5'];
        $_SESSION['q6']=$_POST['Q6'];
        $_SESSION['q7']=$_POST['Q7'];
        $_SESSION['q8']=$_POST['Q8'];
        $_SESSION['q9']=$_POST['Q9'];
        $_SESSION['q10']=$_POST['Q10'];
        $_SESSION['q11']=$_POST['Q11'];
        $_SESSION['q12']=$_POST['Q12'];
        $_SESSION['q13']=$_POST['Q13'];
        $_SESSION['q14']=$_POST['Q14'];
        $_SESSION['q15']=$_POST['Q15'];
        $_SESSION['q16']=$_POST['Q16'];
        $_SESSION['q17']=$_POST['Q17'];
        $_SESSION['q18']=$_POST['Q18'];
        $_SESSION['q19']=$_POST['Q19'];
        $question111=$_POST['Q19'];
        if($question111==='yes' )
        {
          
          $question111=$_POST['Q191'];
        }
        $_SESSION['q19']=$question111;
        $question11=$_POST['Q20'];
        if($question11==='yes' )
        {
          $question11=$_POST['Q201'];
        }
        $_SESSION['q20']=$question11;
        // $_SESSION['q21']=2;
        // $_SESSION['q22']=2;
        // $_SESSION['q23']=2;

     $checkTableQuery = "SHOW TABLES LIKE '$table'";
     $tableExists = $con->query($checkTableQuery)->num_rows > 0;

      if (!$tableExists) {
    $SQL = "CREATE TABLE `$table` (
        name VARCHAR(200) NOT NULL,
        rollno VARCHAR(200) NOT NULL,
        department VARCHAR(200) NOT NULL,
        batch VARCHAR(100) NOT NULL,
        year_graduation VARCHAR(100) NOT NULL,
        degree VARCHAR(100) NOT NULL,
        salary VARCHAR(100) NOT NULL,
        current_position VARCHAR(100) NOT NULL,  -- Escaped 'position' with backticks
        organization VARCHAR(200) NOT NULL,
        area_of_work VARCHAR(200) NOT NULL,
        primary_job VARCHAR(200) NOT NULL,
        worked_as_Engineer VARCHAR(200) NOT NULL,
        mobile_number VARCHAR(20) NOT NULL,
        email VARCHAR(100) NOT NULL,
        po1 INT NOT NULL DEFAULT 0,
        po2 INT NOT NULL DEFAULT 0,
        po3 INT NOT NULL DEFAULT 0,
        po4 INT NOT NULL DEFAULT 0,
        po5 INT NOT NULL DEFAULT 0,
        po6 INT NOT NULL DEFAULT 0,
        po7 INT NOT NULL DEFAULT 0,
        po8 INT NOT NULL DEFAULT 0,
        po9 INT NOT NULL DEFAULT 0,
        po10 INT NOT NULL DEFAULT 0,
        po11 INT NOT NULL DEFAULT 0,
        po12 INT NOT NULL DEFAULT 0,
        pso1 INT NOT NULL DEFAULT 0,
        pso2 INT NOT NULL DEFAULT 0,
        ug_pg_course VARCHAR(1000) NOT NULL,
        value_added_course VARCHAR(1000) NOT NULL,
        training VARCHAR(1000) NOT NULL,
        improvements VARCHAR(1000) NOT NULL,
        conference_or_journals VARCHAR(1000) NOT NULL,
        patent VARCHAR(1000) NOT NULL,
        peo1 INT NOT NULL DEFAULT 0,
        peo2 INT NOT NULL DEFAULT 0,
        peo3 INT NOT NULL DEFAULT 0
    )";

    if ($con->query($SQL) === TRUE) {
        echo "Table created";
    } else {
        echo "Error creating table: " . $con->error;
    }
    }
   
    header("Location:AssementOfPOE.php");
    exit();
    // $stmt = $con->prepare("INSERT INTO $table (
    //     name, rollno, department, batch, year_graduation, degree,
    //   current_position,organization,area_of_work,primary_job,
    //   worked_as_Engineer, mobile_number,email,
    //     question1, question2, question3, question4, question5, 
    //     question6, question7, question8, question9, question10, 
    //     question11, question12,question13, question14, question15, question16
    //     , question17, question18, question19, question20, question21
    //     , question22, question23
    // ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?,
    //           ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    //           ?,?,?,?,?,?,?,?,?,?,
    //           ?,?,?,?,?,?)");
    
    // if ($stmt === false) {
    //     die("Prepare failed: " . $con->error);
    // }

    // $stmt->bind_param(
    //     "sssssssssssssiiiiiiiiiiiiiissssssiii",
    //     $name, $roll, $dept, $batch, $year, 
    //     $degree, $position, $salary, 
    //     $organisation,$work,$role,$noOfYearsWorked,
    //     $number,$email,
    //     $q1,$q2, $q3, $q4, $q5, 
    //     $q6, $q7, $q8, $q9, $q10, 
    //     $q11, $q12, $q13, $q14, $q15, $q16, $q17, $q18, $q19,
    //     $q20,$q21,$q22,$q23
    // );
    
    // if ($stmt->execute()) {
    //     header("Location: Thankyou.php");
    //     exit();
    // } else {
    //     echo "Error: " . $stmt->error; 
    // }
   
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
    <!-- Bootstrap CDN CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/AlumniQuestionnarie.css" />
    <style>
      /* Custom star rating styles */
      .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        margin: 0 auto; /* Center the star rating on all screens */
        position: relative;
      }
      .star-rating input {
        display: none;
      }
      .star-rating label {
        font-size: 2rem;
        color: #ddd;
        cursor: pointer;
        padding: 0 0.1rem;
        transition: color 0.3s;
      }
      /* Checked stars */
      .star-rating input:checked ~ label {
        color: #ffc107;
      }
      /* Hovered stars */
      .star-rating label:hover,
      .star-rating label:hover ~ label {
        color: #ffc107;
      }
      /* Retain color on checked hover */
      .star-rating input:checked ~ label:hover,
      .star-rating input:checked ~ label:hover ~ label {
        color: #ffc107;
      }

      /* Responsive adjustments for smaller screens */
      @media (max-width: 576px) {
        .star-rating label {
          font-size: 1.5rem;
        }
        .card-body {
          padding: 1rem;
        }
        .fs-2 {
          font-size: 1.5rem;
        }
        .fs-6 {
          font-size: 0.875rem;
        }
        .alumni-header {
          font-size: 1.25rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg bg-body-white border">
      <div class="container">
        <a href="#" class="navbar-brand mx-auto mx-md-0">
          <img
            src="./assets/images/KCE 2024 UPDATED VERSION LOGO.png"
            class="mb-2 navbar-logo mb-sm-0"
            alt="Karpagam College Logo"
          />
        </a>
        <!-- Commented section properly closed 
        <div class="me-md-auto text-center text-md-start">
          <span class="fs-6 ms-1 ms-md-3 text-center">
            Karpagam College Of Engineering
          </span>
          <span class="fs-6 ms-1 ms-md-3 d-block text-muted">
            rediscover | refine | redefine
          </span>
        </div>
        -->
      </div>
    </nav>

    <!-- Alumni Questionnaire Section -->
    <section class="my-md-5 my-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-2 col-lg-1 d-none d-md-block"></div>
          <div class="col-12 col-md-8 col-lg-10">
            <div class="py-5 border">
              <div class="card-body">
                <div
                  class="fs-2 alumni-header text-center card-text fw-light card-title"
                >
                  Alumni Questionnaire
                  <p class="fs-6 alumni-intro text-center">
                    As a Graduate of KCE, where you place yourself on the
                    following Questionnaires
                  </p>
                </div>
                
                <form action="" method="post">
                  <!-- q1  -->
                  <div class="px-md-5 my-3 my-md-5 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err1">
                       <b>PO1 .</b><?php echo $q1; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q1star5"
                          name="Q1"
                          value="5"
                        />
                        <label for="Q1star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q1star4"
                          name="Q1"
                          value="4"
                        />
                        <label for="Q1star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q1star3"
                          name="Q1"
                          value="3"
                        />
                        <label for="Q1star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q1star2"
                          name="Q1"
                          value="2"
                        />
                        <label for="Q1star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q1star1"
                          name="Q1"
                          value="1"
                        />
                        <label for="Q1star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q2  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err2">
                      <b>PO2 .</b><?php echo $q2; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q2star5"
                          name="Q2"
                          value="5"
                        />
                        <label for="Q2star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q2star4"
                          name="Q2"
                          value="4"
                        />
                        <label for="Q2star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q2star3"
                          name="Q2"
                          value="3"
                        />
                        <label for="Q2star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q2star2"
                          name="Q2"
                          value="2"
                        />
                        <label for="Q2star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q2star1"
                          name="Q2"
                          value="1"
                        />
                        <label for="Q2star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q3  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err3">
                      <b>PO3 .</b><?php echo $q3; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q3star5"
                          name="Q3"
                          value="5"
                        />
                        <label for="Q3star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q3star4"
                          name="Q3"
                          value="4"
                        />
                        <label for="Q3star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q3star3"
                          name="Q3"
                          value="3"
                        />
                        <label for="Q3star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q3star2"
                          name="Q3"
                          value="2"
                        />
                        <label for="Q3star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q3star1"
                          name="Q3"
                          value="1"
                        />
                        <label for="Q3star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q4  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err4">
                      <b>PO4 .</b><?php echo $q4; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q4star5"
                          name="Q4"
                          value="5"
                        />
                        <label for="Q4star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q4star4"
                          name="Q4"
                          value="4"
                        />
                        <label for="Q4star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q4star3"
                          name="Q4"
                          value="3"
                        />
                        <label for="Q4star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q4star2"
                          name="Q4"
                          value="2"
                        />
                        <label for="Q4star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q4star1"
                          name="Q4"
                          value="1"
                        />
                        <label for="Q4star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q5 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err5">
                      <b>PO5 .</b><?php echo $q5; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q5star5"
                          name="Q5"
                          value="5"
                        />
                        <label for="Q5star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q5star4"
                          name="Q5"
                          value="4"
                        />
                        <label for="Q5star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q5star3"
                          name="Q5"
                          value="3"
                        />
                        <label for="Q5star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q5star2"
                          name="Q5"
                          value="2"
                        />
                        <label for="Q5star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q5star1"
                          name="Q5"
                          value="1"
                        />
                        <label for="Q5star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q6  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err6">
                      <b>PO6 .</b><?php echo $q6; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q6star5"
                          name="Q6"
                          value="5"
                        />
                        <label for="Q6star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q6star4"
                          name="Q6"
                          value="4"
                        />
                        <label for="Q6star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q6star3"
                          name="Q6"
                          value="3"
                        />
                        <label for="Q6star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q6star2"
                          name="Q6"
                          value="2"
                        />
                        <label for="Q6star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q6star1"
                          name="Q6"
                          value="1"
                        />
                        <label for="Q6star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q7  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err7">
                      <b>PO7 .</b><?php echo $q7; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q7star5"
                          name="Q7"
                          value="5"
                        />
                        <label for="Q7star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q7star4"
                          name="Q7"
                          value="4"
                        />
                        <label for="Q7star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q7star3"
                          name="Q7"
                          value="3"
                        />
                        <label for="Q7star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q7star2"
                          name="Q7"
                          value="2"
                        />
                        <label for="Q7star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q7star1"
                          name="Q7"
                          value="1"
                        />
                        <label for="Q7star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q8  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err8">
                      <b>PO8 .</b><?php echo $q8; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q8star5"
                          name="Q8"
                          value="5"
                        />
                        <label for="Q8star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q8star4"
                          name="Q8"
                          value="4"
                        />
                        <label for="Q8star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q8star3"
                          name="Q8"
                          value="3"
                        />
                        <label for="Q8star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q8star2"
                          name="Q8"
                          value="2"
                        />
                        <label for="Q8star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q8star1"
                          name="Q8"
                          value="1"
                        />
                        <label for="Q8star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q9  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err9">
                      <b>PO9 .</b><?php echo $q9; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q9star5"
                          name="Q9"
                          value="5"
                        />
                        <label for="Q9star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q9star4"
                          name="Q9"
                          value="4"
                        />
                        <label for="Q9star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q9star3"
                          name="Q9"
                          value="3"
                        />
                        <label for="Q9star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q9star2"
                          name="Q9"
                          value="2"
                        />
                        <label for="Q9star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q9star1"
                          name="Q9"
                          value="1"
                        />
                        <label for="Q9star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q10 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err10">
                      <b>PO10 .</b><?php echo $q10; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q10star5"
                          name="Q10"
                          value="5"
                        />
                        <label for="Q10star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q10star4"
                          name="Q10"
                          value="4"
                        />
                        <label for="Q10star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q10star3"
                          name="Q10"
                          value="3"
                        />
                        <label for="Q10star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q10star2"
                          name="Q10"
                          value="2"
                        />
                        <label for="Q10star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q10star1"
                          name="Q10"
                          value="1"
                        />
                        <label for="Q10star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q11  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err11">
                      <b>PO11 .</b><?php echo $q11; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q11star5"
                          name="Q11"
                          value="5"
                        />
                        <label for="Q11star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q11star4"
                          name="Q11"
                          value="4"
                        />
                        <label for="Q11star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q11star3"
                          name="Q11"
                          value="3"
                        />
                        <label for="Q11star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q11star2"
                          name="Q11"
                          value="2"
                        />
                        <label for="Q11star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q11star1"
                          name="Q11"
                          value="1"
                        />
                        <label for="Q11star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q12  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err12">
                      <b>PO12 .</b><?php echo $q12; ?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q12star5"
                          name="Q12"
                          value="5"
                        />
                        <label for="Q12star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q12star4"
                          name="Q12"
                          value="4"
                        />
                        <label for="Q12star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q12star3"
                          name="Q12"
                          value="3"
                        />
                        <label for="Q12star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q12star2"
                          name="Q12"
                          value="2"
                        />
                        <label for="Q12star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q12star1"
                          name="Q12"
                          value="1"
                        />
                        <label for="Q12star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q13  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err13">
                    <b>PSO1.</b><?php echo $question1?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q13star5"
                          name="Q13"
                          value="5"
                        />
                        <label for="Q13star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q13star4"
                          name="Q13"
                          value="4"
                        />
                        <label for="Q13star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q13star3"
                          name="Q13"
                          value="3"
                        />
                        <label for="Q13star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q13star2"
                          name="Q13"
                          value="2"
                        />
                        <label for="Q13star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q13star1"
                          name="Q13"
                          value="1"
                        />
                        <label for="Q13star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q14 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <p class="fs-6" id="err14">
                      <b>PSO2.</b><?php echo $question2?>
                      </p>
                      <div
                        id="star-rating"
                        class="star-rating d-flex justify-content-center align-items-center gap-3 gap-md-5"
                      >
                        <input
                          type="radio"
                          id="Q14star5"
                          name="Q14"
                          value="5"
                        />
                        <label for="Q14star5" title="5 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q14star4"
                          name="Q14"
                          value="4"
                        />
                        <label for="Q14star4" title="4 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q14star3"
                          name="Q14"
                          value="3"
                        />
                        <label for="Q14star3" title="3 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q14star2"
                          name="Q14"
                          value="2"
                        />
                        <label for="Q14star2" title="2 stars" class="fs-1"
                          >★</label
                        >
                        <input
                          type="radio"
                          id="Q14star1"
                          name="Q14"
                          value="1"
                        />
                        <label for="Q14star1" title="1 star" class="fs-1">★</label>
                      </div>
                      <!-- <p
                        class="text-center text-muted mt-2"
                        id="rating-value"
                      ></p> -->
                    </div>
                  </div>

                  <!-- q15  -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <div class="fs-6" id="err15">
                     <b>1.</b><?php echo $q15?>
                      </div>
                      <div class="form-floating my-2">
                        <textarea
                          class="form-control"
                          placeholder="Share your thoughts here"
                          id="Q15"
                          name="Q15"
                          style="height: 100px"
                        ></textarea>
                        <label for="Q15">Share your thoughts</label>
                      </div>
                    </div>
                  </div>

                  <!-- q16 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <div class="fs-6" id="err16">
                      <b>2.</b><?php echo $q16?>
                      </div>
                      <div class="form-floating my-2">
                        <textarea
                          class="form-control"
                          placeholder="Share your thoughts here"
                          id="Q16"
                          name="Q16"
                          style="height: 100px"
                        ></textarea>
                        <label for="Q16">Share your thoughts</label>
                      </div>
                    </div>
                  </div>

                  <!-- q17 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <div class="fs-6" id="err17">
                      <b>3.</b><?php echo $q17?>
                      </div>
                      <div class="form-floating my-2">
                        <textarea
                          class="form-control"
                          placeholder="Share your thoughts here"
                          id="Q17"
                          name="Q17"
                          style="height: 100px"
                        ></textarea>
                        <label for="Q17">Share your thoughts</label>
                      </div>
                    </div>
                  </div>

                  <!-- q18 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <div class="fs-6" id="err18">
                      <b>4.</b><?php echo $q18?>
                      </div>
                      <div class="form-floating my-2">
                        <textarea
                          class="form-control"
                          placeholder="Share your thoughts here"
                          id="Q18"
                          name="Q18"
                          style="height: 100px"
                        ></textarea>
                        <label for="Q18">Share your thoughts</label>
                      </div>
                    </div>
                  </div>

                  <!-- q19 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <div class="fs-6" id="err19">
                      <b>5.</b><?php echo $q19?>
                      </div>
                      
                      <div class="container-fluid">
                        <div
                          class="d-xl-flex align-items-start gap-5 justify-content-lg-start my-xl-2  d-flex"
                        >
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="Q19"
                              id="Q19Yes"
                              value="yes"
                            />
                            <label
                              class="form-check-label"
                              for="Q19Yes"
                            >
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              value="no"
                              name="Q19"
                              id="Q19No"
                            />
                            <label
                              class="form-check-label"
                              for="Q19No"
                            >
                              No
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-floating my-2 d-none" id="Q19_text_div">
                        <textarea
                          class="form-control"
                          placeholder="Share your thoughts here"
                          id="text19"
                          name="Q191"
                          style="height: 100px"
                        ></textarea>
                        <label for="text19">Share your thoughts</label>
                      </div>
                    </div>
                  </div>

                  <!-- q20 -->
                  <div class="px-md-5 my-3 my-md-4 px-1">
                    <div class="card border border-1 shadow px-3 py-3">
                      <div class="fs-6" id="err20">
                      <b>6.</b><?php echo $q20?>
                    </div>
                      <div class="container-fluid">
                        <div
                          class="d-xl-flex align-items-start gap-5 justify-content-lg-start my-xl-2  d-flex"
                        >
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="Q20"
                              id="Q20Yes"
                              value="yes"
                            />
                            <label
                              class="form-check-label"
                              for="Q20Yes"
                            >
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              value="no"
                              name="Q20"
                              id="Q20No"
                            />
                            <label
                              class="form-check-label"
                              for="Q20No"
                            >
                              No
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-floating my-2 d-none"  id="Q20_text_div">
                        <textarea
                          class="form-control"
                          placeholder="Share your thoughts here"
                          id="text20"
                          name="Q201"
                          style="height: 100px"
                        ></textarea>
                        <label for="text20">Share your thoughts</label>
                      </div>
                    </div>
                  </div>

                  <div class="text-end me-md-5 me-1">
                    <button type="submit" name="submit" class="btn border-primary bg-primary-subtle" onclick="validate(event)">
                      Next <i class="bi bi-arrow-right"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-2 col-lg-1 d-none d-md-block"></div>
        </div>
      </div>
    </section>

    <script type="text/javascript">
      
      // Aim others Hide and View
      const q19 = document.querySelectorAll('input[name="Q19"]');
      q19.forEach(radio => {
          radio.addEventListener('change', (event) => {
              if (document.getElementById('Q19Yes').checked) {
                  document.getElementById('Q19_text_div').classList.remove('d-none');
              }
              else{
                  document.getElementById('Q19_text_div').classList.add('d-none');
              }
          });
      });
      
      // Aim others Hide and View
      const q20 = document.querySelectorAll('input[name="Q20"]');
      q20.forEach(radio => {
          radio.addEventListener('change', (event) => {
              if (document.getElementById('Q20Yes').checked) {
                  document.getElementById('Q20_text_div').classList.remove('d-none');
              }
              else{
                  document.getElementById('Q20_text_div').classList.add('d-none');
              }
          });
      });
      // Validate Function
      function validate(event){
        // event.preventDefault();
        let flag = false;
        let count = 0;
        // Rating Questions Validation
        let qn=['Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','Q13','Q14'];
        let err=["err1","err2","err3","err4","err5","err6","err7","err8","err9","err10","err11","err12","err13","err14"];
        for(i = 0 ; i<qn.length ; i++){
          console.log(document.getElementById(err[i]))
            if(isRadioChecked(qn[i])==false){
                document.getElementById(err[i]).style.color="red";
                flag=true;
                count++;
                if(count==1){
                  document.getElementById(err[i]).scrollIntoView();
                }
            }
            else{
                document.getElementById(err[i]).style.color="black";
            }
            
        }

        // Text Area Validation
        let qn2 = ['Q15','Q16','Q17','Q18'];
        let err2 = ['err15','err16','err17','err18'];
        for(i=0 ; i< qn2.length ; i++){
          if(document.getElementById(qn2[i]).value==""){
              flag=true;
              document.getElementById(err2[i]).style.color="red";
          }
          else{
              document.getElementById(err2[i]).style.color="black";
          }
        }

        // Published Paper Validation
        const qn3 = ['Q19', 'Q20'];
        const err3 = ['err19', 'err20'];
        const yes = ['Q19Yes', 'Q20Yes'];
        const text = ['text19', 'text20']
        for(i = 0; i<qn3.length ; i++){
            if(isRadioChecked(qn3[i])==false)
            {
                document.getElementById(err3[i]).style.color="red";
                flag=true;
            }
            else if(document.getElementById(yes[i]).checked){
                if(document.getElementById(text[i]).value == ""){
                    document.getElementById(err3[i]).style.color="red";
                    flag=true;
                }
                else{
                    document.getElementById(err3[i]).style.color="black";
                }
            }
            else
            {
                document.getElementById(err3[i]).style.color="black";
            }
          }
          if(flag)
          {
            event.preventDefault();
          }
      }

      // Radio Button Check Function
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
    <!-- Bootstrap CDN Script -->
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
    <script src="./script/AlumniQuestionnarie.js"></script>
  </body>
</html>
