<?php 
session_start();
include('header.php');
?>
<head>
  <style>
    label {
      font: white;
      color: white;
    }

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

    .animation-wrapper {
      position: relative;
      align-items: center;
    }

    /* animation player css */
    .timeline-wrapper {
      position: absolute;
      top: 10px;
      left: 0px;
      right: 10px;
      height: 30px;
      background: white;
      transition: 1s ease all;
      border-radius: 4px;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.65);
    }

    .heatmap-timeline {
      position: absolute;
      top: 0;
      right: 15px;
      left: 80px;
      height: 100%;
    }

    .heatmap-timeline .line {
      position: absolute;
      left: 0;
      right: 0;
      top: 15px;
      height: 2px;
      background: #d7d7d7;
    }

    .heatmap-timeline .time-point.active {
      background: black;
    }

    .heatmap-timeline .time-point {
      position: absolute;
      background: white;
      border: 2px solid #272727;
      width: 8px;
      height: 8px;
      border-radius: 100%;
      cursor: pointer;
      top: 15px;
      transform: translateX(-50%) translateY(-50%);
    }

    .heatmap-timeline .time-point:hover {
      box-shadow: 0 0 5px black;
    }

    .timeline-wrapper button {
      position: absolute;
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
    </style>
</head>

<body class="background">
    <div class="content-box container p-5 mt-5 border">
        <h3>Track Progress</h3>
        <select class="form-select form-select mb-3 w-25" aria-label=".form-select-lg example">
          <option selected>Select sensor</option>
          <option value="1">Sensor 1</option>
          <option value="2">Sensor 2</option>
          <option value="3">Sensor 3</option>
          <option value="4">Sensor 4</option>
        </select>
        <div class="input-group w-50 clearfix" id="inputs">
          <input type="file" class="form-control" id="files"  name="files[]" multiple>
        </div>
        <!--
        <div id="inputs" class="clearfix">
            <input class="" type="file" id="files" name="files[]" multiple />
        </div>
      -->
        <!--if sensor selected - show slider -->
        <div class="animation-wrapper">
            <div class="heatmap">
                <img src="images/body.png" alt="Body">
            </div>
            <div class="timeline-wrapper"></div>
        </div>
    </div>
    <p id="timestamp"></p>
    <pre id="arrPrint"></pre>
    <!-- <div style="position: relative; height: 800px; width: 800px;" class="heatmap">
        <img src="img/body.jpg" alt="Body">
    </div> -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://evanplaice.github.io/jquery-csv/src/jquery.csv.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!--  <script src="\build\heatmap.min.js"></script> -->
    <script src="heatmap.min.js"></script>
    <script src="getfile.js"></script>
    <script src="./retrieveData.js"></script>
    <!--  <script src="main.js">
  </script> -->

    <!-- <script type="text/javascript">
        window.addEventListener('load', (event) => {
            var timePoints = document.getElementsByClassName('heatmap-timeline');
            console.log(timePoints);
        });
    </script> -->
</body>

</html>
