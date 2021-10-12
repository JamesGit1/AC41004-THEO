// // Example POST method implementation:
// async function postData(url = '', data = {}) {
//     // Default options are marked with *
//     const response = await fetch(url, {
//         method: 'GET', // *GET, POST, PUT, DELETE, etc.
//         mode: 'cors', // no-cors, *cors, same-origin
//         cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
//         credentials: 'same-origin', // include, *same-origin, omit
//         headers: {
//             'Content-Type': 'application/json'
//             // 'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         redirect: 'follow', // manual, *follow, error
//         referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
//         //body: JSON.stringify(data) // body data type must match "Content-Type" header
//     });
//     return response.json(); // parses JSON response into native JavaScript objects
// }

// Delay promise function
function delay(time) {
    return new Promise(resolve => setTimeout(resolve, time));
}

// GET Method to retieve live data from api
const getData = () => {
    fetch('https://theohealth.herokuapp.com/currentData')
        .then(response => { // GETS response from API
            return response.json(); // Return another promise to extract data from response
        })
        .then(responseData => { // Resolve promise from data
            //console.log(responseData);
            timeDateString = responseData.sensor1.time;
            var time = (timeDateString.substr(0, timeDateString.indexOf('.'))).split('T')[1];
            //timeInputField.value = time;
            table.rows[1].cells[0].textContent = time;

            if (viewValue == "f") {
                table.rows[1].cells[1].textContent = responseData.sensor3.value;
                table.rows[1].cells[2].textContent = responseData.sensor4.value;
            }
            else if (viewValue == "b") {
                table.rows[1].cells[1].textContent = responseData.sensor1.value;
                table.rows[1].cells[2].textContent = responseData.sensor2.value;
            }

            loadHeatmap(responseData);
            delay(400).then(() => { getData(); }); // Don't want to make too many uneccasary calls to api so put a little delay
        });
}
function valueMapper(oldValue, newValue, iterations) {
    var currentVal = oldValue;
    var mappedValues = [oldValue];
    var sensorIncrement = (oldValue - newValue) / iterations;

    for (let i = 0; i < iterations; i++) {
        currentVal += sensorIncrement;
        mappedValues.push(currentVal);
    }

    return mappedValues;
}

function loadHeatmap(dataObj) {
    iterator = 1;
    pushValuesLoop();                   //  start the loop

    if (prevDataObj != null) {
        if (viewValue == "f") {
            mappedValues1 = valueMapper(prevDataObj.sensor3.value, dataObj.sensor3.value, 100)
            mappedValues2 = valueMapper(prevDataObj.sensor4.value, dataObj.sensor4.value, 100)
        }
        else if (viewValue == "b") {
            mappedValues1 = valueMapper(prevDataObj.sensor1.value, dataObj.sensor1.value, 100)
            mappedValues2 = valueMapper(prevDataObj.sensor2.value, dataObj.sensor2.value, 100)
        }
    }
    else {
        mappedValues1 = valueMapper(dataObj.sensor3.value, dataObj.sensor3.value, 1)
        mappedValues2 = valueMapper(dataObj.sensor3.value, dataObj.sensor3.value, 1)
    }

    prevDataObj = dataObj; // set our prevDataObject
}

var mappedValues1,
    mappedValues2;

var iterator = 1;                  //  set your counter to 1
function pushValuesLoop() {         //  create a loop function
    setTimeout(function () {   //  call a setTimeout when the loop is called
        pushHeatmapValues(mappedValues1[iterator], mappedValues2[iterator])
        iterator++;                    //  increment the counter
        if (iterator < 20) {           //  if the counter < 10, call the loop function
            pushValuesLoop();             //  ..  again which will trigger another 
        }                       //  ..  setTimeout()
    }, 25)
}

