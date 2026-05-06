<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<body>
    <?php $biz = getBusinessByID($pdo, $_GET['business_id']); ?>
    <div style="border: 1px solid black; padding: 20px;">
        <h1>Delete Business: <?php echo $biz['business_name']; ?>?</h1>
        <form action="core/handleForms.php?business_id=<?php echo $_GET['business_id']; ?>&vendor_id=<?php echo $_GET['vendor_id']; ?>" method="POST">
            <input type="submit" name="deleteBusinessBtn" value="Confirm Delete">
            <a href="viewprojects.php?vendor_id=<?php echo $_GET['vendor_id']; ?>">Cancel</a>
        </form>
    </div>
</body>
</html>