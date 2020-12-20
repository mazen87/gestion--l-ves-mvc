<?php 
    $this->title="Devoirs";
    if(count($devoirs)!=0){
?>
<h2>Liste des Devoirs</h2>
<table> 
        <tr>
            <th>Titre</th><th>Description</th><th>Date de création</th><th>Date d'echéance</th><th>Status</th>
        </tr>
    <?php
        for($i=0;$i<count($devoirs);$i++){         
    ?>
        <tr>
            <td><a href="index.php/afficherDevoirEleves/<?=$devoirs[$i]->get_id()?>"><?=$devoirs[$i]->get_titre()?></a></td>
            <td><?=$devoirs[$i]->get_description()?></td>
            <td><?=$devoirs[$i]->get_date_devoir()->format("d/M/Y")?></td>
            <td><?=$devoirs[$i]->get_dateEcheance()->format("d/M/Y")?></td> 
            <td><?=$devoirs[$i]->get_status()?></td> 
        </tr>   
    <?php     
        }            
        }     
    ?>
    </table>