<?php  $this->title = 'Accueil'; ?>
<?php 
    
    /**
     * calcul de moyen selon la requête du client 
     */
     if($eleves){
        $nombre =count($eleves);
        $sum = 0;
        foreach($eleves as $eleve){
            
            $sum += $eleve->get_moyen();
        }
        $avg =0;
        if($sum != 0){
        
        $avg = $sum / $nombre;
        $avg = round($avg,3);
         }
        }
?>
<script>
         $(function(){
                $("#filtrer").validate({
                   rules:{ 
                    classe:{
                        required:true
                    }
                   }
                })
         })
    </script>
    <a id="c" href="index.php/eleveCreerFormulaire">créer un élève</a><span> </span>   
    <a id="d" href="index.php/afficherDevoirs">Devoirs</a><br><br>
<form method="POST" id="filtrer" action="index.php?action=accueil">
        </select>
            <select name="classe" > 
                <option value="" selected>choisir une classe </option>
                <?php 
                    for($i=0;$i<count($classes);$i++){
                ?>
                        <option value="<?=$classes[$i]->get_id()?>"><?=$classes[$i]->get_nom_classe()?> </option>
                <?php        
                    }
                ?> 
                        <option value="0"> Afficher tous </option>
            </select>
            <input type="submit" value="Filtrer"/>
    </form>
    <?php 
        if(count($eleves)!=0){
    ?>
    <table> 
        <tr>
            <th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Moyen</th><th>Appréciation</th><th>Classe</th><th></th>
        </tr>
    <?php
        for($i=0;$i<count($eleves);$i++){         
    ?>
        <tr>
            <td><?=$eleves[$i]->get_nom()?></td>
            <td><?=$eleves[$i]->get_prenom()?></td>
            <td><?=$eleves[$i]->get_date_naissance()->format("d/M/Y")?></td>
            <td><?php if($eleves[$i]->get_moyen()!=0){echo $eleves[$i]->get_moyen();} ?></td> 
            <td><?=$eleves[$i]->get_appreciation()?></td>
            <td><?php   for($j=0;$j<count($classes);$j++){
                if($eleves[$i]->get_id_classe()==$classes[$j]->get_id()){echo $classes[$j]->get_nom_classe(); }
            }?></td>
            <td><a href="index.php/eleveModifierFormulaire/<?=$eleves[$i]->get_id()?>">Modifier</a></td>
        </tr>   
    <?php     
        }            
        }     
    ?>
    </table>
    <div id="info">
    <br>
    <label> Nombre d'élèves : </label><span><?php  if($nombre!=0){echo $nombre;} ?></span><br>
    <label> Moyen    : </label><span><?php  if($avg!=0){echo $avg;}  ?></span><br>
    </div>
    <br>
    