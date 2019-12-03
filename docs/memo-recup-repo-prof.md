### Récupérer le code du prof

`cd /var/www/html/` 

`git clone git@github.com:O-clock-Y/s05-projet-oshop-gsylvestre.git`

`cd s05-projet-oshop-gsylvestre`

### Récupérer les dépendances composer avec 

recrée le dossier vendor ! 

`composer install`

Si problème mentionné avec composer.lock : 
- supprimer le fichier !
- faire un `composer update`

### Recréer le fichier app/config.ini !
- Créer le nouveau fichier dans app/
- S'inspirer du contenu de config.ini.dist pour savoir quoi mettre dedans.


### le site devrait marcher maintenant ! 

### Changer l'URL du dépôt distant auquel il est associé

Sinon, on va push dans le dépôt du prof et ça va pas passer ! 

Je veux push vers mon repo à moi sur Github, donc...

`git remote set-url origin git@url-de-mon-depot`

Pour tester si ça a marché : 

`git remote -v`

Et maintenant, ça devrait pusher vers votre repo à vous : 

`git push -u origin master`



