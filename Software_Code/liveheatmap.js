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
            table.rows[1].cells[0].textContent = time;

            if (viewValue == "f") {
                table.rows[1].cells[1].textContent = responseData.sensor3.value;
                table.rows[1].cells[2].textContent = responseData.sensor4.value;
            }
            else if(viewValue == "b"){
                table.rows[1].cells[1].textContent = responseData.sensor1.value;
                table.rows[1].cells[2].textContent = responseData.sensor2.value;
            }

            loadHeatmap(responseData);
            delay(400).then(getData()); // Don't want to make too many uneccasary calls to api so put a little delay
        });
}

function loadHeatmap(dataObj) {
    var points = [];
    var max = 1024;
    var containerWidth = container.offsetWidth;

    // Get sensor 1 and 2 data and put on model
    if (viewValue == "f") {
        // Left Side we plant 22 points along a line and change the radius a bit to make them fit better  
        // First set starting x and y coords and values for all datapoints
        var x = 0.408;
        var y = 0.199;
        sensorValue = dataObj.sensor3.value; // Extract value from json object for each sensor
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
        }


        // Right side same but in paralleled
        var x = 0.59;
        var y = 0.199;
        sensorValue = dataObj.sensor4.value; // Extract value from json object for each sensor
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
        }

        // Basic point push for reference
        // var point = {
        //     x: Math.floor(0.578 * containerWidth),
        //     y: Math.floor(0.24 * containerWidth),
        //     value: dataObj.sensor4.value
        // };
        // points.push(point);
    }
    else if (viewValue == "b") {
        // Back very similar to front, no change in radius
        // Left
        var x = 0.44;
        var y = 0.205;
        sensorValue = dataObj.sensor1.value; // Extract value from json object for each sensor
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
        }


        // Right side same but in paralleled
        var x = 0.562;
        var y = 0.205;
        sensorValue = dataObj.sensor2.value; // Extract value from json object for each sensor
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

        // var point = {
        //     x: Math.floor(0.35 * containerWidth), // We got to move the heatmaps with the width of the container changes
        //     y: Math.floor(0.48 * containerWidth),
        //     value: dataObj.sensor1.value // Extract value from json object for each sensor
        // };
        // points.push(point);

        // var point = {
        //     x: Math.floor(0.65 * containerWidth),
        //     y: Math.floor(0.48 * containerWidth),
        //     value: dataObj.sensor2.value
        // };
        // points.push(point);
    }

    var data = {
        max: max,
        data: points
    };
    // if you have a set of datapoints always use setData instead of addData
    // for data initialization
    heatmapInstance.setData(data);

}

var container = document.querySelector('.heatmap');
var viewValue = "f";

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

// On select change
function selectChange() {
    viewValue = document.getElementById("viewSelector").value;

    if (viewValue == "f") {
        table.rows[0].cells[1].textContent = "Left Quad";
        table.rows[0].cells[2].textContent = "Right Quad";
        document.getElementById("legsimg").src = "./images/legsfcolored.png";
    }
    else if (viewValue == "b") {
        table.rows[0].cells[1].textContent = "Left Hamstring";
        table.rows[0].cells[2].textContent = "Right Hamstring";
        document.getElementById("legsimg").src = "./images/legsbcolored.png";
    }
}

var table = document.getElementById("dataTable");


// Start recursion loop to fetch data from api
getData();