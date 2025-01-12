# Backend Developer Test Task (Laravel)

## Overview

This task is designed for the position of a Back-End Developer with Laravel knowledge. The goal is to create an admin
panel for managing administrators with specific functionality for login, admin management, and avatar handling. The
project must be hosted on a server for review.

### Hosting

You are required to host the project on your server for evaluation. If you are unable to do so, we will provide a test
server.

**Important**: No pre-built admin panels are allowed.

---

## Task Requirements

### 1. **Admin Panel - Authorization**

Create the admin part of the website with an authentication system.

- **Login fields**:
    - **Email**: Must be in the correct format.
    - **Password**: Must have a minimum length (define the minimum length, e.g., 6 characters).

  Validation must be implemented for both fields.

### 2. **Admin Panel - Administrators**

Develop a section called **"Administrators"** in the admin panel.

#### **Section Structure**:

- **General Overview**:
    - Display a list of all admins in a table.
    - Columns: **Email**, **Name**, **Status** (active or inactive).
    - **Actions**:
        - Add new admin.
        - Edit an existing admin.
        - Delete an admin.

- **Filters**:
    - Filter by **active/inactive** status.
    - Search by **email** or **name**.

#### **Creating a New Admin**:

Create a page with the following fields for adding a new admin:

- **Name**:
    - Validation: Must not be empty and contain at least 4 characters.

- **Email**:
    - Validation: Must be in a valid email format and the email must not already exist in the database.

- **Password**:
    - Validation: Must not be empty and contain at least 4 characters.

- **Status**:
    - A dropdown with the options: **Active** or **Inactive**.

All fields must be mandatory for submission.

#### **Editing an Admin**:

Create a page with editable fields for modifying an existing admin:

- **Name**: Same validation as creating a new admin.
- **Email**: Same validation as creating a new admin but check that the new email doesn’t already exist.
- **Password**: Same validation as creating a new admin.
- **Status**: A dropdown to select **Active** or **Inactive**.

All fields are mandatory for editing.

#### **No Role System**:

- There is no role-based system. Every user created will have admin rights.
- All users must be able to log into the admin panel with their credentials.

### 3. **Admin Panel - Admins and Avatar**

#### **Avatar Handling**:

- Add an **Avatar** field when creating or editing an admin.
- The Avatar should be uploaded using a file manager (not a basic input field).
- Users should upload the image to the server first, then choose the image from the list of uploaded files.

---

## Installation and Setup
To check project remotely use address:

```brainlab.warcraft-auction.online```

To run the project locally, follow these steps:

1. **Navigate to the project directory**:
   ```bash
   cd <your_directory>
   ```
2. **Clone the repository in project**:
   ```bash
   git clone https://github.com/n1ghtwolf/brainlab
   ```

3. **Install dependencies**:
   ```bash
   composer install
   ```

4. **Set up the environment**:
   Copy `.env.example` to `.env` and adjust the settings:
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Set up the database**:
   Make sure your database credentials are set in `.env`.

7. **Run the migrations**:
   ```bash
   php artisan migrate
   ```
   
8. **Run the seeders** :
   ```bash
   php artisan db:seed
   ```

9. **Start the development server**:
   ```bash
   php artisan serve
   ```

10. Open the application in your browser at `http://localhost:8000`.

---

## Conclusion

The task includes creating a fully functional admin panel with an authentication system, admin management features, and
avatar handling. All fields must be validated, and the application must be easy to use for both creating and editing
admin users. Make sure to host the application so it can be reviewed as part of your submission.
