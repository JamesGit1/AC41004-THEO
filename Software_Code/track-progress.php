<?php include 'header.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Heatmap Example Page</title>

    <style>
        body {
            background-image: url('https://www.theohealth.com/wp-content/uploads/2021/02/theo-Promo-grid.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        label {
            font: white;
            color: white;
        }

        h1 {
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
        }

        /* animation player css */
        .timeline-wrapper {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            height: 30px;
            background: white;
            transition: 1s ease all;
            border-radius: 4px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, .65)
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

        /* end animation player css */
    </style>
</head>

<body>
    <h1>Track Progress - Sensor1</h1>
    <div id="inputs" class="clearfix">
        <input type="file" id="files" name="files[]" multiple />
    </div>
    <div class="animation-wrapper">
        <div class="heatmap">
            <img src="images/body.png" alt="Body">
        </div>
        <div class="timeline-wrapper"></div>
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