<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vendor Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Register Vendor</h1>
    <form action="core/handleForms.php" method="POST">
        <p>First Name: <input type="text" name="fName" required></p>
        <p>Last Name: <input type="text" name="lName" required></p>
        <p>Gender: <input type="text" name="gender" required></p>
        <p>Specialization: <input type="text" name="spec" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Birth Date: <input type="date" name="bdate" required></p>
        <input type="submit" name="insertVendorBtn" value="Register Vendor">
    </form>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <th>Name</th><th>Gender</th><th>Specialization</th><th>Actions</th>
        </tr>
        <?php $vendors = getAllVendors($pdo); foreach ($vendors as $row) { ?>
        <tr>
            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
            <td>
                <a href="viewprojects.php?vendor_id=<?php echo $row['vendor_id']; ?>">View Businesses</a> | 
                <a href="editwebdev.php?vendor_id=<?php echo $row['vendor_id']; ?>">Edit</a> | 
                <a href="deletewebdev.php?vendor_id=<?php echo $row['vendor_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>