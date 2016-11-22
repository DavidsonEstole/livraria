<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();    
}
include "cart-number.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Livraria Infinite</title>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/paginacao.js" type="text/javascript"></script>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<script src="js/jquery.balloon.js"></script>
<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.mask.min.js"/></script>


    <link type="text/css" rel="stylesheet" media="screen" href="css/style.css" />
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

<h1 class="text-primary"><font color="#FFFFFF"> Registre-se</h1>
<form class="form-horizontal" role="form" action="database_cliente.php" method="post">
<fieldset>
<legend>Dados Pessoais</legend>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nome">Nome:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="name" placeholder="Digite seu nome aqui" required>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Sobrenome:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-3"> 
      <input type="email" class="form-control" name="email" placeholder="Digite o seu email" required>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">CPF:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="CPF" placeholder="CPF" required>
    </div>
  </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Senha:</label>
    <div class="col-sm-3"> 
      <input type="password" class="form-control" name="pwd" required placeholder="Digite uma senha">
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">RG:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="RG" placeholder="RG" required>
    </div>
  </div>
   </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirmar Senha:</label>
    <div class="col-sm-3"> 
      <input type="password" class="form-control" name="ppwd" placeholder="Digite sua senha novamente">
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Sexo:</label>
    <div class="col-sm-3"> 
     <select class="form-control" name = "sexo">
        <option value="MG">M</option>
        <option value="SP">F</option>
        </select>
  	</div>
   </div> 
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Telefone:</label>
    <div class="col-sm-3"> 
        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Digite seu Telefone">
        <script type="text/javascript">$("#telefone").mask("(00) 0000-0000");</script>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Celular:</label>
    <div class="col-sm-3"> 
        <input type="tel" class="form-control" id="celular" name="celular" placeholder="Digite seu Celular">
        <script type="text/javascript">$("#celular").mask("(00) 0000-00009");</script>
  </div>
  </div>
  </div>
  </fieldset>
  <fieldset>
<legend>Endereço</legend>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Bairro:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro">
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">CEP:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="CEP" placeholder="CEP">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Numero:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="Numero" placeholder="Digite o numero">
    </div>
<div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Avenida:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="rua" placeholder="Digite a avenida">
    </div>
  </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Cidade:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade">
    </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Estado:</label>
    <div class="col-sm-3"> 
      <select class="form-control" name="estado">
        <option value="MG">Minas Gerais</option>
        <option value="SP">São Paulo</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="AC">Acre</option>
      </select>
    </div>
  </div>
  </div>
  </fieldset>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      
      	<button type="clear" class="btn btn-default">Limpar Campos</button>
      <div class="col-sm-7">
      <button type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
  </div>
</form>

 <script type="text/javascript">
        $('#cabecalho').scrollToFixed();
  </script>

</body>
</html>
