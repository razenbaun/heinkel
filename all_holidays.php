<?php
header('Content-Type: text/plain; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$host = "dpg-d3v55qggjchc73f8u2t0-a.oregon-postgres.render.com";
$port = "5432";
$dbname = "laba_10_4k";
$username = "laba_10_4k_user";
$password = "xclOMUSTxosewX97OzR7cNs03kdb4vy1";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT date_gregorian, text FROM tab ORDER BY date_gregorian");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $row) {
        echo $row['date_gregorian'] . "|" . $row['text'] . "\n";
    }
    
} catch (PDOException $e) {
    echo "error:" . $e->getMessage();
}
?>