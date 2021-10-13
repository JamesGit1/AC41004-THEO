$(document).ready(function() {

        $('#files').bind('change', createAnalysis);
});
var file = null;
var values1=[];
var values2=[];
var values3=[];
var values4=[];
var timestamps=[];
var max=[];
var min=[];
function createAnalysis(evt) {
      var files = evt.target.files; // FileList object
     file = files[0];
      parseData(file);}

function updateView(){
      //  console.log(myChart);
        redraw();
        createGraphs(values1,values2,values3,values4,timestamps,max,min);
      }
function redraw(){
      $("#myChart").remove();// removing previous canvas element
      $("#barChart").append("<canvas id='myChart'></canvas>");
      // document.getElementById('barChart').appendChild('div');
      // document.getElementById('barChart').innerHTML += "<canvas id='myChart'></canvas>";
       $("#myPieChart").remove();// removing previous canvas element
       $("#pieChart").append("<canvas id='myPieChart'></canvas>");
       $("#myPieChart2").remove();// removing previous canvas element
       $("#pieChart2").append("<canvas id='myPieChart2'></canvas>");
       $("#myLineChart").remove();// removing previous canvas element
       $("#lineChart").append("<canvas id='myLineChart'></canvas>");  }

  function overInput(values, inputVal){
        var counter=0;
         for (var i = 0; i < values.length; i++){
           if (parseFloat(values[i]) > parseFloat(inputVal)){
             console.log(values[i],inputVal,"here");
             counter=counter+1;};}
             console.log(counter);
           return counter;}
//function percent(partialVal, totalVal) {
  //    return (100 * partialVal) / totalVal;}



//function overInput(values, inputVal){
  //var over =[];
  //over.splice(0,over.length);
 //var counter=0;
  //for (var i = 0; i < values.length; i++){
    //if (values[i] > inputVal){
      //counter=counter+1;
      //over.push(values[i]);}};
  //  return over;}

function selectChange() {
        viewValue = document.getElementById("viewSelector").value;
        if (viewValue == "2"  || viewValue =="1") {
            var view = "front";}
        else if (viewValue == "3") {
            var view = "back";
        }}



function parseData(file) {
      var reader = new FileReader();
      reader.readAsText(file);
      reader.onload = function(event){
      var csv = event.target.result;
        //THIS IS MESSY AND STUPID MAKE IT NICER BETH OF TOMORROW - BETH

        var content = $.csv.toArrays(csv);
        var counter1 = 0;
        var countert = 0;
        var counter2=0;
        var counter3=0;
        var counter4=0;
        //add every "cell" from the csv into an array based on which column they are in
        for(var row in content) {
          for(var item in content[row]) {
            if (item==0){
              timestamps[countert] = content[row][item];
              countert=countert+1;
            }
            else if (item==1){
                values1[counter1] = content[row][item];
                counter1++;
              }
              else if (item==2){
                values2[counter2] = content[row][item];
                counter2++;
              }
              else if (item==3){
                values3[counter3] = content[row][item];
                counter3++;
              }
              else if (item==4){
                values4[counter4] = content[row][item];
                counter4++;
              }
          }}

        //the first value in each array will be the titles from the csv, lets remove them as uneeded
        values1.splice(0,1);
        values2.splice(0,1);
        values3.splice(0,1);
        values4.splice(0,1);
        timestamps.splice(0,1);
        for(let i=0; i<timestamps.length;i++){
          timestamps[i]=timestamps[i].slice(11, 19);
        }

        //remove before t and after .
        //or remove


        //get max and mins in most simple way, improve tomorrow
        var max1 = Math.max(...values1);
        var min1 = Math.min(...values1);
        var max2 = Math.max(...values2);
        var min2 = Math.min(...values2);
        var max3 = Math.max(...values3);
        var min3 = Math.min(...values3);
        var max4 = Math.max(...values4);
        var min4 = Math.min(...values4);

        max = [max1,max2,max3,max4];
        min = [min1,min2,min3,min4];
        createGraphs(values1,values2,values3,values4,timestamps,max,min);}}




function createGraphs(values1,values2,values3,values4,timestamps,max,min){
        //value inputted by user but for now is set
        var comparisonValue = document.getElementById('targval').value;
        viewValue = document.getElementById("viewSelector").value;

        if (viewValue=="2"){
          var sensora=values1;
          var maxa = max[0];
          var sensorb=values2;
          var maxb= max[1];
        }
        else if(viewValue=="3"){
          var sensora=values3;
          var maxa =max[3];
          var sensorb=values4;
          var maxb = max[4];
        }
        else{
          sensora = sensorb =[];
          maxa = maxb =0;
        }


        var valuesOver1=overInput(sensora,comparisonValue);
        var valuesOver2=overInput(sensorb,comparisonValue);
    //    console.log(valuesOver1,valuesOver2,"test test");
        if (comparisonValue>=maxa){
          valuesOver1=0;

        }
        if(comparisonValue>=maxb){
          valuesOver2=0;

        }


        var leftover1=sensora.length-valuesOver1;
        var leftover2=sensorb.length-valuesOver2;




        const data = {
          labels: ['Left Hamstring', 'Right Hamstring','Left Quad', 'Right Quad'],
          datasets: [
            {
              label: 'Max Value',
              data: max,
              backgroundColor: 'rgb(243,109,33)',
              stack: 'Stack 0',},
            {label: 'Min Value',
              data: min,
              backgroundColor: 'rgb(2, 151, 162)',
              stack: 'Stack 1',},]};

        const config = {
          type: 'bar',
          data: data,
          options: {
            responsive: true,
            plugins: {
              legend: {},
              position: 'top',
              title: {
                display: true,
                text: 'Min/max value comparison',
                // size: 24,
              }}}};



//piechart 1
        const data2 = {
          labels: ['Above target', 'Below target'],
          datasets: [
            {
              data: [valuesOver1,leftover1],
              label: 'Above target',
              backgroundColor: ['rgb(243,109,33)', 'rgb(2, 151, 162)'],
            },]};

        const config2 = {
          type: 'pie',
          data: data2,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',},
              title: {
                display: true,
                text: 'Target Reach - Left Leg'}}}};



//piechart2
        const data3 = {
          labels: ['Above target', 'Below target'],
          datasets: [
            {
              label: 'Above target',
              data: [valuesOver2,leftover2],
              backgroundColor: ['rgb(243,109,33)', 'rgb(2, 151, 162)'],
            },
          ]
        };

        const config3 = {
          type: 'pie',
          data: data3,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Target Reach - Right Leg'
              }}}  };



//line chart
        const data4 = {
        labels: timestamps,
        datasets: [
          {
            label: 'Left Leg',
            data: sensora,
            borderColor: 'rgb(243,109,33)',
            backgroundColor: 'rgb(243,109,33)',
          },
          {
            label: 'Right Leg',
            data: sensorb,
            borderColor: 'rgb(2, 151, 162)',
            backgroundColor: 'rgb(2, 151, 162)',
          }]};

        const config4 = {
          type: 'line',
          data: data4,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Line graph'
              }}},};

        var myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
        var myPieChart = new Chart(
          document.getElementById('myPieChart'),
          config2
        );
        var myAnotherPieChart = new Chart(
          document.getElementById('myPieChart2'),
          config3
        );
        var myLineChart = new Chart(
          document.getElementById('myLineChart'),
          config4
        );}
