<?php

function cargar($id)
{
    $sql = "select * from usuario where id='{$id}'";
    $rs = conexion::consulta($sql);

    $fila = mysqli_fetch_assoc($rs);

    $cliente = new stdClass();
    $cliente->id = $id;
    $cliente->email = $fila['email'];
    $cliente->password = $fila['password'];

    return $cliente;

    conexion::consulta($sql);
}
function guardar($usuarios){
   
     $sql="INSERT INTO usuarios (nombre, telefono, cuenta)
      VALUES ('{$usuarios->nombre}', '{$usuarios->telefono}', '{$usuarios->cuenta}')";
 
      conexion::consulta($sql);
     
 }

 function guarda($prestamo){
   
    $sql="INSERT INTO prestamo (monto, tiempo, cuota, id_usuario)
     VALUES ('{$prestamo->monto}', '{$prestamo->tiempo}', '{$prestamo->cuota}','{$prestamo->id_usuario}')";

     conexion::consulta($sql);
    
}

function cargar2()
{
    $sql = "Select count(*) total from usuarios where lugarN LIKE 'SANTO%'";
    $rs = conexion::consulta($sql);
    $total = mysqli_fetch_assoc($rs);

    echo $total['total'];
    /*$final=[];
    while($fila = mysqli_fetch_assoc($rs)){
        $final[]= $fila;
    }
    return $final;*/
}


function edit($id)
{
    $sql = "select * from usuarios where idU='{$id}'";
    $rs = conexion::consulta($sql);

    $fila = mysqli_fetch_assoc($rs);

    $usuarios = new stdClass();
    $usuarios->id=$id;
    $usuarios->nombre = $fila['nombre'];
    $usuarios->telefono = $fila['telefono'];
    $usuarios->cuenta = $fila['cuenta'];


    return $usuarios;
    
}
function edita($id)
{
    $sql = "select * from prestamo where idP='{$id}'";
    $rs = conexion::consulta($sql);

    $fila = mysqli_fetch_assoc($rs);

    $prestamo = new stdClass();
    $prestamo->id=$id;
    $prestamo->nombre = $fila['monto'];
    $prestamo->telefono = $fila['tiempo'];
    $prestamo->cuota = $fila['cuota'];
    $prestamo->cuenta = $fila['id_usuario'];


    return $prestamo;
    
}
function editar($latabla,$id,$nombre,$telefono,$cuenta){
       
    $sql= "UPDATE `'$latabla'` SET 
    nombre='$nombre',
    telefono='$telefono',
    cuenta='$cuenta',
     WHERE idU= '$id'";

conexion::consulta($sql);
}

function noti($id)
{
    $sql = "select * from informacionu where idF='{$id}'";
    $rs = conexion::consulta($sql);

    $fila = mysqli_fetch_assoc($rs);

    $usuarios = new stdClass();
    $usuarios->idF = $id;
    $usuarios->nombreF = $fila['nombreF'];
    $usuarios->img = $fila['img'];
    $usuarios->estatus = $fila['estatus'];

    return $usuarios;
}
function nuevos(){
    //nombreEm, rnc, color, comenterios, aportacion, cedula, nombreP, donaciones
    $usuarios = new stdClass();
    $usuarios->idU=0;
    $usuarios->nombre =''; 
    $usuarios->telefono ='';
    $usuarios->cuenta ='';
    $usuarios->cuota ='';
    return $usuarios;
}
function borrartodo()
{
    $sql = "TRUNCATE TABLE empleados";

    conexion::consulta($sql);
}

function borrar($usuarios)
{
    $sql = "delete from informacionu $usuarios where id = '{$usuarios}'";

    conexion::consulta($sql);
}
function borrar2($info)
{
    $sql = "delete from usuarios where idU = '{$info}'";

    conexion::consulta($sql);
}
function borrar3($info)
{
    $sql = "delete from prestamo where idP = '{$info}'";

    conexion::consulta($sql);
}

/****************consulta guardar info**************** */
function guardarrr()
{
    if($usuarios->id > 0){
        $sql="UPDATE usuarios $usuarios SET nombre='{$usuarios->nombre}', telefono='{$usuarios->telefono}', cuenta='{$usuarios->cuenta}' 
        WHERE idU='{$usuarios->id}'";
        conexion::consulta($sql);

    

    }else{

    $sql = "INSERT INTO usuarios (nombre, telefono, cuenta)
     VALUES ('{$usuarios->nombre}', '{$usuarios->telefono}', '{$usuarios->cuenta}')";

    conexion::consulta($sql);

    /* var_dump($info->nombreF); */
}
}
/****************consulta guardar info**************** */
//}

