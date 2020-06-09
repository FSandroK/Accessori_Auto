<?php

//CONNESSIONE AL DATABASE
require "libs/dbConnection1.php";

//CREO DELLE VARIABILI DA CONSULTARE 

$where = "WHERE magazzino.Id = fornitura.MagazzinoId AND accessorio.Id = fornitura.AccessorioId AND accessorio.Automobile = automobile.Id";
$magazzino = "";
$accessorio = "";
$order = "ORDER BY Luogo ASC";


//MODIFICO IL PARAMENTRO $WHERE IN BASE AL FILTRO

if (isset($_POST['cerca']))
{

	if (empty($_POST['xmagazzino']) && empty($_POST['xaccessorio']) )
	{
		$magazzino = "";
		$accessorio = "";
		$where="WHERE magazzino.Id = fornitura.MagazzinoId AND accessorio.Id = fornitura.AccessorioId AND accessorio.Automobile = automobile.Id";
	}
	
	else if (empty($_POST['xmagazzino']))
	{
		$magazzino = "";
		$accessorio = $_POST['xaccessorio'];
		$where="WHERE magazzino.Id = fornitura.MagazzinoId AND accessorio.Id = fornitura.AccessorioId AND accessorio.Automobile = automobile.Id AND Accessorio.Nome='".$accessorio."'";
	}
	
	else if (empty($_POST['xaccessorio']))
	{
		$magazzino = $_POST['xmagazzino'];
		$accessorio = "";
		$where="WHERE magazzino.Id = fornitura.MagazzinoId AND accessorio.Id = fornitura.AccessorioId AND accessorio.Automobile = automobile.Id AND Magazzino.Nome='".$magazzino."'";
	}

	else
	{
		$magazzino = $_POST['xmagazzino'];
		$accessorio = $_POST['xaccessorio'];
		$where="WHERE magazzino.Id = fornitura.MagazzinoId AND accessorio.Id = fornitura.AccessorioId AND accessorio.Automobile = automobile.Id AND Magazzino.Nome='".$magazzino."' AND Accessorio.Nome='".$accessorio."' ";
	}
}

//CONSULTO IL DATABASE ED ESEGUO LA QUERY PRINCIPALE

$query="SELECT DISTINCT Magazzino.Nome AS Luogo, Accessorio.Nome AS Name, Casa_Automobilistica, Modello, Quanto FROM fornitura, automobile, magazzino, accessorio"." ".$where." ".$order;
$risultato = mysqli_query($conn,$query);

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
			<p>FORNITURA MAGAZZINI</p><br>
			<p>Visualizza le forniture dei nostri magazzini</p>
		</div>
	
	</div>
	
	
<div id="page_content"> 

	<div class="container-fluid">


		<a href="addF.php">- Aggiungi una fornitura</a><br>
		<a href="Automobili.php">- Visualizza le nostre Automobili</a><br>
		<a href="Accessori.php">- Visualizza i nostri Accessori</a><br>
		<a href="Magazzini.php">- Visualizza i nostri Magazzini</a>
		<br><br>
		
<!-- SEZIONE FILTRI -->

		<h3> Filtra la tua ricerca attraverso il Menù a tendina  </h3>

			<section>
			<form method="post">
			
			<select name="xmagazzino">
				<option value="">TUTTI I MAGAZZINI</option>
				<?php
				$sqli = "SELECT * FROM Magazzino ORDER BY Nome ASC";
				$result = mysqli_query($conn,$sqli);
				while($row = mysqli_fetch_array($result))
				{
				echo "<option value=".$row['Nome'].">".$row['Nome']."</option>";
				}			
				?>
			</select>
		
			<select name="xaccessorio">
				<option value="">TUTTI GLI ACCESSORI</option>
				<?php
				$sqli = "SELECT * FROM Accessorio ORDER BY Nome ASC";
				$result = mysqli_query($conn,$sqli);
				while($row = mysqli_fetch_array($result))
				{
				echo "<option value=".$row['Nome'].">".$row['Nome']."</option>";
				}			
				?>
			</select>
			
			<button class="btn" name="cerca" type="submit">Cerca</button>	
			
			</form>
		
		<br>

<!-- SEZIONE TABELLA OUTPUT -->
	
		<center>
			<table>
				<tr>
					<th>Magazzino</th>
					<th>Accessorio</th>
					<th>Automobile</th>
					<th>Numero Pezzi</th>
				</tr>
				
				<?php				
				while ($row = mysqli_fetch_array($risultato))
				{
				echo'<tr>
					<td align="center">'.$row['Luogo'].'</td>			
					<td align="center">'.$row['Name'].'</td>
					<td align="center">'.$row['Casa_Automobilistica'].":".$row['Modello'].'</td>
					<td align="center">'.$row['Quanto'].'</td>
					</tr>';
				}			
				?>
			</table>
			<br>
			
			<?php
			if(mysqli_num_rows($risultato)==0)
				{
				echo "NESSUN RECORD TROVATO";
				}
			?>
	
		</center>
	
    </div>
  
<!-- SEZIONE FOOTER -->

    <div id="footer">Copyright &copy; 2020. Design by Mattia Sandrini</a><br></div>
	
</div>

</div>

</body>
</html>