<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;

$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';

$condicoes = [
  strlen($busca) ? 'titulo LIKE "%'.str_replace(' ', '%',$busca).'%"': null,
  strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"': null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ',$condicoes);
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 10);

$vagas = Vaga::getVagas($where,null,$obPagination->getLimit());

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';