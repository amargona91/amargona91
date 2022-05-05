<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[94m            NOT SAFE FOR WORK IF2               \n";
echo "\e[94m      \n";     
echo "\e[94m       \n";    
echo "\e[94m                              88      88        P888B         .88888      \n";                        
echo "\e[94m                              P888  888P     8888888888      888888888      \n";                        
echo "\e[94m                                8B~P88      988G     ^       888   888       \n";                       
echo "\e[94m                                 B88P       88B  8888888     888888&8        \n";                      
echo "\e[94m                                8B?YB8      B88    88G88P    88&8 888        \n";                        
echo "\e[94m                              8858  8888     P858  88P88     888   888       \n";                       
echo "\e[94m                              888    888       B8888889      P88    8889     \n";    
echo "\e[94m       \n";       
echo "\e[94m       \n";                 
echo "\e[91m FORMAT NOMOR HP : INDONESIA '62***' , US='1***'\n";
echo "\e[93m SCRIPT GOJEK AUTO REGISTER + AUTO CLAIM VOUCHER\n";
echo "\n";
echo "\e[96m[?] Masukkan Nomor HP Anda (62/1) : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[x] Nomor Telah Terdaftar\n";
    }
  else
    {
    otp:
    echo "\e[96m[!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[91m[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[93m[!] Trying to redeem Voucher : GOFOODBOBA07 !\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(3);
            echo "\e[93m[!] Trying to redeem Voucher : GOFOODBOBA10 !\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] Trying to redeem Voucher : GOFOODBOBA19 !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[92m[+] ".$claim . "\n";
            sleep(3);
            echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(3);

            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\033VOUCHER INVALID/GAGAL REDEEM\n";
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                
        }
    }
    }


?>
