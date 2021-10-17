// Main API code for current data retrieval
var
    express = require('express'),
    http = require('http');

var app = express();
//const PORT = 8080;

// This just gets json files used as temp data which is looped around acting as "live" data 
var sensor1 = require('./sensor1.json'),
    sensor2 = require('./sensor2.json'),
    sensor3 = require('./sensor3.json'),
    sensor4 = require('./sensor4.json');
//var sensor1 = JSON.parse(fs.readFileSync('file', 'utf8'));

var dataID = 1;

setInterval(function () {
    // Iterate through data
    if (dataID == 385) {
        dataID = 0;
    }
    dataID++;
}, 800); // Wait a second-ish before sending the next batch of data
// Also have to account for fetching data so make delay a bit less to make it seem more like every second
// all that matters is the client is pulling the simulated live new and up to date data

// Handle GET request to retrieve current data
app.get('/currentData', (req, res) => {
    res.set('Access-Control-Allow-Origin', '*'); //There's issues on webserver if CORS access isn't set

    // ----
    // Before sending response if we were using live data we would require an ID in the request which would
    // be used to retrieve that specific users current data rather than just the generic generated data
    // i.e something like url.parse(req.url, 'id' ) then 'id' used in a SELECT statement
    // ----

    res.status(200).send({
        dataID: dataID,
        sensor1: sensor1[dataID],
        sensor2: sensor2[dataID],
        sensor3: sensor3[dataID],
        sensor4: sensor4[dataID],
    })
});

// Start the server
var server = http.createServer(app);

server.listen(process.env.PORT || 5000, function (err) {
    console.info('listening in http://localhost:5000');
});