<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php require_once('calender.php') ?>
    <?php date_default_timezone_set('Asia/Tokyo'); ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calendar</title>
    <link rel="stylesheet" href="./stylesheet.css" />
</head>

<body>
    <!-- ここにカレンダーのHTMLを書いてください -->
    <h1>Calendar</h1><script src="./calender.js"></script>
</body>
<?php ob_end_flush(); ?>

</html>
