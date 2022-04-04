Plat
id
nom
prix

Commande
id
nom
prénom
téléphone
mail
carte bancaire
statut en préparation, prête, récupérée

Lien commande
id
commande id
plat id

Tables
id tion id

Réservation
id
nom
prénom
téléphone
mail
carte bancaire
statut réservé, libéré

Back office:
CRUD des tables
api/v1/table
api/v1/table/save
api/v1/table/update/:id
api/v1/table/delete/:id
CRUD des plats

    voir les commandes
    	back-office/commande
    changer le statut des commandes
    	back-office/commande/:id	changer le statut

    voir les réservations
    changer le statut des réservations (et automatiquement des tables)
