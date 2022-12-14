<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>

    <!-- Application title -->
    <title>Origin Insurance Score Calculator</title>

    <!-- Application metadata -->
    <meta name="description" content="Assignment test tool developed by Guilherme Parmezani" />
    <meta name="keywords" content="use, origin, insurance, score, calculator, take, home, ssignment" />

    <!-- Third party scripts + front end handler javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="javascripts/insurance_form_handler.js" type="text/javascript"></script>

    <!-- Poppin Google font -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    
    <!-- Application styles -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">

    <!-- Favicon -->
    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body class="index">
    <!-- Page wrapper for global styles and whatnots -->
    <div class="page-content-wrapper">
      
      <!-- Intro -->
      <h1>Insurance Risk Calculator</h1>
      <p>Origin Backend Take-Home Assignment<br>Built by <a href="https://parmezani.com/" target="_blank">Guilherme Parmezani</a></p></p>
      <p>

      <!-- Includes view layer -->
      <?php include 'view/insurance_score_bean.html' ?>
    </div>
  </body>
  </html>
