<?php

/*
ETAPE 1
On commence par générer la requête à réenvoyer à PayPal
(Au départ, PayPal envoie une requête à une URL que vous aurez spécifiée dans
votre espace PayPal dans la rubrique "Préférences de Notification instantanée
de paiement" et qui est donc l'adresse URL de cette page même sur votre serveur).
*/

// il faudra ajouter 'cmd=_notify-validate' à la requête reçue
$req = 'cmd=_notify-validate';
// On reforme la requête avec les variables envoyées par Paypal
foreach ($_POST as $key => $value)
{
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

/*
ETAPE 2
On renvoie la requête au système PayPal pour validation (par POST) qui nous
permettra d'avoir toutes les informations de la transaction et de vérifier
si la transaction est bien validée.
*/

$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);

/*
ETAPE 3
On affecte les variables fournies par PayPal
*/
<in
// Désignation d'achat (ex : Achat de vidéos)
$designation = $_POST['item_name'];
// A utiliser de préférence pour définir un id ou autre qui représente le payeur (voir autre page fournit dans la source)
$compte = $_POST['item_number'];
// Statut du paiement
$statutpaiement = $_POST['payment_status'];
// Montant réglé (au format 10.00)
$montantpaiement = $_POST['mc_gross'];
// Devise de paiement (pour € on a EUR)
$devisepaiement = $_POST['mc_currency'];
// ID de transaction
$idtransaction = $_POST['txn_id'];
// Adresse email du receveur du paiement (qui doit être la votre !)
$receveurpaiement = $_POST['receiver_email'];
// Adresse email du payeur (pratique pour envoyer un email de confirmation du paiement)
$payeur = $_POST['payer_email'];

/*
ETAPE 4
Exécution de la requête en envoyant ce qui a été définit en étape 1 & 2
*/

if ($fp)
{
fputs ($fp, $header . $req);

while (!feof($fp))
{
$res = fgets ($fp, 1024);

	if (strcmp ($res, "VERIFIED") == 0)
	{	
		if($statutpaiement == "Completed")
		{
/*
DEBUT DE L'ETAPE 5
A partir de cet instant, on sait que le paiement a été accepté.
Reste à savoir si la devise de paiement est bonne, si le montant est bon, si vous êtes
bien le receveur du paiement, etc...
Notez qu'il est inutile de spécifier des messages d'erreur car cette page sera simplement
exécutée par un serveur en cache, personne ne verra donc cette page.
*/


		/* EXEMPLE DE CODAGE : */
		// Si la devise est l'euro et l'adresse email du receveur du paiement est bien celle de mon compte Paypal.
		if($devisepaiement == "EUR" && $receveurpaiement == "monemail@portannuaire.info")
		{
		
		// J'inclue la page avec les informations de connexion à la base de données
		include('../includes/infos_bdd.php');
		
		// Je me connecte à la base de données pour éxécuter quelques requêtes.
		connexion_bdd();
			
		// Je cherche des doublons de cette transaction
		$doublonidtrans = mysql_numrows(mysql_query("SELECT id_trans FROM `PAYPAL` WHERE id_trans='$idtransaction' LIMIT 1"));
			
		if($doublonidtrans == 0)
		{
		/*
		>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
		>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
		>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
		DANS CE CAS ON VALIDE FINALEMENT LA TRANSACTION...
		AVEC ENVOI D'EMAIL DE CONFIRMATION...
		INSERTION DANS BASE DE DONNEES... ETC...
		>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
		>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
		>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
		*/
		}
		
		mysql_close();
		}
			
/*
FIN DE L'ETAPE 5
A partir de cet instant, il ne faut plus rien modifier.
*/	
		}		
	}
}

fclose ($fp);
}
?>
