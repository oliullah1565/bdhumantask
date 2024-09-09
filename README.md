Task Management System

This project is a Task Management System built using the Laravel framework. It allows users to create, read, update, and delete (CRUD) tasks, filter tasks by status, sort them by due date, and interact with the system through an API. User authentication is implemented to ensure that only registered users can manage tasks.

Features
User Authentication: Registration, login, and logout functionality using Laravel Breeze.

Task CRUD Operations:
Create: Users can add new tasks by providing a title, description, status, and due date.

Read: View a list of all tasks.

Update: Modify an existing task’s details.

Delete: Remove tasks from the system.

Task Filtering and Sorting:
Filter tasks by their status (Pending, In Progress, Completed).

Sort tasks by due date.
API: A RESTful API is provided for task management, allowing for external application interaction.




Installation
Clone the repository:
git clone https://github.com/oliullah1565/bdhumantask/.git
cd task-management-system

Install dependencies:
composer install
npm install

Set up environment:
Duplicate the .env.example file and rename it to .env.
Update the .env file with your database credentials.


Run migrations:
php artisan migrate

Serve the application:
php artisan serve

Compile frontend assets:
npm run dev



API Documentation
The system provides a REST API that allows external systems to interact with tasks. The following endpoints are available:
GET /api/tasks: Retrieve a list of all tasks.
POST /api/tasks: Create a new task.
GET /api/tasks/{id}: Retrieve details of a specific task.
PUT /api/tasks/{id}: Update a task.
DELETE /api/tasks/{id}: Delete a task.
