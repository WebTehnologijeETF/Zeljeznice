<?php
	$vijest = array();
	$broj_vijesti = 0;
	$vijesti = array();
	$datumi = array();

	function compare($f1, $f2)
  	{
    	$f1Lines = file($f1, FILE_IGNORE_NEW_LINES);
    	$f2Lines = file($f2, FILE_IGNORE_NEW_LINES);
    	$d1 = $f1Lines[0];
    	$d2 = $f2Lines[0];
    	if ($d1 == $d2) 
      		return 0;
    	return (strtotime($d1) < strtotime($d2)) ? 1 : -1;
  	}

  	// prvo sortiramo sve fajlove
  	$allFiles = array();
    foreach (glob("novosti/*.txt") as $file)
    {
      array_push($allFiles, $file);
    }
    usort($allFiles, "compare");

    // a zatim ih otvara
	foreach ($allFiles as $file)
	{
		$handle = fopen($file, "r");
		if ($handle) 
		{
			$brojac=0;
			$sadrzaj="";

			while (($buffer = fgets($handle, 1024)) !== false) 
			{
				if ($brojac==0)
				{
					$datum =$buffer;
				}
				if ($brojac==1)
				{
					$autor =$buffer;
				}
				if ($brojac==2)
				{
					$naslov =$buffer;
				}
				if ($brojac==3)
				{
					$slika='';
					if(trim($buffer)=='')
						$slika="";
					else 
						$slika = '<img class = "article-pic" src="'.$buffer.'" alt="neka slika">';
				}
				if ($brojac > 3 and trim($buffer) != "--")
				{
					$sadrzaj = $sadrzaj.$buffer;
				}
				if (trim($buffer) == "--")
				{
					$detaljno='';
					while (($buffer = fgets($handle, 1024)) !== false) 
					{
						$detaljno=$detaljno.$buffer;
					}

					$_detaljno = '';
					if($detaljno != '') 
						$_detaljno = '<a class="read-more" href="?add='.$broj_vijesti.'">DETALJNIJE...</a>';
					else $_detaljno = '';
					break;
				}
				$brojac = $brojac + 1;
			}

			$broj_vijesti = $broj_vijesti + 1;

			array_push($datumi, $datum);

			// ovo je za prikazivanje vijesti kao SPA
			$pojedinacna_vijest = '<div class="article"><h1>'.ucfirst(strtolower($naslov)).'</h1>
                  				   <h2><strong>autor : </strong>'.$autor.', <strong>Objavljeno : </strong>'.$datum.'</h2>
                  				   '.$slika.'<p>'.$sadrzaj.'<br>'.$detaljno.'</p><br></div>';


            array_push($vijesti, $pojedinacna_vijest);

            // ovo je za prikazivanje svih vijesti
			$jedna_vijest= '<div class="article"><h1>'.ucfirst(strtolower($naslov)).'</h1>
                  			<h2><strong>autor : </strong>'.$autor.', <strong>Objavljeno : </strong>'.$datum.'</h2>
                  		   '.$slika.'<p>'.$sadrzaj.'</p>'.$_detaljno.'<br></div>';

            array_push($vijest, $jedna_vijest);

            // ako je neko kliknuo "Detaljnije..."
			if(isset($_GET['add'])) 
			{
				if($_GET['add'] <= ($broj_vijesti - 1))
				{
					$vijest = array();
    				array_push($vijest, $vijesti[$_GET['add']]);
				}	
			}

		}

		fclose($handle);
	}	
?>

