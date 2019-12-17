<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * author AVIVA esther Ben chimol
 */
$mois= getMois(date('d/m/Y'));
$moisPrecedent= getMoisPrecedent($mois);
$pdo->clotureFiche($moisPrecedent);
$action = filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING);
switch ($action){
   case 'selectionnerVetM':
       $lesVisiteurs= $pdo ->getLesVisiteurs();
       $lesCles1= array_keys($lesVisiteurs);
       $leVisiteurASelectionner=$lesCles1[0];
       $lesMois = getListeMois($mois);
       $lesCles2= array_keys($lesMois);
       $moisASelectionner=$lesCles2[0];
       include 'vues/v_listeVisiteur.php';
       break;
   case'afficheFrais':
        $idVisiteurs = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
        $lesVisiteurs=$pdo->getLesVisiteurs();
        $leVisiteurASelectionner=$idVisiteurs;
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $lesMois = $pdo->getListeMois($mois);
        $moisASelectionner = $leMois;
        
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        include 'vues/v_afficheFrais.php';
       

        
       
       break;
}

