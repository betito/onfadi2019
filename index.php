<?php 
include_once './internal/dbconnection.php';
header('Content-Type: text/html; charset=utf-8');
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>GDACT - IDI </title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>
        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">
<?php 
   
if(!$conexao) die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

$strSQL = "SELECT * FROM periodo";
$rs = mysql_query($strSQL, $conexao);
$row = mysql_fetch_array($rs);

$dataentc = $row["dataentc"];
$datafech = $row["datafetch"];
$dataent = $row["dataent"];
$datafec = $row["datafec"];
$dateavalstart = $row["dateavalstart"];
$dateavalend = $row["dateavalend"];
$ciclo= $row["ciclo"];
  
?>


        <h1 class="nome" style="width: 335px;">Sistema de Avalia&ccedil;&atilde;o</h1>


       <h1 class="center">BEM-VINDO, VOC&Ecirc; EST&Aacute; NO <span style="color: #0c3068; text-shadow: 1px 1px 3px rgba(0,0,0,.4);">GDACT - IDI</span> <br></h1>

        <h2 class="center" style="text-transform: uppercase;">Gratifica&ccedil;&atilde;o de
            Desempenho de Atividade de Ciência e Tecnologia - &Iacute;ndice de Desempenho Individual (IDI).</h2>


        <hr style="width: 600px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/><br>
        <center><strong>Este Sistema s&oacute; apresenta perfeita efici&ecirc;ncia com o <font color="red">Internet Explorer ou Mozilla Firefox</font></strong></center><br>
        <hr style="width: 600px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/><br>

        <center> <strong><font color="red">Ciclo de Avalia&ccedil;&atilde;o:</font> <?php echo $dataentc; ?> a <?php echo $datafech; ?></strong></center>
        <center> <strong><font color="red">Per&iacute;odo de Avalia&ccedil;&atilde;o:</font>  <?=$dateavalstart; ?> a 01/11/2019</strong></center><br>
        <center> <strong><font color="red">IMPORTANTE:  Encerramento em 01 de Novembro (HOJE) às 11:00.</font></strong></center><br/>
        <center> <strong><font size= "4" color="red"><?php echo $ciclo; ?>° CICLO</font></strong></center><br>
    
        <blockquote style="text-align:  justify; font-style: italic;">Disp&otilde;e sobre a avalia&ccedil;&atilde;o de desempenho dos
        servidores ocupantes de cargo de provimento
        efetivo nesta Institui&ccedil;&atilde;o (INPA), com
        vistas ao pagamento da Gratifica&ccedil;&atilde;o de
        Desempenho de Atividade de Ci&ecirc;ncia e Tecnologia – GDACT.</blockquote>


        <br>


        
    <ul id="alerta" class="center">
        
         <li>
             <a href="documentos/PO_ON 005_2013.pdf" target="_blank">Portaria ON nº 005/2013</a>
         </li>
        <li>
            <a href="documentos/Ped_Reconsideracao_Anexo_V.pdf" target="_blank">Pedido de Reconsidera&ccedil;&atilde;o, Anexo V da Portaria ON nº 005/2013</a>
        </li>

        <li>
            <a href="documentos/Passo_Passo_IDI_VERSAO_INPA.pdf" target="_blank">Passo a Passo - SAON 1.0 (SERVIDOR. VERS&Atilde;O INPA)</a>
        </li>
            <li>
            <a href="documentos/Passo_a_Passo.pdf" target="_blank">Passo a Passo - SAON 1.0 (SERVIDOR. VERS&Atilde;O ON)</a>
        </li>
            
        <li>
            <a href="documentos/Passo_a_Passo2.pdf" target="_blank">Passo a Passo - SAON 1.0 (CHEFIA IMEDIATA)</a>
        </li>
        <li>
            <a href="../gdact1819/docs/PASSO-A-PASSO-PARA-O-RECURSO.pdf" target="_blank">Passo a Passo - RECURSO</a>
        </li>
    </ul>

        <br>

        <a href="tela_grupos.php">
            <span class="botao">
                AVAN&Ccedil;AR
            </span>
        </a>

        <br>

    </div>

    <br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
        </strong>
        <div style="float: right; margin-right: 20px;">
        <a class="link" href="loginrh.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Painel SRH&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</a>
            <a class="link" href="listachefia.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Painel Chefias&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</a>
            <a class="link" href="http://www.on.br" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

