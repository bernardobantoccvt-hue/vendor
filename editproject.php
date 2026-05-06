<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Edit Business</title></head>
<body>
    <?php 
    // This matches the function name in models.php now
    $biz = getBusinessByID($pdo, $_GET['business_id']); 
    ?>
    <h1>Edit Business</h1>
    <form action="core/handleForms.php?business_id=<?php echo $_GET['business_id']; ?>&vendor_id=<?php echo $_GET['vendor_id']; ?>" method="POST">
        <p>Business Name: <input type="text" name="businessName" value="<?php echo $biz['business_name']; ?>"></p>
        <p>Business Type: <input type="text" name="businessType" value="<?php echo $biz['business_type']; ?>"></p>
        <input type="submit" name="editBusinessBtn" value="Update Business">
        <a href="viewprojects.php?vendor_id=<?php echo $_GET['vendor_id']; ?>">Cancel</a>
    </form>
</body>
</html>