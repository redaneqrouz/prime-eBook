<?php
// A modifier
$votreemail = 'monemail@portannuaire.info';
$designation = 'Achat de videos';
$compte = ''; // (par exemple l'ID du compte du payeur dans la base de données)
$montantpaiement = $tot;

// ajouter des fonctions pr éviter les erreurs lors de l'éxécution de l'adresse URL par exemple des antislashes, etc...

echo 'Pour payer les <b>'.$montantpaiement.'€</b>, merci de cliquer sur le bouton ci-dessous :<br><br>';
echo '<A HREF="#" onClick="window.open(\'https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$votreemail.'&item_name='.$designation.'&item_number='.$compte.'&amount='.$montantpaiement.'&no_shipping=1&no_note=1&currency_code=EUR&lc=FR&bn=PP%2dBuyNowBF&charset=UTF%2d8\',\'paiementpaypal\',\'toolbar=0, location=0, directories=0, status=1, scrollbars=1, resizable=1, copyhistory=0, menuBar=1, width=800, height=580\');return(false)"><img src="/design/boutonpaypal.gif" border="0" width="90" height="30"></A>';
?>
