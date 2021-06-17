<!DOCTYPE html>
<html>
  <head>
    <title>Liste de tâches</title>
  </head>
  <body>
    <h1>Liste de tâches</h1>
    <form>
      <ul>
        <?php

        foreach ($tasks as $task) {
          $listItemID = 'task_' . $task['id'];
          $checkboxID = $listItemID . '_checkbox';

          echo '<li id="' . $listItemID . '">';
          echo '<data value="' . $task['id'] . '">';
          echo '<input id="' . $checkboxID . '" type="checkbox" ' . ($task['is_checked'] ? 'checked ' : '') . '/>';
          echo "<label for=\"$checkboxID\">" . $task['description'] . '</label>';
          echo '</data>';
          echo '</li>';
        }

        ?>
      </ul>
    </form>
    <script src="public/js/todolist.js"></script>
  </body>
</html>
