<?php require_once 'head.php';
/**
 * Aquest es el index principal de professor on podràs trobar (Posar Notes, faltes d'assistència, 
 * mostrar faltes, anotacions i mostrar anotacions)
 * @author Grup1
 */

//Si no es usuari professor tipus 2 renviar a la seva localització
if ($_SESSION['tipus']!=2) {
  switch ($_SESSION['tipus']) {
      case 1:
          header('Location: indexdirector.php');
          break;
      case 3:
          header('Location: indexadministratiu.php');
          break;
    }
}

?>

<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/ajaxprofessor.js"></script>
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
<body onload="buscaralum(); calcular();  canviPestanya(); " >
    <?php include_once 'barranav.php';  
    
    //Missatges
    
    $faltescorrecte = "Alumnes o alumnes amb falta ïntroduida";
    $faltaerror = "ERROR! Aquest alumne/s ja tenen falta";
    $eliminaralum = "Falta alumne eliminada!!";
    $faltacanvi = "Falta de l'alumne canviada!";
    
    if(!isset($_GET['missatge']) && $_GET['pe'] ){  
        //No mostrar cap valor    
    }
    else if($_GET['missatge']== 'faltes-error'){
    ?>
    <div class="container">
        <div class="alert alert-danger col-md-6 col-md-offset-3">
            <span class="glyphicon glyphicon-ok"></span> <?php echo $faltaerror; ?>  
            <a style="float:right; text-decoration: none;" class="glyphicon glyphicon-remove col-md-offset-4" href="indexprofessor.php?pe=1"></a>
        </div>
    </div>
    <?php
    }
    else if($_GET['missatge']== 'faltes-correcte'){
    
    ?>
    <div class="container">
        <div class="alert alert-success col-md-6 col-md-offset-3">
            <span class="glyphicon glyphicon-ok"></span>  <?php echo $faltescorrecte; ?>  
            <a style="float:right; text-decoration: none;" class="glyphicon glyphicon-remove col-md-offset-4" href="indexprofessor.php?pe=1"></a>
        </div>
    </div>
    <?php
    }else if($_GET['missatge']== 'alum-eliminat'){
    
    ?>
    <div class="container">
        <div class="alert alert-success col-md-6 col-md-offset-3">
            <span class="glyphicon glyphicon-ok"></span>  <?php echo $eliminaralum; ?>  
            <a style="float:right; text-decoration: none;" class="glyphicon glyphicon-remove col-md-offset-4" href="indexprofessor.php?pe=2"></a>
        </div>
    </div>
    <?php
    }else if($_GET['missatge']== 'falta-canviada'){
    
    ?>
    <div class="container">
        <div class="alert alert-success col-md-6 col-md-offset-3">
            <span class="glyphicon glyphicon-ok"></span>  <?php echo $faltacanvi; ?>  
            <a style="float:right; text-decoration: none;" class="glyphicon glyphicon-remove col-md-offset-4" href="indexprofessor.php?pe=2"></a>
        </div>
    </div>
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
                    <a href="#" class="list-group-item active text-center" id="divcrear" onload="calcular();">
                        <h4 class="glyphicon glyphicon-pencil"></h4><br/>Posar Notes
                    </a>
                    <!--2 Faltes d'assistencia-->
                    <a href="#" class="list-group-item text-center" id="divfaltes" onclick="buscaralum()">
                        <h4 class="glyphicon glyphicon-list-alt"></h4><br/>Faltes d'assistència
                    </a>
                    <!--3 Mostrar Faltes d'assistencia-->
                    <a href="#"  class="list-group-item text-center" id="divmostrarfaltes" onclick="mostrarfaltes()" >
                        <h4 class="glyphicon glyphicon-flag"></h4><br/>Mostrar faltes d'assistència
                    </a>
                    <!--4 Anotacions-->
                    <a href="#" class="list-group-item text-center" id="divanotacions" >
                        <h4 class="glyphicon glyphicon-font"></h4><br/>Anotacions
                    </a>
                    <!--5 Mostrar Anotacions-->
                    <a href="#" class="list-group-item text-center" id="divmostraranotacions" >
                        <h4 class="glyphicon glyphicon-flag"></h4><br/>Mostrar anotacions
                    </a>
                </div>
                <!--Final menú-->
            </div>
            <!--Contingut del menú-->
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- Posar Notes -->
                <div class="bhoechie-tab-content active" id="crear" >
                    <h2 style="margin-top: 0;">Posar notes d'alumnes</h2>
                      
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
                            <label>Curs</label>
                            <select class="form-control" id="curs" name="curs" onchange="calcular()">
                                <?php while ($fila = $llista_cursos->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $fila['ID']; ?>"><?php echo utf8_encode($fila['Curs']); ?></option>
                                <?php } $bd->close(); ?>
                            </select>
                        </div><br>
                        <table  class="table table-striped table-hover table-responsive" >
                            <thead>
                                 <tr>
                                    <th style="width: 250px;">Cognoms i nom</th>
                                    <th style="width: 100px;">1 Trimestre</th>
                                    <th style="width: 100px;">2 Trimestre</th>
                                    <th style="width: 100px;">3 Trimestre</th>
                                    <th style="width: 50px;">Guardar</th>
                                    <th style="width: 50px;" class="glyphicon glyphicon-refresh"></th>
                                 </tr>
                            </thead>
                            <tbody id="alumne">
                                
                            </tbody>
                            
                            
                        </table>
                </div>
                <!--Final posar notes -->
                
                <!-- Faltes d'assistència -->
                <div id="faltes" class="bhoechie-tab-content" >
                <h2 style="margin-top: 0;">Faltes d'assistència d'alumnes</h2>    
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
                <div id="mostrarfaltes2" class="bhoechie-tab-content">
                <h2 style="margin-top: 0;">Mostrar faltes d'assistència d'alumnes</h2>    
                    
                        <div class="col-md-3">
                            <label>Assignatura</label>
                            <select class="form-control" name="assignatura" id="assignatura2" onchange="mostrarfaltes()">
                                    <?php 
                                        require_once 'classes/assignatura.php';
                                        $assignatura = new assignatura();
                                        $assignatura->mostrarassignatura();
                                    ?>
                                </select>   
                        </div>
                        <div class="col-md-3">
                            <label>Data</label>
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="datafalta">
                                <input class="form-control" type="text" value="" placeholder="Data de la falta" required="" title="És necessari una data">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                            <input type="hidden" id="datafalta" value="" name="data"/>

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
                            <button class="btn btn-primary" type="submit" onclick="mostrarfaltes();"/>Mostrar faltes</button>
                        </div>
                
                    <table  class="table table-striped table-hover table-responsive" >
                        <thead>  
                            <tr>
                                <th style="width: 220px;">Nom i Cognoms</th>
                                <th style="width: 200px;">Data</th>
                                <th style="width: 90px;">Valor</th>
                                <th style="width: 180px;">Valor i Guardar</th>
                                <th style="width: 90px;">Eliminar</th>
                                <th class="glyphicon glyphicon-refresh"></th>
                            </tr>
                        </thead>
                        <tbody id="mostrarfaltes"></tbody>
                    </table>
                
                </div>
                <!--Final Mostrar Faltes assistencia-->
                <!-- Anotacions -->
                <div id="anotacions" class="bhoechie-tab-content">
                <h2 style="margin-top: 0;">Anotacions d'alumnes</h2>
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
                       
                            <input type="hidden" id="data2" value="" name="data2"/>
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
                <div id="mostraranotacions" class="bhoechie-tab-content">
                <h2 style="margin-top: 0;">Mostrar anotacions d'alumnes</h2>
                
                    <div class=" form-group col-md-3">
                        <label>Assignatura</label>
                        <select class="form-control" name="assignatura" id="assignatura3" onchange="calcular()">
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
                        <select class="form-control" id="alumnes3" name="alumnes">
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
                            <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data">
                                <input class="form-control" type="text" id="data4" value="" placeholder="Data de la falta">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                       
                            <input type="hidden" id="data" value="" name="dataanotacio"/>
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
                        
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width:250px;">Alumne</th>
                                    <th style="width:200px;">Data</th>
                                    <th>Anotació</th>
                                </tr>
                            </thead>
                            <tbody id="anotaciomostralumnes"></tbody>
                        </table>
                        
                        <div class="col-md-2 "><br><br>
                            <button class="btn btn-primary" type="submit"  onclick="anotacionsmostrar()"/>Mostrar Anotació alumne</button>
                        </div>
                    
                </div>
                <!-- Mostrar Final Anotacions -->
                <h1 class="text-center" id="titul">Gestió integral de centres privats (Professors)</h1>
            </div>
        </div>
    </div>
</div>
    <script>
        function canviPestanya() {
            var id = getURLParameter('pe');
            //LINKS de a
            document.getElementById("crear").className = document.getElementById("crear").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("faltes").className = document.getElementById("faltes").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("mostrarfaltes").className = document.getElementById("mostrarfaltes").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("anotacions").className = document.getElementById("anotacions").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("mostraranotacions").className = document.getElementById("mostraranotacions").className.replace(/(?:^|\s)active(?!\S)/g , '');
            //DIVS de contingut
            document.getElementById("divcrear").className = document.getElementById("divcrear").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("divfaltes").className = document.getElementById("divfaltes").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("divmostrarfaltes").className = document.getElementById("divmostrarfaltes").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("divanotacions").className = document.getElementById("divanotacions").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("divmostraranotacions").className = document.getElementById("divmostraranotacions").className.replace(/(?:^|\s)active(?!\S)/g , '');

            if (id == '0') {               
                document.getElementById("crear").className += " active";
                document.getElementById("divcrear").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '1') {               
                document.getElementById("faltes").className += " active";
                document.getElementById("divfaltes").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '2') {               
                document.getElementById("mostrarfaltes2").className += " active";
                document.getElementById("divmostrarfaltes").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '3') {               
                document.getElementById("anotacions").className += " active";
                document.getElementById("divanotacions").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '4') {               
                document.getElementById("mostraranotacions").className += " active";
                document.getElementById("divmostraranotacions").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            
        }
        function getURLParameter(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
          }
    </script>
</body>
</html>