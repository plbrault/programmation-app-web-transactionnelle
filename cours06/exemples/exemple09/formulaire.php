<form action="<?php echo $_SERVER['REQUEST_URI']; /* URL courante */ ?>" method="POST">
  <label for="utilisateur-input">Nom d'utilisateur:</label>
  <input type="text" id="utilisateur-input" name="utilisateur" />

  <label for="mot-de-passe-input">Mot de passe:</label>
  <input type="password" id="mot-de-passe-input" name="motDePasse" />

  <input type="Submit" value="Soumettre" />
</form>
