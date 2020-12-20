<?php  $this->title="Devoir Eleves";
if(count($devoirEleves)!=0){
    ?>
    <h2 id="ficheDevoir"><a href="index.php/afficherDevoirs">Fiche Devoir</a></h2>
    <table> 
            <tr>
                <th>Nom d'Eleve</th><th>Prénom d'Eleve</th><th>Titre Devoir</th><th>Description Devoir</th>
                <th>Date de création</th><th>Date d'echéance</th><th>Status</th><th>retour Eleve</th><th>Note</th>
            </tr>
        <?php
            for($i=0;$i<count($devoirEleves);$i++){         
        ?>
            <tr>
                
                <td><?=$devoirEleves[$i]['eleve_nom']?></td>
                <td><?=$devoirEleves[$i]['eleve_prenom']?></td>
                <td><?=$devoirEleves[$i]['titre']?></td>
                <td><?=$devoirEleves[$i]['description']?></td>
                <td><?php echo Date('d/M/Y',strtotime($devoirEleves[$i]['date_devoir']))?></td>
                <td><?php echo Date('d/M/Y',strtotime($devoirEleves[$i]['date_echeance']))?></td>
                <td><?=$devoirEleves[$i]['status']?></td>
                <td><?=$devoirEleves[$i]['travail_eleve']?></td>
                <td><?=$devoirEleves[$i]['note']?></td>
            </tr>   
        <?php     
            }            
            }     
        ?>
        </table>