function pushHeatmapValues(sensorData1, sensorData2) {
    sensorData1 = Math.floor(sensorData1);
    sensorData2 = Math.floor(sensorData2);

    console.log(sensorData1);
    var points = [];
    var max = 1024;
    var containerWidth = container.offsetWidth;

    // Get sensor 1 and 2 data and put on model
    if (viewValue == "f") {
        // Left Side we plant 22 points along a line and change the radius a bit to make them fit better  
        // First set starting x and y coords and values for all datapoints
        var { x, y, newRadius, point } = pointPlotterf(true, sensorData1);

        // Right side same but in paralleled
        var { x, y, newRadius, point } = pointPlotterf(false, sensorData2);

    }
    else if (viewValue == "b") {
        // Back very similar to front, no change in radius
        // Left
        var x = 0.44;
        var y = 0.205;
        //sensorValue = dataObj.sensor1.value; // Extract value from json object for each sensor
        for (let i = 0; i < 28; i++) {
            var newRadius = Math.floor(0.016 * container.offsetWidth);
            var point = {
                x: Math.floor(x * containerWidth), // We got to move the heatmaps with the width of the container changes
                y: Math.floor(y * containerWidth),
                value: sensorData1,
                radius: newRadius // When we get lower on the leg change the radius
            };
            points.push(point);
            x += 0.0005; // Move right and down
            y += 0.0048;
        }


        // Right side same but in paralleled
        var x = 0.562;
        var y = 0.205;
        //sensorValue = dataObj.sensor2.value; // Extract value from json object for each sensor
        for (let i = 0; i < 28; i++) {
            var newRadius = Math.floor(0.016 * container.offsetWidth);
            var point = {
                x: Math.floor(x * containerWidth), // We got to move the heatmaps with the width of the container changes
                y: Math.floor(y * containerWidth),
                value: sensorData2,
                radius: newRadius // When we get lower on the leg change the radius
            };
            points.push(point);
            x -= 0.0005; // Move left and down
            y += 0.0048;
        }
    }

    var data = {
        max: max,
        data: points
    };
    // if you have a set of datapoints always use setData instead of addData
    // for data initialization
    heatmapInstance.setData(data);

    // An extremely overcomplex function to map the front heatmaps for both quads
    function pointPlotterf(isLeftQuad, sensorData) {
        var invert = 1;
        if (isLeftQuad) { // If this is left front
            var x = 0.382,
                y = 0.127;
        }
        else { // Otherwise it is right front
            var x = 0.616,
                y = 0.127
            invert = -1;
        }

        // sensorValue = dataObj.sensor3.value; // Extract value from json object for each sensor
        for (let i = 0; i < 38; i++) {
            var newRadius = Math.floor(0.005 * container.offsetWidth);
            if (i > 29) {
                newRadius = Math.floor(0.019 * container.offsetWidth);
            }
            else if (i > 29) {
                newRadius = Math.floor(0.02 * container.offsetWidth);
            }
            else if (i > 25) {
                newRadius = Math.floor(0.025 * container.offsetWidth);
                x -= 0.0005 * invert;
            }
            else if (i > 17) {
                newRadius = Math.floor(0.028 * container.offsetWidth);
                x += 0.001 * invert;
            }
            else if (i > 15) {
                newRadius = Math.floor(0.025 * container.offsetWidth);
                x += 0.0005 * invert;
            }
            else if (i > 4) {
                newRadius = Math.floor(0.006 * container.offsetWidth);
                x += 0.0005 * invert;
            }

            if (i == 14 || i == 15) {
                x += 0.006 * invert;
                y -= 0.005;
            }
            var point = {
                x: Math.floor(x * containerWidth),
                y: Math.floor(y * containerWidth),
                value: sensorData,
                radius: newRadius // When we get lower on the leg change the radius
            };
            points.push(point);

            x += 0.0005 * invert;
            y += 0.0049;
        }
        return { x, y, newRadius, point };
    }
}

var container = document.querySelector('.heatmap');
var viewValue = "f";
var viewZoomed = false;

var heatmapInstance = h337.create({
    // only container is required, the rest will be defaults
    container: container,
    opacity: 0.5,
    radius: Math.floor(0.023 * container.offsetWidth)
});

// Trying to change the size of the heatmap when resizing
// function onWindowResize(){
//     container = document.querySelector('.heatmap');
//     var newRadius = Math.floor(0.1 * container.offsetWidth);
//     console.log(newRadius);
//     heatmapInstance.configure({
//         container: container,
//         opacity : 0.7,
//         radius : newRadius
//     });
// }
//
// window.addEventListener('resize', onWindowResize);

// On view change
function viewChange() {
    if (viewValue == "f") {
        table.rows[0].cells[1].textContent = "Left Hamstring";
        table.rows[0].cells[2].textContent = "Right Hamstring";
        document.getElementById("legsimg").src = "./images/legsbcolored.png";
        viewValue = "b";
    }
    else if (viewValue == "b") {
        table.rows[0].cells[1].textContent = "Left Quad";
        table.rows[0].cells[2].textContent = "Right Quad";
        document.getElementById("legsimg").src = "./images/legsfcolored.png";
        viewValue = "f";
    }
}

function zoom() {
    if (viewValue) {
        document.getElementById("legsimg").src = "./images/legsfcolored.png";
        document.getElementById("zoomicon").className = "fas fa-search-plus";
        viewValue = false;
    }
    else if (!viewValue) {
        document.getElementById("legsimg").src = "./images/legsfcoloredzoom.png";
        document.getElementById("zoomicon").className = "fas fa-search-minus";
        viewValue = true;
    }
}

//var timeInputField = document.getElementById("currentTimeInput");
var table = document.getElementById("dataTable");

var prevDataObj = null;

// Start recursion loop to fetch data from api
getData();