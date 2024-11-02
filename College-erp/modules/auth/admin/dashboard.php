

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 0;
    }
    .dashboard-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        text-align: center;
    }
    .dashboard-container h1 {
        font-size: 24px;
        color: #333;
    }
    .dashboard-container p {
        color: #555;
        font-size: 16px;
    }
    .dashboard-container ul {
        list-style-type: none;
        padding: 0;
    }
    .dashboard-container li {
        display: inline-block; /* Arrange items horizontally */
        margin: 10px; /* Add spacing between buttons */
    }
    .dashboard-container a {
        text-decoration: none;
        color: #3498db;
        font-size: 18px;
        font-weight: bold;
        border: 2px solid #3498db;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
        display: inline-block;
    }
    .dashboard-container a:hover {
        background-color: #3498db;
        color: #ffffff;
    }
</style>

<div class="dashboard-container">
<h1>Admin Dashboard</h1>
<ul>
    <li><a href="manage_users.php">Manage Users</a></li>
    <li><a href="manage_courses.php">Manage Courses</a></li>
</ul>
</div>