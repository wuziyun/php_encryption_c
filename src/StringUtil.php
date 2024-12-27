<?php

class StringUtil
{
    public function encrypt($data, $key)
    {
        return base64_encode(openssl_encrypt($data, 'AES-128-ECB', $key, OPENSSL_RAW_DATA));
    }
    public function decrypt($data, $key)
    {
        return base64_encode(openssl_decrypt($data, 'AES-128-ECB', $key, OPENSSL_RAW_DATA));
    }
}