<?php
// リクエスト例
// php query.php ./fox.png  LABEL_DETECTION

$api_key = "AIzaSyD4m10e7QIfJKOqxKFvwVx27_ifagqlMOw";

$image_path = $argv[1];

$feature = $argv[2];

// リクエストパラメーターを設定
$param = array("requests" => array());
$item["image"] = array("content" => base64_encode(file_get_contents(dirname(__FILE__) ."/$image_path")));
$item["features"] = array(array("type" => $feature, "maxResults" => 3));
$param["requests"][] = $item;

// リクエスト用のJSONを作成
$json = json_encode($param);

// リクエストを実行
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://vision.googleapis.com/v1/images:annotate?key=" . $api_key);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

$api_key = "AIzaSyD4m10e7QIfJKOqxKFvwVx27_ifagqlMOw";

$image_path = $argv[1];

$feature = $argv[2];

// リクエストパラメーターを設定
$param = array("requests" => array());
$item["image"] = array("content" => base64_encode(file_get_contents(dirname(__FILE__) ."/$image_path")));
$item["features"] = array(array("type" => $feature, "maxResults" => 3));
$param["requests"][] = $item;

// リクエスト用のJSONを作成
$json = json_encode($param);

// リクエストを実行
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://vision.googleapis.com/v1/images:annotate?key=" . $api_key);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_SSL_VERIFYEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_TIMEOUT, 15);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
echo "curl: " . $curl;
$res1 = curl_exec($curl);
$res2 = curl_getinfo($curl);
curl_close($curl);

echo "res1: $res1";
echo "res2: $res2";

// 取得したデータ
$json = substr($res1, $res2["header_size"]);
$array = json_decode($json, true);

var_dump($array);

?>
