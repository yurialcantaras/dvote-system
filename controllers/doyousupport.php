<?php
session_start();
session_destroy();

// Adicionar filtro para que não seja possível submeter form sem registro blockchain

// Inclui os arquivos do model e da conexão
require_once '../models/db_connection.php';
require_once '../models/vote_model.php';

// Instancia a conexão com o banco de dados
$database = new Database();
$db = $database->getConnection();

// Instancia o modelo de votos
$voteModel = new VoteModel($db);

// Recebe os dados do formulário
$hash = $_POST['txHash'];
$vote = $_POST['vote'];

// Insere os dados na tabela
if ($voteModel->insertVote($hash, $vote)) {

    session_start();
    $_SESSION['summary'] = $voteModel->sumVotes();

    header('Location: ../success_page.php?vote='.$vote.'&hash='.$hash);
} else {
    echo "Failed to record the vote.";
}

?>
