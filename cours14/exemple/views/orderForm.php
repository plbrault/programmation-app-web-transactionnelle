<!DOCTYPE html>
<html>
  <head>
    <title>
      Formulaire de commande - Cantine Chez Rita
    </title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  </head>
  <body>
    <h1>Cantine Chez Rita</h1>
    <h2>Formulaire de commande</h2>
    <form id="order-form" method="POST" action="index.php">
      <p>
        <label for="add-item-select">Ajouter...</label>
        <select id="add-item-select">
          <option value="" selected>Sélectionner un item</option>
          <option value="hotdog">Hot-dog</option>
          <option value="hamburger">Hamburger</option>
          <option value="frites">Frites</option>
        </select>
      </p>
      <input type="submit" id="submit-button" name="submit" value="Soumettre" disabled />
    </form>
    <script src="public/js/orderForm.js"></script>
  </body>
</html>
