<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    include "conection.php";
    if(is_numeric($_GET["id"])){
        $exclui = mysqli_query($conn, "DELETE FROM `livraria`.`livro` WHERE `livro`.`ID` = ".$_GET["id"]);
        $exclui = mysqli_query($conn, "DELETE FROM `livraria`.`venda` WHERE `venda`.`ID_LIVRO` = ".$_GET["id"]); 
    }
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Produto excluído com sucesso!');</script>";
        echo "<script>window.location = 'listar_livro.php';</script>";
    }