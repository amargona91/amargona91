<?php

// autoload.php @dihasilkan oleh Komposer

jika ( PHP_VERSION_ID < 50600 ) {
    echo  'Composer 2.3.0 menjatuhkan dukungan untuk autoloading pada PHP <5.6 dan Anda sedang menjalankan' . PHP_VERSION . ', harap tingkatkan PHP atau gunakan Composer 2.2 LTS melalui "composer self-update --2.2". Aborsi.' . PHP_EOL ;
    keluar ( 1 );
}

membutuhkan_sekali __DIR__ . '/komposer/autoload_real.php' ;

kembalikan  ComposerAutoloaderInitf04a7a17706785e6883179e15966441d :: getLoader ();
