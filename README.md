Voici les étapes que j'ai réalisé pour créer le projet. Vous pourrez néanmoins avoir besoin de connaître certaines informations ci-dessous pour tester le projet Fiche-star. Vous trouverez d'autres informations techniques sur les pages codées indiquées.


- création nouveau repository sur github
	Nom : FicheStar , 
	mode public 
	add readme 

- INSTALLER NODEJS

- INSTALLER wamp
	ajouter addon php 8.0.1 si la version n'est pas installée

- INSTALLATION Composer   (version 1 à 2 : maj 2.0.8) :  
	
- Lancer invite commande

- créer nouveau projet Laravel 8.21.0 :
	executer : "composer create-project --prefer-dist laravel/laravel VOTRE_CHEMIN/FicheStar " 

- paramétrer l'IDE dans le fichier .env
	APP_NAME=FicheStar
	DB_DATABASE=fiche-star

- lancer wampserver
	connexion à phpmyadmin : http://localhost/phpmyadmin/
	utilisateur:  root
	mot de passe:

- Création de la base de données "fiche-star"
	voir le fichier "BDD-SQL" pour la récupérer en copiant le code 

- vérifier l'installation Laravel
	création d'un virtual host : " fiche-star "
	emplacement : VOTRE_CHEMIN/fichestar/public

- création du sous-domaine " mob " pour les versions mobiles :
	Réglages de Windows 10 :
		- Ouvrir le fichier "C:\Windows\System32\drivers\etc\hosts" en mode administrateur
		- Ajouter le code suivant :
----------------------------------------------------------------------------------

		127.0.0.1	fiche-star
		::1	fiche-star

		127.0.0.1	mob.fiche-star
		::1	mob.fiche-star
		
----------------------------------------------------------------------------------
	Réglages Apache dans Wamp : 
		- Décommenter la ligne "Include conf/extra/httpd-vhosts.conf" dans le fichier httpd.conf
		- Vérifier le fichier httpd-vhosts.conf et ajoutez le code suivant si vous ne l'avez pas. La portion avec le serveur mob.fiche-star devrait néanmoins suffire.
----------------------------------------------------------------------------------

		<VirtualHost *:80>
			ServerName fiche-star
			DocumentRoot "d:/projets/fichestar/public"
			<Directory  "d:/projets/fichestar/public/">
				Options +Indexes +Includes +FollowSymLinks +MultiViews
				AllowOverride All
				Require local
			</Directory>
		</VirtualHost>

		<VirtualHost *:80>
			ServerName mob.fiche-star
			ServerAlias mob.fiche-star
			DocumentRoot "d:/projets/fichestar/mobile"
			<Directory  "d:/projets/fichestar/mobile/">
				Options +Indexes +Includes +FollowSymLinks +MultiViews
				AllowOverride All
				Require local
			</Directory>
		</VirtualHost>
		
-------------------------------------------------------------------

- affichage site FRONT: " http://fiche-star/ "
- affichage site BACK: " http://fiche-star/back/home "


- créer les migrations
	invite commande : cd /d D:/projets/fichestar
	php artisan make:migration create_identites_table
	php artisan make:migration create_photos_table
	modif des 2 fichiers ci-dessus
	excuter : " php artisan migrate "

- créer les models en excutant :
	php artisan make:model Identite
	php artisan make:model Photo

- créer les controllers en executant :
	php artisan make:IdentiteController

- on ouvre git (clic droit sur le dossier, puis choisir git bash), puis entrer :
	composer require laravel/ui
	php artisan ui vue --auth
	git init
	git remote add FS https://github.com/GatienFlahaut/FicheStar.git
	git add .
	git commit -m "Installation de base : Laravel/Migrations/Models/Controllers"
	git push FS master

- ouvrir terminal dans VScode puis entrer (installation de dépendances) :
	npm install 
	npm run dev

- création de 3 fichiers css dans "public/css"
    mobile.css (uniquement pour les mobiles en front office)
	desktop.css (uniquement pour les PC/tablettes en front office)
	back.css (uniquement  pour le back office)

- création des controleurs (avec artisan)
	IdentiteController
	
- modification des controleurs
	Homecontroller
	LoginController

- création des modèles (avec artisan)
    Photo  
    Identite

- création d'un dossier "mobile" à la racine, avec son htaccess (pour mobile) et index.

- utilisation du dossier "public/storage/image" pour stocker les images.

- modification du "public/htaccess" pour détecter l'équipement utilisateur et renvoyer un sous domaine le cas échéant.

- modification du fichier "ressources/lang/en/validation.php" afin de remplacer quelques messages en français.

- création du dossier ressources/views/back contenant :
	un dossier MODAL qui contient le code pour ajouter, modifier ou effacer une fiche.
	le fichier HOME qui contient la liste des fiches existantes.
	
- création et modification du dossier ressources/views/layouts contenant :
	le fichier "visiteur" pour le front office desktop
	le fichier "visiteur-mobile" pour le front office mobile
	le fichier "app" pour le back office
	
- création du dossier ressources/views/mobile contenant :
	le fichier "star.blade.php" de la page Front office version mobile.
	
- création du fichier "ressources/views/star.blade.php" contenant la version Desktop de la page Front office.

- création des routes dans "routes.web.php" (voir le fichier pour la liste)

