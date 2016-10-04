var app = angular.module('myApp', ['ngSanitize']);
app.config(function($interpolateProvider){
  $interpolateProvider.startSymbol('{[').endSymbol(']}');
});

app.controller('myCtrl', function($scope, $http,$sce,$compile) {
  $scope.getStat = function(server,name){      
      $http.get("getStat/"+server)
        .then(function(response) {     
            if(response.data.data) 
            {
                $scope.drawGraph(response.data);
                $("#lhead").html("<h5>Line chart for "+name+"</h5>");
            }
        });
  
    $scope.drawGraph= function(data){
    res = data.data[0].date.split(" ");
    dres = res[0].split("-");  
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
      text: "Statistics for "+dres[0]+"-"+dres[1]+"-"+dres[2]+" (Max:"+data.high+", Min:"+data.low+", Avg:"+data.avg+" )"
      },
       data: [
      {
        type: "line",
        dataPoints: []
      }
      ]
    });
     $.each(data.data, function (index, value) {
            item = {}
            res = value.date.split(" ");
            dres = res[0].split("-");  
            hres = res[1].split(":"); 
            chart.options.data[0].dataPoints.push({ x: new Date(dres[0],dres[1],dres[2],hres[0],hres[1],hres[2]),y: value.statvalue});            
        });
    
    chart.render();
  }
  }
 
 });

