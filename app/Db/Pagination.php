<?php

namespace App\Db;

class Pagination{

  private $limit;
  private $results;
  private $pages;
  private $currentPage;

  public function __construct($results, $currentPage=1, $limit=10){
      $this->results = $results;
      $this->currentPage = (is_numeric($currentPage) && $currentPage>0) ? $currentPage : 1;
      $this->limit = $limit;
  }

  private function calculate(){
    $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;
    $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
  }

}