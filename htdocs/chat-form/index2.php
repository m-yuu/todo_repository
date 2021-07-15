<?php
    if(!empty($_GET) && isset($_GET)){
        $text = $_GET["text"];
    }

    $dsn = 'mysql:dbname=chatform;host=localhost';
    $user = 'root';
    $password='nanki0735';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    $sql = 'INSERT INTO `chats` SET `content` = ?';
    $content[] =  $text;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($content);

    $stmt2 = $dbh->prepare('SELECT * FROM chats');
    $stmt2->execute();
    $records = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    var_dump($records);

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
    <form action="#" method="GET">
        <input type="text" name="text"><br>
        <input type="submit" value="送信ボタン">
    </form>
    <?php foreach($records as $record): ?>
    <div>
      <p><?php echo $record['content'];?></p>
    </div>
    <?php endforeach; ?>
</body>
</html>