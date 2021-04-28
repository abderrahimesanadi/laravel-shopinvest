Stack technque
laravel 8
php7.4
Mysql 8
Bootstrap

Pour demarrer l'application il suffit de cloner le projet et d'executer la commande suivant à la racine du projet
# composer install

Apres il faut créer une base de donnée vide (dans mon cas je l'ai nommé shopinvest) et de faire la mise à jour eventuel des acces à la base de donné dans le fichier .env situé au racine du projet

Apres il suffit d'executer la commande suivante au racine du projet pour créer et remplir la base de donnée

#php artisan migrate:refresh --seed

Apres il suffit de demarer le projet via la commande suivante

# php artisan serve

apres il faut visiter l'url suivante pour créer un acces 
#http://localhost:8000/register

ou d'utiliser l'acces ci dessous  sur cette url  : #http://localhost:8000/login

email : test@test.com

MDP : 12345678

apres vous aller etre rediriger vers l'url suivante 

http://localhost:8000/admin/products

pour le front l'url est la suivante

# http://localhost:8000/product/2


Pour executer les tests il suffit de lancer la commande suivante :

# php artisan test

N.B : l'executer des tests vide la base de donnée, donc il faut prevoir de relancer la commande suivante pour remplir la base à nouveau
#php artisan migrate:refresh --seed


