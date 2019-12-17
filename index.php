<?php
/**
 * Index du projet GSB

 */
// ce que l'on a besoin en  preliminaire

require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';

// c'est comme une variable qui peut contenir pls variables, appeler une variables superglobale, et la on va la démarrer:

session_start();

// appel la methode getPdoGsb
$pdo = PdoGsb::getPdoGsb();

// voir fonction.inc.php dans la fonction estconnecte on demande si qq est connecte la reponse est faux car on 
// on retourne la reponse dans cettte variable 
$estConnecte = estConnecte();


//on est envoyer vers v_entete
require 'vues/v_entete.php';

// selon le uc on nous envoie vers une autre page voir le switch 
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'validerFrais':
    include 'controleurs/c_validerFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
}
require 'vues/v_pied.php';
