<?php

//CONNESSIONE AL DATABASE
require "libs/dbConnection1.php";

//QUERY DI SELEZIONE
$sqli = "SELECT * FROM Automobile ORDER BY Casa_Automobilistica ASC";
$result = mysqli_query($conn,$sqli);

?>

<!-- INIZIO CODICE HTML -->

<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Automobili</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="wrapper"> 

	<div id="header"> 

		<div class="top_banner">
			<h1>ACCESSORI AUTO SANDRINI</h1>
			<p>AUTOMOBILI</p><br>
			<p>In questa pagina sono visualizzate le automobili per le quali forniamo i nostri accessori</p>
		</div>
	
	</div>
	
	
<div id="page_content"> 

	<div class="container-fluid">


		<a href="index.php">Torna alla Home</a>.
		
		<center>
		<h3> Elenco Automobili  </h3>

			

<!-- SEZIONE TABELLA OUTPUT -->
	
		<center>
			<table>
				<tr>
					<th>Id</th>
					<th>Casa_Automobilistica</th>
					<th>Modello</th>
					<th>Anno</th>
					<th>Numero di porte</th>
				</tr>
				
				<?php

				while ($row = mysqli_fetch_array($result))
				{
				echo'<tr>
					<td align="center">'.$row['Id'].'</td>			
					<td align="center">'.$row['Casa_Automobilistica'].'</td>
					<td align="center">'.$row['Modello'].'</td>
					<td align="center">'.$row['Anno'].'</td>
					<td align="center">'.$row['Numero_Porte'].'</td>
					</tr>';
				}			
				?>
			</table>
			<br>
	
		</center>
	
    </div>
  
<!-- SEZIONE FOOTER -->

    <div id="footer">Copyright &copy; 2020. Design by Mattia Sandrini</a><br></div>
	
</div>

</div>

</body>
</html>