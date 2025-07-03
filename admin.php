<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Payments Management</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Card Number</th>
            <th>Expiry Month</th>
            <th>Expiry Year</th>
            <th>CVV</th>
        </tr>
        <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "sneakerstore";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query payments table
    $sql = "SELECT name, phone, address, card_number, expiry_month, expiry_year, cvv FROM payment";
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    // Counter for serial numbers
    $serialNumber = 1;

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$serialNumber."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["address"]."</td>";
            echo "<td>".$row["card_number"]."</td>";
            echo "<td>".$row["expiry_month"]."</td>";
            echo "<td>".$row["expiry_year"]."</td>";
            echo "<td>".$row["cvv"]."</td>";
            echo "</tr>";
            $serialNumber++; // Increment serial number for next row
        }
    } else {
        echo "<tr><td colspan='8'>No payments found</td></tr>";
    }
    $conn->close();
?>

    </table>
</body>
</html>
<style>
body {
    background: linear-gradient(135deg, #f9d423 0%, #ff4e50 100%);
    font-family: 'Segoe UI', Arial, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    position: relative;
}
h2 {
    text-align: center;
    color: #ffcb05;
    text-shadow: 2px 2px 0 #3b4cca, 4px 4px 8px #222;
    font-size: 2.5em;
    margin-top: 30px;
    letter-spacing: 2px;
}
table {
    margin: 40px auto;
    border-collapse: collapse;
    width: 90%;
    background: rgba(255,255,255,0.95);
    border-radius: 16px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    overflow: hidden;
}
th, td {
    padding: 16px 12px;
    text-align: center;
    border-bottom: 2px solid #ffcb05;
}
th {
    background: #3b4cca;
    color: #ffcb05;
    font-size: 1.1em;
    letter-spacing: 1px;
}
tr:nth-child(even) {
    background: #e0e7ff;
}
tr:hover {
    background: #ffde7d;
    transition: background 0.3s;
}
td {
    color: #222;
    font-weight: 500;
}
.pokeball {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 80px;
    height: 80px;
    z-index: 100;
}
.pikachu {
    position: fixed;
    top: 30px;
    left: 30px;
    width: 100px;
    z-index: 100;
}
</style>
<!-- Pokeball SVG Decoration -->
<svg class="pokeball" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="48" fill="#fff" stroke="#222" stroke-width="4"/>
  <path d="M2,50 a48,48 0 0,1 96,0" fill="#ee4036" stroke="#222" stroke-width="4"/>
  <circle cx="50" cy="50" r="18" fill="#fff" stroke="#222" stroke-width="4"/>
  <circle cx="50" cy="50" r="8" fill="#222"/>
</svg>
<!-- Pikachu SVG Decoration -->
<svg class="pikachu" viewBox="0 0 200 200">
    <!-- Ears -->
    <g>
        <ellipse cx="50" cy="35" rx="15" ry="45" fill="#ffcb05" stroke="#222" stroke-width="4" transform="rotate(-15 50 35)"/>
        <ellipse cx="150" cy="35" rx="15" ry="45" fill="#ffcb05" stroke="#222" stroke-width="4" transform="rotate(15 150 35)"/>
        <ellipse cx="50" cy="20" rx="8" ry="18" fill="#222" transform="rotate(-15 50 20)"/>
        <ellipse cx="150" cy="20" rx="8" ry="18" fill="#222" transform="rotate(15 150 20)"/>
    </g>
    <!-- Head -->
    <ellipse cx="100" cy="90" rx="65" ry="70" fill="#ffcb05" stroke="#222" stroke-width="4"/>
    <!-- Cheeks -->
    <ellipse cx="55" cy="120" rx="13" ry="8" fill="#ff5959" opacity="0.85"/>
    <ellipse cx="145" cy="120" rx="13" ry="8" fill="#ff5959" opacity="0.85"/>
    <!-- Eyes -->
    <ellipse cx="75" cy="95" rx="10" ry="14" fill="#222"/>
    <ellipse cx="125" cy="95" rx="10" ry="14" fill="#222"/>
    <ellipse cx="78" cy="92" rx="3" ry="4" fill="#fff"/>
    <ellipse cx="128" cy="92" rx="3" ry="4" fill="#fff"/>
    <!-- Nose -->
    <ellipse cx="100" cy="110" rx="4" ry="3" fill="#222"/>
    <!-- Mouth -->
    <path d="M90 125 Q100 135 110 125" stroke="#e17000" stroke-width="4" fill="none" stroke-linecap="round"/>
    <!-- Smile dimples -->
    <ellipse cx="90" cy="127" rx="2" ry="1" fill="#e17000"/>
    <ellipse cx="110" cy="127" rx="2" ry="1" fill="#e17000"/>
    <!-- Body (subtle, behind head) -->
    <ellipse cx="100" cy="170" rx="35" ry="18" fill="#ffcb05" stroke="#222" stroke-width="2" opacity="0.7"/>
</svg>