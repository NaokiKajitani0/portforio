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
  $a="'".h($_POST["ranks"])."'";
  $stmt=$pdo->query("SELECT num,rankingin FROM paiza where ranks=$a ORDER BY id");
  $datas=$stmt->fetchAll();
  return $datas;
}
$datas=getPaiza($pdo);
// var_dump($datas);
// echo $datas[0]->rankingin;
if (empty($datas)) {
  header('Location: http://www.localhost:8092/introduction/self-learning/result-ranking/nofile.php');
}

for ($i=0; $i < count($datas); $i++) { 
    $num[$i]=$datas[$i]->num;
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
    <h2>修正フォーム</h2>
    <form action="fixform3.php" method="post">
        <p>問題No</p>
        <select name="nums" id="num">
          <?php for ($i=0; $i <count($datas); $i++): ?>
            <option value="<?=$num[$i]; ?>"><?=$num[$i]; ?>
            <?php endfor; ?>
          </select>
        <input type="submit" value="送信">
        <input type="hidden" name="ranks" value=<?=filter_input(INPUT_POST,'ranks'); ?>>
        <input type="hidden" name="rankingin" value=<?=$datas[0]->rankingin; ?>>
    </form>
</body>
</html>