<?php


    include "conection.php";
    if(is_numeric($_GET["id"])){
        $select = mysqli_query($conn, "SELECT `ID_CONTATO` as idcontato, `ID_ENDERECO` as idend FROM `livraria`.`usuario` WHERE `usuario`.`ID` = ".$_GET["id"]);
        $row = mysqli_fetch_array($select);
        $exclui = mysqli_query($conn, "DELETE FROM `livraria`.`usuario` WHERE `usuario`.`ID` = ".$_GET["id"]);
        $exclui = mysqli_query($conn, "DELETE FROM `livraria`.`contato` WHERE `contato`.`ID` = ".$row["idcontato"]);
        $exclui = mysqli_query($conn, "DELETE FROM `livraria`.`endereco` WHERE `endereco`.`ID` = ".$row["idend"]);        
    }
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Produto excluído com sucesso!');</script>";
        echo "<script>window.location = 'listar_cliente.php';</script>";
    }

    
    
    
    
