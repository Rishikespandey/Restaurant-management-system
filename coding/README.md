# Hungry Street - Food Ordering System

This is a PHP-based web application for food ordering, built with HTML, CSS, JavaScript, and MySQL.

## Prerequisites

- XAMPP (includes Apache, MySQL, PHP)
- Web browser

## Installation and Setup

1. **Install XAMPP**: Download and install XAMPP from https://www.apachefriends.org/ if not already installed.

2. **Place the Project**: The project is located in `c:\xampp\htdocs\coding\`. If moved, ensure it's in the htdocs folder.

3. **Start XAMPP**:
   - Open XAMPP Control Panel.
   - Start the Apache module.
   - Start the MySQL module.

4. **Database Setup**:
   - Open phpMyAdmin at http://localhost/phpmyadmin/
   - Create a new database named `kitchen jungle` (note the space).
   - Import the `kitchen_jungle.sql` file: Select the database, go to Import tab, choose the file `c:\xampp\htdocs\coding\kitchen_jungle.sql`, and import.
   - Alternatively, via command line (ensure MySQL is running and the database exists):
     - `mysql -u root -p -D "kitchen jungle" < c:\xampp\htdocs\coding\kitchen_jungle.sql`
     - If your root password is empty, press Enter when prompted.
   - The application may create tables automatically on first use, but importing the SQL ensures all data is present.

## Running the Application

1. Ensure Apache and MySQL are running in XAMPP Control Panel.

2. Open your web browser.

3. Navigate to: `http://localhost/coding/`

4. You can start by visiting the home page or login page.

5. Admin dashboard is available at `http://localhost/coding/admin/login.php`
   - Use phone `1234567890` and password `Admin@123`
   - Admin credentials are stored in the `admin_users` table in the `kitchen jungle` database.
   - To change admin phone, email or password:
     - Log in to the admin dashboard.
     - Use the "Admin Account" form to update the phone number, email, and/or set a new password.
     - Submit the form to save the changes.
   - To add another admin account manually via phpMyAdmin:
     1. Open phpMyAdmin and select the `kitchen jungle` database.
     2. Open the `admin_users` table.
     3. Click "Insert".
     4. Enter `name`, `phone`, `email` (optional), and a hashed `password` value.
        - You can generate a password hash using PHP: `echo password_hash('NewPassword123', PASSWORD_DEFAULT);`
     5. Save the new row.
   - To add another admin account using SQL, run:
     ```sql
     INSERT INTO admin_users (`name`, `phone`, `email`, `password`)
     VALUES ('New Admin', '1234567890', 'newadmin@example.com', '<hashed_password>');
     ```

## Features

- User registration and login
- Browse menu categories (Pizza, Chinese, Vegetarian, Non-Vegetarian, Cheese, Desserts)
- Add items to cart
- Place orders
- Payment processing
- Order history
- Profile management
- Contact us
- Admin dashboard for users, menu items, and order management

## File Structure

- `home/`: Home page and navigation
- `login/`: User authentication
- `menu/`: Menu browsing and cart
- `order/`: Order details and history
- `payment/`: Payment processing
- `profile/`: User profile management
- `contact_us/`: Contact form
- `book table/`: Table booking
- `about us/`: About page

## Technologies Used

- Frontend: HTML, CSS, JavaScript, Bootstrap
- Backend: PHP
- Database: MySQL

## Notes

- Default database credentials: localhost, root, no password, database: "kitchen jungle"
- Ensure PHP sessions are enabled.
- For email functionality (forgot password), ensure mail server is configured in PHP.

## Troubleshooting

- If database connection fails, check MySQL is running and database exists.
- Ensure no port conflicts (default Apache port 80, MySQL 3306).
- Check PHP error logs in XAMPP for issues.