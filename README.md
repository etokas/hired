##### Docker :

dans le .env
Ajoute

`HTTP_PORT_HOST=8181`

Lancer des containeurs

`docker-composer build`


`docker-composer up -d`


Dans le fichier hosts Ajouter :

```bash
sudo nano /etc/hosts
```
``
127.0.0.1 symfony.local
``
Enregistrer puis quitter

Commandes a lancer

``
docker-compose exec node yarn install
``

``
docker-compose exec node yarn watch
``


Depuis le navigateur :

[http://symfony.local/api](http://symfony.local/api)




###Have fun !!

> PS: assure toi que aucun autre pojet tourne sur le port 80 :)