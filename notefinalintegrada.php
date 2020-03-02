<?php
include_once './internal/dbconnection.php';
include_once './internal/utils.php';
// Conecta com o Banco de Dados
$conexao = connect();
$conexaometa = connectmeta();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>GDACT - IDI </title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/menu.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <h3 class="title">NOTA INTEGRADA: IMI E IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Lista de Servidores</h1>

       
                 <h2 class="center" style="text-transform: uppercase;">Área de Visualiza&ccedil;&atilde;o de dados de servidores para Avalia&ccedil;&atilde;o GDACT</h2>
                 <blockquote style="text-align:  center; font-style: italic;">Altera&ccedil;&atilde;o de Dados e Direcionamento de Grupos</blockquote>


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>



        

        <br>
    
      <?php

        $nome= $_POST["nome"];
        $unid_org = $_POST["unid_org"];
        $sigla_org = $_POST["sigla_org"];
        $siape= $_POST["siape"];
        $cargo= $_POST["cargo"];
        $ramal= $_POST["ramal"];
        $email= $_POST["email"];
        $grupo= $_POST["grupo"];
                
    // mysql_query("SET NAMES 'utf8'");
    // mysql_query("SET character_set_connection=utf8");
    // mysql_query("SET character_set_client=utf8");
    // mysql_query("SET character_set_results=utf8");

    
    /*
     * adicionar validacao do numero de pessoas por grupo da mesma sigla_org no max 4.
     * de acordo com a portaria art.18 paragrafo 1.
     * 
     */
 

// check out the total of elements in that grp
    $query1 = "SELECT count(*) as cont FROM gdact.avaliado "
        . " where grupo like '" . $grupo . "' and "
        . " sigla_org like '".$sigla_org."'";

    $qry = mysql_query($query1,$conexao);
    $res = mysql_fetch_assoc($qry);
?>

    </div>

    <?php
    }
    ?>
    <br><br><br>
    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
                  </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

</html>