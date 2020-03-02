<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
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
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Lista de Servidores</h1>

       
                 <h2 class="center" style="text-transform: uppercase;">&Aacute;rea de Visualiza&ccedil;&atilde;o de dados de servidores para Avalia&ccedil;&atilde;o GDACT</h2>
                 <blockquote style="text-align:  center; font-style: italic;">Direcionamento de Grupos para Servidores</blockquote>

        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>
        <blockquote style="text-align:  center; font-style: italic; color:red;">Basta clicar no nome do servidor para modificar os dados</blockquote>
        <br>
         <a href="painelrh.php">
            <span class="botao">
                VOLTAR
            </span>
        </a>

       <center>
      <?php
    // Conecta com o Banco de Dados

    
    // query SQL
    mysql_set_charset('UTF8', $conexao);
    $strSQL = "SELECT * FROM avaliado order by nome asc" ;

    // Executa a query (o recordset $rs contém o resultado da query)
    $rs = mysql_query($strSQL, $conexao);
    $rs1 = mysql_query($strSQL, $conexao);
    $rs2 = mysql_query($strSQL, $conexao);

echo '<br> <h3 class="center" style="text-transform: uppercase;">CHEFIA IMEDIATA</h3>';

echo '<table border="1" width="70%">';
 
echo '<tr>';
 
echo '<th bgcolor="#abcdef">Nome</th>';
 
echo '<th bgcolor="#abcdef">Tipo</th>';

echo '<th bgcolor="#abcdef">Sigla Organizacional</th>';
 
echo '</tr>';

  // Loop pelo recordset $rs
    while($row2 = mysql_fetch_assoc($rs2)) {
      
        $tipo = $row2["tipo"] ;
        if (strcasecmp($tipo, "Chefia Imediata") ==0) {
echo '<tr>';
echo '<td><a href="pessoal2.php?lin='.$row2["nome"].'">' .$row2["nome"]. '</td>';
echo '<td><center>'.$row2["tipo"].'</center></td>';
echo '<td><center>'.$row2["sigla_org"].'</center></td>';
 echo '</tr>';
    }
    
}
echo '</table>';



echo '<br> <h3 class="center" style="text-transform: uppercase;">DEMAIS SERVIDORES</h3>';


    echo '<table border="1" width="70%">';
 
echo '<tr>';
 
echo '<th bgcolor="#abcdef">Nome</th>';
 
echo '<th bgcolor="#abcdef">Cargo</th>';

echo '<th bgcolor="#abcdef">Sigla Organizacional</th>';

echo '<th bgcolor="#abcdef">Situa&ccedil;&atilde;o</th>';


 
echo '</tr>';


        // Loop pelo recordset $rs
    while($row1 = mysql_fetch_assoc($rs1)) {
      
        $tipo = $row1["tipo"] ;
        if (strcasecmp($tipo, "Chefia Imediata") != 0) {
echo '<tr>';
echo '<td><a href="pessoal2.php?lin='.$row1["nome"].'">' .$row1["nome"]. '</td>';
echo '<td><center>'.$row1["cargo"].'</center></td>';
echo '<td><center>'.$row1["sigla_org"].'</center></td>';
echo '<td><center>'.$row1["Situacao"].'</center></td>';
 echo '</tr>';
    }
    
}
echo '</table>';
      
?>
        <br>


        
        <br>


       
<br>
        
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
           
        </div>
    </footer>
</div>
</body>

