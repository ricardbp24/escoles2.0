<?php
/**
 * @author Grup1
 * @version 0.1
 * Creem el header i gestionem els usuaris
 */
    ob_start();
    @session_start();
    if (!isset($_SESSION['tipus'])) {
      header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Escoles 2.0</title>
  <link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJXDCpT7KfAbW6JGQcnE1uQuRzRI1PBxo&sensor=false"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
          e.preventDefault();
          $('h1').addClass('hidden');
          $(this).siblings('a.active').removeClass("active");
          $(this).addClass("active");
          var index = $(this).index();
          $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
          $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");        
          history.pushState({}, '', '?pe='+index);
        });
        $('dropdown-menu').find('form').click(function(e) {
           e.stopPropagation();
        });
    });
    </script>