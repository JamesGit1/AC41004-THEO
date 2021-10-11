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

        /* animation player css */
        .timeline-wrapper {

          top: 0px;
          left: 0px;
          right: 10px;
          height: 30px;
          background: white;
          transition: 1s ease all;
          border-radius: 4px;
          box-shadow: 0 1px 5px rgba(0, 0, 0, 0.65);
        }

        .heatmap-timeline {
          position:relative;
          margin-top: -15px;
          right: 15px;
          left: 80px;
          height: 100%;
        }

        .heatmap-timeline .line {
          left: 0;
          right: 0;
          top: 0px;
          height: 2px;
          background: #d7d7d7;
        }

        .heatmap-timeline .time-point.active {
          background: black;
        }

        .heatmap-timeline .time-point {
          position:absolute;
          background: white;
          border: 2px solid #272727;
          width: 8px;
          height: 8px;
          border-radius: 100%;
          cursor: pointer;
          top: 0px;
          transform: translateX(-50%) translateY(-50%);
        }

        .heatmap-timeline .time-point:hover {
          box-shadow: 0 0 5px black;
        }

        .timeline-wrapper button {
          outline: none;
          color: black;
          background: #f2f2f2;
          width: 65px;
          height: 100%;
          cursor: pointer;
          border: none;
          text-transform: uppercase;
          border-top-left-radius: 3px;
          border-bottom-left-radius: 3px;
        }

        .heatmap-timeline .time-point.active {
          background: black;
        }

    .animation-wrapper {
      /* position: relative;
      align-items: center; */
      text-align: center;
    }

    #legsimg {
      width: 30%;
      height: auto;
    }
  </style>
</head>
<body class="background">
  <div class="content-box container border">
    <div>
      <a href="progress-overview.php"><button class="btn mb-3"><i class="fas fa-arrow-left"></i> Client progress</button></a>
    </div>
      <h3>Review Session</h3>
        <div class="container">
      <select class="form-select form-select" aria-label=".form-select example" onchange="selectChange()" id="viewSelector">
        <option selected value="1">Sensor 1</option>
        <option value="2">Sensor 2</option>
        <option value="3">Sensor 3</option>
        <option value="4">Sensor 4</option>
      </select>
    <div id="inputs" class="clearfix">
    <input type="file" id="files" name="files[]" multiple />
  </div>
  <div class="timeline-wrapper"></div>
    <table id="dataTable" class="table">
      <thead>
        <tr>
          <th scope="col">Time</th>
          <th scope="col">Sensor Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">00:00:00</th>
          <td>0</td>
        </tr>
      </tbody>
    </table>
  </div>


  <div class="animation-wrapper">
      <div class="heatmap">
          <img src="images/legsfcolored.png" alt="Legs" id="legsimg">
      </div>

  </div>

<div class="d-flex" id="addFeedbackButton">
<button type="button" class="btn button-orange" data-toggle="modal" data-target="#addFeedback">
  Add Feedback
  <i class="far fa-comment-alt"></i>
</button>
</div>
</div>

<!-- <div class="modal" id="addFeedback">
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
          <label for="currentTimeInput">Time</label>
          <input type="text" class="form-control" id="currentTimeInput" aria-describedby="timeHelp" >
          <small id="timeHelp" class="form-text text-muted">Current timestamp from sensors</small>
        </div> 
        <div class="form-group">
          <label for="textArea">Comment</label>
          <textarea required class="form-control mb-2" id="textArea" name="inputComment" rows="4" placeholder="Leave comment here.."></textarea>
        </div>
      </form>
    </div>
  </div> -->
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
      <script src="http://evanplaice.github.io/jquery-csv/src/jquery.csv.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="heatmap.min.js"></script>
    <script src="getfile.js"></script>
  <!--  <script src="main.js">
  </script> -->

    <!-- <script type="text/javascript">
        window.addEventListener('load', (event) => {
            var timePoints = document.getElementsByClassName('heatmap-timeline');
            console.log(timePoints);
        });
    </script> -->
</body>
