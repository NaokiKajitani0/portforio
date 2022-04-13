<?php

require('../../../../app/function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
    <p>確認画面</p>
    <table>
        <tr>
            <th>ランク</th>
            <td><?php echo h($_POST["ranks"]) ;?></td>
        </tr>
        <tr>
            <th>問題No</th>
            <td><?php echo h($_POST["num"]); ?></td>
        </tr>
        <tr>
            <th>スコア</th>
            <td><?php echo h($_POST["scores"]); ?></td>
        </tr>
        <tr>
            <th>平均スコア</th>
            <td><?php echo h($_POST["avescores"]); ?></td>
        </tr>
        <tr>
            <th>解答時間</th>
            <td><?php echo h($_POST["answertime"]); ?></td>
        </tr>
        <tr>
            <th>平均解答時間</th>
            <td><?php echo h($_POST["aveanswertime"]); ?></td>
        </tr>
        <tr>
            <th>受験者数</th>
            <td><?php echo h($_POST["parameter"]); ?></td>
        </tr>
        <tr>
            <th>ランキングインしたかどうか</th>
            <td><?php echo h($_POST["rankingin"]); ?></td>
        </tr>
        <tr>
            <th>ランキング</th>
            <td><?php echo h($_POST["ranking"]); ?></td>
        </tr>
        <tr>
            <th>正解率</th>
            <td><?php echo h($_POST["CorrentAnswerRate"]); ?></td>
        </tr>
    </table>
    <p>こちらの内容で問題ないですか。</p>
    <form action="entry-close.php" method="POST">
        <select name="choice">
            <option value="OK" >OK</option>
            <option value="NO" >NO</option>
        </select>
        <input type="submit" value="送信">
        <input type="hidden" name="ranks" value=<?=filter_input(INPUT_POST,'ranks'); ?>>
        <input type="hidden" name="num" value=<?=filter_input(INPUT_POST,'num'); ?>>
        <input type="hidden" name="scores" value=<?=filter_input(INPUT_POST,'scores'); ?>>
        <input type="hidden" name="avescores" value=<?=filter_input(INPUT_POST,'avescores'); ?>>
        <input type="hidden" name="answertime" value=<?=filter_input(INPUT_POST,'answertime'); ?>>
        <input type="hidden" name="aveanswertime" value=<?=filter_input(INPUT_POST,'aveanswertime'); ?>>
        <input type="hidden" name="parameter" value=<?=filter_input(INPUT_POST,'parameter'); ?>>
        <input type="hidden" name="rankingin" value=<?=filter_input(INPUT_POST,'rankingin'); ?>>
        <input type="hidden" name="ranking" value=<?=filter_input(INPUT_POST,'ranking'); ?>>
        <input type="hidden" name="CorrentAnswerRate" value=<?=filter_input(INPUT_POST,'CorrentAnswerRate'); ?>>
        <input type="hidden" name="type" value=<?=filter_input(INPUT_POST,'type'); ?>>
        <?php if (!empty($_POST['id'])): ?>
            <input type="hidden" name="id" value=<?=filter_input(INPUT_POST,'id'); ?>>
        <?php endif; ?>
    </form>
</body>
</html>