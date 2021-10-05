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
            loadHeatmap(responseData);
            delay(400).then(getData()); // Don't want to make too many uneccasary calls to api so put a little delay
        });
}

function loadHeatmap(dataObj) {
    var points = [];
    var max = 1024;
    var containerWidth = container.offsetWidth;

    // Get sensor 1 and 2 data and put on model
    if(viewValue == "f"){
        var point = {
            x: Math.floor(0.37 * containerWidth), // We got to move the heatmaps with the width of the container changes
            y: Math.floor(0.37 * containerWidth),
            value: dataObj.sensor3.value // Extract value from json object for each sensor
        };
        points.push(point);
    
        var point = {
            x: Math.floor(0.63 * containerWidth),
            y: Math.floor(0.37 * containerWidth),
            value: dataObj.sensor4.value
        };
        points.push(point);
    }
    else if(viewValue == "b"){
        var point = {
            x: Math.floor(0.35 * containerWidth), // We got to move the heatmaps with the width of the container changes
            y: Math.floor(0.48 * containerWidth),
            value: dataObj.sensor1.value // Extract value from json object for each sensor
        };
        points.push(point);
    
        var point = {
            x: Math.floor(0.65 * containerWidth),
            y: Math.floor(0.48 * containerWidth),
            value: dataObj.sensor2.value
        };
        points.push(point);
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
    opacity: 0.7,
    radius: Math.floor(0.06 * container.offsetWidth)
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
        document.getElementById("legsimg").src="./images/legsf.jpg";
    }
    else if (viewValue == "b") {
        document.getElementById("legsimg").src="./images/legsb.jpg";
    }
}

// Start recursion loop to fetch data from api
getData();