<?php
error_reporting ( 0 );
date_default_timezone_set ( "Asia/Jakarta" );
membutuhkan __DIR__ . '/vendor/autoload.php' ;
membutuhkan_sekali __DIR__ . '/userAgent.php' ;
membutuhkan __DIR__ . '/smshub.php' ;

//APIKEY SMSHUB
$ kunci = '5d7a62323f0ef3453cf3a780b0e83006f46a64bf' ;

echo  '----------- AUTO REFF ONEASET DENGAN SMSHUB -----------' . PHP_EOL . PHP_EOL ;
gunakan  Keriting \ Keriting ;
$ agen = new userAgent();

$ sms = SMSHub baru  ( $ kunci );
$ setoran = $ sms -> getBalance ();
gema  '[ ' . tanggal ( 'H:i:s' ). ' ] Saldo SMSHub: ' . $ penyimpanan . 'gosok' . PHP_EOL ;
$ reff = input ( '[ ' . tanggal ( 'H:i:s' ). ' ] Kode Reff u tod' );
$ jumlah = input ( '[ ' . tanggal ( 'H:i:s' ). ' ] Mau Berapa ref tod' );
for ( $ ia = 0 ; $ ia < $ jumlah ; $ ia ++) {
    
    //Kue Acak
    $ identitas_anonim_id = RandomUUID ( 14 ). '-' . RandomUUID ( 14 ). '-' . RandomUUID ( 8 ). '-' . RandomUUID ( 7 ). '-' . RandomUUID ( 14 );
    $ identitas_cookie_id = RandomUUID ( 14 ). '-' . RandomUUID ( 15 ). '-' . RandomUUID ( 8 ). '-' . RandomUUID ( 6 ). '-' . RandomUUID ( 14 );

    //Perangkat Acak
    $ deviceId = vsprintf ( '%s%s-%s-%s-%s-%s%s%s' , str_split ( bin2hex ( random_bytes ( 16 )), 4 ) );
    $ uuid = RandomUUID ( 13 ). '-' . RandomUUID ( 6 ). '-' . RandomUUID ( 8 ). '-' . RandomUUID ( 4 ). '-' . RandomUUID ( 4 ). '-' . RandomUUID ( 4 ). '-' . RandomUUID ( 12 );
    $ deviceToken = RandomDeviceToken ( 163 );
    $ aId = RandomUUID ( 32 );
    $ iklan = RandomUUID ( 52 );


    //Kue
    $ encodeIdentities = base64_encode ( '{"$identity_anonymous_id":"' . $ identity_anonymous_id . '","$identity_cookie_id":"' . $ identitas_cookie_id . '"}' );
    $ encodeCookies = urlencode ( 'sensorsdata2015jssdkcross={"distinct_id":"' . $ identitas_anonymous_id . '","first_id":"","props":{"$latest_traffic_source_type":"直接流量","$latest_search_keyword":" _直接打开","$latest_referrer":""},"identities":"' . $ encodeIdentities . '","history_login_id":{"name":"","value":""} ,"$device_id":"' . $ deviceId . '"}' );
    $ cookies = $ encodeCookies . '; kode bahasa=dalam' ;

    $ tidak = $ ia + 1 ;
    gema  '------------------------------------------------ -----' . PHP_EOL ;
    $ getnum = $ sms -> getNumber ( 'aj' , '6' , '0' , 'any' );
    if ( is_array ( $ getnum )) {
        $ id = $ getnum [ 'id' ];
        $ angka = $ getnum [ 'angka' ];
        $ nomorHP = str_replace ( '628' , '08' , $ num );
        gema  '[ ' . tanggal ( 'H:i:s' ). ' ] Coba Mendaftar dengan Nomor ' . $ nomorHP ;

        $ ikal = ikal baru  ();
        $ curl -> setHeader ( 'Host' , 'app.oneaset.co.id' );
        $ curl -> setHeader ( 'Terima' , 'aplikasi/json, teks/polos, */*' );
        $ curl -> setHeader ( 'countryId' , '1' );
        $ curl -> setUserAgent ( 'User-Agent' , $ agent -> generate ( 'android' ));
        $ curl -> setHeader ( 'languageId' , '123' );
        $ curl -> setHeader ( 'Sec-Fetch-Site' , 'same-origin' );
        $ curl -> setHeader ( 'Sec-Fetch-Mode' , 'cors' );
        $ curl -> setHeader ( 'Sec-Fetch-Dest' , 'kosong' );
        $ curl -> setReferrer ( 'Referer' , 'https://app.oneaset.co.id/finance/Finance/LandingPage?channel=web_OneAset_activity_financeinvite&referrerCode=' . $ reff . '&source=outside&ad=' . $ ad . '' );
        $ curl -> setHeader ( 'Accept-Language' , 'en-US,en;q=0.9' );
        $ curl -> setHeader ( 'Cookie' , $ cookies );
        $ curl -> get ( 'https://app.oneaset.co.id/api/app/user/sms/captcha?phoneNumber=' . $ nomorHP . '&imageCaptcha=&smsBizType=1' );
        if ( $ curl -> error ) {
            $ status = $ sms -> setStatus ( $ id , 8 );
            gema  '[ ' . tanggal ( 'H:i:s' ). ' ] Kesalahan: ' . $ curl -> errorCode . ':' . $ curl -> errorMessage . "\n" ;
        } lain {
            if ( $ curl -> response -> success == true ) {
                echo  ' -> Berhasil Mengirim OTP' . PHP_EOL ;
                gema  '[ ' . tanggal ( 'H:i:s' ). ' ] Menunggu OTP bos' ;
                $ getOTP = 0 ;
                lakukan {
                    $ ikal = ikal baru  ();
                    $ curl -> post ( 'https://sms-acktiwator.ru/api/' , 'action=getCurrentActivations&api_key=' . $ key . '&order=id&orderBy=asc&start=0&length=10' );
                    $ otpBos = json_decode ( $ curl -> response )-> array [ 0 ]-> code ;
                    $ getOTP ++;
                        if ( $ getOTP == 10 ) {
                            gema  "." ;
                            $ getOTP = 0 ;
                        }
                

fungsi  RandomDeviceToken ( $ panjang = 10 ) {
    $ karakter = '0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ-_:' ;
    $ karakterPanjang = strlen ( $ karakter );
    $ randomString = '' ;
    for ( $ i = 0 ; $ i < $ length ; $ i ++) {
        $ randomString .= $ character [ rand ( 0 , $ characterLength - 1 )];
    }
    kembalikan  $ randomString ;
}

fungsi  RandomUUID ( $ panjang = 10 ) {
    $ karakter = '0123456789abcdefghijklmnopqrstvwxyz' ;
    $ karakterPanjang = strlen ( $ karakter );
    $ randomString = '' ;
    for ( $ i = 0 ; $ i < $ length ; $ i ++) {
        $ randomString .= $ character [ rand ( 0 , $ characterLength - 1 )];
    }
    kembalikan  $ randomString ;
}
