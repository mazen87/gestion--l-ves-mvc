

  <?php $this->title = 'Créer Eleve'; ?>
   <script>
            $(function(){
                $("#creation").validate({
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
       
      <h2>Créer un élève</h2>   
   <form method="POST" id="creation" action="index.php/eleveCreer">
        <input type="text" name="nom" placeholder="nom d'élève...."    />
        <input type="text" name="prenom" placeholder="prénom d'élève...." />
        <input type="date"  name="date_naissance"/>
        <input type="number" step="any" name="moyen"  placeholder="moyen ....." />
        <select name="appreciation" > 
            <option value="" selected>choisir une appréciation </option>
            <?php 
                for($i=0;$i<count($appreciations);$i++){
            ?>
                    <option value="<?=$appreciations[$i]?>"><?=$appreciations[$i]?> </option>
            <?php        
                }
            ?> 
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
        </select>
        <input type="submit" name="submit" value="Créer"/>
    </form>
  
   