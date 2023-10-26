<?php
// return encryption methods
// print_r(openssl_get_cipher_methods());

$secret_data = "This is secret message";
echo "Plain text: $secret_data <br><br>";

$cipher_algorithm = "aes-128-cbc";
$key = "This is my key";
$option = 0;
$initial_vector = "DenisShingala..."; // should be 16 digits

$encrypt_msg = openssl_encrypt($secret_data, $cipher_algorithm, $key, $option, $initial_vector);
echo "Encrypt message: $encrypt_msg <br>";

$decrypt_msg = openssl_decrypt($encrypt_msg, $cipher_algorithm, $key, $option, $initial_vector);
echo "Decrypt message: $decrypt_msg <br>";
