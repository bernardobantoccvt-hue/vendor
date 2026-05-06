<?php
require_once 'dbConfig.php';
require_once 'models.php';

/* --- VENDOR HANDLERS --- */
if (isset($_POST['insertVendorBtn'])) {
    if (insertVendor($pdo, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['spec'], $_POST['email'], $_POST['bdate'])) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['editVendorBtn'])) {
    if (updateVendor($pdo, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['spec'], $_POST['email'], $_POST['bdate'], $_GET['vendor_id'])) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['deleteVendorBtn'])) {
    if (deleteVendor($pdo, $_GET['vendor_id'])) {
        header("Location: ../index.php");
        exit();
    }
}

/* --- BUSINESS HANDLERS --- */
if (isset($_POST['insertBusinessBtn'])) {
    if (insertBusiness($pdo, $_POST['businessName'], $_POST['businessType'], $_GET['vendor_id'])) {
        header("Location: ../viewprojects.php?vendor_id=" . $_GET['vendor_id']);
        exit();
    }
}

if (isset($_POST['editBusinessBtn'])) {
    if (updateBusiness($pdo, $_POST['businessName'], $_POST['businessType'], $_GET['business_id'])) {
        header("Location: ../viewprojects.php?vendor_id=" . $_GET['vendor_id']);
        exit();
    }
}

if (isset($_POST['deleteBusinessBtn'])) {
    if (deleteBusiness($pdo, $_GET['business_id'])) {
        header("Location: ../viewprojects.php?vendor_id=" . $_GET['vendor_id']);
        exit();
    }
}
?>