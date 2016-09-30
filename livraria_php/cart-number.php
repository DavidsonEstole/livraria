<?php
include "conection.php";
if(isset($_SESSION["ID"])){
    $quant = mysqli_query($conn, "SELECT COUNT(*) FROM carrinho WHERE ID_CLIENTE =" .$_SESSION["ID"]);
    $quant = mysqli_fetch_assoc($quant);
    $quant = $quant["COUNT(*)"]; 
}else{
    $quant = 0;
}
?>