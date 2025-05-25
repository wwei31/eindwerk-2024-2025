<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Betalen met PayPal</title>
  <script src="https://www.paypal.com/sdk/js?client-id=AT9ooqHLaYwgUEY9A-0_pqU5ZMx0oxKAg7hG-yw_4EbG4y-cns5X2maLDK73Hg-VTyfEP3mNz_JTx25_&currency=EUR"></script> 
</head>
<body>
  <h1>Bevestig je betaling</h1>
  <div id="paypal-button-container"></div>

  <script>
    // Bereken het totaalbedrag vanuit PHP-session
    const totaal = <?php
        $totaal = 0;
        if (!empty($_SESSION['winkelmandje'])) {
            foreach ($_SESSION['winkelmandje'] as $item) {
                $totaal += $item['prijs'];
            }
        }
        echo json_encode($totaal);
    ?>;

    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: totaal.toFixed(2) // Totale prijs
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Betaling voltooid door ' + details.payer.name.given_name);
          window.location.href = "betaling_succes.php"; // doorsturen
        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>
