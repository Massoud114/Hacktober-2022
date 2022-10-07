<?php

function pyramid(int $number): array
{
	$pyramid = [];
	for ($i = 1; $i <= $number; $i++) {
		$sub_array = [];
		for ($j = 0; $j < $i; $j++) {
			$sub_array[] = 1;
		}
		$pyramid[] = $sub_array;
	}
	return $pyramid;
}

var_dump(pyramid(0));
