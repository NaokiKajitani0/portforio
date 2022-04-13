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
// データの取得
function getDatas($pdo,$rank){
    $stmt=$pdo->query("SELECT * FROM paiza WHERE ranks='$rank' ORDER BY id");
    $datas=$stmt->fetchAll();
    return $datas;
}
// 要素の取得
function getElement($count,$datas){
  for ($i=0; $i < $count; $i++) {
    $num[$i]=$datas[$i]->num;
    $rankingin[$i]=$datas[$i]->rankingin;
    $ranking[$i]=$datas[$i]->ranking;
  }
  return [$num,$rankingin,$ranking];
}
// 指定したランキング内に入っている実績の取得
function ranking($min,$max,$count,$ranking){
  $Count=0;
  for ($i=0; $i <$count; $i++) { 
    if ($ranking[$i]<=$max && $ranking[$i]>=$min) {
      // $Countは条件を満たす個数
      $Count=$Count+1;
    }elseif ($ranking[$i]===0) {      
    }
  }
  echo  $Count;
}
// データの取得　呼び出し
$datasC=getDatas($pdo,'C');
// // $count=データの数
$count=count($datasC);
// // 要素の取得　呼び出し
[$num,$rankingin,$ranking]=getElement($count,$datasC);

if (empty($datasC)) {
  header('Location: http://www.localhost:8092/introduction/self-learning/result-ranking/nofile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>【result】Ranking-C</title>
</head>
<body>
    <p>ランキングイン数</p>
     <?php
    $incount=0; 
    for ($i=0; $i < $count; $i++) { 
      if ($rankingin[$i]==='Yes') {
        $incount=$incount+1;
      }
    }
    echo $incount.'/'.$count;
      ?> 
    <?php for ($i=0; $i < 5; $i++): ?> 
      <p><?php echo $i*10+1; ?>~<?php echo ($i+1)*10; ?>位のランクイン数：<?php echo ranking($i*10+1,($i+1)*10,$count,$ranking); ?></p>
    <?php endfor; ?>
    <br>
    <a href="../../result.php">戻る</a>
</body>
</html>