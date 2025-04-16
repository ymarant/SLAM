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

## Direction :
L'utilisateur peut voir les commandes passés donc celles qui ont été validées par le caissier avec toutes les informations nécéssaires, avec les matières premières achetés et le bénéfice total.
<div>
  <div style="display: inline-block;">
    <img src="https://github.com/user-attachments/assets/ff705df1-ebbb-46ce-892f-505741e90739" alt="Description de l'image"/>
    <img src="https://github.com/user-attachments/assets/7f59376f-1425-4dbe-90cb-14c12ebfcd84" alt="Description de l'image" width="400/>
    </div>
</div>

## Caissier :
Le caissier peut ajouter un utilisateur, peut confirmer une commande et voir les réservation des clients en attente.
  <div style="display: inline-block;">
    <img src="https://github.com/user-attachments/assets/9881eb4e-d4ac-4a23-a3e4-0fe8e8bac6d3" alt="Description de l'image" width="600/>
    <img src="https://github.com/user-attachments/assets/6dfadde7-a4a0-4ad7-a675-fdbe7a5807e4" alt="Description de l'image" width="600/>
    <img src="https://github.com/user-attachments/assets/318e4f44-b6e3-4b54-8662-dcc9abdc83cd" alt="Description de l'image" width="600/>
  </div>
</div>

## Client : 
Le client peut réserver un produit, accéder à la liste des produits et suivre ses commandes.
  <div style="display: inline-block;">
    <img src="https://github.com/user-attachments/assets/0bf4f6b2-14a6-46ab-8c22-b4342ab0c56b" alt="Description de l'image" width="800/>
    <img src="https://github.com/user-attachments/assets/f52b718a-c305-417f-bb38-f054d091d756" alt="Description de l'image" width="800/>
    <img src="https://github.com/user-attachments/assets/b48114be-597c-4ca1-8ee3-c46642f2ca21" alt="Description de l'image" width="800/>
    <img src="https://github.com/user-attachments/assets/db109025-3ed3-4177-8b81-76851c2dd917" alt="Description de l'image" width="800/>
    <img src="https://github.com/user-attachments/assets/79d67f87-5833-477a-93d0-d31ec30265f8" alt="Description de l'image" width="800/>
  </div>
</div>


  



