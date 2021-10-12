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


    #pieChart {
      max-width: 340px;
      max-height: 340px;
      margin-top: 3%;
      margin-bottom: 5%;
    }
    #pieChart2 {
      max-width: 340px;
      max-height: 340px;
      margin-top: 3%;
      margin-bottom: 5%;
    }

    #barChart {
      max-width: 840px;
      max-height: 640px;
      margin-top: 3%;
      margin-bottom: 5%;
      overflow: hidden;
    }

    #lineChart {
      max-width: 840px;
      max-height: 640px;
      margin-top: 3%;
      margin-bottom: 5%;
    }
  </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://evanplaice.github.io/jquery-csv/src/jquery.csv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
      <script src="postAnalysis.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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


      <!-- Bar char -->
      <div class="d-flex align-items-center" id="barChart">
        <canvas id="myChart"></canvas>
      </div>

      <select class="form-select form-select" aria-label=".form-select example" onchange="selectChange()" id="viewSelector">
        <option selected value="1">Select sensors...</option>
        <option value="2">Front Sensors</option>
        <option value="3">Back Sensors</option>
      </select>

      <div class="input-group mb-2" id="targetValue">
        <div class="input-group-prepend">
          <span class="input-group-text">Target Value</span>
        </div>
         <input type="text"  placeholder="Enter Target Value" id="targval"/>
        <div class="input-group-append">
          <button class="btn" type="button" onclick="updateView()">Update</button>
        </div>
      </div>

      <div class="d-flex" id="pieChart">
        <canvas id="myPieChart"></canvas>
        <!-- <canvas id="myPieChart2"></canvas> -->
      </div>

      <div class="d-flex" id="pieChart2">
        <canvas id="myPieChart2"></canvas>
      </div>

      <div class="d-flex" id="lineChart">
        <canvas id="myLineChart"></canvas>
      </div>



</div>

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

        <div class="form-group">

          <textarea required class="form-control mb-2" id="textArea" name="inputComment" rows="4" placeholder="Leave comment here.."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Cancel</button>
          <button type="submit" name="commentSubmit" class="btn button-orange">Save Feedback</button>
        </div>
      </form>
    </div>
  </div>


</body>
