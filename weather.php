<?php
include"pdo.php";

$id = $_GET['id'];
$key = 'a185d6523b6244b7be89e88bcf33cdec';

$pdp = getPdo();
$sql = "select * from weather where location=".$id;
$res = $pdo->query($sql);
$data = $res->fetch(PDO::FETCH_ASSOC);
if($data){
if($data['expire']>time()){
    echo $data['info'];
    die;
}

}
$api_url = "https://devapi.qweather.com/v7/weather/now?location=101010700&key=a185d6523b6244b7be89e88bcf33cdec";
$res = file_get_contents($api_url);

$sql = "delete from weather where location=".$id;
$pdo = exec($sql);

$expire =time()+1800;
$sql = "insert into weather ('location','info','expire')values({$id},'{$res}',$expire) ";
$pdo-->exec($sql);
echo $res;
