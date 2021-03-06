<!-- HTML dio koda -->
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

            <?php
              session_start();

              if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
                // last request was more than 30 minutes ago
                session_unset();     // unset $_SESSION variable for the run-time 
                session_destroy();   // destroy session data in storage
                echo "<label class='crvena'>Sesija je istekla!</label>";
              }
              $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

              if (isset($_SESSION['username'])) 
                $username = $_SESSION['username'];
              else if (isset($_REQUEST['username'])) 
              {
                $username = $_REQUEST['username'];
                $pass = $_REQUEST['password'];
                $username = htmlentities($username);
                $pass = htmlentities($pass);
                        
                $veza = new PDO("mysql:dbname=tut9;host=localhost;charset=utf8", "root", "root");
                $veza->exec("set names utf8");
                        
                $sql = "SELECT * FROM admin WHERE username=:user AND password=:pass";
                $q = $veza->prepare($sql);
                $q->execute(array(':user'=>$username, ':pass'=>$pass));
                if($q->rowCount()==1)
                {
                  $_SESSION['username'] = $username;
                  $_SESSION['isadmin'] = $q->fetchColumn(4);
                }
                else
                {
                  unset($username);
                  echo "<label class='crvena'>Pogrešan username ili password</label>";
                }

              }
            ?>
          <li><a href="#" onClick = "funkcijaHome()">NASLOVNA</a></li>
          <li><a href="#" onClick = "funkcijaRoutes()">VOZNI RED</a></li>
          <li><a href="#" onClick = "funkcijaContact()">KONTAKT</a></li>
          <li><a href="#" onClick = "funkcijaAbout()">O NAMA</a></li>

          <?php
          if(isset($_REQUEST['logout']))
          {
            session_destroy();
            unset($username);
          }
          if(isset($username) and $username!="")
          {
            $autor = $username;
            
            echo "<div id='loggedin'>"
                . "<form method='POST' action='index.php'><label>Ulogovani ste kao: <strong class='zelena'>$username</strong></label>&nbsp;&nbsp;"
                    . "<input type='submit' id='login_button' name='logout' value='Log Out'>"
                . "</form></div>";

            
            if ($_SESSION['isadmin'] == 1)
              echo '<li id="adminpanel"><a href="#" onClick = "funkcijaAdminPanel()">ADMIN</a><li>';

          }
          else
          {
              $autor = "Anonimac";
              echo '<div id="login">
                      <form action="index.php" method="post">
                        <input id="user_name" name="username" type="text" placeholder="Username">
                        <input id="user_pass" name="password" type="text" placeholder="Password">
                        <input type="submit" id="login_button" name="userlogin" value="Log In">
                      </form>
                    </div>';
          }

        ?>
   
        </ul>


    </div>

    <?php 
        include 'contact_validation.php'
    ?>

    <div id = "tijelo">
    <body>   
        <div class="content">  
            <p>Kontakt</p>
            
            <div class="address">
                <h1>Adresa</h1>
                <h2>San Guadalupe Office<br>
                    SoulTrain<br>
                    500 Terry Francois St.<br>
                    San Guadalupe, CA 88541</h2>
                <img src="slike/mapa.jpg" alt="Mapa">
            </div>

            <div class="telephone">
                <h1>Telefon</h1>
                <h2>061 000 008</h2>
                <br>
                
                <?php 
                    include $show_form;
                ?>             

            </div>
        </div>
    </body>
</div>


<div class="footer">  
    <p id="copyright">© 2023 by AdnaDurakovic</p>
    <ul id="links">
        <li><a href="https://www.facebook.com/"><img src="slike/facebook.png" height="30px" width="30px" alt="Facebook"></a></li>
        <li><a href="https://www.twitter.com/"><img src="slike/twitter.png" height="30px" width="30px" alt="Twitter"></a></li>
        <li><a href="https://www.instagram.com/"><img src="slike/instagram.png" height="30px" width="30px" alt="Instagram"></a></li>
    </ul>
</div> 
   
</html>
<!-- kraj HTMLa -->