Online Shop Project

Overview

This project is an online shopping platform that allows users to browse products, place orders, and make payments. The system includes user management, product categorization, order processing, and payment handling. The database schema is designed to support these functionalities efficiently.

Database Schema

The database consists of the following tables:





users: Stores user information.





id: Unique identifier for each user.



name: User's name.



email: User's email address.



password: User's password (hashed for security).



phone: User's contact number.



address: User's address.



role: User's role (e.g., admin, customer).



categories: Stores product categories.





id: Unique identifier for each category.



name: Unique name of the category.



products: Stores product details.





id: Unique identifier for each product.



name: Product name.



description: Product description.



price: Product price.



stock: Available stock quantity.



image: URL or path to the product image.



category_name: Name of the category the product belongs to.



single_order: Stores individual order details.





id: Unique identifier for each order.



user_id: References the user who placed the order.



product_id: References the product ordered.



total_amount: Total cost of the order.



payments: Stores payment details for orders.





payment_id: Unique identifier for each payment.



order_id: References the associated order.



user_id: References the user who made the payment.



total_amount: Amount paid.



payment_method: Method of payment (e.g., credit card, PayPal).

Setup Instructions





Database Setup:





Create a database (e.g., MySQL, PostgreSQL) for the project.



Use the schema provided in DB schema.txt to create the necessary tables.



Ensure foreign key relationships are properly defined (e.g., user_id in single_order and payments references users.id, product_id in single_order references products.id, and order_id in payments references single_order.id).



Project Dependencies:





Install required dependencies (e.g., backend framework like Node.js/Express, Python/Django, or PHP/Laravel, and a database driver).



Configure the database connection in your application.



Running the Application:





Clone the repository: git clone <repository-url>.



Navigate to the project directory: cd online-shop-project.



Install dependencies: npm install (or equivalent for your framework).



Start the application: npm start (or equivalent).

Usage





Users: Register and log in to browse products, place orders, and make payments.



Admins: Manage products, categories, and view orders/payments via an admin dashboard (if implemented).



Products: Browse by category, view details, and add to cart.



Orders: Place orders for products, which are recorded in the single_order table.



Payments: Complete payments, which are recorded in the payments table.

Future Enhancements





Implement a shopping cart system for multiple products per order.



Add product reviews and ratings.



Integrate a search functionality for products.



Enhance security with JWT or OAuth for user authentication.

Contributing

Contributions are welcome! Please follow these steps:





Fork the repository.



Create a new branch: git checkout -b feature-name.



Make your changes and commit: git commit -m "Add feature".



Push to the branch: git push origin feature-name.



Submit a pull request.
