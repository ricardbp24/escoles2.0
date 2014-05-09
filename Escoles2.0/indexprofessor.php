<?php require_once 'head.php';?>

<script>
		function calcular() {
			var assignatura = document.getElementById("assignatura").value;
			
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState===4 && xmlhttp.status===200)
    				{
    					document.getElementById("alumne").innerHTML = xmlhttp.responseText;
    				}
  			};
			
			xmlhttp.open("GET","alumnesassignatura.php?q="+assignatura,true);
			xmlhttp.send();
		}
                function guardar(id) {
			var guardar = id;
                        var a = "primer" + id;
                        var b = "segon" + id;
                        var c = "tercer" + id;
                        var d = "mostrar" +id;
			var primer = document.getElementById(a).value;
                        var segon = document.getElementById(b).value;
                        var tercer = document.getElementById(c).value;
                       
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState===4 && xmlhttp.status===200)
    				{
                                    
    					document.getElementById(d).innerHTML = xmlhttp.responseText;
    				}
  			};
			
			xmlhttp.open("GET","guardarnota.php?g="+guardar+"&primer="+primer+"&segon="+segon+"&tercer="+tercer,true);
			xmlhttp.send();
		}
                function buscaralum() {
			var buscar = document.getElementById("buscar").value;
			
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState===4 && xmlhttp.status===200)
    				{
    					document.getElementById("alumnerecerca").innerHTML = xmlhttp.responseText;
    				}
  			};
			
			xmlhttp.open("GET","alumnesassistencia.php?b="+buscar,true);
			xmlhttp.send();
		}
	</script>
</head>
<body onload="calcular()" >
    <?php include_once 'barranav.php';?>
    <div class="">
    	<div class="row">
        <div class="col-md-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center" onclick="calcular()">
                  <h4 class="glyphicon glyphicon-pencil"></h4><br/>Posar Notes
                </a>
                <a href="#" class="list-group-item text-center" onclick="buscaralum()">
                  <h4 class="glyphicon glyphicon-list-alt"></h4><br/>Faltes d'assistència
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-font"></h4><br/>Anotacions
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- Posar Notes -->
                <div class="bhoechie-tab-content active">
                    <h1 style="margin-top: 0;color:#55518a">Posar Notes Alumnes</h1>
                      
                      <div class="col-xs-3">
                      Assignatura
                      <select class="form-control input-sm" name="assignatura" id="assignatura" onchange="calcular()">
                          <?php 
                          require_once 'classes/assignatura.php';
                          $assignatura = new assignatura();
                          $assignatura->mostrarassignatura();
                          ?>
                      </select>
                        <br>
                      </div>
                   
                      <table on class="table table-striped table-hover table-responsive" id="alumne">
                            
                      </table>
                    
                    
                </div>
                <!-- Faltes d'assistència -->
                <div class="bhoechie-tab-content">
                    
                        <h1 style="margin-top: 0;color:#55518a">Faltes Assistència Alumnes</h1>
                    <div class="col-xs-3">
                      Assignatura
                      <select class="form-control" name="assignatura" id="buscar" onchange="buscaralum()">
                          <?php 
                          require_once 'classes/assignatura.php';
                          $assignatura = new assignatura();
                          $assignatura->mostrarassignatura();
                          ?>
                      </select>   
                    </div>
                        
                    <div class="col-xs-3">  
                      Alumnes
                      <select class="form-control" id="alumnerecerca" name="alumnerecerca">
                    
                      </select>
                    </div>      
                    <div class="col-xs-3">
                        Data
                    <div class="input-group date">
                        <input type="text" class="form-control">
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th"></i></span>
                    </div>

                    <script src="js/bootstrap-datepicker.js"></script>
                    <script>
                    $('.input-group.date').datepicker({
                    format: "yyyy/mm/dd",
                    startDate: "2012-01-01",
                    endDate: "2015-01-01",
                    todayBtn: "linked",
                    autoclose: true,
                    todayHighlight: true
                    });
                    </script>
                    </div>
                   
                </div>
                
                <!-- Anotacions -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 style="margin-top: 0;color:#55518a">Anotacions</h1>
                      <h3 style="margin-top: 0;color:#55518a">Alumnes</h3>
                    </center>
                </div>

            </div>
        </div>
    </div>
    </div>    
    
</body>
</html>
