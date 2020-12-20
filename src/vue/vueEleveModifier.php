<?php $this->title = 'Modifier Eleve'; ?>
<script>
            $(function(){
                $("#modification").validate({
                        rules: {
                            nom: {
                                minlength: 2,
                                required : true
                            },
                            prenom:{
                                required : true,
                                minlength: 2,
                            },
                            date_naissance : {
                                required:true
                            },
                            moyen:{
                                number: true
                            },
                            appreciation:{
                            },
                            classe:{
                                required:true
                            },
                        }, 
                });
            });
        </script>
   
    <h2>Modifier un élève</h2>
    <form method="POST" id="modification" action="index.php/eleveModifier/<?= $_GET['id']?>">
        
        <input type="text" name="nom" placeholder="nom d'élève...."  value="<?=$eleve_recupere->get_nom()?>"   />
        <input type="text" name="prenom" placeholder="prénom d'élève...." value="<?=$eleve_recupere->get_prenom()?>" />
        <input type="date" name="date_naissance" value="<?php echo $eleve_recupere->get_date_naissance()->format("Y-m-d")?>"/>
        <input type="number" name="moyen" step="any"  placeholder="moyen ....." value="<?php  if($eleve_recupere->get_moyen()!=0){echo $eleve_recupere->get_moyen();}?>"/>
        <select name="appreciation" > 
        <option value="" selected>choisir une appréciation </option>
            <?php 
                for($i=0;$i<count($appreciations);$i++){
                    if($appreciations[$i]==$eleve_recupere->get_appreciation()){
            ?>
                    <option value="<?=$appreciations[$i]?>" selected><?=$appreciations[$i]?> </option>
            <?php        
                }else{
            ?>
                   <option value="<?=$appreciations[$i]?>" ><?=$appreciations[$i]?> </option> 
            <?php       
                }
            }
            ?> 
        </select>
        </select>
        <select name="classe" > 
  
            <?php 
                for($i=0;$i<count($classes);$i++){
            ?>
            <?php
                if($classes[$i]->get_id()==$eleve_recupere->get_id_classe()){
            ?>        
                    <option value="<?=$classes[$i]->get_id()?>" selected><?=$classes[$i]->get_nom_classe()?> </option>
                    <?php
                }
                else{
            ?>
                    <option value="<?=$classes[$i]->get_id()?>"><?=$classes[$i]->get_nom_classe()?> </option>
            <?php        
                }
            ?>
            <?php        
                }
            ?> 
        </select>
        <input type="submit" name="submit" value="Modifier"/>
    </form>
 
 