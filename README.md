# Fetch-Data-From-Database-Using-Php.github

This PHP script retrieves data from a MySQL database and displays it on a webpage. It establishes a connection to the database using PDO (PHP Data Objects) and fetches all rows from a specified table. The script begins by defining database connection parameters such as server name, username, password, and database name.

```php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$database = "database_name"; // Replace with your database name
```

A PDO instance is created to establish a connection to the database with error handling to ensure graceful error reporting. The script prepares an SQL statement to select all rows from the specified table and executes the prepared statement. It fetches all rows as an associative array and outputs the data on the webpage.

```php
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
```

Finally, the database connection is closed.

```php
// Close connection
$conn = null;
```

This script serves as an example of how to retrieve data from a MySQL database using PHP and display it on a webpage.
