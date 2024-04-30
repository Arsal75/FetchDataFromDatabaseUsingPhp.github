<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$database = "database_name"; // Replace with your database name

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement
    $sql = "SELECT * FROM your_table_name";
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch all rows as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output data
    foreach($result as $row) {
        echo "Name: " . $row['name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Message: " . $row['message'] . "<br><br>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
