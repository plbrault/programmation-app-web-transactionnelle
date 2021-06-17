<!DOCTYPE html>
<html>
  <head>
    <title>Liste de tâches</title>
  </head>
  <body>
    <h1>Liste de tâches</h1>
    <ul>
      <?php

      foreach ($tasks as $task) {
        echo '<li id="task_' . $task['id'] . '">';
        echo $task['description'];
        echo '</li>';
      }

      ?>
    </ul>
  </body>
</html>
