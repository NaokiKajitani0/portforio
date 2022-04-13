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
  $a="'".h($_POST["nums"])."'";
  $b="'".h($_POST["ranks"])."'";
  $stmt=$pdo->query("SELECT * FROM paiza where num=$a and ranks=$b ORDER BY id");
  $datas=$stmt->fetchAll();
  return $datas;
}
$datas=getPaiza($pdo);
$time=$datas[0]->answertimeH.':'.$datas[0]->answertimeT.':'.$datas[0]->answertimeS;
$avetime=$datas[0]->aveanswertimeH.':'.$datas[0]->aveanswertimeT.':'.$datas[0]->aveanswertimeS;

$vartime=strtotime($time);
$varavetime=strtotime($avetime);
$vardatetime=date('H:i:s',$vartime);
$vardateavetime=date('H:i:s',$varavetime);
if (empty($datas)) {
  header('Location: http://www.localhost:8092/introduction/self-learning/result-ranking/nofile.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <form action="../confirm.php" method="post">
    <p>ランク</p>
    <select name="ranks" id="rank">
        <option value="ランクを選んでください">ランクを選択してください</option>
        <option value="A" <?php if ($_POST['ranks']==='A') {echo 'selected';} ?>>A</option>
        <option value="B" <?php if ($_POST['ranks']==='B') {echo 'selected';} ?>>B</option>
        <option value="C" <?php if ($_POST['ranks']==='C') {echo 'selected';} ?>>C</option>
        <option value="D" <?php if ($_POST['ranks']==='D') {echo 'selected';} ?>>D</option>
      </select>
    <p>問題No</p>
    <input type="number" name="num" step="1" value="<?=h($datas[0]->num); ?>">
    <p>スコア</p>
    <input type="number" name="scores" step="1"value="<?=h($datas[0]->scores); ?>">
    <div class="error">整数のみ入力できます</div>
    <p>平均スコア</p>
    <input type="number" name="avescores" step="1" value="<?=h($datas[0]->avescores); ?>">
    <div class="error">整数のみ入力できます</div>
    <p>解答時間</p>
    <input type="time" name="answertime" step="1" value="<?=h($vardatetime); ?>">
    <p>平均解答時間</p>
    <input type="time" name="aveanswertime" step="1" value="<?=h($vardateavetime); ?>">
    <p>受験者数</p>
    <input type="number" name="parameter" value="<?=h($datas[0]->parameter); ?>">
    <p>ランキングインしたかどうか</p>
    <select name="rankingin" id="rankingin" value="<?=h($datas[0]->rankingin); ?>">
        <option value="Yes" <?php if ($_POST['rankingin']==='Yes') {echo 'selected';} ?>>Yes</option>
        <option value="No" <?php if ($_POST['rankingin']==='No') {echo 'selected';} ?>>No</option>
    </select>
    <p>ランキング数</p>
    <input type="ranking" name="ranking" value="<?=h($datas[0]->ranking); ?>">
    <br>
    <p>正解率</p>
    <input type="number" name="CorrentAnswerRate" value="<?=h($datas[0]->CorrentAnswerRate); ?>">
    <input type="submit" value="送信">
    <input type="hidden" name="type" value="update">
    <input type="hidden" name="id" value="<?=$datas[0]->id; ?>"> 
  </form>

</body>
</html>