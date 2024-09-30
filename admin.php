<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Admin Panel - Store Data</h2>
    <table>
        <tr>
            <th>Course</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        <?php
        // Database credentials
        $servername = "localhost"; // Change this to your database server
        $username = "root"; // Change this to your database username
        $password = ""; // Change this to your database password
        $dbname = "university"; // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the store table
        $sql = "SELECT course, name, start_date, end_date FROM store";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["end_date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
