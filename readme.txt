- To setup you need to install laravel first.
- The database connection need to be established in .env file with this value
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=need_food
DB_USERNAME=root
DB_PASSWORD= 

- You can either run the "php artisan migrate --seed" in terminal to create tables
- Or you can import the database need_food.sql in your SQL system

After that,

--admin user has 
username or email: "admin@gmail.com"
password: "password"

-- Note: If you import this database, these user of organization and normal user will be available

-- Organization user has
email: "need.org@gmail.com"
password: "Password/123"

-- Normal user
email: "aayushstha56@gmail.com"
Password: "Password/123"

-- If you cannot login then you can either register new user or create via admin.

URL: 

-- For homepage of website: localhost:8000/
-- For admin dashboard: localhost:8000/admin/dashboard

Note: only the admin and the organization user can visit to the dashboard in this current system
the role and permissions for the user can be managed by visiting the role page in the admin dashboard.
Admin can change the roles and permissions.