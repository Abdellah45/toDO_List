- To-Do List Web Application

## Overview

The To-Do List Web Application is a lightweight, PHP-driven task management tool built with HTML, CSS, and PHP. It allows users to create, edit, and delete tasks, which are persistently stored in a CSV file. Designed as a daily project to enhance PHP skills, this application emphasizes form handling, session management, file I/O, and input validation. The user interface is clean, responsive, and intuitive, featuring a single "Add Task" button, visual checkboxes for task completion, and a three-dot menu for task-specific actions (edit/delete).

This project serves as a practical exercise for learning core web development concepts, including server-side scripting, data persistence, and secure input processing. It aligns with a structured study plan focusing on PHP, data structures, and databases, making it an ideal portfolio piece for beginners.

## Features

- **Task Management**: Add, edit, and delete tasks with a simple, user-friendly interface.
- **Persistent Storage**: Tasks are stored in a `data.csv` file, acting as a basic database.
- **Input Validation**: Ensures task names contain only alphanumeric characters, spaces, commas, periods, hyphens, and apostrophes, preventing invalid or malicious input.
- **Responsive UI**: Built with HTML and CSS, the interface adapts to desktop and mobile devices, featuring a modern design with shadows, rounded corners, and hover effects.
- **Session-Based Editing**: Uses PHP sessions to pre-fill the edit form with existing task data.
- **Visual Feedback**: Displays success messages (e.g., "Task added successfully") in green and error messages (e.g., invalid input) in red.
- **Task Actions**: Each task includes a visual checkbox (non-functional, for display) and a three-dot menu with "Edit" and "Delete" options, styled in blue and red, respectively.

## Technologies Used

- **PHP**: Handles form processing, session management, file operations, and dynamic HTML generation.
- **HTML/CSS**: Creates a responsive, visually appealing front-end with flexbox and media queries.
- **CSV**: Serves as a simple file-based database for task storage.

## Project Structure

```
├── add_pross.php      # Processes add/edit form submissions
├── add_task.php       # Form for adding/editing tasks
├── data.csv           # Stores tasks (e.g., "Task", "Study data structures")
├── delete.php         # Handles task deletion
├── edit.php           # Prepares task for editing
├── index.php          # Main page displaying tasks
└── README.md          # Project documentation
```

## Setup Instructions

1. **Prerequisites**:

   - A web server with PHP (e.g., XAMPP, WAMP, or PHP's built-in server).
   - A browser (Chrome, Firefox, etc.).

2. **Installation**:

   - Clone or download this repository:

     ```bash
     git clone <repository-url>
     ```
   - Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
   - Ensure `data.csv` is writable by the server (e.g., `chmod 666 data.csv` on Linux).

3. **Running the App**:

   - Start your web server.
   - If using PHP's built-in server, navigate to the project folder and run:

     ```bash
     php -S localhost:8000
     ```
   - Open `http://localhost:8000/index.php` in your browser.

4. **Usage**:

   - Click "Add Task" to create a new task.
   - Enter a task name (e.g., "Learn PHP basics") and submit.
   - Use the three-dot menu next to each task to edit or delete it.
   - Invalid inputs (e.g., `<script>`) will show an error message.

## Learning Objectives

This project was developed as part of a structured study plan to master PHP, data structures, and databases:

- **PHP**: Practiced form handling (`add_task.php`, `add_pross.php`), session management (`edit.php`), and file I/O (`delete.php`, `index.php`).
- **Data Structures**: The CSV file represents a linear list, with traversal logic in `index.php` and `delete.php`.
- **Databases**: Used a CSV file as a simple database, preparing for future MySQL integration.
- **Input Security**: Implemented regex-based validation to restrict task names to safe characters, reducing XSS and CSV injection risks.

## Future Improvements

- **Checkbox Persistence**: Add functionality to save checkbox states in `data.csv`.
- **MySQL Integration**: Replace CSV with a relational database for better scalability.
- **CSRF Protection**: Add tokens to forms to prevent cross-site request forgery.
- **Client-Side Validation**: Use JavaScript or HTML5 patterns for instant input feedback.
- **Task Sorting/Filtering**: Implement features to organize tasks by name or status.

## Contributing

This is a learning project, but feedback and suggestions are welcome! Feel free to open an issue or submit a pull request with improvements.

## License

This project is open-source and available under the MIT License.

## Acknowledgments

Built as a daily PHP project to reinforce web development skills. Inspired by practical exercises in PHP form handling and file-based data storage.