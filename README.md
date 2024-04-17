# UserManagementSystem-CI4
Basic user management system with CRUD

Before running the program please run the following code in the project root using terminal

php spark db:create ums-ci4
php spark migrate
php spark db:seed UserSeeder

These 3 lines of codes will help to create the database and tables and seed the database with a default user with credentials as follows:

Username: admin
Password: 123
