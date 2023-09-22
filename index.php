<?php
  require_once './controllers/MainCotroller.php';
  require_once './controllers/IncomeController.php';
  require_once './controllers/ExpenseController.php';
  require_once './controllers/CategoryController.php';
  
  
  $app = new MainController();
  $app->run();
?>