<?php 
require_once 'dbConfig.php';

/* --- VENDOR FUNCTIONS --- */
function getAllVendors($pdo) {
    $sql = "SELECT * FROM vendors ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getVendorByID($pdo, $vendor_id) {
    $sql = "SELECT * FROM vendors WHERE vendor_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$vendor_id]);
    return $stmt->fetch();
}

function insertVendor($pdo, $fName, $lName, $gender, $spec, $email, $bdate) {
    $sql = "INSERT INTO vendors (first_name, last_name, gender, specialization, email, birth_date) VALUES (?,?,?,?,?,?)";
    return $pdo->prepare($sql)->execute([$fName, $lName, $gender, $spec, $email, $bdate]);
}

function updateVendor($pdo, $fName, $lName, $gender, $spec, $email, $bdate, $vendor_id) {
    $sql = "UPDATE vendors SET first_name=?, last_name=?, gender=?, specialization=?, email=?, birth_date=? WHERE vendor_id=?";
    return $pdo->prepare($sql)->execute([$fName, $lName, $gender, $spec, $email, $bdate, $vendor_id]);
}

function deleteVendor($pdo, $vendor_id) {
    return $pdo->prepare("DELETE FROM vendors WHERE vendor_id = ?")->execute([$vendor_id]);
}

/* --- BUSINESS FUNCTIONS --- */
function getBusinessesByVendor($pdo, $vendor_id) {
    $sql = "SELECT * FROM businesses WHERE vendor_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$vendor_id]);
    return $stmt->fetchAll();
}

function getBusinessByID($pdo, $business_id) {
    $sql = "SELECT * FROM businesses WHERE business_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$business_id]);
    return $stmt->fetch();
}

function insertBusiness($pdo, $name, $type, $vendor_id) {
    $sql = "INSERT INTO businesses (business_name, business_type, vendor_id) VALUES (?,?,?)";
    return $pdo->prepare($sql)->execute([$name, $type, $vendor_id]);
}

function updateBusiness($pdo, $name, $type, $business_id) {
    $sql = "UPDATE businesses SET business_name = ?, business_type = ? WHERE business_id = ?";
    return $pdo->prepare($sql)->execute([$name, $type, $business_id]);
}

function deleteBusiness($pdo, $business_id) {
    return $pdo->prepare("DELETE FROM businesses WHERE business_id = ?")->execute([$business_id]);
}
?>