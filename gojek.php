<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[94m            NOT SAFE FOR WORK IF2               \n";
echo "\e[84m                                                                                              \n";      
echo "\e[84m         :^^^.             :^~~:               .:^^^^^^^^^^:          :^^^^^^^^^^^^^^^:        \n";     
echo "\e[84m       .P&@@@#Y.         ^5&@@@&P.        .!JPB&&@@@@@@@@@@&P.      !#@@@@@@@@@@@@@@@@&#P7.     \n";    
echo "\e[84m       ~@@@@@@@&?.     :Y&@@@@@@@^      ~5&@@@@@@@@@@@@@@@@@@7      G@@@@@@@@@@@@@@@@@@@@@#?    \n";    
echo "\e[84m        Y@@@@@@@@B!   ?&@@@@@@@&J     :P@@@@@@@@@@@@@@@@@@@&G:      G@@@@@@@@@@@@@@@@@@@@@@@5    \n";   
echo "\e[84m         ^5@@@@@@@@G7B@@@@@@@@Y:     ~&@@@@@@@BY7~~^^^^^^^^:        G@@@@@@Y^~~~~~~~~?&@@@@@@!  \n";    
echo "\e[84m           ^P@@@@@@@@@@@@@@@P^      :&@@@@@@B~      .::::::::::     G@@@@@@7   .:::::!&@@@@@@7   \n";   
echo "\e[84m             ~G@@@@@@@@@@@G~        Y@@@@@@B.     .5&&@@@@@@@&&B7   G@@@@@@? ~B&@@@@@@@@@@@@&:   \n";   
echo "\e[84m               Y@@@@@@@@@5          G@@@@@@J      7@@@@@@@@@@@@@&:  G@@@@@@? B@@@@@@@@@@@@@@J    \n";   
echo "\e[84m             :5&@@@@@@@@@@P~        5@@@@@@G      :B@@@@@@@@@@@@#.  G@@@@@@? !&@@@@@@@@@@&B7      \n";  
echo "\e[84m           :Y&@@@@@@@@@@@@@@5:      ^@@@@@@@5:      :~~~J@@@@@@@J   G@@@@@@?  :5@@@@@@@@G~     \n";     
echo "\e[84m         .J&@@@@@@@#J#@@@@@@@&Y:     7@@@@@@@&57^::::~?P&@@@@@@5    G@@@@@@?    ~G@@@@@@@#J:   \n";     
echo "\e[84m        ?&@@@@@@@&J. .J&@@@@@@@&?     !#@@@@@@@@@&&&@@@@@@@@@&J     G@@@@@@?      7#@@@@@@@&Y.  \n";    
echo "\e[84m       ~@@@@@@@@5:     :5@@@@@@@@^     .?B@@@@@@@@@@@@@@@@@#Y:      B@@@@@@?       .Y&@@@@@@@7  \n";    
echo "\e[84m       :B@@@@@P^         ~G@@@@@G.        ~JG#&@@@@@@@@&GY!.        ?@@@@@#^         ^5&@@@@#^  \n";    
echo "\e[84m         ~!7!^             ^!!!^             .:~!777!~^.             :!77~.            :~77~.  \n";     
echo "\e[84m    \n";                                                                                                
echo "\e[84m    \n";
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
