<?php

function dirReduc(array $arr): array
{
	$isReductible = true;
	$opposite = [
		"NORTH" => "SOUTH",
		"SOUTH" => "NORTH",
		"EAST" => "WEST",
		"WEST" => "EAST",
	];

	while ($isReductible) {
		$isReductible = false;
		foreach (array_keys($opposite) as $direction) {
			for ($i = 0; $i < count($arr) - 1; $i++) {
				if ($arr[$i] == $direction and $arr[$i + 1] == $opposite[$direction]) {
					$arr[$i] = "NONE";
					$arr[$i + 1] = "NONE";
					$isReductible = true;
				}
			}
		}
		$reduc = [];
		foreach ($arr as $direction) {
			if (in_array($direction, array_keys($opposite))) {
				$reduc[] = $direction;
			}
		}
		$arr = $reduc;
	}

	return $arr;
}

//dirReduc(["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST"]);
echo dirReduc(["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST"]) == ["WEST"];
echo dirReduc(["NORTH","SOUTH","SOUTH","EAST","WEST","NORTH"]) == [];
echo dirReduc(["NORTH","SOUTH","SOUTH","EAST","WEST","NORTH","NORTH"]) == ["NORTH"];
