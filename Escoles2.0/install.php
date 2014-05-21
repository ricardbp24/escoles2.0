<?php
/**
 * Instal·lació a la base de dades
 * @author Grup1
 * @version 0.1
 */
@session_start();
if (isset($_SESSION['id'])) {
    switch ($_SESSION['tipus']) {
      case 1:
          header('Location: indexdirector.php');
          break;
      case 2:
          header('Location: indexprofessor.php');
          break;
      case 3:
          header('Location: indexadministratiu.php');
          break;
    }
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
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var url = "http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=d51a852e16430fb26b78b3435cb48df0&tags=delta+del+ebre&safe_search=1&format=json&per_page=50&jsoncallback=?";
      var src;
      var id = random = Math.ceil(Math.random() * 50) + 1;
      $.getJSON(url, function(data){
              src = "http://farm"+ data.photos.photo[id].farm +".static.flickr.com/"+ data.photos.photo[id].server +"/"+ data.photos.photo[id].id +"_"+ data.photos.photo[id].secret +"_c.jpg";
              $("<img/>").attr("src", src).appendTo("#fullscreen_bg");
              if ( i == 3 ) return false;
      });
    });
  </script>
    <style>
      body {
        padding-top: 120px;
        padding-bottom: 40px;
        background-color: #eee;

      }
      .btn 
      {
       outline:0;
       border:none;
       border-top:none;
       border-bottom:none;
       border-left:none;
       border-right:none;
       box-shadow:inset 2px -3px rgba(0,0,0,0.15);
       position: relative;
        z-index: 2;
      }
      .btn:focus
      {
        
       outline:0;
       -webkit-outline:0;
       -moz-outline:0;
      }
      .fullscreen_bg img {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: 50% 50%;
        background-repeat:repeat;
      }
      .form-signin {
        max-width: 280px;
        padding: 15px;
        margin: 0 auto;
          margin-top:50px;
      }
      .form-signin .form-signin-heading, .form-signin {
        margin-bottom: 10px;
      }
      .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: none;
        border-left-style: solid;
        border-color: #000;
        border-top:1px solid rgba(0,0,0,0.08);
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top-style: none;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-color: rgb(0,0,0);
        border-top:1px solid rgba(0,0,0,0.08);
      }
      .form-signin-heading {
        font-family: 'Gafata', sans-serif;
        position: relative;
        color: #fff;
        text-align: center;
        text-shadow: 0 2px 2px rgba(0,0,0,0.5);
        z-index: 2;
      }
      .alert {
          position: relative;
          z-index: 99;
      }
    </style>
  <body>
    <div id="fullscreen_bg" class="fullscreen_bg"></div>
        <div class="container">
          <form class="form-signin" method="post" action="login.php">
            <h1 class="form-signin-heading text-muted strong">Escoles 2.0</h1>            
            <input type="text" class="form-control" name="host" placeholder="Host de la BD" required="" autofocus=""/>
            <input type="text" class="form-control" name="basedades" placeholder="Nom de la BD" required="" />
            <input type="text" class="form-control" name="usuari" placeholder="Usuari BD" required="" />
            <input type="password" class="form-control" name="Contrasenya" placeholder="Contrassenya"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
               Intal·lar
            </button>
          </form>
        </div>
  </body>
</html>
