<!doctype html>
<html>
<head>
  <title>Alta de artículo</title>
  <style>
  .tablal {
    border-collapse: collapse;
    box-shadow: 0px 0px 8px #000;
    margin:20px;
  }
  .tablal th{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffd040;	  
  }  
  .tablal td{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffdd73;	  
  }
  </style>
</head>  
<body>
<form method="post" action="altaarticulo2.php">
		 
 <table class = "tablal">
	 <tr>
		 	<th>Ingreso de datos : </th>
		 </tr>
		 
		 <tr>
			 <td>Ingrese descripccion del articulo : 
			 	<input type ="text" name ="descripcion" required>
			 </td>
		 </tr>
		 <br>
		 
		 <tr>
		 	<td>Ingrese precio:
		    	 <input type="text" name="precio" required>
		    	 <br>
		   </td>
		 </tr>
		
		<tr>
			<td>
				Seleccione rubro:
    			<select name="codigorubro">		
					<?php
					    $mysql=new mysqli("localhost","root","","base1");
					    if ($mysql->connect_error)
					      die("Problemas con la conexión a la base de datos");
					    
					      $registros=$mysql->query("select codigo,descripcion from rubros") or
					        die($mysql->error);
					    while ($reg=$registros->fetch_array())
					      {
					       echo "<option value=\"".$reg['codigo']."\">".$reg['descripcion']."</option>";
					      }   
				    ?> 
			     </select>	
			     <input type="submit" value="confirmar">
     			<br>  	               
			  </td>
		</tr>
			              
                 
                     
     <a href="mantenimientoarticulos.php ">INICIO</a>
         
     
      </table>
       </form>
</body>
</html>                                                                                   