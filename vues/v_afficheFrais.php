<?php
/**
 * Vue Accueil
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<div class="col-md-4">
     <form action="index.php?uc=validerFrais&action=modifFraisForfaits"
           method="post" role="form">
       
         <?php//liste déroulante des visiteurs?>
       
         <div class="form-group" style="display: inline-block">
             <label for="lstVisiteurs" accesskey="n">Choisir le visiteur : </label>
             <select id="lstVisiteurs" name="lstVisiteurs" class="form-control">
                 <?php
                 foreach ($lesVisiteurs as $unVisiteur) {
                     $id = $unVisiteur['id'];
                     $nom = $unVisiteur['nom'];
                     $prenom = $unVisiteur['prenom'];
                     if ($id == $visiteurASelectionner) {
                         ?>
                         <option selected value="<?php echo $id ?>">
                             <?php echo $nom . ' ' . $prenom ?> </option>
                         <?php
                     } else {
                         ?>
                         <option value="<?php echo $id ?>">
                             <?php echo $nom . ' ' . $prenom ?> </option>
                         <?php
                     }
                 }
                 ?>    

             </select>
         </div>
       
         <?php//liste déroulante des mois?>
       
         &nbsp;<div class="form-group" style="display: inline-block">
             <label for="lstMois" accesskey="n">Mois : </label>
             <select id="lstMois" name="lstMois" class="form-control">
                 <?php
                 foreach ($lesMois as $unMois) {
                     $mois = $unMois['mois'];
                     $numAnnee = $unMois['numAnnee'];
                     $numMois = $unMois['numMois'];
                     if ($mois == $moisASelectionner) {
                         ?>
                         <option selected value="<?php echo $mois ?>">
                             <?php echo $numMois . '/' . $numAnnee ?> </option>
                         <?php
                     } else {
                         ?>
                         <option value="<?php echo $mois ?>">
                             <?php echo $numMois . '/' . $numAnnee ?> </option>
                         <?php
                     }
                 }
                 ?>    

             </select>
         </div>      
</div> <br><br><br><br>
<?php//elements forfaitisés?>

<div class="row">    
 <h2 style="color:orange">&nbsp;Valider la fiche de frais</h2>
 <h3>&nbsp;&nbsp;Eléments forfaitisés</h3>
 <div class="col-md-4">
         <fieldset>      
             <?php
             foreach ($lesFraisForfait as $unFrais) {
                 $idFrais = $unFrais['idfrais'];
                 $libelle = htmlspecialchars($unFrais['libelle']);
                 $quantite = $unFrais['quantite']; ?>
                 <div class="form-group">
                     <label for="idFrais"><?php echo $libelle ?></label>
                     <input type="text" id="idFrais"
                             name="lesFrais[<?php echo $idFrais ?>]"
                            size="10" maxlength="5"
                            value="<?php echo $quantite ?>"
                            class="form-control">
                 </div>
                 <?php
             }
             ?>
         </fieldset>
         <button class="btn btn-success" type="edit">Corriger</button>
         <button class="btn btn-danger" type="reset">Reinitialiser</button>
         <br><br><br><br>
             
   </div> <br><br><br><br>
</form>

<form action="index.php?uc=validerFrais&action=modifFraisHorsForfait"
           method="post" role="form">
<?php//descrriptif des elements hors forfaits?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary-c">
            <div class="panel-heading-c">
                <h3 class="panel-title">
                  Descriptif des éléments hors forfait -
               </h3>
   </div>
       
   <table class="table table-bordered table-responsive">
       <tr>
           <th class="date">Date</th>
           <th class="libelle">Libellé</th>
           <th class='montant'>Montant</th>  
           <th class=""></th>
       </tr>
       <?php
       foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
           $id = $unFraisHorsForfait['id'];
           $date = $unFraisHorsForfait['date'];
           $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
           $montant = $unFraisHorsForfait['montant']; ?>
               
               <tr>
                   <input type="text" name="id" id="idLibelle" size="10" value="<?php echo $id ?>" class="form-control"/>
                   <td style="border-right:1px solid #ff6f02;"><input type="text" name="date" id="idDate" size="10" value="<?php echo $date ?>" class="form-control"/></td>
                  <td style="border-right:1px solid #ff6f02;"><input type="text" name="libelle" id="idLibelle" size="10" value="<?php echo $libelle ?>" class="form-control"/></td>
                  <td style="border-right:1px solid #ff6f02;"><input type="text" name="montant" id="idMontant" size="10" value="<?php echo $montant ?>" class="form-control"/></td>
                 
                  <td><button class="btn btn-success" type="edit">Corriger</button>
                      <button class="btn btn-danger" type="reset">Reinitialiser</button></td>
                </tr>
           <?php
       }
       ?>
       
   </table>
</div>
    </div>
       </div>
   
             <div><label for="justf">Nombre de justificatifs:</label>
             <input type="text" name="justf" id="justf" size="1" value="<?php echo $nbJustificatifs?>" />
             </div><br>
 
   <button class="btn btn-success" type="edit">Valider</button>
   <button class="btn btn-danger" type="edit">Réinitialiser</button>
   
       
 </div>
</form>
</div>

   
 