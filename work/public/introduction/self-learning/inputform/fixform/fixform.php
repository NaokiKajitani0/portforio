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
    <form action="fixform2.php" method="post">
        <p>ランク</p>
        <select name="ranks" id="rank">
            <option value="ランクを選んでください">ランクを選択してください</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <input type="submit" value="送信">
    </form>
</body>
</html>