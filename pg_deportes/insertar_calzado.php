<?php

include ("cn.php");

$producto = $_POST["producto"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];

$insertarcalzado = "INSERT INTO calzado(producto, marca, modelo, precio) 
VALUES('$producto','$marca','$modelo','$precio')";

$resultado = mysqli_query($conexion, $insertarcalzado);

if($resultado) {
    echo "<script>alert('SE HA REGISTRADO EL PRODUCTO CON EXITO'); window.location='menu.html'</script>";

} else {
    echo "<script>alert('SE HA PRODUCIDO UN ERROR')  window.history.go(-1);</script>";

}