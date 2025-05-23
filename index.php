<?php
include 'config.php';
session_start();


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  $_SESSION['feedback_submitted'] = true;

  // Redirect to alumniinfo.php
  header("Location: AlumniInfo.php");
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

    <section class="my-md-5 my-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-2 col-lg-1"></div>
          <div class="col-12 col-md-8 col-lg-10">
            <form action="" method="post">
            <div class="card border shadow">
              <div class="card-body">
                <div
                  class="fs-2 alumni-header text-center card-text fw-light card-title"
                >
                  Dear Alumnus
                </div>
                <div class="card-text alumni-intro">
                  Having been with us for the past few years you will be pleased
                  to know that
                  <span class="clg">Karpagam College of Engineering </span> has
                  in a short period of time, grown to be one of the leading and
                  sought-after Institutes and you do have a major role in this
                  achievement. We shall very much appreciate and be thankful if
                  you can send back the filled-up feedback form along with the
                  alumni questionnaire. Your valuable suggestions will help us
                  in the improvement of the Institute as well as in the
                  accreditation process of our Institute.
                </div>
                <div class="my-2 gap-1">
                  <div class="text-end fs-5">With regards</div>
                  <div class="text-end fs-5 fst-italic text-primary fw-light">
                    Principal
                  </div>
                  <div class="text-center">
                  <!-- onclick="location.href='AlumniInfo.php';"> -->
                    <button class="btn btn-primary text-center border-primary" > 
                    
                      Next Page <i class="bi bi-arrow-right"></i>
                 </button>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2 col-lg-1"></div>
        </div>
      </div>
    </section>

    <!-- bootstrap cdn script -->
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