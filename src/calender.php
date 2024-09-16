<?php
// クエリパラメータから年と月を取得
$paramYear = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
$paramMonth = filter_input(INPUT_GET, 'month', FILTER_VALIDATE_INT);

// リクエストに基づくカレンダーの処理
if ($_SERVER['REQUEST_URI'] === '/index.php') {
    // カレンダーのタイトルとして表示用の変数
    $paramYear = date('Y');
    $paramMonth = date('n');
    $calendarDays = getThisMonth();
} elseif (checkDateRange($paramYear, $paramMonth)) {
    $calendarDays = getMonth($paramYear, $paramMonth);
} else {
    $calendarDays = getThisMonth();
    header('Location: index.php');
}

// 年と月の範囲が妥当であるかを検証する関数
function checkDateRange($year, $month)
{
    return ($year >= 1500 && $year <= 2100 && $month >= 1 && $month <= 12);
}

// 現在の年月を取得
$thisMonth = date('n');
$thisYear = date('Y');

// 前月・次月リンクの作成
$prevLink = prevMonth($thisMonth, $thisYear);
$nextLink = nextMonth($thisMonth, $thisYear);

// 現在の月の日付を取得する関数
function getThisMonth()
{
    $firstDay = new DateTime('first day of this month');
    $lastDay = new DateTime('last day of this month');

    $calendarDays = getCalendarDays($firstDay, $lastDay);
    return $calendarDays;
}

// 指定された年と月の日付を取得する関数
function getMonth($year, $month)
{
    $firstDay = new DateTime("$year-$month-01");
    $lastDay = (clone $firstDay)->modify('last day of this month');

    $calendarDays = getCalendarDays($firstDay, $lastDay);
    return $calendarDays;
}

// 月の日付を取得して配列にする関数
function getCalendarDays($firstDay, $lastDay)
{
    // 月の初めが日曜日でない場合空文字を追加
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

// 前月のリンクを作成する関数
function prevMonth($thisMonth, $thisYear)
{
    $displayMonth = $thisMonth;
    $displayYear = $thisYear;
    if (isset($_GET['month'])) {
        $displayMonth = $_GET['month'];
        $displayYear = $_GET['year'];
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

// 次月のリンクを作成する関数
function nextMonth($thisMonth, $thisYear)
{
    $displayMonth = $thisMonth;
    $displayYear = $thisYear;
    if (isset($_GET['month'])) {
        $displayMonth = $_GET['month'];
        $displayYear = $_GET['year'];
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

// 現在の月に戻るリンクを作成する関数
function moveThisMonth()
{
    return "index.php";
}
