<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>DPPG - Sistema Acadêmico</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/formulario.css"/>
    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <script>
        function Enviar() {
            var nome = document.getElementById("nome");
            if (nome.value == "") {

                nome.style.borderColor="#FF253D";

                nome.focus();

            }
        }

        var nacionalidade = document.getElementById("nacionalidade");
        if (nacionalidade.value !="") {
            alert("UOU")
        }
    </script>
  

</head>
<body>

<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
    <ul id="menu-barra-temp" style="list-style:none;">
        <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li>
        <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
    </ul>
</div>


<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <h3 class="title">SAON - 1.0</h3>
    </header>

    <div class="conteudo">
        <h1 class="nome" style="width: 300px;">Sistema de Avalia&ccedil;&atilde;o</h1>

    <div id="content">
        <section  class="conteudo" id="texto" style="">
        <center>
            
            <center><img src="img/icon-check.png" alt=""/></center>
            <h1 class="sucesso"><br>O SIAPE digitado não Confere!</h1><br>
            <a class="link" style="text-align: center" href="javascript:window.history.go(-1)">Clique aqui para voltar e tente Novamente!</strong></a><br><br>
            </center>

        </section>

    </div>

    <br><br>

        
    </div>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a href="http://www.on.br/dtin">DTIN/ON</a>
        </strong>
    </footer>
</div>

<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>

</body>
</html>