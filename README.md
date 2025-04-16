# SLAM

# 🍺 Brasserie Terroir & Saveurs

Projet de gestion d'une brasserie artisanale en PHP/MySQL.  
Ce dépôt contient le code source du site, l'architecture des pages, ainsi que la structure de la base de données utilisée.

## 🔗 Liens Utiles

- 🌐 Site : http://evan-epsi.rf.gd/  
- 📌 Trello : [Lien vers le Trello](https://trello.com/invite/b/67b482c7e2d7bd00ed8d61ba/ATTI356f235c4f3a28d8b89fcd92086fe6874A074E68/brasserie)  
- 💾 GitHub : https://github.com/evandeveer/brasserie  

## 🔐 Accès de test

| Rôle       | Email                    | Mot de passe |
|------------|--------------------------|--------------|
| Admin      | admin@gmail.com          | 1234         |
| Brasseur   | brasseur@gmail.com       | 1234         |
| Direction  | direction@gmail.com      | 1234         |
| Caissier   | caissier@gmail.com          | 1234            |
| Client     | jean@gmail.com          | 1234         |

---

## 🧱 Base de Données

### `contacts`

| Champ      | Type         | Description             |
|------------|--------------|-------------------------|
| id         | int          | Identifiant unique      |
| nom        | varchar(25)  | Nom                     |
| prenom     | varchar(25)  | Prénom                  |
| email      | varchar(50)  | Email                   |
| telephone  | varchar(20)  | Téléphone               |
| date       | datetime     | Date de contact         |
| message    | varchar(500) | Message envoyé          |

---

### `matieres_premieres`

| Champ    | Type           | Description                   |
|----------|----------------|-------------------------------|
| id       | int UNSIGNED   | Identifiant unique            |
| nom      | varchar(25)    | Nom de la matière première    |
| quantite | decimal(10,2)  | Quantité disponible           |
| date_achat | datetime  | Date d'achat du stock           |

---

### `produits`

| Champ      | Type          | Description                   |
|------------|---------------|-------------------------------|
| id         | int           | Identifiant produit           |
| nom        | varchar(25)   | Nom du produit                |
| description| varchar(500)  | Description                   |
| prix       | float         | Prix                          |
| quantite   | int           | Quantité en stock             |
| image      | varchar(200)  | Chemin de l'image             |

---

### `reservations`

| Champ       | Type                          | Description                         |
|-------------|-------------------------------|-------------------------------------|
| id          | int                           | ID de réservation                   |
| id_client   | int                           | ID du client                        |
| id_produit  | int                           | ID du produit                       |
| quantite    | int                           | Quantité réservée                   |
| date_resa   | datetime                      | Date de réservation                 |
| statut_resa | enum('en attente','validée','refusée','') | Statut de la réservation   |
| prix_resa   | int(5)                        | Prix total                          |

---

### `roles`

| Champ | Type         | Description     |
|-------|--------------|-----------------|
| id    | int          | ID du rôle      |
| role  | varchar(50)  | Nom du rôle     |

---

### `utilisateurs`

| Champ     | Type         | Description                |
|-----------|--------------|----------------------------|
| id        | int          | ID utilisateur             |
| nom       | varchar(50)  | Nom                        |
| prenom    | varchar(50)  | Prénom                     |
| email     | varchar(50)  | Email                      |
| telephone | varchar(50)  | Numéro de téléphone        |
| mdp       | varchar(50)  | Mot de passe (hash)        |
| id_role   | int(1)       | Rôle associé               |
| fidelite  | int(7)       | Points de fidélité         |


## 🔗 Relations Clés Étrangères   

- **`utilisateurs.id_role`** → `roles.id`  


- **`reservations.id_client`** → `utilisateurs.id`  


- **`reservations.id_produit`** → `produits.id`

### `Structure du site :`


├── admin.php  
├── brasseur.php  
├── caissier.php  
├── client.php  
├── connexion.php  
├── connexion_redirection.php  
├── contact_redirection.php  
├── deconnexion.php  
├── direction.php  
├── index.php  
└── Logs.php  
