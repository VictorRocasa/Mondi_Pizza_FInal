<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<?php
	if(isset($_SESSION['adm_session']))
		echo "<title>Administração - Mondi Pizza</title>";
	else
		echo "<title>Mondi Pizza</title>";
	?>

    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-png" />

    <!-- Locais -->
    <link href="./fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <link rel="stylesheet" href="./plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        body {
            overflow-x: hidden;
            overflow-y: hidden;
            margin: 0;
            height: 100%;
        }

        #loader {
            background-color: rgba(246, 242, 237, 0.5);
            height: 100vh;
            width: 100vw;
            align-items: center;
            text-align: -webkit-center;
            text-align: center;
        }

        #HeaderNavbar ul li{
            margin-right: 15px;
        }

        @media only screen and (max-width: 768px) {
            
        #HeaderNavbar ul li{
            margin-right: 0px;
        }
        }
    </style>


</head>

<body>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="./plugins/js/jquery/jquery-3.5.1.js"></script>

  <script src="./plugins/js/bootbox/bootbox.min.js"></script>
  <script src="./plugins/js/bootbox/bootbox.locales.min.js"></script>

    <div id="loader">
        <div style="opacity:1.0; text-align: -webkit-center; position: relative; top: 50%; transform: translateY(-50%);">
            <img src="./assets/loader.gif">
        </div>
    </div>