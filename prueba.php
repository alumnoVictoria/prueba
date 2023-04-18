<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista </title>
    
</head>
<body>
<?php

class Conexion{
   
  
    public static function abrir_conexion(){
        try{
          $conn = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->exec("SET CHARACTER SET UTF8");
        }catch(Exception $e){
             die("Error de conexión".$e->getMessage());
             echo "Error de conexión en la línea: ".$e->getLine();
        }
      return $conn;
  
     
  }
     
  }
  $todos=array();
  $nombres=array();//todos nombres
  $cantidad=array();//cantidad veces que se repiute
  $bd=Conexion::abrir_conexion();
  $sql="SELECT nombre,COUNT(*) FROM `usuario` GROUP BY nombre;";
  $consulta=$bd->query($sql);
  while($todosEmp=$consulta->fetch(PDO::FETCH_ASSOC)){
    $todos[]=$todosEmp;
  } 
  //var_dump($todos);
  //foreach($todos as $empleado){
    
   // echo "<tr><td>".$empleado->getDni()."</td><td>".$empleado->getNombre()." ".$empleado->getApellidos(). "</td><td>".$empleado->getEdad()."</td><td>".$empleado->getPuesto()."</td><td>".$empleado->getAnt()."</td><td>".$empleado->getSalario()."</td></tr>";
   
   // echo " nombre: ".$empleado['nombre']." num veces: ".$empleado['COUNT(*)']."<br>";
  //}
  
?>

<script>
 var datos = <?php echo json_encode($todos);?>;
 
 document.addEventListener('DOMContentLoaded', ()=>{
   
   //console.log(datos[0]['nombre']);
   let i=0;

   console.log(datos.length);
 }
 )
 //crear repositorio
 //git init
//git remote add origin
//git branch main
//git  commit -m ""
//git pull origin main
//git pull origin main -allow-unrelated-histories
//git push -u origin main
// borrar->accion rn->git commit->git push origin main
//si hay cambios en github luego para que aparecen cambion tambien en local git pull origin main
</script>
<div class="resultado"></div>
</body>
</html>