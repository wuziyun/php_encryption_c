<?php

class StringUtil
{
    public function encrypt_ECB($data, $key)
    {
        return base64_encode(openssl_encrypt($data, 'AES-128-ECB', $key, OPENSSL_RAW_DATA));
    }
    public function decrypt_ECB($data, $key)
    {
        return base64_encode(openssl_decrypt($data, 'AES-128-ECB', $key, OPENSSL_RAW_DATA));
    }

    public function encrypt_CBC($data,$key,$iv)
    {
        $encrypted_data = openssl_encrypt(json_encode($data), 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encrypted_data);
    }

    public function rsaEncrypt($data)
    {
         $publicKey    = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCe5Cnhb/SmEgBRE/h3kYau06tBEAe0hxh2Q4frnofSGpAtvndUVE2+CDIw9MGjst2ZKe4ua1HmWBAGWv7LJ13/P4tM88ej6IaO9As35EsPt3xy77Xo728Na3t2ceVw38o8BB82OGRaI0iJlwoglg/AanJl5FZ1pnokLlBEBM9YKQIDAQAB';

        $public_key = "-----BEGIN PUBLIC KEY-----\n" . wordwrap($publicKey, 64, "\n", true) . "\n-----END PUBLIC KEY-----";
        $crypto = '';
        foreach (str_split($data, 117) as $chunk) {
            openssl_public_encrypt($chunk, $encryptData, $public_key,OPENSSL_PKCS1_PADDING);
            $crypto .= $encryptData;
        }
        return base64_encode($crypto);
    }
}