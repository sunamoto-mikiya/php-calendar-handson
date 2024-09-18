<?php

// クエリパラメータから年と月を取得
$paramYear = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1900, 'max_range' => 2100]
]);
$paramMonth = filter_input(INPUT_GET, 'month', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 12]
]);
// バリデーションが失敗した場合のエラーハンドリング
if ($paramYear === false || $paramMonth === false) {
    echo "無効な年または月が指定されました。デフォルト値に戻ります。";
    $defaultYear = date('Y');
    $defaultMonth = date('n');
    header("Location: ?year=$defaultYear&month=$defaultMonth");
    exit();
}


$calendarDays = getMonth($paramYear, $paramMonth);
// 指定された年と月の日付を取得する関数
function getMonth($paramYear, $paramMonth)
{
    $firstDay = new DateTime("$paramYear-$paramMonth-01");
    $lastDay = (clone $firstDay)->modify('last day of this month');
    $calendarDays = getCalendarDays($firstDay, $lastDay);
    while ($firstDay <= $lastDay) {
        array_push($calendarDays, $firstDay->format('j'));
        $firstDay->modify('+1 day');
    }
    return $calendarDays;
}

function prevMonth()
{
    if (isset($_GET['month'])) {
        $displayYear = $_GET['year'];
        $displayMonth = $_GET['month'];
    } else {
        $displayYear = date('Y');
        $displayMonth = date('n');
    }
    // 1月の前は12月に設定
    if ($displayMonth == '1') {
        $displayYear--;
        $displayMonth = 12;
    } else {
        $displayMonth--;
    }
    return "index.php?year=$displayYear&month=$displayMonth";
}

function nextMonth()
{
    if (isset($_GET['month'])) {
        $displayYear = $_GET['year'];
        $displayMonth = $_GET['month'];
    } else {
        $displayYear = date('Y');
        $displayMonth = date('n');
    }
    // 12月の次は1月に設定
    if ($displayMonth == '12') {
        $displayYear++;
        $displayMonth = 1;
    } else {
        $displayMonth++;
    }
    return "index.php?year=$displayYear&month=$displayMonth";
}

// 月の日付を取得して配列にする関数
function getCalendarDays($firstDay, $lastDay)
{
    if ($firstDay->format('w') !== '0') {
        $calendarDays = array_fill(0, $firstDay->format('w'), '');
    } else {
        $calendarDays = [];
    }
    while ($firstDay <= $lastDay) {
        array_push($calendarDays, $firstDay->format('j'));
        $firstDay->modify('+1 day');
    }
    return $calendarDays;
}
