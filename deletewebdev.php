<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<body>
    <?php $user = getVendorByID($pdo, $_GET['vendor_id']); ?>
    <div style="border: 1px solid black; padding: 20px;">
        <h1>Delete Vendor: <?php echo $user['first_name']; ?>?</h1>
        <form action="core/handleForms.php?vendor_id=<?php echo $_GET['vendor_id']; ?>" method="POST">
            <input type="submit" name="deleteVendorBtn" value="Confirm Delete">
            <a href="index.php">Cancel</a>
        </form>
    </div>
</body>
</html>