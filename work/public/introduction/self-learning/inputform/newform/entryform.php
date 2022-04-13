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
    <h2>入力フォーム</h2>
    <form action="../confirm.php" method="post">
        <p>ランク</p>
        <select name="ranks" id="rank">
            <option value="ランクを選んでください">ランクを選択してください</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <p>問題No</p>
        <input type="number" name="num" step="1">
        <p>スコア</p>
        <input type="number" name="scores" step="1">
        <div class="error">整数のみ入力できます</div>
        <p>平均スコア</p>
        <input type="number" name="avescores" step="1">
        <div class="error">整数のみ入力できます</div>
        <p>解答時間</p>
        <input type="time" name="answertime" step="1">
        <p>平均解答時間</p>
        <input type="time" name="aveanswertime" step="1">
        <p>受験者数</p>
        <input type="number" name="parameter">
        <p>ランキングインしたかどうか</p>
        <select name="rankingin" id="rankingin">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <p>ランキング数</p>
        <input type="ranking" name="ranking">
        <p>正答率</p>
        <input type="number" name="CorrentAnswerRate">
        <br>
        <input type="submit" value="送信">
        <input type="hidden" name="type" value="create">
        <?php if (!empty($_POST['id'])): ?>
            <input type="hidden" name="id" value="<?=$_POST['id']; ?>"> 
        <?php endif; ?>
    </form>
</body>
</html>