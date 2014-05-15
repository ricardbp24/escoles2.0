/**
 * Ajax Professor 
 *
 */
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
              xmlhttp2=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
              }

            xmlhttp2.onreadystatechange=function()
            {
                    if (xmlhttp2.readyState===4 && xmlhttp2.status===200)
                    {

                            document.getElementById(d).innerHTML = xmlhttp2.responseText;
                    }
            };

            xmlhttp2.open("GET","guardarnota.php?g="+guardar+"&primer="+primer+"&segon="+segon+"&tercer="+tercer,true);
            xmlhttp2.send();
    }
    //Faltes assistencia buscar alumne de  l'assignatura
    function buscaralum() {
            var buscar = document.getElementById("buscar").value;

            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp3=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
              }

            xmlhttp3.onreadystatechange=function()
            {
                    if (xmlhttp3.readyState===4 && xmlhttp3.status===200)
                    {
                            document.getElementById("alumnerecerca").innerHTML = xmlhttp3.responseText;
                    }
            };

            xmlhttp3.open("GET","alumnesassistencia.php?b="+buscar,true);
            xmlhttp3.send();
    }
    
    //Mostrar faltes alumnes
    function mostrarfaltes() {
            var assignatura2 = document.getElementById("assignatura2").value;
            var dataalum = document.getElementById("datafalta").value;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp5=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp5=new ActiveXObject("Microsoft.XMLHTTP");
              }

            xmlhttp5.onreadystatechange=function()
            {
                    if (xmlhttp5.readyState===4 && xmlhttp5.status===200)
                    {
                            document.getElementById("mostrarfaltes").innerHTML = xmlhttp5.responseText;
                    }
            };

            xmlhttp5.open("GET","mostrarfaltesalum.php?assignatura="+assignatura2+"&dataalum="+dataalum,true);
            xmlhttp5.send();
    }
    //Buscar alumnes de l'assignatura
    function anotacionsmostrar() {
            var assignatura3 = document.getElementById("assignatura3").value;
            var alum3 = document.getElementById("alumnes3").value;
            var data4 = document.getElementById("data").value;
            var curs4 = document.getElementById("curs").value;
           
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp4=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp4=new ActiveXObject("Microsoft.XMLHTTP");
              }

            xmlhttp4.onreadystatechange=function()
            {
                    if (xmlhttp4.readyState===4 && xmlhttp4.status===200)
                    {
                            document.getElementById("anotaciomostralumnes").innerHTML = xmlhttp4.responseText;
                    }
            };

            xmlhttp4.open("GET","mostraranotacionsalum.php?assignatura="+assignatura3+"&alumnes"+alum3+"&curs="+curs4+"&data="+data4,true);
            xmlhttp4.send();
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