<?php
function secToDay($secs)
{
	$days = floor($secs / 86400);
	$secs %= 86400;
	return $days;
}

try {
	$jsonData = json_decode($_POST['dataQuery'], true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
	echo $e;
}

$fullDate = DateTime::createFromFormat("m/d/Y", $jsonData['startData']);
$secondsInYear = strtotime($fullDate->format('Y'));

$depositTerm = $jsonData['term'];
$sumLastMonth = $jsonData['sum'];
$sumAdd = $jsonData['sumAdd'];
$percent = $jsonData['percent'] / 100;
$daysInYear = secToDay($secondsInYear);


for ($i = 0; $i < $depositTerm; $i++) {
	$daysInMonth = cal_days_in_month(
		CAL_GREGORIAN,
		$fullDate->format('m'),
		$fullDate->format('Y'));
	$sumN = $sumLastMonth + ($sumLastMonth + $sumAdd) * $daysInMonth * ($percent / $daysInYear);
	$sumLastMonth += $sumN;
	$fullDate->modify('+ 1 month');

}

$jsonNewData['sum'] = round($sumN);
try {
	$jsonStr = json_encode($jsonNewData, JSON_THROW_ON_ERROR);
	echo $jsonStr;
} catch (JsonException $e) {
	echo $e;
}




