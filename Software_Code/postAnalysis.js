$(document).ready(function() {

        $('#files').bind('change', handleFileSelect);
});

function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object
      var file = files[0];
      parseData(file);
      $('#list').append(output);
      }

function parseData(file) {
      var reader = new FileReader();
      reader.readAsText(file);
      reader.onload = function(event){
        var csv = event.target.result;
        const values1 = [];
        const values2 = [];
        const values3 = [];
        const values4 = [];
        const timestamps = [];
        var data = $.csv.toArrays(csv);
        var html = '';
        var counter1 = 0;
        var countert = 0;
        var counter2=0;
        var counter3=0;
        var counter4=0;
        for(var row in data) {
          for(var item in data[row]) {
            if (item==0){
              timestamps[countert] = data[row][item];
              countert=countert+1;
            }
            else if (item==1){
                values1[counter1] = data[row][item];
                counter1++;
              }
              else if (item==2){
                values2[counter2] = data[row][item];
                counter2++;
              }
              else if (item==3){
                values3[counter3] = data[row][item];
                counter3++;
              }
              else if (item==4){
                values4[counter4] = data[row][item];
                counter4++;
              }
          }}
        values1.splice(0,1);
        values2.splice(0,1);
        values3.splice(0,1);
        values4.splice(0,1);

        timestamps.splice(0,1);
      }}
