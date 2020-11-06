<?php
	require_once('../funciones/sesion.php');
	sessionDestroy();
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento sin título</title>

		<style>

			h1{text-align:center;
			}
			
			table{
				width:25%;
				background-color:#FFC;
				border: 2px dotted #F00;
				margin:auto;}
				
				.izq{text-align:right;
				}
				
				.der{
					text-align:left;
				}
				
				td{
					text-align:center;
					padding:10px;
				}



		</style>
	</head>

	<body>

		<h1> INTRODUCE TUS DATOS</h1>
    	<form action="login_code.php" method="post">

		<table>
			<tr style="">
				<td class="izq">Login:</td>
				<td class="der"><input type="text" name="login"></td></tr>
				<tr><td class="izq">Password:</td><td class="der"><input type="password" name="password"></td></tr>
				<tr><td colspan="2"><input type="submit" name="Enviar" value="LOGIN"></td>
			</tr>
		</table>
		</form>

		<br><br>

		<form action="registrar.php">
			<input type="submit" name="Registrarse">
		</form>

	</body>
	<?php
		include_once('../headFoot/footer.php');
	?>
</html>