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
	</script>
</head>
<body onload="calcular()">
    <div class="container">
    	<div class="row">
        <div class="col-md-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-pencil"></h4><br/>Posar Notes
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-list-alt"></h4><br/>Faltes d'assistència
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-font"></h4><br/>Anotacions
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- Posar Notes -->
                <div class="bhoechie-tab-content active">
                    <center>
                      <div class="col-xs-3">
                      Curs professor
                      <select class="form-control input-sm" name="assignatura" id="assignatura" onchange="calcular()">
                          <?php 
                          require_once 'classes/assignatura.php';
                          $assignatura = new assignatura();
                          $assignatura->mostrarassignatura();
                          ?>
                      </select>
                      
                      </div>
                        <h1 style="margin-top: 0;color:#55518a">Posar Notes</h1>
                      <h3 style="margin-top: 0;color:#55518a">Alumnes</h3>
                      
                      <table class="table table-striped table-hover table-responsive" id="alumne">
                          
                          
                      </table>
                      
                      
                       
                     
                    </center>
                </div>
                <!-- Faltes d'assistència -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
                    </center>
                </div>
                
                <!-- Anotacions -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon2</h2>
                      <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
                    </center>
                </div>

            </div>
        </div>
    </div>
    </div>    
    
</body>
</html>
