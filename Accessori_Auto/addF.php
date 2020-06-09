<?php

//CONNESSIONE AL DATABASE
require "libs/dbConnection1.php";


//VARIABILI UTILI
$magazzino="";
$accessorio="";
$numero="";
$flag="";

//INVIO I DATI COL SUBMIT
if (isset($_POST['inserisci']))
{
	$magazzino=$_POST['xmagazzino'];
	$accessorio=$_POST['xaccessorio'];
	$numero=$_POST['quanto'];
	$flag="ok";
}

?>


<!-- INIZIO CODICE HTML -->

<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Accessori Auto</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="wrapper"> 

	<div id="header"> 

		<div class="top_banner">
			<h1>ACCESSORI AUTO SANDRINI</h1>
			<p>AGGIORNA LA TABELLA FORNITURA</p>
		</div>
	
	</div>
	
	
<div id="page_content"> 

	<div class="container-fluid">


		<a href="index.php">Torna alla home</a>.
		<br><br>
		<h3> Aggiungi un record alla tabella fornitura  </h3>

			<br>
			
<!-- SELEZIONO IL PRODOTTO E LO INSERISCO NEL DATABASE -->

			<form method="post">
				
				<select name="xmagazzino" required>
				<option value="">INSERISCI IL MAGAZZINO</option>
					<?php
					$sqli = "SELECT * FROM Magazzino ORDER BY Nome ASC";
					$result = mysqli_query($conn,$sqli);
					while($row = mysqli_fetch_array($result))
					{
					echo "<option value=".$row['Id'].">".$row['Nome']."</option>";
					}			
					?>
				</select>
			
				<select name="xaccessorio" required>
				<option value="">INSERISCI L'ACCESSORIO</option>
					<?php
					$sqli = "SELECT Accessorio.Id, Accessorio.Nome, Accessorio.Automobile, Automobile.Casa_Automobilistica, Automobile.Modello FROM Accessorio,Automobile WHERE Accessorio.Id = Automobile.Id ORDER BY Nome ASC";
					$result = mysqli_query($conn,$sqli);
					while($row = mysqli_fetch_array($result))
					{
					echo "<option value=".$row['Id'].">".$row['Nome']." per ".$row[Casa_Automobilistica].":".$row[Modello]."</option>";
					}			
					?>
				</select>
				<br><br>
				<p>Numero Pezzi Disponibili: <input type="number" name="quanto" min="1"</p>
				
				<button class="btn" name="inserisci" type="submit" required>Invia</button>	
			
			</form>
		
		<br><br>
		
	<?php
	if ($flag!=""){
	$query="INSERT INTO Fornitura VALUES ($magazzino,$accessorio,$numero)";
	$risultato = mysqli_query($conn,$query) or die ("!! IMPOSSIBILE ESEGUIRE LA QUERY : DATI MANCANTI O RECORD GIA' PRESENTE !!");
	echo 'RECORD INSERITO CORRETTAMENTE';
	}
	?>
	
	

    </div>
  
<!-- SEZIONE FOOTER -->

    <div id="footer">Copyright &copy; 2020. Design by Mattia Sandrini</a><br></div>
	
</div>

</div>

</body>
</html>