<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Businesses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Back to Vendors</a>
    <?php $vendor = getVendorByID($pdo, $_GET['vendor_id']); ?>
    <h1>Vendor: <?php echo $vendor['first_name'] . " " . $vendor['last_name']; ?></h1>

    <div style="border: 1px solid black; padding: 20px;">
        <h3>Add New Business</h3>
        <form action="core/handleForms.php?vendor_id=<?php echo $_GET['vendor_id']; ?>" method="POST">
            <p>Business Name: <input type="text" name="businessName" required></p>
            <p>Business Type: <input type="text" name="businessType" required></p>
            <input type="submit" name="insertBusinessBtn" value="Add Business">
        </form>
    </div>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <th>ID</th><th>Name</th><th>Type</th><th>Actions</th>
        </tr>
        <?php $businesses = getBusinessesByVendor($pdo, $_GET['vendor_id']); foreach ($businesses as $biz) { ?>
        <tr>
            <td><?php echo $biz['business_id']; ?></td>
            <td><?php echo $biz['business_name']; ?></td>
            <td><?php echo $biz['business_type']; ?></td>
            <td>
                <a href="editproject.php?business_id=<?php echo $biz['business_id']; ?>&vendor_id=<?php echo $_GET['vendor_id']; ?>">Edit</a> | 
                <a href="deleteproject.php?business_id=<?php echo $biz['business_id']; ?>&vendor_id=<?php echo $_GET['vendor_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>