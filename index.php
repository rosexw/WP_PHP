
<?php
  require 'db.php';

  require 'MVC/controller/controller.php';
  require 'MVC/models/model.php';

  $model = new Model($conn);
  $controller = new Controller($model);

  require 'MVC/view/list.php';

  // echo $view->output();
?>
