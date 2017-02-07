<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Documento con los beneficios de la semana 2</title>
  </head>
  <body>
    <?php
//////////CONEXIÓN//////////
    $mysqli = new mysqli("localhost","root","root","beneficios");
    if ($mysqli->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
    }else {
      echo "Conexion realizada<hr>";
//////////Hacemos las dos consultas//////////
      $resultado1 = $mysqli->query(" SELECT * FROM gastos WHERE num_semana=2");
      $resultado2 = $mysqli->query(" SELECT * FROM ventas WHERE num_semana=2");
     ?>
<!--VOLVEMOS A COLOCAR EL MENÚ POR SI QUEREMOS VOLVER AL INICIO-->
     <table border="1">
      <tr>
        <th><a href="index.php">INICIO</a></th>
        <th><a href="total.php">Total</a></th>
        <th><a href="ben_1.php">Beneficios semana 1</a></th>
        <th><a href="ben_2.php">Beneficios semana 2</a></th>
      </tr>
      </table>
      <br>

     <?php
//////////ABRIMOS EL PHP PARA REALIZAR LAS OPERACIONES NECESARIAS//////////
     $totalgasto=0;
     while ($fila1=$resultado1->fetch_assoc()) {
       $totalgasto=$totalgasto+$fila1["gasto"];
     }
     echo "total gasto: ".$totalgasto."<br>";

     $totalventa=0;
     while ($fila2=$resultado2->fetch_assoc()) {
       $totalventa=$totalventa+$fila2["venta"];
     }
     echo "total venta: ".$totalventa."<br>";

     $beneficio=$totalventa-$totalgasto;
     echo "Los beneficios de la semana 2 son: ".$beneficio;
    }
?>
  </body>
</html>
