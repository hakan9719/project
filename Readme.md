###### Plat

- id
- nom
- prix

###### Commande

- id
- nom
- prénom
- téléphone
- mail
- carte bancaire
- statut:
  - 0 en préparation
  - 1 prête
  - 2 récupérée
- Lien commande
- id
- commande id
- plat id

###### Tables

- id
- taille
- reservation id

###### Réservation

- id
- nom
- prénom
- téléphone
- mail
- carte bancaire
- statut
  - 0: réservée
  - 1: liberée

##### Back office:

CRUD des tables
CRUD des plats
voir les commandes
changer le statut des commandes
voir les réservations
changer le statut des réservations (et automatiquement des tables)
