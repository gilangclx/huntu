
<?php
date_default_timezone_set('Asia/Jakarta');
include "aku.php";
ulang:
// function change(){
echo color("blue","        JANGAN BAGI SCRIPT KE BUKAN MEMBER TTM \n");
echo color("green","           Time  : ".date('[d-m-Y] [H:i:s]')."   \n");
echo color("yellow","                   Format 62*** \n");
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("yellow"," NOMOR BARU : ");
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("yellow"," KODE OTP DIKIRIM")."\n";
        otp:
        echo color("yellow"," KETIK OTP : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green"," BERHASIL MENDAFTAR\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("nevy"," +] TOKENmu : ".$token."\n\n");
        save("token.txt",$token); 
        echo color("blue","==============( REDEEM VOUCHER REFF )==============");
reff:
$data = '{"referral_code":"G-ZDJYTYX"}';
$claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
$message = fetch_value($claim,'"message":"','"');
if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
echo "\n".color("green","+] Message: ".$message);
goto gofood1;
}else{
echo "\n".color("yellow","-] Message: ".$message);
}
        gofood1:
        sleep(3);
        echo color("blue","\n ▬▬▬▬▬▬▬▬▬▬▬▬ REDEEM VOUCHER FOOD GAES ▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("white","  20+10");
        echo "\n".color("purple"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("purple",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("red"," Message: ".$message);
	gocar:
        echo "\n".color("white","  15+10+5");
        echo "\n".color("purple"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("purple",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green"," Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red"," Message: ".$message);
        gofood:
        echo "\n".color("white"," FOOD LAGI");
        echo "\n".color("purple"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("purple",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"MAKANGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        echo "\n".color("green"," Message: ".$message);
        echo "\n".color("white"," VOC NAS 20+10");
        echo "\n".color("purple"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("purple",".");
        sleep(3);
        }
        sleep(3);
        $boba09 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0607"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        echo "\n".color("green"," Message: ".$messageboba09);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=30&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        $voucher14 = getStr1('"title":"','",',$cekvoucher,"14");
        $voucher15 = getStr1('"title":"','",',$cekvoucher,"15");
        $voucher16 = getStr1('"title":"','",',$cekvoucher,"16");
        $voucher17 = getStr1('"title":"','",',$cekvoucher,"17");
        $voucher18 = getStr1('"title":"','",',$cekvoucher,"18");
        $voucher19 = getStr1('"title":"','",',$cekvoucher,"19");
        $voucher20 = getStr1('"title":"','",',$cekvoucher,"20");
        $voucher21 = getStr1('"title":"','",',$cekvoucher,"21");
        $voucher22 = getStr1('"title":"','",',$cekvoucher,"22");
        $voucher23 = getStr1('"title":"','",',$cekvoucher,"23");
        $voucher24 = getStr1('"title":"','",',$cekvoucher,"24");
        $voucher25 = getStr1('"title":"','",',$cekvoucher,"25");
        $voucher26 = getStr1('"title":"','",',$cekvoucher,"26");
        $voucher27 = getStr1('"title":"','",',$cekvoucher,"27");
        $voucher28 = getStr1('"title":"','",',$cekvoucher,"28");
        $voucher29 = getStr1('"title":"','",',$cekvoucher,"29");
        $voucher30 = getStr1('"title":"','",',$cekvoucher,"30");
        echo "\n".color("nevy"," Total voucher ".$total." : ");
        echo "\n".color("green","  1. ".$voucher1);
        echo "\n".color("yellow","  2. ".$voucher2);
        echo "\n".color("green","  3. ".$voucher3);
        echo "\n".color("yellow","  4. ".$voucher4);
        echo "\n".color("green","  5. ".$voucher5);
        echo "\n".color("yellow","  6. ".$voucher6);
        echo "\n".color("green","  7. ".$voucher7);
        echo "\n".color("yellow","  8. ".$voucher8);
        echo "\n".color("green","  9. ".$voucher9);
        echo "\n".color("yellow"," 10. ".$voucher10);
	    echo "\n".color("green"," 11. ".$voucher11);
        echo "\n".color("yellow"," 12. ".$voucher12);
        echo "\n".color("green"," 13. ".$voucher13);
        echo "\n".color("yellow"," 14. ".$voucher14);
        echo "\n".color("green"," 15. ".$voucher15);
        echo "\n".color("yellow"," 16. ".$voucher16);
        echo "\n".color("green"," 17. ".$voucher17);
        echo "\n".color("yellow"," 18. ".$voucher18);
        echo "\n".color("green"," 19. ".$voucher19);
        echo "\n".color("yellow"," 20. ".$voucher20);
        echo "\n".color("green"," 21. ".$voucher21);
        echo "\n".color("yellow"," 22. ".$voucher22);
        echo "\n".color("green"," 23. ".$voucher23);
        echo "\n".color("yellow"," 24. ".$voucher24);
        echo "\n".color("green"," 25. ".$voucher25);
        echo "\n".color("yellow"," 26. ".$voucher26);
        echo "\n".color("green"," 27. ".$voucher27);
        echo "\n".color("yellow"," 28. ".$voucher28);
        echo "\n".color("green"," 29. ".$voucher29);
        echo "\n".color("yellow"," 30. ".$voucher30);
        echo"\n";
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
        $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
        $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');
        $expired14 = getStr1('"expiry_date":"','"',$cekvoucher,'14');
        $expired15 = getStr1('"expiry_date":"','"',$cekvoucher,'15');
        $expired16 = getStr1('"expiry_date":"','"',$cekvoucher,'16');
        $expired17 = getStr1('"expiry_date":"','"',$cekvoucher,'17');
        $expired18 = getStr1('"expiry_date":"','"',$cekvoucher,'18');
        $expired19 = getStr1('"expiry_date":"','"',$cekvoucher,'19');
        $expired20 = getStr1('"expiry_date":"','"',$cekvoucher,'20');
        $expired21 = getStr1('"expiry_date":"','"',$cekvoucher,'21');
        $expired22 = getStr1('"expiry_date":"','"',$cekvoucher,'22');
        $expired23 = getStr1('"expiry_date":"','"',$cekvoucher,'23');
        $expired24 = getStr1('"expiry_date":"','"',$cekvoucher,'24');
        $expired25 = getStr1('"expiry_date":"','"',$cekvoucher,'25');
        $expired26 = getStr1('"expiry_date":"','"',$cekvoucher,'26');
        $expired27 = getStr1('"expiry_date":"','"',$cekvoucher,'27');
        $expired28 = getStr1('"expiry_date":"','"',$cekvoucher,'28');
        $expired29 = getStr1('"expiry_date":"','"',$cekvoucher,'29');
        $expired30 = getStr1('"expiry_date":"','"',$cekvoucher,'30');
        $TOKEN  = ":";
	$chatid = "";
	$pesan 	= "[+] Gojek Account Info [+]\n\n".$token."\n\nTotalVoucher = ".$total."\n[+] ".$voucher1."\n[+] Exp : [".$expired1."]\n[+] ".$voucher2."\n[+] Exp : [".$expired2."]\n[+] ".$voucher3."\n[+] Exp : [".$expired3."]\n[+] ".$voucher4."\n[+] Exp : [".$expired4."]\n[+] ".$voucher5."\n[+] Exp : [".$expired5."]\n[+] ".$voucher6."\n[+] Exp : [".$expired6."]\n[+] ".$voucher7."\n[+] Exp : [".$expired7."]\n[+] ".$voucher8."\n[+] Exp : [".$expired8."]\n[+] ".$voucher9."\n[+] Exp : [".$expired9."]\n[+] ".$voucher10."\n[+] Exp : [".$expired10."] ".$voucher11."\n[+] Exp : [".$expired11."]\n[+] ".$voucher12."\n[+] Exp : [".$expired12."]\n[+] ".$voucher13."\n[+] Exp : [".$expired13."]\n[+]";
	$method	= "sendMessage";
	$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
	$post = [
 		'chat_id' => $chatid,
                'text' => $pesan
        	];
                $header = [
                "X-Requested-With: XMLHttpRequest",
                "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
                        ];
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        $datas = curl_exec($ch);
                                        $error = curl_error($ch);
                                        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                        curl_close($ch);
                                        $debug['text'] = $pesan;
                                        $debug['respon'] = json_decode($datas, true);
         setpin:
         echo "\n".color("nevy","SETPIN..!!!: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬▬▬ PIN MU = 100001 ▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"100001"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "OTP PIN: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("white","-] GAGAL!!!\n");
         }
         }
         }
         }else{
         echo color("white","-] OTP SALAH");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("white","!] INPUT ULANG..\n");
         goto otp;
         }
         }else{
         echo color("white","!] GANTI NOPE BARU\n");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("white","!] KETIK NOPE BARU\n");
         goto ulang;
         }
//  }

// echo change()."\n";