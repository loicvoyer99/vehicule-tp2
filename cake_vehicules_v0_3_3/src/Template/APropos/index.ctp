<!DOCTYPE html>
<html>
    <head>
        <title><h1>APROPOS</h1></title>
    </head>
    <body>
        <h1>APROPOS</h1>
        <p><?php echo $this->Html->link('Retour au véhicules ', ['controller' => 'vehicules']); ?></p>
        <p>
            Loïc Voyer <br>
            Applications Internet (4205B7MO - Automne 2019) <br>
            Automne 2018, Collège Montmorency. <br> <br>

            <strong>BD avec hasMany (1-n) et belongsToMany (n-n): </strong><br>
            defectuosites_vehicules, <br>
            files_vehicules <br> <br>

            <strong>cake bake pour 5 tables + validations: </strong><br>
            vehicules, <br>
            defectuosites <br>
            files, <br>
            users, <br>
            i18n <br> <br>

            <strong>Actions en menu pour trois types d'utilisateurs:</strong> <br>
            Admin: peut modifier, ajouter, et supprimer les informations (defectuosites, vehicules, etc.) <br>
            Utilisateur: Ne peut pas ajouter, supprimer, les informations (defectuosites, vehicules,etc.)<br> 
            <br>


            <strong>Élément Menu avec infos sur l'utilisateur / terminer:</strong>
            FONCTIONNEL <br>
            Dans la barre de menu horizontal, appuyer sur login pour vous connecter. Pour vous deconnecter, appuyer sur logout (votre nom d'utilisateur)<br> <br>


            <strong>Traduction i18n en français et 3ième langue:</strong><br>
            francais, <br>
            anglais,
            espagnol (NON FONCTIONNEL) <br>
            Dans la barre de menu horizontal, appuyer sur la langue de votre choix<br> <br>


            <strong>Gestion multilingue du contenu de la BD</strong> <br>
            NON-FONCTIONNEL <br>
            Le contenu de la BD n'est pas traduite<br> <br>

            <strong>Téléversement et affichage d'images liées</strong> <br>
            Table files est fonctionnel. Cependant, la liaison avec la table files_vehicules est non fonctionnel. <br>
            La source du probleme (de la liaison) est inconnu; les liaisons belongstomany sont bien faite.
            Appuyer sur files/fichiers dans la liste à gauche. Ensuite, on peut ajouter, supprimer, modifier un fichier. En faisant view/voir on peut voir le fichier lié à un vehicule. <br>
            <br><br>


            <strong>Envoi d'un courriel de confirmation avec UUID</strong> <br>
            FONCTIONNEL <br>
            Il faut activer DAVMAIL <strong>AVANT </strong> d'enregistrer un nouvel utilisateur<br> <br>


            <strong>Utlisation de Migrations et de SQLite</strong> <br>
            FONCTIONNEL
            La BD se trouve dans app/sqlite/default.sqlite <br> <br> <br>






            <strong>
                Utilisateur: admin@admin.com <br>  
                Mot de passe : admin
            </strong> <br> <br>
            
            
            <img src="img/Capture.jpg" alt="VUE D'ENSEMBLE DE LA BASE DE DONNÉE"><br> <br>
            
            <p>Lien du <a href="http://www.databaseanswers.org/data_models/vehicle_maintenance/index.htm">diagramme</a> original</p>
            
            <br>
            
        </p>

        


        <p><?php echo $this->Html->link('Retour au véhicules ', ['controller' => 'vehicules']); ?><br> <br> <br>
        <br> <br> <br>
        <br> <br> <br></p>
        
        
        
        
        
        
        <br><br>
            
        <h1>TP2</h1><br>
    
        <p>
            <strong>Remise du travail complet fonctionnel dès l'extraction</strong> <br>
            FONCTIONNEL
            <br> 
            <br>
            
            
            <strong>BD SQLITE</strong> <br>
            FONCTIONNEL
            <br> 
            <br>
            
            
            <strong>Lecture suppression Ajax</strong> <br>
            bug
            <br> 
            <br>
            
            
            <strong>Ajout et modification en Ajax </strong> <br>
            ne fonctionne pas bug
            <br> 
            <br>
            
            
            <strong>Listes liées par Ajax </strong> <br>
            FONCTIONNEL
            <br> 
            <br>
            
            
            <strong>JQuery-ui Autocomplete </strong> <br>
            FONCTIONNEL
            <br> 
            <br>
            
            
            <strong>Pages "À propos" mise à jour </strong> <br>
            FONCTIONNEL
            <br> 
            <br>
            
            
            <strong>Interface avec préfixe de routage "Admin" </strong> <br>
            FONCTIONNEL
            <br> 
            <br>
            
            
            <strong>Interface adaptative Bootstrap </strong> <br>
            léger bug
            <br> 
            <br>
            
            
            <strong>affichage en document pdf </strong> <br>
            Non fonctionnel, mais l'essentiel est là. Juste un bug qui fait en sorte que le html to pdf ne fonctionne pas
            <br> 
            <br>
            
            
            <img src="img/Capture2.jpg" alt="VUE D'ENSEMBLE DE LA BASE DE DONNÉE"><br> <br>
        </p>
            


            <br><br><br><br><br><br><br><br>
    </body>
</html>