/*****************comsulta para registro**************************** */
function registro($informacion)
{

    $sql = "INSERT INTO usuarios (nombre, telefono, cuenta)
        VALUES ('{$informacion->nombre}','{$informacion->telefono}', '{$informacion->cuenta}')";

    conexion::consulta($sql);
}

/*****************comsulta para registro**************************** */

function Entrar($email)
{
    $sql = "SELECT * FROM admin WHERE correo = '{$email}' ";

    $rs = conexion::consulta($sql);
    $row = mysqli_fetch_assoc($rs);

    $usuarios = new stdClass();
    $usuarios->id = $row['id'];
    $usuarios->email = $row['correo'];
    $usuarios->pass = $row['contra'];
  

    return $usuarios;
}




function guardar2($empleados)
{
    $sql = "INSERT INTO empleados (cedula, nombreP, donacion)
    VALUES ('{$empleados->cedula}', '{$empleados->nombreP}', '{$empleados->donacion}')";

    conexion::consulta($sql);
}
function contador()
{
    $total = null;
    $sql = "SELECT COUNT(*) as total FROM  empleados";

    $rs = conexion::consulta($sql)->fetch_assoc();

    $total = $rs['total'];

    return $total;
}
function Nem()
{
    $sql = "SELECT*FROM usuarios";
    $rs = conexion::consulta($sql);

    $conteo = mysqli_num_rows($rs);
    echo $conteo;
}

function sacar()
{
    $sql = "select * from usuarios";
    $rs = conexion::consulta($sql);

    $final = [];
    while ($fila = mysqli_fetch_assoc($rs)) {
        $final[] = $fila;
    }
    return $final;
    //var_dump($final);
}
function buscar($noti){
    $sql = "SELECT * from usuarios where nombre = '{$noti}'";
     conexion::consulta($sql);

  
}
function saca()
{
    $sql = "select * from prestamo";
    $rs = conexion::consulta($sql);

    $final = [];
    while ($fila = mysqli_fetch_assoc($rs)) {
        $final[] = $fila;
    }
    return $final;
    //var_dump($final);
}

function sacarr()
{
    $sql = "update * from usuarios";
    $rs = conexion::consulta($sql);

    $final = [];
    while ($fila = mysqli_fetch_assoc($rs)) {
        $final[] = $fila;
    }
    return $final;
    //var_dump($final);
}


function sacarL()
{
    $sql = "select * from usuarios";
    $rs = conexion::consulta($sql);

    $final = [];
    while ($fila = mysqli_fetch_assoc($rs)) {
        $final[] = $fila;
    }
    return $final;
    var_dump($final);
}

function estatus($usuarios){
   /*  $sql="UPDATE informacionu $usuarios SET cedula='{$usuarios->cedula}', nombre='{$usuarios->nombre}', apellido='{$usuarios->apellido}', fechaN='{$usuarios->fechaN}', lugarN='{$usuarios->lugarN}', img='{$usuarios->img}' 
        WHERE id='{$usuarios->id}'"; */
       $sql= "UPDATE informacionu SET estatus='1' WHERE nombreF='{$usuarios->nombreF}'";
        conexion::consulta($sql);
}

function sacarS()
{
    $sql = "select * from informacionu WHERE estatus=1";
    $rs = conexion::consulta($sql);

    $final = [];
    while ($fila = mysqli_fetch_assoc($rs)) {
        $final[] = $fila;
    }
    return $final;
    var_dump($final);
}

function guardar3($e)
{

   /*  $sql = "INSERT INTO camaras (camara1, camara2, camara3, camara4, camara5, camara6, camara7)
    VALUES ('{$e->camara1}', '{$e->camara2}', '{$e->camara3}', '{$e->camara4}', '{$e->camara5}', '{$e->camara6}', '{$e->camara7}')";

    conexion::consulta($sql);*/

    $sql="UPDATE camaras SET camara1='{$e->camara1}',camara2='{$e->camara2}',camara3='{$e->camara3}',camara4='{$e->camara4}',camara5='{$e->camara5}',camara6='{$e->camara6}',camara7='{$e->camara7}' WHERE id = 1";
        conexion::consulta($sql); 
}

function sacarC()
{
    $sql = "select * from camaras";
    $rs = conexion::consulta($sql);

    $final = [];
    while ($fila = mysqli_fetch_assoc($rs)) {
        $final[] = $fila;
    }
    return $final;
    //var_dump($final);
}


