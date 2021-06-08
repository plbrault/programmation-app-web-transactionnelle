<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= $serie['title'] ?>
    </title>
    <link rel="stylesheet" href="/cours11/solution/lab09/public/style.css"> 
  </head>
  <body>
    <p>
      <a href="?action=list">Séries</a>
      &nbsp;/&nbsp;
      <?= $serie['title'] ?>
    </p>
    <h1><?= $serie['title'] ?></h1>   
    
    <p>
      <a href="?action=edit&id=<?= $id ?>">
        ✏️
      </a>
      &nbsp;
      <a
        onclick="return confirm('Voulez-vous vraiment supprimer la série « <?= $serie['title'] ?> » ?')"
        href="?action=delete&id=<?= $id ?>"
      >
        ❌
      </a>
    </p>

    <main>
      <p>
        <strong>Diffuseur: </strong>
        <?= $serie['distributor_name'] ?>
      </p>
      <p>
        <strong>Nombre de saisons: </strong>
        <?= $serie['nb_seasons'] ?>
      </p>
      <p>
        <strong>Nombre d'épisodes: </strong>
        <?= $serie['nb_episodes'] ?>
      </p>
      <p>
        <strong>Nombre d'épisodes vus: </strong>
        <?= $serie['nb_viewed_episodes'] ?>
      </p>            
    </main>
  </body>
</html>
