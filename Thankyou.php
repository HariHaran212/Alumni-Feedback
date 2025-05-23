<?php
session_start();


if (!isset($_SESSION['feedback_submitted'])) {
    header("Location: index.php");
    exit();
}


// $name= $_SESSION['name'];
// $roll=$_SESSION['rollno'];
unset($_SESSION['feedback_submitted']);
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
    <!-- <link rel="stylesheet" href="./style/index.css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <!-- navbar section  -->
    <nav class="navbar navbar-expand-lg bg-body-white border">
      <div class="container">
        <a href="#" class="navbar-brand mx-auto mx-md-0">
          <img
            src="./assets/images/KCE 2024 UPDATED VERSION LOGO.png"
            class="navbar-logo mb-sm-0 "
            alt="Karpagam College Logo"
         
          />
        </a>
      </div>
    </nav>

    <section class="my-md-5 my-4">
      <div class="container my-5">
        <div class="row ">
          <div class="col-12 col-md-2 col-lg-1"></div>
          <div class="col-12 col-md-8 col-lg-10">
            <div class="card border shadow my-5 ">
              <div class="card-body">
                <div
                  class="h2 alumni-header text-center card-text fw-light card-title"
                >
                   <div class="text-primary"><?php echo $_SESSION['name']; ?></div>
                </div>
                <div class="text-center h3">(<?php echo $_SESSION['rollno'];?>)</div>
                <div class="fs-6 text-center">Thanks for Submitting the  Feedback</div>
              </div>
            </div>
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



