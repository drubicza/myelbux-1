<?php
@system("clear");
echo "\n\033[92m______  ___               ____________
___   |/  /_____  _______ ___  /___  /_ ____  ______  __
__  /|_/ / __  / / /_  _ \__  / __  __ \_  / / /__  |/_/
_  /  / /  _  /_/ / /  __/_  /  _  /_/ // /_/ / __>  <
/_/  /_/   _\__, /  \___/ /_/   /_.___/ \__,_/  /_/|_|
           /____/
\n";
echo "\033[1;31m[ \033[1;33mSubscribe Channel \033[1;31m] ";
echo "\033[1;31m[ \033[1;36mAneuk Cabak\033[1;31m ]\n";
echo "\033[1;31m[ \033[1;33mSubscribe Channel \033[1;31m] ";
echo "\033[1;31m[ \033[1;36mAneuk Bawang \033[1;31m]\n";

$url    = "https://www.myelbux.com/api/voucher/redeem";
$vo     = "https://www.myelbux.com/api/posts?page=1&keyword=";
$post   = "https://www.myelbux.com/api/post/create";
$faucet = "https://www.myelbux.com/api/coupon/claim";
$token  = "https://www.myelbux.com/api/coupons";
$login  = "https://www.myelbux.com/api/login";

require("config.php");

$log = array('email'=>$email,'password'=>$password,);
$log = json_encode($log);

echo "\n\033[92mStarting bot..!!\n\n";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$head   = array();
$head[] = "Host: www.myelbux.com";
$head[] = "Origin: http://localhost";
$head[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.0.0; MI 5 Build/OPR1.170623.032; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/51.0.2704.106 Mobile Safari/537.36";
$head[] = "Content-Type: application/json";
$head[] = "Accept: */*";
$head[] = "Referer: http://localhost/login";
$head[] = "Accept-Encoding: gzip, deflate";
$head[] = "Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
$head[] = "X-Requested-With: com.myelbux.chat";
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $log);
$result = curl_exec($ch);
curl_close($ch);
$son = json_decode($result, true);
if ($son["token"] == true);

$headers   = array();
$headers[] = "Sec-Fetch-Mode:cors";
$headers[] = "Origin:http://localhost";
$headers[] = "Authorization:Bearer ".$son["token"];
$headers[] = "User-Agent:Mozilla/5.0 (Linux; Android 8.0.0; MI 5 Build/OPR1.170623.032; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.111 Mobile Safari/537.36";
$headers[] = "Content-Type:application/json";
$headers[] = "X-Requested-With:com.myelbux.chat";
$headers[] = "Sec-Fetch-Site:cross-site";
$headers[] = "Referer:http://localhost/home";

$ac = '{"code":"3ZQYQDV5"}';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $ac);
$result = curl_exec($ch);
curl_close($ch);
$jsn = json_decode($result, true);
echo "\033[92m".$jsn["message"]."\n";
echo "\033[1;36m".$jsn["user"]["wallets"]["0"]["coin_name"];
echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$jsn["user"]["wallets"]["0"]["total"]."\n";
echo $jsn["user"]["wallets"]["1"]["coin_name"];
echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$jsn["user"]["wallets"]["1"]["total"]."\n";
echo $jsn["user"]["wallets"]["2"]["coin_name"];
echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$jsn["user"]["wallets"]["2"]["total"]."\n";

while (true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($result, true);
    $body = json_encode(array('id'=>$json['id']));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $faucet);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    $result = curl_exec($ch);
    curl_close($ch);
    $hasil = json_decode($result, true);
    echo "\033[92m".$hasil["message"]."\n";
    echo "\033[1;36m".$hasil["user"]["wallets"]["0"]["coin_name"];
    echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$hasil["user"]["wallets"]["0"]["total"]."\n";
    echo $hasil["user"]["wallets"]["1"]["coin_name"];
    echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$hasil["user"]["wallets"]["1"]["total"]."\n";
    echo $hasil["user"]["wallets"]["2"]["coin_name"];
    echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$hasil["user"]["wallets"]["2"]["total"]."\n";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $vo);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $js = json_decode($result, true);
    $data = json_encode(array('code'=>$js['data']['0']['title']));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($result, true);
    echo "\033[92m".$jsn["message"]."\n";
    echo "\033[1;36m".$jsn["user"]["wallets"]["0"]["coin_name"];
    echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$jsn["user"]["wallets"]["0"]["total"]."\n";
    echo $jsn["user"]["wallets"]["1"]["coin_name"];
    echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$jsn["user"]["wallets"]["1"]["total"]."\n";
    echo $jsn["user"]["wallets"]["2"]["coin_name"];
    echo " \033[1;36mBalance \033[1;37m: \033[1;36m".$jsn["user"]["wallets"]["2"]["total"]."\n";

    $datas = json_encode(array('title'=>$jsn["user"]["voucher_code"],'text'=>$jsn["user"]["voucher_code"]));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $result = curl_exec($ch);
    curl_close($ch);
    echo "\033[1;31mClaim selanjutnya 90 menit kemudian ";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(600);
    echo ".";
    sleep(60);
    echo ".\n";
}
?>
