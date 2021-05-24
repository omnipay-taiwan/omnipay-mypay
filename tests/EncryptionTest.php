<?php

namespace Omnipay\MyPay\Test;

use Omnipay\MyPay\Encryption;
use PHPUnit\Framework\TestCase;

class EncryptionTest extends TestCase
{
    public function testEncryptByPhpseclib()
    {
        //經銷商商店金鑰【從用戶端發動時，以驗證碼代替金鑰】
        $key = 'Xd668CSjnXQLD26Hia8vapkOgGXAv68s';
        //商品資料
        $payment = [
            'store_uid' => '398800730001', //特店id
            'item' => 1,
            'i_0_id' => '0886449',
            'i_0_name' => '商品名稱',
            'i_0_cost' => '10',
            'i_0_amount' => '1',
            'i_0_total' => '10',
            'cost' => 10,
            'user_id' => 'phper',
            'order_id' => '1234567890',
            'ip' => '127.0.0.1', // 此為消費者IP，會做為驗證用
            'pfn' => 'all',
        ];
        $encryption = new Encryption($key);
        $encrypt = $encryption->encrypt($payment);

        self::assertEquals($payment, decrypt($encrypt, $key));
    }

    public function testDecryptByPhpseclib()
    {
        //經銷商商店金鑰【從用戶端發動時，以驗證碼代替金鑰】
        $key = 'Xd668CSjnXQLD26Hia8vapkOgGXAv68s';
        //商品資料
        $payment = [
            'store_uid' => '398800730001', //特店id
            'item' => 1,
            'i_0_id' => '0886449',
            'i_0_name' => '商品名稱',
            'i_0_cost' => '10',
            'i_0_amount' => '1',
            'i_0_total' => '10',
            'cost' => 10,
            'user_id' => 'phper',
            'order_id' => '1234567890',
            'ip' => '127.0.0.1', // 此為消費者IP，會做為驗證用
            'pfn' => 'all',
        ];
        $encrypt = encrypt($payment, $key);
        $encryption = new Encryption($key);

        self::assertEquals($payment, $encryption->decrypt($encrypt));
    }
}

//加密方法
function encrypt($fields, $key)
{
    $data = json_encode($fields);
    $size = openssl_cipher_iv_length('AES-256-CBC');
    $iv = openssl_random_pseudo_bytes($size);
    $data = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

    return base64_encode($iv.$data);
}

function decrypt($plainText, $key)
{
    $binary = base64_decode($plainText);
    $iv = substr($binary, 0, 16);
    $data = substr($binary, 16);
    $data = openssl_decrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

    return json_decode($data, true);
}
