<!DOCTYPE html>
<html>
  <head>
    <title>
      Confirmation de commande - Cantine Chez Rita
    </title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  </head>
  <body>
    <h1>Cantine Chez Rita</h1>
    <h2>Confirmation de commande</h2>
    <p>Nous avons bien reçu votre commande!</p>
    <hr />
    <h3>Contenu de la commande:</h3>
    <?php
      foreach ($items as $item) {
      ?>
        <ul>
          <li>
            <?= $txt[$item['type']] ?>
            <p class="order-item-details">
              <?php
                if ($item['type'] === 'hamburger') {
                  if ($item['cheese']) echo 'Fromage' . '<br />';
                  if ($item['pickles']) echo 'Cornichons' . '<br />';
                } else if ($item['type'] === 'fries') {
                  echo 'Format: ' . $txt[$item['size']] . '<br />';
                }
              
                foreach ($item['condiments'] as $condiment) {
                  echo $txt[$condiment] . '<br />';
                }
              ?>
            </p>
          </li>
        </ul>
      <?php
      }
    ?>
    <hr />
    <p>
      <strong>Commande reçue à </strong>
      <?= $orderReceivedAt ?>
    </p>
    <p>
      <strong>Heure de livraison prévue: </strong>
      <?= $estimatedDeliveryTime ?>
    </p>
  </body>
</html>
