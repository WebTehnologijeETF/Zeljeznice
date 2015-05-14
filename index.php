<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Željeznice | SoulTrain</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
        <script src="funkcije.js"></script>
    </head>

    <div class="menu">
        <a class="logo" href="#" onClick = "funkcijaHome()"><img src="slike/logo.png" alt="Logo">SoulTrain</a>
        <ul>
            <li><a href="#" onClick = "funkcijaHome()">NASLOVNA</a></li>
            <li><a href="#" onClick = "funkcijaNews()">VIJESTI</a></li>
            <li><a href="#" onClick = "funkcijaRoutes()">VOZNI RED</a></li>
            <li><a href="#" onClick = "funkcijaContact()">KONTAKT</a></li>
            <li><a href="#" onClick = "funkcijaAbout()">O NAMA</a></li>
        </ul>
    </div>
    

    <div id= "tijelo">   
        <body>
            <?php
                include 'prikaz_novosti.php'
            ?>

            <div class="content">
                <img id="home-pic" src="slike/slika2.jpg" alt="Slika naslovnice">
                    <div class="article">
                        
                        <?php 
                            foreach($vijest as $value){ 
                                echo $value;    
                            ?>  <br />
                            <?php
                            }
                        ?> 

                    </div>    
            </div>    
        </body>
    </div>

    <!--U footeru se nalaze linkovi u vidu neuređene liste-->
    <div class="footer">  
        <p id="copyright">© 2023 by AdnaDurakovic</p>
        <ul id="links">
            <li><a href="https://www.facebook.com/"><img src="slike/facebook.png" height="30px" width="30px" alt="Facebook"></a></li>
            <li><a href="https://www.twitter.com/"><img src="slike/twitter.png" height="30px" width="30px" alt="Twitter"></a></li>
            <li><a href="https://www.instagram.com/"><img src="slike/instagram.png" height="30px" width="30px" alt="Instagram"></a></li>
        </ul>
    </div>

</html>
