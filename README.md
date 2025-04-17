# 🍺 Brasserie Terroir & Saveurs

Projet de gestion d'une brasserie artisanale en PHP/MySQL.  
Ce dépôt contient le code source du site, l'architecture des pages, ainsi que la structure de la base de données utilisée.

## 🔗 Liens Utiles

- 🌐 Site : http://evan-epsi.rf.gd/  
- 📌 Trello : [Lien vers le Trello](https://trello.com/invite/b/67b482c7e2d7bd00ed8d61ba/ATTI356f235c4f3a28d8b89fcd92086fe6874A074E68/brasserie)  
- 💾 GitHub : https://github.com/evandeveer/brasserie

## 🔗 Technologies utilisées

- Langages : PHP, JavaScript, HTML, CSS (Template W3Schools)
- Base de données : MySQL (gestion via PhpMyAdmin)
- Hébergement : InfinityFree.com
- Transfert de fichiers : FileZilla
- Éditeur de code : VisualStudioCode
- Versioning : Github

  
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

# 📦 **Fonctionnalités de l'application**

---

## 📨 **Contact**

L'utilisateur remplit le formulaire de contact. Une fois soumis, les données sont enregistrées en base de données.

<img src="https://github.com/user-attachments/assets/6b10ec47-3b53-43ef-8a98-80b889121000" alt="Formulaire Contact"/>
<img src="https://github.com/user-attachments/assets/b430a63d-eaf3-48c5-810e-569c5067490b" alt="Enregistrement Contact" width="400"/>

---

## 🔐 **Connexion**

L'utilisateur remplit le formulaire de connexion. Le mot de passe est hashé et comparé avec la base de données.  
Si les identifiants sont valides, l'ID utilisateur est stocké dans la session.

<img src="https://github.com/user-attachments/assets/67e756e2-4994-4c7e-a80f-9d3f618205ae" alt="Formulaire Connexion"/>
<img src="https://github.com/user-attachments/assets/0fe2a821-5cc4-458b-9860-4305cde83d8c" alt="Hashage Mot de Passe"/>
<img src="https://github.com/user-attachments/assets/08b3e02e-4e8a-47d6-b00a-e9fb36e9a3c9" alt="Vérification Session" width="500"/>

---

## 🍺 **Brasserie**

L'utilisateur remplit un formulaire, un calcul est ensuite effectué et les résultats sont affichés.

<img src="https://github.com/user-attachments/assets/49c2a146-6a10-41c8-8827-3e923c2ba097" alt="Calcul Brassage" width="600"/>
<img src="https://github.com/user-attachments/assets/5237355e-3dc0-450a-8b5a-a88742a04d74" alt="Résultats Brassage" width="500"/>

### 📦 **Gestion des matières premières**

Le brasseur peut ajouter, modifier ou supprimer les stocks.

<img src="https://github.com/user-attachments/assets/c3b7a3dd-65d0-4a4d-9ac8-1b6b6699aa17" alt="Stocks MP" width="600"/>
<img src="https://github.com/user-attachments/assets/53cbfb59-a5ef-4ee5-aa12-e05c0b6d0d23" alt="Gestion MP" width="500"/>

### 🛒 **Gestion des produits finis**

Le brasseur peut également gérer les produits finis prêts à la vente.

<img src="https://github.com/user-attachments/assets/87a8c611-8293-4265-9b4b-e14450b91de3" alt="Produits Finis" width="600"/>
<img src="https://github.com/user-attachments/assets/bad84a5b-be7e-41c0-b827-95b69b3396c8" alt="Gestion Produits" width="500"/>

---

## ⚙️ **Admin**

L'administrateur peut ajouter un utilisateur. Le mot de passe par défaut est `1234` (hashé en MD5).

<img src="https://github.com/user-attachments/assets/11af3073-f3ff-4009-8fe2-bfb0589b2b39" alt="Ajout Utilisateur" width="800"/>
<img src="https://github.com/user-attachments/assets/5c7278ee-8070-4697-9f96-3b818529e373" alt="Utilisateur Créé" width="800"/>

Il peut également modifier ou supprimer les utilisateurs.

<img src="https://github.com/user-attachments/assets/0d5bfd2c-612b-4960-bd37-2464b248259f" alt="Modification Utilisateur" width="800"/>
<img src="https://github.com/user-attachments/assets/f31cc96c-e57b-4fb3-bf4f-d7c90bb9fb4c" alt="Suppression Utilisateur" width="800"/>

---

## 📊 **Direction**

La direction peut consulter les achats de matières premières et les ventes de produits, avec filtres par date.

<img src="https://github.com/user-attachments/assets/2e875e72-d99b-4f7d-855c-3b47b4e02b01" alt="Achats et Ventes"/>
<img src="https://github.com/user-attachments/assets/6a92e475-c306-473f-b41e-09d6bef2d75f" alt="Filtrage Date" width="600"/>

Un calcul des dépenses et bénéfices est également disponible.

<img src="https://github.com/user-attachments/assets/ddbda3c8-1fa5-405f-b9f2-aa27c464c033" alt="Calcul Dépenses"/>
<img src="https://github.com/user-attachments/assets/17e5ea00-18e7-4438-a320-98e3b4c79624" alt="Bilan Financier" width="400"/>

---

## 👤 **Client**

Le client peut consulter ses points de fidélité.

<img src="https://github.com/user-attachments/assets/eafe207f-bf11-415d-bd68-a7be0cf878a8" alt="Fidélité Client" width="600"/>
<img src="https://github.com/user-attachments/assets/0c5c59ad-d7db-4328-9113-c8fca16aca09" alt="Points Fidélité" width="600"/>

Voir les produits disponible.

<img src="https://github.com/user-attachments/assets/3bcd3841-6ef6-423f-89dc-aff3fb583540" alt="Fidélité Client" width="600"/>
<img src="https://github.com/user-attachments/assets/2fe0374b-356d-4da3-b8a9-561cb6e56d93" alt="Points Fidélité" width="600"/>

Passer une reservation.

<img src="https://github.com/user-attachments/assets/75527b61-78cc-4deb-99f6-bb9c8713eb0a" alt="Fidélité Client" width="600"/>
<img src="https://github.com/user-attachments/assets/2388b7ea-3480-4490-bcfd-bab3bd1eb030" alt="Points Fidélité" width="600"/>



---

## 💵 **Caissier**

Le caissier peut ajouter un utilisateur

<img src="https://github.com/user-attachments/assets/e1b8589e-1a8a-427e-806f-20db715141ea" alt="Ajout Utilisateur" width="600"/>
<img src="https://github.com/user-attachments/assets/5727a807-47d0-4654-af02-f1cde9f36fd2" alt="Réservations" width="600"/>


Le caissier peut confirmer une commande

<img src="https://github.com/user-attachments/assets/1e23055d-12c7-4a5c-85ac-cd7bd67026f4" alt="Ajout Utilisateur" width="600"/>
<img src="https://github.com/user-attachments/assets/25d9b6a4-68e7-4367-9085-89cb3372b921" alt="Réservations" width="600"/>

Et voir les réservations clients.

<img src="https://github.com/user-attachments/assets/9dddd6af-bbd4-4436-b7d6-35a955c65024" alt="Ajout Utilisateur" width="600"/>
<img src="https://github.com/user-attachments/assets/7018a50b-a18a-457f-adf9-246b3d25d8c8" alt="Réservations" width="600"/>

---

## **Systeme de session**

Un visiteur du site ne peut pas acceder à une page s'il n'a pas le role (par exemple en tapant "/admin.php")
grace à la verification de l'id role de la session sur chaque page.
exemple admin : 

<img src="https://github.com/user-attachments/assets/6627643b-da35-45c5-8080-14bbff6e0981" alt="Ajout Utilisateur" width="600"/>

Une fois connecté le role a accès à un bouton special en fonction de son role qui le redirige vers la page de son role.

<img src="https://github.com/user-attachments/assets/82cb6378-a7b0-4d20-b3bb-7f7ae4b935bf" alt="Ajout Utilisateur" width="600"/>
<img src="https://github.com/user-attachments/assets/55e597e9-fb20-4a80-8c3a-89c4f4b3cff5" alt="Ajout Utilisateur" width="600"/>

---

## **Systeme de Logs**

Une fonction WriteLogs a été créée dans une classe Logs ce qui permet d'appeler la fonction dans n'importe quelle page.
Un affichage des logs et aussi present dans la page admin.

<img src="https://github.com/user-attachments/assets/58c88fa9-16c0-4b78-9576-6aa15122b86c" alt="Ajout Utilisateur" width="600"/>
<img src="https://github.com/user-attachments/assets/9e0a18bb-f598-494d-a9ab-e3a29756a6d6" alt="Ajout Utilisateur" width="600"/>


# 🔎 **Sources**

Documentation sessions : https://www.php.net/manual/fr/reserved.variables.session.php  
Documentation fichier txt : https://www.conseil-webmaster.com/formation/php/10-manipuler-fichier-php.php  
Template CSS : https://www.w3schools.com/w3css/tryw3css_templates_cafe.htm  
Les bases PHP et html : Cours Thibault Vinchent EPSI https://www.je-code.com/  
IA : https://chat.deepseek.com/ ou https://chatgpt.com/














