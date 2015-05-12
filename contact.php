<!--     PHP       -->
<?php
echo"test";
    header('Content-Type: text/html; charset=utf-8');
    
        // Inicijalizacija varijabli
        $firstname = $email = $emailpotvrda = $poruka = $mjesto = $ptbroj = $predmet = "";
        $firstname_err = $email_err = $emailpotvrda_err = $poruka_err = "* ";
        $mjesto_err = $ptbroj_err = "";
        $slika_firstname = $slika_email = $slika_poruka = $slika_mjesto = $slika_ptbroj = $slika_emailpotvrda = "";
        $display = '';

        // Validacija obaveznih polja   
        //if ($_SERVER["REQUEST_METHOD"] == "POST") 
        if (isset($_POST["send"]))
        {
            
            $validno = true;

            if (empty($_POST["firstname"])) 
            {
                $firstname_err = "Unesite ime i prezime";
                $slika_firstname = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                $validno = false;
            } 
            else 
            {
                $firstname = testiraj_unos($_POST["firstname"]);
                // provjera da li je ime ispravno uneseno
                if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
                {
                    $firstname_err = "Samo slova i razmaci su dozvoljeni"; 
                    $slika_firstname = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                    $validno = false;
                }
            }
           
            if (empty($_POST["email"])) 
            {
                $email_err = "Unesite Email";
                $slika_email = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                $validno = false;
            } 
            else 
            {
                $email = testiraj_unos($_POST["email"]);
                // provjerava je li unesen ispravan format emaila
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $email_err = "Neispravan format emaila"; 
                    $slika_email = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                    $validno = false;
                }

                // provjera potvrdnog emaila
                if (empty($_POST["emailpotvrda"]))
                {
                    $emailpotvrda_err = "Unesite potvrdni Email";
                    $slika_emailpotvrda = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                    $validno = false;
                }
                else
                {
                    $emailpotvrda = testiraj_unos($_POST["emailpotvrda"]);
                    // provjerava je li unesen ispravan format emaila
                    if (!filter_var($emailpotvrda, FILTER_VALIDATE_EMAIL)) 
                    {
                        $emailpotvrda_err = "Neispravan format emaila"; 
                        $slika_emailpotvrda = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                        $validno = false;
                    }
                    else
                    {
                        //cross validacija
                        if ($email != $emailpotvrda) 
                        {
                            $emailpotvrda_err = "Nisu isti orginalni i potvrdni email"; 
                            $slika_emailpotvrda = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                            $validno = false;
                        } 
                    }
                        
                }
            }


            if (empty($_POST["myname"])) 
            {
                $poruka_err = "Napišite poruku";
                $slika_poruka = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                $validno = false;
            } 
            else 
            {
                $poruka = testiraj_unos($_POST["myname"]);
            }


            if (!empty($_POST["mjesto"])) 
            {
                $mjesto = testiraj_unos($_POST["mjesto"]);
                // provjera da li je mjesto ispravno uneseno
                if (!preg_match("/^[a-zA-Z ]*$/",$mjesto)) 
                {
                    $mjesto_err = "Samo slova i razmaci su dozvoljeni"; 
                    $slika_mjesto = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                    $validno = false;
                }
            }

            if (!empty($_POST["ptbroj"])) 
            {
                $ptbroj = testiraj_unos($_POST["ptbroj"]);
                // provjera da li je ime ispravno uneseno
                if (!is_numeric($ptbroj)) 
                {
                    $ptbroj_err = "Samo brojevi su dozvoljeni"; 
                    $slika_ptbroj = '<img src="https://cdn3.iconfinder.com/data/icons/freeapplication/png/24x24/Danger.png" alt="greska" height="15" width="15">';
                    $validno = false;
                }
            }

            if(!empty($_POST["predmet"]))
            {
                $predmet = testiraj_unos($_POST["predmet"]);
            }
        }


        function testiraj_unos($data) 
        {
           $data = trim($data); // uklanja bespotrebne razmake i prazna polja
           $data = stripslashes($data); // uklanja backslahs-ove
           $data = htmlspecialchars($data); // sprečava XSS
           return $data;
        } 

        //if valid then redirect
        if($validno)
        {
            header("Location:Form_OK.php");
            exit();
        }       
?>


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
    
            

 <body>   

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
                <div class = "required">* Obavezna polja</div>
                <br>
                <br>
                
                     

                <form name = "formica" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <p id = "ime">Ime i prezime:
                        <br> 
                        <input type="text" name="firstname" value="<?php echo $firstname;?>"> 
                        <span class="required"> <?php echo $slika_firstname;echo "   ";echo $firstname_err;?></span>
                        
                    </p>

                    <p id = "grad">Grad:
                        <br>
                        <input type="text" name="mjesto" value="<?php echo $mjesto;?>">
                        <span class="required"> <?php echo $slika_mjesto;echo "   ";echo $mjesto_err;?></span>
                    </p>

                    <p id = "ptbroj">Poštanski broj:
                        <br>
                        <input type="text" name="ptbroj" value="<?php echo $ptbroj;?>">
                        <span class="required"> <?php echo $slika_ptbroj;echo "   ";echo $ptbroj_err;?></span>
                    </p>
                    
                    <p id = "email">Email:
                        <br>
                        <input type="text" name="email" value="<?php echo $email;?>">
                        <span class="required"> <?php echo $slika_email;echo "   ";echo $email_err;?></span>
                        
                    </p>

                    <p id = "emailpotvrda">Potvrdi Email:
                        <br>
                        <input type="text" name="emailpotvrda" value="<?php echo $emailpotvrda;?>">
                        <span class="required"> <?php echo $slika_emailpotvrda;echo "   ";echo $emailpotvrda_err;?></span>
                    </p>
                    
                    <p id = "predmet">Predmet:
                        <br>
                        <input type="text" name="predmet" value="<?php echo $predmet;?>">
                    </p>
                    
                    <p id = "poruka">Poruka:
                        <br>
                        <textarea rows="10" cols="50" name="myname"><?php echo $poruka;?></textarea>
                        <span class="required"> <?php echo $slika_poruka;echo "   ";echo $poruka_err;?></span>
                        
                    </p>

                    <p id = "button-submit">
                        <button name="send" type="submit" value="Submit">Pošalji</button>
                    </p>
                </form>
          
            </div>
        

        </div>

         <div class="footer">  
        <p id="copyright">© 2023 by AdnaDurakovic</p>
        <ul id="links">
            <li><a href="https://www.facebook.com/"><img src="slike/facebook.png" height="30px" width="30px" alt="Facebook"></a></li>
            <li><a href="https://www.twitter.com/"><img src="slike/twitter.png" height="30px" width="30px" alt="Twitter"></a></li>
            <li><a href="https://www.instagram.com/"><img src="slike/instagram.png" height="30px" width="30px" alt="Instagram"></a></li>
        </ul>
    </div>
    </body>

   
</html>
<!-- kraj HTMLa -->





<!--
<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $email;
echo "<br>";
echo $poruka;
?>

-->


