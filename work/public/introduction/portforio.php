<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>■ポートフォリオ</title>
  <link rel="stylesheet" href="../CSS/portforio.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script>
    function showClock() {
      let nowTime = new Date();
      let nowHour = nowTime.getHours();
      let nowMin  = nowTime.getMinutes();
      let nowSec  = nowTime.getSeconds();
      let msg = "現在時刻：" + nowHour + ":" + nowMin + ":" + nowSec;
      document.getElementById("realtime").innerHTML = msg;
    }
    setInterval('showClock()',1000);
  </script>
</head>
<body>
  <header>
    <div>
      <h1>ポートフォリオ</h1>
    </div>
    <div class="sp-menu">
      <span class="material-icons" id="open">menu</span>
    </div>
  </header>
  <div class="overlay">
    <span class="material-icons" id="close">close</span>
    <nav>
      <ul>
        <li><a href="career.php">career</a></li>
        <li><a href="job-career.php">job-career</a></li>
        <li><a href="self‐learning.php">self-learning</a></li>
      </ul>
    </nav>
  </div>
  <div class="loading"></div>
  <p id="realtime"></p>
  <!-- 時間があれば、定期的に実行するようシステムを調整 -->
  <div class="message">こんばんは</div>

  <script src="../JS/portforio.js"></script>
</body>
</html>