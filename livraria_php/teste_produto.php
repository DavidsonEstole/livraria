<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();    
} 
include "cart-number.php";
?>
<html>
    <head>
        <!DOCTYPE html>
        <html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/paginacao.js" type="text/javascript"></script>
                <link href="css/slidebar.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- Bootstrap -->
        <link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">


        <title>Livraria Infinite</title>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
<div class="navbar-header" id="corpo1">
            <a class="navbar-brand" href="#"><img  src="images/globalheader_logo.png" alt="Livraria infinite"> </a>
    </div>
<div class="container-fluid">

    
    <div id="corpo2"><ul class="nav navbar-nav navbar-right"><?php if (!isset($_SESSION['login'])){ ?>
        <li><button class="btn btn-link" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</button></li>
        <li><form action="cadastro_cliente.php"><input type="submit" class="btn btn-link" on-click="location.href='cadastro_cliente.php'" value="Registre-se"> </form></li>
<?php }else{?>
        
        <li><label class="btn btn-link" data-toggle="modal" data-target="#myModal"> Olá <?php echo($_SESSION['login']); ?>!</label></li>
        <li><form action="index.php"><a type="submit" class="btn btn-link" href="index.php?id=2">Sair</a> </form></li>
<?php }?>
        <script>
            
                <?php
                   if(is_numeric($_GET["id"])){
                        session_destroy();
                        header('location:index.php');
                    }
                  
                ?>
            
        </script>        
        
        

      </ul></div>
</div>
  <div class="container-fluid" id="corpo2">
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Pagina Inicial</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Suporte</a></li>
      </ul>

    </div>
  </div>
</nav>
<nav class="navbar navbar-default" role="navigation" id="cabecalho">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
</div>

  <div class="collapse navbar-collapse navbar-ex1-collapse" >
    <ul class="nav navbar-nav">
        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Categorias<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Ação</a></li>
            <li><a href="#">Aventura</a></li>
            <li><a href="#">Humor</a></li>
            <li><a href="#">Romance</a></li>
          </ul>
      </li>
          <li><a href="#">Outros produtos</a></li>
    </ul>
    <form class="navbar-form navbar-left" role="search" action="search_livro.php" method="GET">
        <div class="form-group has-feedback has-feedback-left">
        <input type="text" class="form-control" placeholder="Procure aqui" name="livro" size ="40">
        <a href="#"><i class="form-control-feedback glyphicon glyphicon-search"></i></a>
        </div>
        <button type="submit" class="btn btn-default">Procurar</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="wishlist.php">WishList</a></li>
      <li><a href="compra.php">
        <span class="glyphicon glyphicon-shopping-cart" style="color:#000">
            <?php
                if($quant != 0){
                    echo"<span class='rw-number-notification'>" .$quant. "</span>";
                }
            ?>
        </span>
      </a></li>
            <li><a href="lista_compras.php">Histórico de Compras</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
        </div>
        
        <div class="modal-body">
        <form class="navbar-form navbar-left" role="form" method="post" action="ope.php">
          <label>E-mail: </label><input type="email" name="login" class="form-control" placeholder="Email"><br>
          <label>Senha: </label><input type="password" name="senha" class="form-control" placeholder="Senha"><br>
          <a href="#" style="align-self:center"> Esqueci minha senha</a>
          <p>Caso ainda não é cliente <a href="cadastro_cliente.php" style="align-self:center"> Clique aqui</a> e cadastre-se
          <br><br>
          <button type="submit" class="btn btn-default">Entrar</button>
          <button type="button" class="btn btn-default">Cancelar</button>
        </form>  
        </div>
        <div class="modal-footer">
          
        </div>
          
      </div>

  </div>
      
    </div>
         <?php if(isset($_SESSION['LVL'])){if($_SESSION['LVL'] == 1){
?>
        <div id="wrapper" class="toggle">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        Pagina Principal
                    </a>
                </li>
                <li>
                    <a href="cadastro_livro.php">Cadastrar Livro</a>
                </li>
                <li>
                    <a href="listar_livro.php">Listar Livro</a>
                </li>
                <li>
                    <a href="cadastro_editora.php">Cadastrar editora</a>
                </li>
                <li>
                    <a href="listar_cliente.php">Listar Cliente</a>
                </li>
                <li>
                    <a href="exec.php">Alterar Carrousel</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- /#page-content-wrapper -->

    <div id="page-content-wrapper">

         <?php }} ?>

        <?php
include 'conection.php';
if(isset($_GET["livro"])){

  $name=$_GET['livro'];
  $result = mysqli_query($conn, "SELECT * FROM `livro` WHERE `id` = '".$name."%'");
  $row = mysqli_fetch_array($result);
  $result2 = mysqli_query($conn, "SELECT ID_AUTOR FROM livro_autor WHERE ID_LIVRO =" .$row["ID"]);
  $row2 = mysqli_fetch_array($result2);
  $result2 = mysqli_query($conn, "SELECT NOME FROM autor WHERE id=" .$row2["ID_AUTOR"]);
        $row2 = mysqli_fetch_array($result2);
  $result3 = mysqli_query($conn, "SELECT NOME FROM `editora` WHERE id=" .$row["ID_EDITORA"]);
  $row3 = mysqli_fetch_array($result3);
}
  if($result === FALSE) { 
      echo "<h3> Não há livros relacionados com essa pesquisa</h3>";
  }
else { ?>


<div class="row" style="padding:20px">
		<table  border="1">
		<td>
			<tr><img src="<?php echo $row['Imagem'] ?>" width="200" height="200" class="img-responsive" alt="Placeholder image"	><tr>
		</td>
		<td>
            <tr><h4>Livro:</h4> <?php echo $row['NOME'] ?></tr>
            <tr><h4>Autor:</h4> <?php echo $row2['NOME'] ?></tr>
            <tr><h4>Categoria:</h4> <?php echo $row['CATEGORIA'] ?></tr>
            <tr><h4>Editora:</h4> <?php echo $row3['NOME'] ?></tr>
		</td>
			<h4> Sobre o Livro:</h4>
			<?php echo $row['descricao'] ?>
		</table>
    <?php
    //Colocando o produto para ser enviado para o carrinho        
    $_SESSION['produto'] = $row['ID'];
if(isset($_SESSION['ID'])){

    if($row['quantidade'] == 0){
        echo '<h4>Produto fora de estoque</h4>';
    }else{
?>
        <div class="form-group" style="padding-top: 20px"> 
            <form class="form-group" action="ajax.php?action=0" method="POST" style="display: inline-block; padding-left: 20px">
                <input type="submit" class="btn btn-default" name="insert" value="Colocar no carrinho"/>        
            </form>
            <form class="form-group" action="ajax.php?action=1" method="POST" style="display: inline-block; padding-left: 120px">
                <input type="submit" class="btn btn-default" name="select" value="Adicionar a Wishlist"/>
            </form> 
        </div>
<?php }}  else { ?>
        <h4>É preciso logar para proceder com a compra ou colocar na lista de desejo</h4> 

<?php }} ?>
<?php if(isset($_SESSION['LVL'])){if($_SESSION['LVL'] == 1){
?>
</div></div>
    
<?php }} ?>
    </body>
<script>
    $(function(){
       $('subscribe-email-form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "/notifications/subscribe/",
                type: "POST",
                data: $("subscribe-email-form").serialize(),
                success: function(data){
                    alert("Successfully submitted.")
                }
            });
       }); 
    });
        $('#cabecalho').scrollToFixed();
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>


</body>
</html>