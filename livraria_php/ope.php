<?php
include 'conection.php';
// session_start inicia a sessão

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();    
}
// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($conn, "SELECT ID as ID FROM `CONTATO` WHERE `EMAIL`= '$login'");
$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0){
        $result = $row['ID'];
        $result = mysqli_query($conn, "SELECT * FROM `USUARIO` WHERE `ID_CONTATO`= '$result' AND `SENHA`= '$senha'");
        $row = mysqli_fetch_array($result);

    /* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
    if(mysqli_num_rows ($result) > 0 )
    {
            $_SESSION['login'] = $row['NOME'];
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['LVL'] = $row['LVL'];
            header('location:index.php');
    }else{
            session_destroy();
            header('location:index.php');
    }
}else{
        session_destroy();
        header('location:index.php');
    }