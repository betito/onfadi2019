<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 10/16/15
 * Time: 1:42 PM

 * Sistema de segurança com acesso restrito
 *
 * Usado para restringir o acesso de certas páginas do seu site
 *
 */
//  Configurações do Script
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.
$_SG['servidor'] = 'endereçoBD';    // Servidor MySQL
$_SG['usuario'] = 'LOGIN';          // Usuário MySQL
$_SG['senha'] = 'SENHA';                // Senha MySQL
$_SG['banco'] = 'gdact';            // Banco de dados MySQL
$_SG['paginaLogin'] = 'loginrh.html'; // Página de login
$_SG['tabela'] = 'adm';       // Nome da tabela onde os usuários são salvos
// ==============================
// ======================================


//   ~ Não edite a partir deste ponto ~
// ======================================
// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
    $_SG['link'] = connect();
}
// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true)
    session_start();
/**
 * Fun&ccedil;&atilde;o que valida um usuário e senha
 *
 * @param string $usuario - O usuário a ser validado
 * @param string $senha - A senha a ser validada
 *
 * @return bool - Se o usuário foi validado ou não (true/false)
 */
function validaUsuario($usuario, $senha) {
    global $_SG;
    $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

    // Usa a fun&ccedil;&atilde;o addslashes para escapar as aspas
    $nusuario = addslashes($usuario);
    $nsenha = addslashes($senha);

    // Monta uma consulta SQL (query) para procurar um usuário
    $sql = "SELECT `id`, `usuario` FROM `".$_SG['tabela']."` WHERE ".$cS." `usuario` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
    $query = mysql_query($sql);
    $resultado = mysql_fetch_assoc($query);

    // Verifica se encontrou algum registro
    if (empty($resultado)) {

        // Nenhum registro foi encontrado => o usuário é inválido
        return false;
    }
    else {

        // Definimos dois valores na sessão com os dados do usuário
        $_SESSION['usuarioID'] = $resultado['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL


        // Verifica a op&ccedil;&atilde;o se sempre validar o login

        if ($_SG['validaSempre'] == true) {

            // Definimos dois valores na sessão com os dados do login
            $_SESSION['usuarioLogin'] = $usuario;
            $_SESSION['usuarioSenha'] = $senha;
        }

        return true;
    }
}
/**
 * Fun&ccedil;&atilde;o que protege uma página
 */
function protegePagina() {

    global $_SG;
    if (!isset($_SESSION['usuarioID']) ) {

        // Não há usuário logado, manda pra página de login
        expulsaVisitante();
    }
    else {
        // Há usuário logado, verifica se precisa validar o login novamente
        if ($_SG['validaSempre'] == true) {

            // Verifica se os dados salvos na sessão batem com os dados do banco de dados

            if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {

                // Os dados não batem, manda pra tela de login
                expulsaVisitante();

                header("Location: loginrh.html");
            }
        }
    }
}
/**
 * Fun&ccedil;&atilde;o para expulsar um visitante
 */
function expulsaVisitante() {
    global $_SG;
    // Remove as variáveis da sessão (caso elas existam)
    unset($_SESSION['usuarioID'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
    // Manda pra tela de login
    header("Location: loginrh.html ".$_SG['loginrh.html']);
}