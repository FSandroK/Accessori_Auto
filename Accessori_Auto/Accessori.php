<?php

//CONNESSIONE AL DATABASE
require "libs/dbConnection1.php";

//QUERY DI SELEZIONE
$sqli = "SELECT Accessorio.Id, Accessorio.Nome, Accessorio.Descrizione, Accessorio.Automobile, Automobile.Casa_Automobilistica, Automobile.Modello FROM Accessorio,Automobile WHERE Accessorio.Id = Automobile.Id ORDER BY Nome ASC";
$result = mysqli_query($conn,$sqli);

?>

<!-- INIZIO CODICE HTML -->

<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Accessori</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="wrapper"> 

	<div id="header"> 

		<div class="top_banner">
			<h1>ACCESSORI AUTO SANDRINI</h1>
			<p>ACCESSORI</p><br>
			<p>In questa pagina sono visualizzati nostri accessori</p>
		</div>
	
	</div>
	
	
<div id="page_content"> 

	<div class="container-fluid">


		<a href="index.php">Torna alla Home</a>.
		
		<center>
		<h3> Elenco Accessori  </h3>
			

<!-- SEZIONE TABELLA OUTPUT -->
	
		<center>
			<table>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Descrizione</th>
					<th>Automobile</th>
				</tr>
				
				<?php

				while ($row = mysqli_fetch_array($result))
				{
				echo'<tr>
					<td align="center">'.$row['Id'].'</td>			
					<td align="center">'.$row['Nome'].'</td>
					<td align="center">'.$row['Descrizione'].'</td>
					<td align="center">'.$row['Casa_Automobilistica'].":".$row['Modello'].'</td>
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