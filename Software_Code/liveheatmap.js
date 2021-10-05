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
            console.log(responseData);
            loadHeatmap(responseData);
            delay(400).then(getData()); // Don't want to make too many uneccasary calls to api so put a little delay
        });
}

function loadHeatmap(dataObj) {
    var points = [];
    var max = 1000;

    // Get sensor 1 and 2 data and put on model
    var point = {
        x: 450,
        y: 470,
        value: 1000
    };
    points.push(point);

    var point = {
        x: 790,
        y: 470,
        value: 1000
    };
    points.push(point);

    var data = {
        max: max,
        data: points
    };
    // if you have a set of datapoints always use setData instead of addData
    // for data initialization
    heatmapInstance.setData(data);

}

var heatmapInstance = h337.create({
    // only container is required, the rest will be defaults
    container: document.querySelector('.heatmap')
});

getData();