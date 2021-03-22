<?php

function process_data()
{
    if(isset($_POST['submit']))
    {

        $input_data = $_POST['input'];
        if($input_data !=null)
        {
             
                    // Store a string into the variable  to be  Encrypted 
    $data_process = "$input_data\n"; 
    
    //creating shuffle string 
    $strings ="qwertyuiopasdfghjklzxcvbnm";
    $string_shuffle = str_shuffle($strings);

    // Display the original data 
    echo "<b>Original Data: </b>" . $data_process; 
    
    // Store the cipher method here 
    $ciphering = "AES-128-CTR"; 
    
    // Use OpenSSl Encryption method 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    
    // Initialization  for encryption 
    
    $encryption_iv = '1234567891011121'; 
    
    // Store the encryption key 
    $encryption_key = $string_shuffle; 
    
    // Use openssl_encrypt() function to encrypt the data 
    $encryption_data = openssl_encrypt($data_process, $ciphering, 
                $encryption_key, $options, $encryption_iv); 
    
    // Display the encrypted string 
    echo "<b>Encrypted Data:</b> " . $encryption_data  . "\n"; 
    
    // Initialization  for decryption 
    $decryption_iv = '1234567891011121'; 
    
    // Store the decryption key 

    $decryption_key = $string_shuffle; 
    
    // Use openssl_decrypt() function to decrypt the data 
    $decryption=openssl_decrypt ($encryption_data, $ciphering, 
            $decryption_key, $options, $decryption_iv); 
    
    // Display the decrypted data 
    echo "<b>Decrypted Data:</b> " . $decryption; 
        }
        else
        {
            echo "<font color='red'><h5>Please Enter Input Value</h5></font> ";
        }

    
    }
}


?>