<?php
session_start();
include('header.php');
include('./php/conn.php');
include('./php/commentSubmitter.php');
?>

<head>
  <style>
    #share {
      display: none;
      float: right;
      font-size: 14px;
      line-height: 170%;
    }

    .symbol {
      display: inline !important;
      float: right;
    }

  </style>
</head>
<body class="background">
  <div class="content-box container border">
    <div>
      <a href="progress-overview.php"><button class="btn mb-3"><i class="fas fa-arrow-left"></i> Client progress</button></a>
    </div>
      <h3>Review Session</h3>
        <div class="container p-0">


      <div class="input-group clearfix mb-2" id="inputs">
        <input type="file" class="form-control" id="files"  name="files[]" multiple>
      </div>

    <!-- <div id="inputs" class="clearfix">
    <input type="file" id="files" name="files[]" multiple />
  </div> -->


<div class="d-flex" id="addFeedbackButton">
  <button type="button" class="btn button-orange" data-toggle="modal" data-target="#addFeedback">
    Add Feedback
    <i class="far fa-comment-alt"></i>
  </button>
  </div>
</div>

<div class="modal" id="addFeedback">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

  <div class="modal-header">
    <h4 class="modal-title">Add feedback</h4>
      <button type="button" class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
  </div>

  <div class="modal-body p-0">
    <div class="container w-90">
      <form method="post">
        <!-- <div class="form-group">
          <label for="currentTimeInput">Time</label>
          <input type="text" class="form-control" id="currentTimeInput" aria-describedby="timeHelp" >
          <small id="timeHelp" class="form-text text-muted">Current timestamp from sensors</small>
        </div> -->
        <div class="form-group">
          <!-- <label for="textArea">Comment</label> -->
          <textarea required class="form-control mb-2" id="textArea" name="inputComment" rows="4" placeholder="Leave comment here.."></textarea>
        </div>
      </form>
    </div>
  </div>
    <!-- general scripts, bootstrap jquery ajax -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://evanplaice.github.io/jquery-csv/src/jquery.csv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- <script src="getfile.js"></script>  my script for the previous review-session page -->
    <!-- my post analysis script and the chart library we are using -->
    <script src="postAnalysis.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
