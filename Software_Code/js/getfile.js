//code for direct file input
$(document).ready(function() {

        $('#files').bind('change', handleFileSelect);
    });
    var container = document.querySelector('.heatmap');
    var viewValue ="1";
    var table = document.getElementById("dataTable");
    function selectChange() {
        viewValue = document.getElementById("viewSelector").value;

        if (viewValue == "1") {
            table.rows[0].cells[1].textContent = "Left Quad";
            document.getElementById("legsimg").src = "./images/legsfcolored.png";
        }
        else if (viewValue == "2") {
            table.rows[0].cells[1].textContent = "Right Quad";
            document.getElementById("legsimg").src = "./images/legsfcolored.png";
        }
        else if (viewValue == "3") {
            table.rows[0].cells[1].textContent = "Left Hamstring";
            document.getElementById("legsimg").src = "./images/legsbcolored.png";
        }
        else if (viewValue == "4") {
            table.rows[0].cells[1].textContent = "Right Hamstring";
            document.getElementById("legsimg").src = "./images/legsbcolored.png";
        }
    }

    function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object
      var file = files[0];
      printTable(file);
      $('#list').append(output);
    }

    function printTable(file) {
      var reader = new FileReader();
      reader.readAsText(file);
      reader.onload = function(event){
        var csv = event.target.result;
        const values = [];
        const timestamps = [];
        var data = $.csv.toArrays(csv);
        var html = '';
        var counter = 0;
        var countert = 0;
        for(var row in data) {
          //html += '<tr>\r\n';
          for(var item in data[row]) {
            //html += '<td>' + data[row][item] + '\r\n';
            if (item==0){
              timestamps[countert] = data[row][item];
              countert=countert+1;
            }
            if (item>0){
              values[counter] = data[row][item];
              counter=counter+1;
            }
            }
          //html += '<td>' + test + '\r\n';
        }
        values.splice(0,1);
        console.log(values);
        //document.getElementById("arrPrint").innerHTML = values;
        timestamps.splice(0,1);
        //document.getElementById("arrPrint").innerHTML = timestamps;
        var eee = 0;
        //start of all heatmap code
        function AnimationPlayer(options) {
            this.heatmap = options.heatmap;
            this.data = options.data;
            this.interval = null;
            this.animationSpeed = options.animationSpeed || 300;
            this.wrapperEl = options.wrapperEl;
            this.isPlaying = false;
            this.init();
        };
        // define the prototype functions
        AnimationPlayer.prototype = {
            init: function () {
                var dataLen = this.data.length;
                this.wrapperEl.innerHTML = '';
                var playButton = this.playButton = document.createElement('button');
                playButton.onclick = function () {
                    if (this.isPlaying) {
                        this.stop();
                    } else {
                        this.play();
                    }
                    this.isPlaying = !this.isPlaying;
                }.bind(this);
                playButton.innerText = 'play';
                this.wrapperEl.appendChild(playButton);
                var events = document.createElement('div');
                events.className = 'heatmap-timeline';
                events.innerHTML = '';
                for (var i = 0; i < dataLen; i++) {
                    var xOffset = 100 / (dataLen - 1) * i;
                    var ev = document.createElement('div');
                    ev.className = 'time-point';
                    ev.style.left = xOffset + '%';
                    ev.onclick = (function (i) {
                        return function () {
                            this.isPlaying = false;
                            this.stop();
                            this.setFrame(i);
                            console.log(values[i]);
                            table.rows[1].cells[1].textContent = values[i];
                            table.rows[1].cells[0].textContent = timestamps[i];
                        }.bind(this);
                    }.bind(this))(i);

                    events.appendChild(ev);

                }
                this.wrapperEl.appendChild(events);
                this.setFrame(0);
            },
            play: function () {
                var dataLen = this.data.length;
                this.playButton.innerText = 'pause';
                this.interval = setInterval(function () {
                  table.rows[1].cells[1].textContent = values[this.currentFrame];
                  table.rows[1].cells[0].textContent = timestamps[this.currentFrame];

                    this.setFrame(++this.currentFrame % dataLen);
                }.bind(this), this.animationSpeed);

            },
            stop: function () {
                clearInterval(this.interval);
                this.playButton.innerText = 'play';
            },
            setFrame: function (frame) {
                this.currentFrame = frame;
                var snapshot = this.data[frame];
                this.heatmap.setData(snapshot);

                // Rewrite myself
                var timePoints = document.getElementsByClassName('time-point');
                for (var i = 0; i < timePoints.length; i++) {
                    timePoints[i].classList.remove('active');
                }
                timePoints[frame].classList.add('active');
            },
            setAnimationData: function (data) {
                this.isPlaying = false;
                this.stop();
                this.data = data;
                this.init();
            },
            setAnimationSpeed: function (speed) {
                this.isPlaying = false;
                this.stop();
                this.animationSpeed = speed;
            }
        };

        var heatmapInstance = h337.create({
            container: document.querySelector('.heatmap')
        });

        // animationData contains an array of heatmap data objects
        var animationData = [];

        // generate some heatmap data objects
        for (var i = 0; i < values.length; i++) {
            animationData.push(createAnimationSlide());


        }

        function createAnimationSlide() {
            var config = {
                // only container is required, the rest will be defaults
                container: document.querySelector('.heatmap')

            };

            var heatmapInstance = h337.create(config);

            // now generate some random data
            var points = [];
            var max = 1024
            var containerWidth = container.offsetWidth;
          if (viewValue == "1") {
                // Left Side we plant 22 points along a line and change the radius a bit to make them fit better
                // First set starting x and y coords and values for all datapoints
                var x = 0.408;
                var y = 0.199;
                var sensorValue =values[i]; // Extract value from json object for each sensor
                for (let i = 0; i < 22; i++) {
                    var newRadius = Math.floor(0.023 * container.offsetWidth);
                    if (i > 16) {
                        newRadius = Math.floor(0.018 * container.offsetWidth);
                    }
                    else if (i > 14) {
                        newRadius = Math.floor(0.021 * container.offsetWidth);
                    }
                    var point = {
                        x: Math.floor(x * containerWidth), // We got to move the heatmaps with the width of the container changes
                        y: Math.floor(y * containerWidth),
                        value: sensorValue,
                        radius: newRadius // When we get lower on the leg change the radius
                    };
                    points.push(point);
                    x += 0.001; // Move right and down
                    y += 0.0048;
                }}
                else if(viewValue =="2"){var x = 0.59;
                var y = 0.199;
                var sensorValue =values[i]; // Extract value from json object for each sensor
                for (let i = 0; i < 22; i++) {
                    var newRadius = Math.floor(0.023 * container.offsetWidth);
                    if (i > 16) {
                        newRadius = Math.floor(0.018 * container.offsetWidth);
                    }
                    else if (i > 14) {
                        newRadius = Math.floor(0.021 * container.offsetWidth);
                    }
                    var point = {
                        x: Math.floor(x * containerWidth), // We got to move the heatmaps with the width of the container changes
                        y: Math.floor(y * containerWidth),
                        value: sensorValue,
                        radius: newRadius // When we get lower on the leg change the radius
                    };
                    points.push(point);
                    x -= 0.001; // Move left and down
                    y += 0.0048;
                }}
                else if (viewValue == "3") {
                    // Back very similar to front, no change in radius
                    // Left
                    var x = 0.44;
                    var y = 0.205;
                    var sensorValue =values[i]; // Extract value from json object for each sensor
                    for (let i = 0; i < 28; i++) {
                        var newRadius = Math.floor(0.016 * container.offsetWidth);
                        var point = {
                            x: Math.floor(x * containerWidth), // We got to move the heatmaps with the width of the container changes
                            y: Math.floor(y * containerWidth),
                            value: sensorValue,
                            radius: newRadius // When we get lower on the leg change the radius
                        };
                        points.push(point);
                        x += 0.0005; // Move right and down
                        y += 0.0048;
                    }}
                    else if (viewValue =="4"){
                      var x = 0.562;
                      var y = 0.205;
                      var sensorValue =values[i]; // Extract value from json object for each sensor
                      for (let i = 0; i < 28; i++) {
                          var newRadius = Math.floor(0.016 * container.offsetWidth);
                          var point = {
                              x: Math.floor(x * containerWidth), // We got to move the heatmaps with the width of the container changes
                              y: Math.floor(y * containerWidth),
                              value: sensorValue,
                              radius: newRadius // When we get lower on the leg change the radius
                          };
                          points.push(point);
                          x -= 0.0005; // Move left and down
                          y += 0.0048;
                      }
                    }







            // Specific points
            // Top Left

            //  var val =values[i];
              //console.log(values[i]);
              //console.log(val);
        //      var point = {
            //      x: 160,
            //      y: 470,
              //    value: val
            //    };
          //  points.push(point);


        //  console.log(points);
            // heatmap data format
            var data = {
                max: max,
                data: points
            };
            return data;
        }

        var player = new AnimationPlayer({
            heatmap: heatmapInstance,
            wrapperEl: document.querySelector('.timeline-wrapper'),
            data: animationData,
            animationSpeed: 100
        });

        $('#contents').html(html);
      };
      reader.onerror = function(){ alert('Unable to read ' + file.fileName); };
    }
