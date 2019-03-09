<?php
include('config.php');

if(isset($_REQUEST['delete'])) {
  $chk = $_REQUEST['checkbox'];
  $a = implode(',', $chk);
  mysqli_query($link, "DELETE FROM posts WHERE id_post IN ($a)");
}

if(!empty($_POST)){


    $pattern = $_POST['pattern'];






  $sql = "SELECT * FROM posts WHERE titulo LIKE '%$pattern%' OR extracto LIKE '%$pattern%'"; 

    if($result = $link->query($sql)){

        $numrows = $result->num_rows;

        if($numrows >= 0){
            $registros = "<table class='table table-striped table-bordered table-list'>
                        <tr>
                            <th width='3%'><input type='checkbox' class='all'></th>
                            <th width='6%'class='text-center'>ID</th>
                            <th class='text-center'>Título</th>
                            <th class='text-center'>Fecha</th>
                        </tr>";

            while($row = $result->fetch_assoc()){

                $registros = $registros.
                    "<tr>".
                         
                        "<td width='3%''><input type='checkbox' class='child' name='checkbox[]' value='".$row['id_post']."'></td>".
                        "<td width='6%' class='text-center'>".$row['id_post']."</td >".
                        "<td><a href='post_edit.php?id=".$row['id_post']."'>".$row['titulo']."</a></td>".
                        "<td width='14%' class='text-center'>".$row['fecha']."</td >".
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
  
