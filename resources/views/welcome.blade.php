<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="js/metismenu/metisMenu.css">
     <script src="../bower_components/angular/angular.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


  </head>

        <body class="  " ng-app="myApp" ng-controller="myCtrl">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">
                    
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                        <!-- /.head -->
                         <h3>
                            &nbsp;
                            Server Statistics
                        </h3>
                </div>
                <!-- /#top -->
                 
                    <!-- /#left -->
                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <div class="text-center">
   <ul class="stats_box">
       @foreach($servers as $server)
        <li ng-click="getStat({{$server->id}},'{{$server->server}}')">
            <div class="stat_text">
                <strong>{{$server->server}}</strong>
            </div>
        </li>
        @endforeach
                                
                            </ul>
</div>

<hr>
<div class="row">
    <div class="col-lg-12">
	<div class="box">
	    <header>
                <span id="lhead"></span>
	    </header>
            <div id="chartContainer" style="height: 300px; width: 90%;">  </div>
	    
	</div>
    </div>


                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
                    <!-- /#right -->
            </div>
            <!-- /#wrap -->
            <p class="addMar"></p>
            <!-- /#footer -->
          
            <!-- /.modal -->
            <!-- /#helpModal -->
            <!--jQuery -->
<script src="js/jquery/jquery.js"></script>
<script src="js/canvasjs.min.js"></script>
<!--Bootstrap -->
<script src="js/bootstrap/js/bootstrap.js"></script>
<script src="../bower_components/angular-sanitize/angular-sanitize.min.js"></script>
<!-- MetisMenu -->
<!-- Metis demo scripts -->
<script src="js/appn.js"></script>
</body>
</html>
