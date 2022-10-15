<?php

function convertFrac(array $list): string
{
	$denominators = array_product(array_map(function ($array) { return $array[1]; }, $list));
	$list = array_map(function ($array) use ($denominators) {
		return [$array[0] * $denominators / $array[1], $denominators];
	}, $list);

	$isReductible = true;
	$i = 2;
	while ($i < $denominators) {
		$isReductible = (!($denominators % $i) and array_sum(array_map(function ($frac) use ($i) { return $frac[0] % $i; }, $list)) == 0) ? true : false;

		if ($isReductible) {
			$list = array_map(function ($array) use ($i) {
				return [$array[0] / $i, $array[1] / $i];
			}, $list);
			$denominators = $denominators / $i;
			$i = 2;
		} else {
			$i++;
		}
	}

	$result = "";
	foreach ($list as $frac){
		$result .= "(" . implode(',', $frac) . ")";
	}

	return $result;
}

echo convertFrac([[1, 2], [1, 3], [1, 4]]) == '(6,12)(4,12)(3,12)';
echo convertFrac([[69, 130], [87, 1310], [3, 4]]) == '(18078,34060)(2262,34060)(25545,34060)';
echo convertFrac([]) == '';
echo convertFrac([[77, 130], [84, 131], [3, 4]]) == '(20174,34060)(21840,34060)(25545,34060)';

//var_dump(convertFrac([[1, 2], [1, 3], [1, 4]]));
//echo convertFrac([[77, 130], [84, 131], [3, 4]]);
/*
1 / 2    12 / 24
1 / 3    8  / 24
1 / 4    6  / 24

24

40 80 125 ==
*/
