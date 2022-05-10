<?php

kelas  SMSHub {

    private  $ url = 'https://sms -acktiwator.ru/stubs/handler_api.php' ;

    pribadi  $ apiKey ;5d7a62323f0ef3453cf3a780b0e83006f46a64bf
     fungsi  publik __construct ( $ apiKey ) {
        $ this -> apiKey = $ apiKey ;
    }

     fungsi  publik getBalance () {
        return  $ this -> request ( array ( 'api_key' => $ this -> apiKey , 'action' => __FUNCTION__), 'GET' );
    }
    
     fungsi  publik getNumber ( $ service , $ country = null , $ forward = 0 , $ operator = null , $ ref = null ){
        $ requestParam = array ( 'api_key' => $ this -> apiKey , 'action' => __FUNCTION__, 'service' => $ service , 'forward' => $ forward );
        jika ( $ negara ){
            $ requestParam [ 'negara' ]= $ negara ;
        }
        if ( $ operator &&( $ country == 0 || $ country == 1 || $ country == 2 )){
            $ requestParam [ 'service' ] = $ operator ;
        }
        jika ( $ ref ){
            $ requestParam [ 'ref' ] = $ ref ;
        }
        return  $ this -> request ( $ requestParam , 'POST' , null , 1 );
    }

     fungsi  publik setStatus ( $ id , $ status , $ forward = 0 ){
        $ requestParam = array ( 'api_key' => $ this -> apiKey , 'action' => __FUNCTION__, 'id' => $ id , 'status' => $ status );

        jika ( $ maju ){
            $ requestParam [ 'forward' ] = $ forward ;
        }

        return  $ this -> request ( $ requestParam , 'POST' , null , 3 );
    }

     permintaan fungsi  pribadi ( $ data , $ metode , $ parseAsJSON = null , $ getNumber = null ) {
        $ metode = strtoupper ( $ metode );

        if (! in_array ( $ method , array ( 'GET' , 'POST' )))
            throw  new  InvalidArgumentException ( 'Metode hanya bisa GET atau POST' );

        $ serializedData = http_build_query ( $ data );

        if ( $ metode === 'DAPATKAN' ) {
            $ hasil = file_get_contents ( "$this->url?$serializedData" );
        } lain {
            $ pilihan = larik (
                'http' => larik (
                    'header' => "Jenis konten: application/x-www-form-urlencoded\r\n" ,
                    'metode' => 'POSTING' ,
                    'konten' => $ serializedData
                )
            );

            $ konteks = stream_context_create ( $ opsi );
            $ hasil = file_get_contents ( $ this -> url , false , $ context );
        }

        jika ( $ parseAsJSON )
            return  json_decode ( $ hasil , true );

        $ parsedResponse = meledak ( ':' , $ hasil );

        if ( $ getNumber == 1 ) {
            $ returnNumber = array ( 'id' => $ parsedResponse [ 1 ], 'number' => $ parsedResponse [ 2 ]);
            kembali  $ returnNumber ;
        }
        if ( $ getNumber == 2 ) {
            $ returnStatus = array ( 'status' => $ parsedResponse [ 0 ], 'code' => $ parsedResponse [ 1 ]);
            kembali  $ returnStatus ;
        }
        if ( $ getNumber == 3 ) {
            $ returnStatus = array ( 'status' => $ parsedResponse [ 0 ]);
            kembali  $ returnStatus ;
        }

        kembalikan  $ parsedResponse [ 1 ];
    }

}
