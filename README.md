# StockFlow - Gestion de Stock avec Style

Bienvenue dans StockFlow, votre solution élégante et efficace pour la gestion de stock. Avec StockFlow, dites adieu aux tracas de la gestion manuelle du stock et plongez dans un monde de facilité, de précision et de style.

## Problématique
La gestion manuelle du stock entraîne des inefficiences opérationnelles, des erreurs fréquentes et un manque de visibilité sur les niveaux de stock. Les processus actuels ne permettent pas une prise de décision rapide ni une traçabilité efficace des mouvements de stock. StockFlow est là pour résoudre ces problèmes et transformer la gestion de stock en une expérience agréable et productive.

## Solution
Avec StockFlow, nous proposons une solution informatisée complète pour la gestion de stock. Notre application automatisera les processus, fournira une visibilité en temps réel sur les niveaux de stock et améliorera la traçabilité des articles, des commandes et des fournisseurs. Grâce à StockFlow, vous pourrez gérer votre stock de manière efficace, proactive et sans tracas.

## Fonctionnalités Principales
- **Authentification Sécurisée:** StockFlow offre un système d'authentification sécurisé avec des fonctionnalités de sign-in et reset-password , assurant la confidentialité des données des utilisateurs et restreignant l'accès aux fonctionnalités en fonction des rôles.
- **Gestion des Utilisateurs et des Rôles:** Définissez des rôles tels que administrateur, responsable de stock ect ... , avec des autorisations spécifiques pour garantir un accès approprié aux fonctionnalités du système.
- **Gestion Complète des Articles:** Ajoutez, modifiez et supprimez des articles avec facilité, en gardant une vue d'ensemble claire sur votre inventaire.
- **Gestion des Fournisseurs:** Enregistrez les informations de vos fournisseurs et associez-les aux articles correspondants pour une gestion efficace des relations fournisseurs.
- **Passation et Suivi des Commandes:** Créez de nouvelles commandes en spécifiant les articles, les quantités et les dates de livraison prévues, et suivez leur progression jusqu'à la livraison.
- **Alertes et Suivi des Niveaux de Stock:** Recevez des alertes lorsque les niveaux de stock atteignent un seuil critique et consultez l'historique des mouvements de stock pour une traçabilité complète.

## Comment Commencer
1. **Installation de Laravel:** Assurez-vous d'avoir Laravel installé sur votre système. Si ce n'est pas le cas, suivez les instructions sur [laravel.com/docs](https://laravel.com/docs).
2. **Clonage du Projet:** Clonez ce dépôt sur votre machine locale en utilisant la commande `git clone`.
3. **Configuration de l'Environnement:** Configurez votre environnement en créant un fichier `.env` basé sur le fichier `.env.example`.
4. **Installation des Dépendances:** Exécutez `composer install` pour installer les dépendances PHP nécessaires.
5. **Migration de la Base de Données:** Exécutez `php artisan migrate` pour exécuter les migrations et créer les tables de base de données.
6. **Lancement du Serveur de Développement:** Lancez le serveur de développement avec la commande `php artisan serve` et accédez à l'application dans votre navigateur.

## Contribution
Nous accueillons favorablement toute contribution à StockFlow! Si vous souhaitez contribuer, veuillez consulter notre guide de contribution dans le fichier [CONTRIBUTING.md](CONTRIBUTING.md).

## Besoin d'Aide?
Si vous avez des questions ou des problèmes, n'hésitez pas à ouvrir une issue dans notre dépôt GitHub. Nous sommes là pour vous aider!

## Licence
Ce projet est sous licence MIT. Consultez le fichier [LICENSE](LICENSE) pour plus d'informations.







---

# Stock Management System

## Overview
This application is designed to streamline and automate the process of stock management. It replaces manual stock control methods with a sophisticated, user-friendly web platform. The system enhances operational efficiency, reduces errors, and provides real-time visibility into stock levels, ensuring effective decision-making and traceability of stock movements.

## Features

### 🛂 User Management and Authentication
- **Secure Authentication:** Sign-in and sign-up functionalities with data confidentiality and role-based access to features.
- **Role Management:** Custom roles like administrator, stock manager, and standard user with specific permissions.

### 📦 Item Management
- **Adding Items:** Allows stock managers to add new items with detailed information.
- **Item Modification and Deletion:** Ensures data accuracy and currency.

### 🤝 Supplier Management
- **Supplier Registration:** Records supplier details including name, address, and contact information.
- **Item-Supplier Association:** Links specific items to suppliers for efficient supplier relationship management.

### 📝 Order Management
- **Order Placement:** Enables the creation of new orders with details on required items, quantities, and expected delivery dates.
- **Order Tracking:** Tracks the progress of orders from confirmation to delivery.

### 📊 Stock Level Monitoring
- **Critical Level Alerts:** Notifies users when stock levels reach critical thresholds.
- **Stock Movement History:** Maintains and displays a record of stock entries and exits for full traceability.

## Technologies Used
- **Backend:** Laravel
- **Frontend:** HTML, CSS, JavaScript

## User Stories

### Authentication and User Management
- Non-authenticated users can register and login.
- Authenticated users have secure and confidential access to their information and can logout easily.
- Administrators manage user accounts, including adding and deleting users.

### Role Management
- Administrators define and modify user roles.
- Stock managers handle items, suppliers, orders, and stock levels, and generate stock performance reports.
- Standard users view current stock levels and place orders for necessary items.

## Getting Started

To set up the project locally, follow these steps:

1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Install dependencies for Laravel (backend) and node modules for frontend:
   ```
   composer install
   npm install
   ```
3. Configure your environment variables in `.env` file for Laravel.

4. Run the migrations and seed the database (if applicable):
   ```
   php artisan migrate
   php artisan db:seed
   ```
5. Start the Laravel server:
   ```
   php artisan serve
   ```
6. Open a new terminal and run the frontend:
   ```
   npm run dev
   ```

Navigate to `http://localhost:8000` in your web browser to see the application in action.

---

StockFlow - Simplifiez votre Gestion de Stock avec Style!
