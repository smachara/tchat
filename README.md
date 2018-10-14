# Description:
Cette application a été développée en PHP, HTML, CSS et MySQL pour tester mes compétences techniques dans le développement d'applications Web.

Cette application a été développée selon le modèle de développement MVC sans utilisation de framework.
## Les points développés sont les suivants:
 -  Architecture basée sur le modèle objet MVC
 -  Une page d'authentification
 -  Création automatique de comptes (S'inscrir)
 -  Liste des messages archivés
 -  Possibilité de dialoguer avec les autres membres
 -  Un minimum de sécurité (chaque utilisateur ne peut voir que ses messages et s'il n'est pas connecté, il est renvoyé à la page de connexion)
 -  Un affichage ‘temps réel’
## Les exigences
- PHP 5.6.30 ou supérieur
- Apache
- MySQL
## Installation
**Étape 1**  Copiez le contenu du dossier tchat dans le dossier public de votre serveur Apache (www / html).
ou configurez apache (httpd.conf) pour lire la source depuis un autre emplacement: Exemple

    #####################################################
    ##     TCHAT
    #####################################################
    Listen 8077
    <VirtualHost 127.0.0.1:8077>
    	<Directory "D:\tchat">
    		AllowOverride All
    		Require all granted
    	</Directory>
    	DocumentRoot "D:\tchat"
    </VirtualHost>

**Étape 2** Importez la base de données (db/chatdb.sql).

**Étape 3** Configurez l'application. modifier les valeurs de connexion à la base de données dans config/param.ini

**Étape 4** Profitez de T'Chat.


## Structure du code:

    |-- tchat
    |   |-- db		le fichier de la base de données
    |   |-- config		contient le ou les fichiers de configuration
    |   |-- controleur	contient tous les contrôleurs
    |   |-- librairies  	vendor
    |   |-- modele  	contient toutes les vues
    |   |-- outils  	code générique et réutilisable
    |   |-- template    	styles et images
    |   |-- vue  		contient toutes les vues
    |   |-- index.php   	la racine du site
    |   |-- .htaccess   	configurer le serveur Web pour transformer l'URL
    |   `-- README.md	ce fichier
    |

## Git Repository
	git clone https://github.com/smachara/tchat.git