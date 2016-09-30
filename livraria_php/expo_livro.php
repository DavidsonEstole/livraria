<?php
include "conection.php";
$result = mysqli_query($conn, "SELECT * FROM livro ORDER BY ID DESC");
if($result === FALSE) { 
    mysql_error();
}
else {
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result as $row ) { 
        $result2 = mysqli_query($conn, "SELECT ID_AUTOR FROM livro_autor WHERE ID_LIVRO =" .$row["ID"]);
        $row2 = mysqli_fetch_array($result2);
        
        $result2 = mysqli_query($conn, "SELECT NOME FROM autor WHERE id=" .$row2["ID_AUTOR"]);
        $row2 = mysqli_fetch_array($result2);
        echo
        "<a class='fill-div' href='teste_produto.php?livro=" .$row['ID']. "'><div class='col-sm-4 col-lg-4 col-md-4' onclick='pagina_produto.php?livro=" .$row['ID']. ";' style='cursor: pointer;' style='width:400px;'>
                        <div class='thumbnail link'>
                            <img src=" .$row['Imagem']. " style='height:228px;' class='center-block2'>
                            <div class='caption'>
                            <h4 class='pull-right'>R$" .$row['PRECO']. "</h4>
                            <h4>Nome: " .$row['NOME']. "</h4>
                            <h5>Autor: " .$row2['NOME']. "</h5>                            
                            <p> Estilo: " .$row['CATEGORIA']. "</p></div>
                        </div></a>
        </div>";
        
    }
} ?>
