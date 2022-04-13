<?php
require('../../../../../app/function.php');
define('DSN','mysql:host=paizadb;dbname=paizaapp;charset=utf8mb4');
define('DB_USER','paizauser');
define('DB_PASS','paizaapppass');
try{
  $pdo=new PDO(
    DSN,
    DB_USER,
    DB_PASS,
    [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
      PDO::ATTR_EMULATE_PREPARES=>false,
    ]
    );
}catch(PDOException $e){
  echo $e->getMessage();
  exit;
}

function getPaiza($pdo){
    $stmt=$pdo->query("SELECT * FROM paiza WHERE ranks='C' ORDER BY id");
    $datas=$stmt->fetchAll();
    return $datas;
}
// 配列$aに格納されている合計値をその要素数にて割る。一要素当たりの値を算出(=平均値の算出)する関数
function averages($a,$b){
  echo floor(array_sum($a)/count($b));
}
// 正答率を算出する関

$datas=getPaiza($pdo);
if (empty($datas)) {
  header('Location: http://www.localhost:8092/introduction/self-learning/result-ranking/nofile.php');
}

$totalanswertime=0;
$totalaveanswertime=0;

for ($i=0; $i < count($datas); $i++) { 
    $num[$i]=$datas[$i]->num;
    $scores[$i]=$datas[$i]->scores;
    $avescores[$i]=$datas[$i]->avescores;
    $answertimeH[$i]=$datas[$i]->answertimeH;
    $answertimeT[$i]=$datas[$i]->answertimeT;
    $answertimeS[$i]=$datas[$i]->answertimeS;
    $answertime[$i]=$answertimeH[$i]*60*60+$answertimeT[$i]*60+$answertimeS[$i];
    $totalanswertime=$totalanswertime+$answertime[$i];
    $aveanswertimeH[$i]=$datas[$i]->aveanswertimeH;
    $aveanswertimeT[$i]=$datas[$i]->aveanswertimeT;
    $aveanswertimeS[$i]=$datas[$i]->aveanswertimeS;
    $aveanswertime[$i]=$aveanswertimeH[$i]*60*60+$aveanswertimeT[$i]*60+$aveanswertimeS[$i];
    $totalaveanswertime=$totalaveanswertime+$aveanswertime[$i];
}
// var_dump($totalaveanswertime);
$totalanswertimeH=floor($totalanswertime/count($datas)/3600);
$totalanswertimeT=floor(($totalanswertime-$totalanswertimeH*count($datas)*3600)/count($datas)/60);
$totalanswertimeS=floor(($totalanswertime-$totalanswertimeH*count($datas)*3600-$totalanswertimeT*count($datas)*60)/count($datas));
$totalaveanswertimeH=floor($totalaveanswertime/count($datas)/3600);
$totalaveanswertimeT=floor(($totalaveanswertime-$totalaveanswertimeH*count($datas)*3600)/count($datas)/60);
$totalaveanswertimeS=floor(($totalaveanswertime-$totalaveanswertimeH*count($datas)*3600-$totalaveanswertimeT*count($datas)*60)/count($datas));

// 平均解答時間よりも早く回答できているか
$count_speed=0;
for ($i=0; $i <count($datas) ; $i++) { 
  if ($answertime[$i]<=$aveanswertime[$i]) {
    $count_speed=$count_speed+1;
  }
}
// 100点のカウント関数
$count_CA=0;
for ($i=0; $i <count($datas); $i++) { 
  if ($scores[$i]===100) {
    $count_CA=$count_CA+1;
  }
}
// 100点かつ平均時間内に解答できているか
$count_CA_speed=0;
for ($i=0; $i <count($datas); $i++) { 
  if ($scores[$i]===100 && $answertime[$i]<=$aveanswertime[$i]) {
    $count_CA_speed=$count_CA_speed+1;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>【result】C</title>
</head>
<body>
<p>回答数：<?=count($datas); ?></p>
    <p>自身の平均スコア：<?=averages($scores,$datas); ?></p>
    <p>正答率：<?php echo $count_CA.'/'.count($datas); ?></p>
    <p>平均解答時間より早く解答ができているか：<?php echo $count_speed.'/'.count($datas); ?></p>
    <p>平均解答時間より早く解答かつ100点であるか：<?php echo $count_CA_speed.'/'.count($datas); ?></p>
    <p>全体の平均スコア：<?=averages($avescores,$datas); ?></p>
    <p>自身の平均解答時間：<?php echo $totalanswertimeH.':'.$totalanswertimeT.':'.$totalanswertimeS; ?></p>
    <p>全体の平均解答時間：<?php echo $totalaveanswertimeH.':'.$totalaveanswertimeT.':'.$totalaveanswertimeS; ?></p>
    <br>
    <a href="../../result.php">戻る</a>
</body>
</html>