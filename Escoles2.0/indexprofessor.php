<?php require_once 'head.php';?>

<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>

</head>
<script type="text/javascript">
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
    
    //Mostrar faltes alumnes
    function mostrarfaltes() {
            var assignatura2 = document.getElementById("assignatura").value;
            var dataalum = document.getElementById("assignatura").value;
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
                            document.getElementById("mostrarfaltes").innerHTML = xmlhttp.responseText;
                    }
            };

            xmlhttp.open("GET","mostrarfaltesalum.php?assignatura="+assignatura2+"&dataalum="+dataalum,true);
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
    <?php  if(!isset($_GET['error'])){  
    
    }else{
    ?>
    <div class="container"><div class="alert alert-danger col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-ok"></span>  ERROR!! Aquest alumne/s ja te falta aquest dia!  <a style="float:right; text-decoration: none;" class="glyphicon glyphicon-remove col-md-offset-4" href="indexprofessor.php"></a></div></div>
    <?php
    }
    if (!isset($_GET['correcte'])){}else{
    ?>
    <div class="container"><div class="alert alert-success col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-ok"></span>  Alumne o alumnes amb falta introduïda  <a style="float:right; text-decoration: none;" class="glyphicon glyphicon-remove col-md-offset-4" href="indexprofessor.php"></a></div></div>
    <?php
    }
    ?>
    <div class="">
    	<div class="row">
        <div class="col-md-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                <!--Menú professors-->
                <div class="list-group">
                    <!--1 Posar Notes menu-->
                    <a href="#" class="list-group-item active text-center" onclick="calcular();">
                        <h4 class="glyphicon glyphicon-pencil"></h4><br/>Posar Notes
                    </a>
                    <!--2 Faltes d'assistencia-->
                    <a href="#falta" id="falta" class="list-group-item text-center"  onclick="buscaralum()">
                        <h4 class="glyphicon glyphicon-list-alt"></h4><br/>Faltes d'assistència
                    </a>
                    <!--3 Mostrar Faltes d'assistencia-->
                    <a href="#falta" id="falta" class="list-group-item text-center"  >
                        <h4 class="glyphicon glyphicon-flag"></h4><br/>Mostrar faltes d'assistència
                    </a>
                    <!--4 Anotacions-->
                    <a href="#" class="list-group-item text-center" >
                        <h4 class="glyphicon glyphicon-font"></h4><br/>Anotacions
                    </a>
                    <!--5 Mostrar Anotacions-->
                    <a href="#" class="list-group-item text-center" >
                        <h4 class="glyphicon glyphicon-flag"></h4><br/>Mostrar anotacions
                    </a>
                </div>
                <!--Final menú-->
            </div>
            <!--Contingut del menú-->
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- Posar Notes -->
                <div class="bhoechie-tab-content active">
                    <h1 style="margin-top: 0;">Posar notes d'alumnes</h1>
                      
                    <div class=" form-group col-md-3">
                        <label>Assignatura</label>
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
                        </div><br>
                        <table  class="table table-striped table-hover table-responsive" id="alumne"></table>
                </div>
                <!--Final posar notes -->
                
                <!-- Faltes d'assistència -->
                <div id="falta" class="bhoechie-tab-content">
                <h1 style="margin-top: 0;">Faltes d'assistència d'alumnes</h1>    
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
                            <label>Alumnes</label> <br>                    
                            <div class="multiselect form-group col-md-4" id="alumnerecerca"></div>
                        </div>    
                        <div class="col-md-3">
                            <label>Data</label>
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data">
                                <input class="form-control" type="text" value="" placeholder="Data de la falta" required="" title="És necessari una data">
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
                        <div class="col-md-2"><br>
                            <button class="btn btn-primary" type="submit" />Falta</button>
                        </div>
                    </form>
                </div>
                <!--Final Faltes assistencia-->
                <!-- Mostrar Faltes d'assistència -->
                <div id="falta" class="bhoechie-tab-content">
                <h1 style="margin-top: 0;">Mostrar faltes d'assistència d'alumnes</h1>    
                    
                        <div class="col-md-3">
                            <label>Assignatura</label>
                                <select class="form-control" name="assignatura" id="assignatura2" >
                                    <?php 
                                        require_once 'classes/assignatura.php';
                                        $assignatura = new assignatura();
                                        $assignatura->mostrarassignatura();
                                    ?>
                                </select>   
                        </div>
                        <div class="col-md-3">
                            <label>Data</label>
                            <select class="form-control" id="datafalta">
                                <?php 
                                    require_once('classes/assistencia.php');
                                   
                                    $mostrar = new assistencia($idalumne,$idprofessor,$idassignatura,$data);
                                    $mostrar->mostraradataassistencia();
                                    
                                ?>
                            </select>
                        
                        </div>
     
                        <div class="col-md-2"><br>
                            <button class="btn btn-primary" type="submit" onclick="mostrarfaltes();"/>Mostrar faltes</button>
                        </div>
                    
                    <div id="mostrarfalta">
                            
                    </div>
                </div>
                <!--Final Mostrar Faltes assistencia-->
                <!-- Anotacions -->
                <div class="bhoechie-tab-content">
                <h1 style="margin-top: 0;">Anotacions d'alumnes</h1>
                <form action="alumneanotacions.php" method="post"> 
                    <div class=" form-group col-md-3">
                        <label>Assignatura</label>
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
                    $llista_alumnes = $bd->query("SELECT ID,Nom,Cognom1,Cognom2 FROM Alumnes WHERE Alta_Baixa=1 ORDER BY Cognom1,Cognom2,Nom"); ?>
                    <div class=" form-group col-md-3">
                        <label>Alumnes</label>
                        <select class="form-control" name="alumnes">
                            <?php while ($fila = $llista_alumnes->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $fila['ID']; ?>" /><?php echo utf8_encode($fila['Nom']." ".$fila['Cognom1']." ".$fila['Cognom2']); ?>
                            <?php }?>
                        </select>
                        <?php $bd->close(); ?>
                    </div>
                      
                        <?php
                            include_once 'classes/connexio.php';
                            $bd = new connexio();
                            $llista_cursos = $bd->query("SELECT ID,Curs FROM Cursos ORDER BY Curs DESC"); ?>
                        <div class="form-group col-md-2">
                            <label>Curs</label>
                            <select class="form-control" id="curs" name="curs" onchange="calcular()">
                                <?php while ($fila = $llista_cursos->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $fila['ID']; ?>"><?php echo utf8_encode($fila['Curs']); ?></option>
                                <?php } $bd->close(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Data</label>
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data2">
                                <input class="form-control" type="text" value="" placeholder="Data de la falta">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                       
                            <input type="hidden" id="data2" value="" name="data"/>
                        </div>
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
                        
                        <div class="col-md-6 ">
                            <label>Anotació Alumne</label>
                            <textarea style="max-width:550px;" name="anotacio" class="form-control " rows="4" cols="30" required=""> </textarea><br><br>
                        </div> 
                        
                        <div class="col-md-2 "><br><br>
                            <button class="btn btn-primary" type="submit" />Anotació alumne</button>
                        </div>
                    </form>
                </div>
                <!-- Final Anotacions -->
                <!-- Mostrar Anotacions -->
                <div class="bhoechie-tab-content">
                <h1 style="margin-top: 0;">Mostrar anotacions d'alumnes</h1>
                <form action="alumneanotacions.php" method="post"> 
                    <div class=" form-group col-md-3">
                        <label>Assignatura</label>
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
                    $llista_alumnes = $bd->query("SELECT ID,Nom,Cognom1,Cognom2 FROM Alumnes WHERE Alta_Baixa=1 ORDER BY Cognom1,Cognom2,Nom"); ?>
                    <div class=" form-group col-md-3">
                        <label>Alumnes</label>
                        <select class="form-control" name="alumnes">
                            <?php while ($fila = $llista_alumnes->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $fila['ID']; ?>" /><?php echo utf8_encode($fila['Nom']." ".$fila['Cognom1']." ".$fila['Cognom2']); ?>
                            <?php }?>
                        </select>
                        <?php $bd->close(); ?>
                    </div>
                      
                        <?php
                            include_once 'classes/connexio.php';
                            $bd = new connexio();
                            $llista_cursos = $bd->query("SELECT ID,Curs FROM Cursos ORDER BY Curs DESC"); ?>
                        <div class="form-group col-md-2">
                            <label>Curs</label>
                            <select class="form-control" id="curs" name="curs" onchange="calcular()">
                                <?php while ($fila = $llista_cursos->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $fila['ID']; ?>"><?php echo utf8_encode($fila['Curs']); ?></option>
                                <?php } $bd->close(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Data</label>
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data2">
                                <input class="form-control" type="text" value="" placeholder="Data de la falta">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                       
                            <input type="hidden" id="data2" value="" name="data"/>
                        </div>
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
                        
                        <div class="col-md-6 ">
                            <label>Anotació Alumne</label>
                            <textarea style="max-width:550px;" name="anotacio" class="form-control " rows="4" cols="30" required=""> </textarea><br><br>
                        </div> 
                        
                        <div class="col-md-2 "><br><br>
                            <button class="btn btn-primary" type="submit" />Anotació alumne</button>
                        </div>
                    </form>
                </div>
                <!-- Mostrar Final Anotacions -->
            </div>
        </div>
    </div>
</div>      
</body>
</html>
