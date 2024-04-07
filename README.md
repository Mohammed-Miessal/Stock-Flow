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
