<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;

Define('TITLE', 'Cadastrar vaga');
$obVaga = new Vaga;
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->cadastrar();
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';