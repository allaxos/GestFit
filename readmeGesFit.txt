-> Ouvrir votre IDE 
-> aller sur le site git copier le lien du projet
-> Ouvrir le terminal dans votre IDE
-> dans le terminal se positionner dans le répértoire attendu 
-> Tapez la commande : git clone lienduProjet
-> télécharger composer
-> aller dans le terminal faire la commande : composer install
-> aller dans le fichier composer.json et modifier la ligne "laravel/framewor": "5.8.*",
-> faite un composer update   
-> copier le ficher env.example et renommer le nouveau fichier env.example 
-> dans ce fichier modifier:

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=gestfitapplication@gmail.com
MAIL_PASSWORD=GestFit123
MAIL_ENCRYPTION=tls

-> faire la commande : php artisan key:generate pour générer une nouvelle clée pour l'application 

-> faire la commande :php artisan make:migration

-> faire la commande :php artisan serve 