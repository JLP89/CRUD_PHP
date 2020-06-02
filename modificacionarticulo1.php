<!doctype html>
<html>
<head>
  <title>Modificación de artículo.</title>
  
  <style>
  .tablam {
    border-collapse: collapse;
    box-shadow: 0px 0px 8px #000;
    margin:20px;
  }
  .tablam th{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffd040;	  
  }  
  .tablam td{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffdd73;	  
  }
  </style>
</head>  
<body>
  
  <?php
	$mysql=new mysqli("localhost","root","","base1");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select descripcion,precio,codigorubro from articulos where codigo=$_REQUEST[codigo]") or
      die($mysql->error);
	 
    if ($reg=$registro->fetch_array())
    {
  ?>
  <table class = "tablam" >
    <form method="post" action="modificacionarticulo2.php">																			
    <tr>
   		<td> Descripción del artículo:
      		<input type="text" name="descripcion" size="50" value="<?php echo $reg['descripcion']; ?>">
      		<br>
      	</td>
   </tr>
   
   <tr>
   
   <tr>
   		<td>
    		 Precio
      		<input type="text" name="precio" size="10" value="<?php echo $reg['precio']; ?>">      
      		<br>  
   	   </td>
   </tr>
   
   <tr>
   		<td>
			Rubro:
      <select name="codigorubro">
      <?php
      $registros2=$mysql->query("select codigo,descripcion from rubros") or
        die($mysql->error);
	  while ($reg2=$registros2->fetch_array())
      {
            if ($reg2['codigo']==$reg['codigorubro'])
           echo "<option value=\"".$reg2['codigo']."\" selected>".$reg2['descripcion']."</option>";         
         else
	       echo "<option value=\"".$reg2['codigo']."\">".$reg2['descripcion']."</option>";
      }		
      ?>    	
      </select>  
   	   </td>
   </tr>
          
      
      <tr>
	      <td>
		      <input type="hidden" name="codigo" value="<?php echo $_REQUEST['codigo']; ?>">     
		      <br> 
		      <input type="submit" value="Confirmar">
	   	 </td>
   	</tr>
   	
    </form>
    <a href="mantenimientoarticulos.php ">INICIO</a>
    </table>
  <?php
    }      
    else
	  echo 'No existe un artículo con dicho código';
	
    $mysql->close();

  ?>  
</body>
</html>