<?php
function statAssoc(string $string): string
{
	if (empty($string))
		return "";

	$resultsInSeconds = array_map(function ($result) {
		return getSeconds(trim($result));
	}, explode(',', $string));

	$nbResults = count($resultsInSeconds);
	$mid = intdiv($nbResults, 2);

	$range = max($resultsInSeconds) - min($resultsInSeconds);

	$average = array_sum($resultsInSeconds) / $nbResults;

	$sortedResults = array_map(function ($result) {
		return $result;
	}, $resultsInSeconds);
	sort($sortedResults);

	if ($nbResults % 2){
		$median = $sortedResults[$mid];
	} else {
		$median = ($sortedResults[$mid - 1] + $sortedResults[$mid]) / 2;
	}

	return "Range: " . getHourFormat($range) . " Average: " . getHourFormat($average) . " Median: " . getHourFormat($median);
}

function getSeconds($string): int
{
	$string = explode('|', $string);
	return (((intval($string[0]) * 60) + intval($string[1])) * 60) + intval($string[2]);
}

function getHourFormat($seconds): string
{
	$second = str_pad((string)$seconds % 60, 2, "0", STR_PAD_LEFT);
	$minute = str_pad((string)(($seconds - $second) / 60) % 60, 2, "0", STR_PAD_LEFT);
	$hour = str_pad((string)intdiv((($seconds - $second) / 60), 60), 2, "0", STR_PAD_LEFT);
	return "$hour|$minute|$second";
}


echo statAssoc("01|15|59, 1|47|16, 01|17|20, 1|32|34, 2|17|17") == "Range: 01|01|18 Average: 01|38|05 Median: 01|32|34";
echo statAssoc("02|15|59, 2|47|16, 02|17|20, 2|32|34, 2|17|17, 2|22|00, 2|31|41") == "Range: 00|31|17 Average: 02|26|18 Median: 02|22|00";
