<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Edit Vendor</title></head>
<body>
    <?php 
    // This matches the function name in models.php now
    $user = getVendorByID($pdo, $_GET['vendor_id']); 
    ?>
    <h1>Edit Vendor: <?php echo $user['first_name']; ?></h1>
    <form action="core/handleForms.php?vendor_id=<?php echo $_GET['vendor_id']; ?>" method="POST">
        <p>First Name: <input type="text" name="fName" value="<?php echo $user['first_name']; ?>"></p>
        <p>Last Name: <input type="text" name="lName" value="<?php echo $user['last_name']; ?>"></p>
        <p>Gender: <input type="text" name="gender" value="<?php echo $user['gender']; ?>"></p>
        <p>Specialization: <input type="text" name="spec" value="<?php echo $user['specialization']; ?>"></p>
        <p>Email: <input type="email" name="email" value="<?php echo $user['email']; ?>"></p>
        <p>Birth Date: <input type="date" name="bdate" value="<?php echo $user['birth_date']; ?>"></p>
        <input type="submit" name="editVendorBtn" value="Update Vendor">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>