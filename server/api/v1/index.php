<?php
    require_once 'vendor/autoload.php';
    use Firebase\JWT\JWT;

    // ustawienie początkowego sekretnego klucza
    $secret_key = "my_secret_key";

    // funkcja, która co 3 godziny generuje nowy sekretny klucz i przypisuje go do zmiennej globalnej
    function generateSecretKey() {
        $key = openssl_random_pseudo_bytes(32);
        $key_hex = bin2hex($key);
        file_put_contents('secret.key', $key_hex);
    }

    function getSecretKey() {
        $key_file = 'secret.key';
        $key = file_get_contents($key_file);
        if ($key === false) {
            generateSecretKey();
            $key = file_get_contents($key_file);
        }
        return hex2bin($key);
    }

// generowanie nowego klucza co 3 godziny
if (!file_exists('secret.key') || time() - filemtime('secret.key') > 3 * 60 * 60) {
    generateSecretKey();
}

    $secret_key = getSecretKey();
    // dane, które będą zawarte w tokenie
    $data = array(
        "user_id" => 123,
        "user_email" => "johndoe@example.com"
    );

    // kodowanie tokenu z wykorzystaniem aktualnego sekretnego klucza
    $jwt = JWT::encode($data, $secret_key, 'HS256');
    echo $jwt;
?>