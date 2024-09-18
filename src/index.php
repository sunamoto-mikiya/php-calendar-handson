<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php require_once('calendar.php') ?>
    <?php date_default_timezone_set('Asia/Tokyo'); ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calendar</title>
    <link rel="stylesheet" href="./stylesheet.css" />
</head>

<body>
    <div class="content">
        <h2>
            <h2>
                <a href=<?= prevMonth() ?>>&lt;</a>
                <span class="mx-3">
                    <?php echo "{$paramYear}年{$paramMonth}月" ?>
                </span>
                <a href=<?= nextMonth() ?>>&gt;</a>
            </h2>
            <table>
                <tr class="day_of_week">
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                    <th>日</th>
                </tr>
                <tr>
                    <?php $count = 1 ?>
                    <?php foreach ($calendarDays as $key => $value) : ?>
                        <td><?php echo $value ?></td>
                        <!-- 横にセルが7個並んだら改行する -->
                        <?php if ($count % 7 === 0) : ?>
                </tr>
            <?php endif ?>
            <?php $count++ ?>
        <?php endforeach; ?>
            </table>
            <div class="select_feeling">
                <div class="feeling_set">
                    <a>😁</a>
                    <div class="input_feel_label">
                        <input type="radio" id="good" value="good" name="feel" checked />
                        <label for="good">良い</label>
                    </div>
                </div>
                <div class="feeling_set">
                    <a>😑</a>
                    <div class="input_feel_label">
                        <input type="radio" id="normal" value="normal" name="feel" />
                        <label for="normal">普通</label>
                    </div>
                </div>
                <div class="feeling_set">
                    <a>😭</a>
                    <div class="input_feel_label">
                        <input type="radio" id="bad" value="bad" name="feel" />
                        <label for="bad">悪い</label>
                    </div>
                </div>
            </div>
    </div>
    <script src="./calendar.js"></script>
</body>
<?php ob_end_flush(); ?>

</html>
