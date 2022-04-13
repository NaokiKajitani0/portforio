<?php

define('DSN','mysql:host=paizadb;dbname=paizaapp;charset=utf8mb4');
define('DB_USER','paizauser');
define('DB_PASS','paizaapppass');

$message=filter_input(INPUT_POST,'choice');
if ($message==='OK') {
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
    $id=(int)filter_input(INPUT_POST,'id');
    $ranks=filter_input(INPUT_POST,'ranks');
    $num=(int)filter_input(INPUT_POST,'num');
    $scores=(int)filter_input(INPUT_POST,'scores');
    $avescores=(int)filter_input(INPUT_POST,'avescores');
    $answertime=explode(':',filter_input(INPUT_POST,'answertime'));
    $answertimeH=(int)$answertime[0];
    $answertimeT=(int)$answertime[1];
    $answertimeS=(int)$answertime[2];
    $aveanswertime=explode(':',filter_input(INPUT_POST,'aveanswertime'));
    $aveanswertimeH=(int)$aveanswertime[0];
    $aveanswertimeT=(int)$aveanswertime[1];
    $aveanswertimeS=(int)$aveanswertime[2];
    $parameter=(int)filter_input(INPUT_POST,'parameter');
    $rankingin=filter_input(INPUT_POST,'rankingin');
    $ranking=(int)filter_input(INPUT_POST,'ranking');
    $CorrentAnswerRate=(int)filter_input(INPUT_POST,'CorrentAnswerRate');

    if ($_POST['type']==='create') {
        $stmt=$pdo->prepare("INSERT INTO paiza (ranks,num,scores,avescores,answertimeH,answertimeT,answertimeS,aveanswertimeH,aveanswertimeT,aveanswertimeS,parameter,rankingin,ranking,CorrentAnswerRate) values (:ranks,$num,$scores,$avescores,$answertimeH,$answertimeT,$answertimeS,$aveanswertimeH,$aveanswertimeT,$aveanswertimeS,$parameter,:rankingin,$ranking,$CorrentAnswerRate)");
        $stmt->bindValue('ranks',$ranks,PDO::PARAM_STR);
        $stmt->bindValue('rankingin',$rankingin,PDO::PARAM_STR);
        $stmt->execute();
    }elseif ($_POST['type']==='update') {
        $stmt=$pdo->prepare("UPDATE paiza SET ranks=:ranks,num=$num,scores=$scores,avescores=$avescores,answertimeH=$answertimeH,answertimeT=$answertimeT,answertimeS=$answertimeS,aveanswertimeH=$aveanswertimeH,aveanswertimeT=$aveanswertimeT,aveanswertimeS=$aveanswertimeS,parameter=$parameter,rankingin=:rankingin,ranking=$ranking,CorrentAnswerRate=$CorrentAnswerRate WHERE id=$id");
        $stmt->bindValue('ranks',$ranks,PDO::PARAM_STR);
        $stmt->bindValue('rankingin',$rankingin,PDO::PARAM_STR);
        $stmt->execute();
    }
}else {
    echo $message;
    echo PHP_EOL;
    echo '<a href="entryform.php">エントリーフォームへ戻る</a>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../paiza.php">戻る</a>
</body>
</html>