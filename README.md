<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1, h2 { color: #333; }
        h2 { margin-top: 20px; }
        ul { list-style-type: none; padding-left: 0; }
        li { margin-bottom: 10px; }
        code { background-color: #f4f4f4; padding: 2px 5px; }
    </style>
</head>
<body>
    <h1>Online Shop Project</h1>
    <h2>Overview</h2>
    <p>This project is an online shopping platform that allows users to browse products, place orders, and make payments. The system includes user management, product categorization, order processing, and payment handling. The database schema is designed to support these functionalities efficiently.</p>
    <h2>Database Schema</h2>
    <p>The database consists of the following tables:</p>
    <ul>
        <li><strong>users</strong>
            <ul>
                <li><code>id</code>: Unique identifier for each user.</li>
                <li><code>name</code>: User's name.</li>
                <li><code>email</code>: User's email address.</li>
                <li><code>password</code>: User's password (hashed for security).</li>
                <li><code>phone</code>: User's contact number.</li>
                <li><code>address</code>: User's address.</li>
                <li><code>role</code>: User's role (e.g., admin, customer).</li>
            </ul>
        </li>
        <li><strong>categories</strong>
            <ul>
                <li><code>id</code>: Unique identifier for each category.</li>
                <li><code>name</code>: Unique name of the category.</li>
            </ul>
        </li>
        <li><strong>products</strong>
            <ul>
                <li><code>id</code>: Unique identifier for each product.</li>
                <li><code>name</code>: Product name.</li>
                <li><code>description</code>: Product description.</li>
                <li><code>price</code>: Product price.</li>
                <li><code>stock</code>: Available stock quantity.</li>
                <li><code>image</code>: URL or path to the product image.</li>
                <li><code>category_name</code>: Name of the category the product belongs to.</li>
            </ul>
        </li>
        <li><strong>single_order</strong>
            <ul>
                <li><code>id</code>: Unique identifier for each order.</li>
                <li><code>user_id</code>: References the user who placed the order.</li>
                <li><code>product_id</code>: References the product ordered.</li>
                <li><code>total_amount</code>: Total cost of the order.</li>
            </ul>
        </li>
        <li><strong>payments</strong>
            <ul>
                <li><code>payment_id</code>: Unique identifier for each payment.</li>
                <li><code>order_id</code>: References the associated order.</li>
                <li><code>user_id</code>: References the user who made the payment.</li>
                <li><code>total_amount</code>: Amount paid.</li>
                <li><code>payment_method</code>: Method of payment (e.g., credit card, PayPal).</li>
            </ul>
        </li>
    </ul>
    <h2>Setup Instructions</h2>
    <ol>
        <li><strong>Database Setup</strong>:
            <ul>
                <li>Create a database (e.g., MySQL, PostgreSQL) for the project.</li>
                <li>Use the schema provided in <code>DB schema.txt</code> to create the necessary tables.</li>
                <li>Ensure foreign key relationships are properly defined (e.g., <code>user_id</code> in <code>single_order</code> and <code>payments</code> references <code>users.id</code>, <code>product_id</code> in <code>single_order</code> references <code>products.id</code>, and <code>order_id</code> in <code>payments</code> references <code>single_order.id</code>).</li>
            </ul>
        </li>
        <li><strong>Project Dependencies</strong>:
            <ul>
                <li>Install required dependencies (e.g., backend framework like Node.js/Express, Python/Django, or PHP/Laravel, and a database driver).</li>
                <li>Configure the database connection in your application.</li>
            </ul>
        </li>
        <li><strong>Running the Application</strong>:
            <pre>
git clone &lt;repository-url&gt;
cd online-shop-project
npm install  # or equivalent for your framework
npm start    # or equivalent
            </pre>
        </li>
    </ol>
    <h2>Usage</h2>
    <ul>
        <li><strong>Users</strong>: Register and log in to browse products, place orders, and make payments.</li>
        <li><strong>Admins</strong>: Manage products, categories, and view orders/payments via an admin dashboard (if implemented).</li>
        <li><strong>Products</strong>: Browse by category, view details, and add to cart.</li>
        <li><strong>Orders</strong>: Place orders for products, which are recorded in the <code>single_order</code> table.</li>
        <li><strong>Payments</strong>: Complete payments, which are recorded in the <code>payments</code> table.</li>
    </ul>
    <h2>Future Enhancements</h2>
    <ul>
        <li>Implement a shopping cart system for multiple products per order.</li>
        <li>Add product reviews and ratings.</li>
        <li>Integrate a search functionality for products.</li>
        <li>Enhance security with JWT or OAuth for user authentication.</li>
    </ul>
    <h2>Contributing</h2>
    <p>Contributions are welcome! Please follow these steps:</p>
    <ol>
        <li>Fork the repository.</li>
        <li>Create a new branch:
            <pre>git checkout -b feature-name</pre>
        </li>
        <li>Make your changes and commit:
            <pre>git commit -m "Add feature"</pre>
        </li>
        <li>Push to the branch:
            <pre>git push origin feature-name</pre>
        </li>
        <li>Submit a pull request.</li>
    </ol>
</body>
</html>
