<?php
include 'conection.php';


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case '0':
            insert();
            break;
        case '1':
            select();
            break;
    }
}

function select() {
    echo "The insert function is called.";

}

function insert() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();    
    }
    $cliente = $_SESSION['ID'];
    $livro = $_SESSION['produto'];
    include 'conection.php';
 

    $sql = mysqli_query($conn, "INSERT INTO `livraria`.`carrinho` (`ID_CLIENTE`, `ID_LIVRO`) VALUES ('$cliente', '$livro')") 
or die( mysql_error());
        
    if(mysqli_affected_rows($conn) == 0){
            echo "Ocorreu um erro ao criar sua conta, entre em contato.";
        }else{
 
            echo "<script>window.location = 'compra.php';</script>";

 
        }

}
?>