<?php
// require_once('conexion.php');
include('config.php');


if(!empty($_POST)){


    $pattern = $_POST['pattern'];

    // $db = new conexion();
    // $conex = $db->getConexion();

  // $sql = "SELECT * FROM users WHERE user LIKE '".$pattern."%';";

  $sql = "SELECT * FROM users WHERE user LIKE '%$pattern%' OR mail LIKE '%$pattern%'"; 

    if($result = $link->query($sql)){

        $numrows = $result->num_rows;

        if($numrows >= 0){
            $registros = "<table class='table table-striped table-bordered table-list'>
                        <tr>
                            <th width='3%'><input type='checkbox' class='all'></th>
                        <th width='6%'class='text-center'>ID</th>
                        <th class='text-center'>Usuario</th>
                    
                        <th class='text-center'>Correo electrónico</th>
                        <th class='text-center'>Rango</th>
                        </tr>";

            while($row = $result->fetch_assoc()){

                $registros = $registros.
                    "<tr>".
                    "<td width='3%''><input type='checkbox' class='child' name='checkbox[]' value='".$row['id_user']."'></td>".
                    "<td width='6%' class='text-center'>".$row['id_user']."</td >".
                    "<td><a href='user_edit.php?id=".$row['id_user']."'>".$row['user']."</a></td>".
               
                    "<td>".$row['mail']."</td >".
                    "<td width='14%' class='text-center'>".$row['rango']."</td >".
                    "</tr>";
            }

            $registros = $registros."</table >";

            print $registros;

        }else{
            print "No se Encontraron Coincidencias.";
        }
    }else{
        print $conex->error;
    }
}

?>
