<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$host = "dpg-d3v55qggjchc73f8u2t0-a.oregon-postgres.render.com";
$port = "5432";
$dbname = "laba_10_4k";
$username = "laba_10_4k_user";
$password = "xclOMUSTxosewX97OzR7cNs03kdb4vy1";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CLIENT_ENCODING TO 'UTF8'");
    
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных";
    exit();
}

$day = isset($_POST['day']) ? intval($_POST['day']) : (isset($_GET['day']) ? intval($_GET['day']) : 1);

try {
    if($day == 1) {
        $stmt = $pdo->prepare("SELECT text FROM tab WHERE date_gregorian = CURRENT_DATE");
    } else {
        $stmt = $pdo->prepare("SELECT text FROM tab WHERE date_gregorian = CURRENT_DATE + INTERVAL '1 day'");
    }
    
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($result && !empty($result['text'])) {
        echo $result['text'];
    } else {
        echo "Праздников не найдено";
    }
    
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса";
}

$pdo = null;
?>
