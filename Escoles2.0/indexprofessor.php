<?php require_once 'head.php';?>

<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/innovaeditor.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>

</head>
<script>
                $(function() {
                $(".multiselect").multiselect();
                });           
                //Buscar alumnes de l'assignatura
		function calcular() {
			var assignatura = document.getElementById("assignatura").value;
                        var curs = document.getElementById("curs").value;
			
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
			
			xmlhttp.open("GET","alumnesassignatura.php?q="+assignatura+"&c="+curs,true);
			xmlhttp.send();
		}
                //Guardar notes Trimestres
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
                //Faltes assistencia buscar alumne de  l'assignatura
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
                //Check
                jQuery.fn.multiselect = function() {
                $(this).each(function() {
                    var checkboxes = $(this).find("input:checkbox");
                    checkboxes.each(function() {
                        var checkbox = $(this);
                        // Highlight pre-selected checkboxes
                        if (checkbox.prop("checked"))
                            checkbox.parent().addClass("multiselect-on");

                        // Highlight checkboxes that the user selects
                        checkbox.click(function() {
                            if (checkbox.prop("checked"))
                                checkbox.parent().addClass("multiselect-on");
                            else
                                checkbox.parent().removeClass("multiselect-on");
                        });
                    });
                });
              };
                
	</script>
<style>
  .multiselect {
    width:20em;
    height:15em;
    border:solid 1px #c0c0c0;
    overflow:auto;
    padding: 10px 10px 10px 10px;
    border-radius: 5px;
  }

  .multiselect label {
      display:block;
  }

  .multiselect-on {
      color:#ffffff;
      background-color:#0FD8B0;
  }
</style>
</head>
<body onload="calcular();" >
    <?php include_once 'barranav.php';?>
    <div class="">
    	<div class="row">
        <div class="col-md-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center" onclick="calcular();">
                  <h4 class="glyphicon glyphicon-pencil"></h4><br/>Posar Notes
                </a>
                <a href="#" class="list-group-item text-center" onclick="buscaralum()">
                  <h4 class="glyphicon glyphicon-list-alt"></h4><br/>Faltes d'assistència
                </a>
                <a href="#" class="list-group-item text-center" >
                  <h4 class="glyphicon glyphicon-font"></h4><br/>Anotacions
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- Posar Notes -->
                <div class="bhoechie-tab-content active">
                    <h1 style="margin-top: 0;color:#55518a">Posar Notes Alumnes</h1>
                      
                      <div class=" form-group col-md-3">
                      Assignatura
                      <select class="form-control" name="assignatura" id="assignatura" onchange="calcular()">
                          <?php 
                          require_once 'classes/assignatura.php';
                          $assignatura = new assignatura();
                          $assignatura->mostrarassignatura();
                          ?>
                      </select>
                      </div>
                      
                      <?php
                        include_once 'classes/connexio.php';
                        $bd = new connexio();
                        $llista_cursos = $bd->query("SELECT ID,Curs FROM Cursos ORDER BY Curs DESC"); ?>
                        <div class="form-group col-md-offset-1 col-md-2">
                            Curs
                          <select class="form-control" id="curs" name="curs" onchange="calcular()">
                            <?php while ($fila = $llista_cursos->fetch_array(MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $fila['ID']; ?>"><?php echo utf8_encode($fila['Curs']); ?></option>
                            <?php } $bd->close(); ?>
                          </select>
                        </div>
                        <br>
                      
                   
                      <table  class="table table-striped table-hover table-responsive" id="alumne">                          
                      </table>
                    
                </div>
                <!-- Faltes d'assistència -->
                <div class="bhoechie-tab-content">
                    
                        <h1 >Faltes Assistència Alumnes</h1>
                        
                        <form action="alumnesfalta.php" method="post">
                        <div class="col-md-3">
                            <label>Assignatura</label>
                          <select class="form-control" name="assignatura" id="buscar" onchange="buscaralum();">
                              <?php 
                              require_once 'classes/assignatura.php';
                              $assignatura = new assignatura();
                              $assignatura->mostrarassignatura();
                              ?>
                          </select>   
                        </div>
                        <div class="col-md-4">
                            <label>Alumnes</label>                     
                        <div class="multiselect form-group col-md-4" id="alumnerecerca">

                        </div>
                        </div>    
                        <div class="col-md-3">
                            <label>Data</label>
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data">
                                <input class="form-control" type="text" value="" placeholder="Data de la falta">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                            <input type="hidden" id="data" value="" name="data"/>

                        <!-- script de configuració del calendari emergent -->
                        <script type="text/javascript">
                          $('.calendari').datetimepicker({
                            language: 'ca',
                            weekStart: 1,
                            todayBtn:  1,
                            autoclose: 1,
                            todayHighlight: 1,
                            startView: 2,
                            forceParse: 0
                          });
                        </script>
                        <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" />Falta</button>
                        </div>
                    
                        <div id="falta"></div>
                        </form>
                </div>
                
                <!-- Anotacions -->
                <div class="bhoechie-tab-content">
                   
                      <h1 style="margin-top: 0;color:#55518a">Anotacions d'alumnes</h1>
                    <div class=" form-group col-md-3">
                      Assignatura
                      <select class="form-control" name="assignatura" id="assignatura" onchange="calcular()">
                          <?php 
                          require_once 'classes/assignatura.php';
                          $assignatura = new assignatura();
                          $assignatura->mostrarassignatura();
                          ?>
                      </select>
                      </div>
                      
                      <?php
                        include_once 'classes/connexio.php';
                        $bd = new connexio();
                        $llista_cursos = $bd->query("SELECT ID,Curs FROM Cursos ORDER BY Curs DESC"); ?>
                        <div class="form-group col-md-offset-1 col-md-2">
                            Curs
                          <select class="form-control" id="curs" name="curs" onchange="calcular()">
                            <?php while ($fila = $llista_cursos->fetch_array(MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $fila['ID']; ?>"><?php echo utf8_encode($fila['Curs']); ?></option>
                            <?php } $bd->close(); ?>
                          </select>
                        </div>
                        <br>
                      
                   
                        
                         <div class="col-md-3">
                            <label>Data</label>
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data">
                                <input class="form-control" type="text" value="" placeholder="Data de la falta">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                            <input type="hidden" id="data" value="" name="data"/>

                        <!-- script de configuració del calendari emergent -->
                        <script type="text/javascript">
                          $('.calendari').datetimepicker({
                            language: 'ca',
                            weekStart: 1,
                            todayBtn:  1,
                            autoclose: 1,
                            todayHighlight: 1,
                            startView: 2,
                            forceParse: 0
                          });
                        </script>
                </div>
                
                <div class="col-md-6">
                <textarea id="txtContent" rows="4" cols="30"> 

<script type="text/javascript">
    $(document).ready(function () {
        $('#txtContent').liveEdit({
            css: ['http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css', 'styles/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */ ,                       
            groups: [
                    ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat"]],
                    ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                    ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                    ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons", "Snippets"]],
                    ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]]
                    ] /* Toolbar configuration */
        });
        $('#txtContent').data('liveEdit').startedit(); /* Run the Editor */
    });
</script>
                
                </div>

            </div>
        </div>
    </div>
    </div>    
    
</body>
</html>
