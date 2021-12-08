<?php
$server = "localhost";
$user = "root";
$pass = "123";
$bd = "deportes_bd";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM calzado";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$calzado = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
 
    $producto=$row['producto'];
    $marca=$row['marca'];
    $modelo=$row['modelo'];
    $precio=$row['precio'];
 

    $calzado[] = array('producto'=> $producto, 'marca'=> $marca, 'modelo'=> $modelo, 'precio'=> $precio);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($calzado);
echo $json_string;


$file = 'productos.json';
file_put_contents($file, $json_string);

    

?>