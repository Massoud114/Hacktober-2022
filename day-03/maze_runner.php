<?php


function maze_runner($maze, $directions): string
{
	$x = $y = 0;
	for ($i = 0; $i < count($maze); $i++) {
		if ($x = array_search(2, $maze[$i])) {
			$y = $i;
			break;
		}
	}

	foreach ($directions as $move) {
		switch ($move) {
			case 'N':
				$y--;
				break;
			case 'S':
				$y++;
				break;
			case 'E':
				$x++;
				break;
			case 'W':
				$x--;
		}

		if ($y < 0 or $y >= count($maze) or $x < 0 or $x >= count($maze[$y]) or $maze[$y][$x] == 1) {
			return 'Dead';
		} else if ($maze[$y][$x] == 3) {
			return 'Finish';
		}
	}

	return 'Lost';
}

$maze = [
	[1, 1, 1, 1, 1, 1, 1],
	[1, 0, 0, 0, 0, 0, 3],
	[1, 0, 1, 0, 1, 0, 1],
	[0, 0, 1, 0, 0, 0, 1],
	[1, 0, 1, 0, 1, 0, 1],
	[1, 0, 0, 0, 0, 0, 1],
	[1, 2, 1, 0, 1, 0, 1],
];

echo maze_runner($maze, ["N", "N", "N", "N", "N", "E", "E", "E", "E", "E"]) . " ==> Finish\n";
echo maze_runner($maze, ["N", "N", "N", "N", "N", "E", "E", "S", "S", "E", "E", "N", "N", "E"]) . " ==> Finish\n";
echo maze_runner($maze, ["N", "N", "N", "N", "N", "E", "E", "E", "E", "E", "W", "W"]) . " ==> Finish\n";

echo maze_runner($maze, ["N", "N", "N", "W", "W"]) . " ==> Dead\n";
echo maze_runner($maze, ["N", "N", "N", "N", "N", "E", "E", "S", "S", "S", "S", "S", "S"]) . " ==> Dead\n";

echo maze_runner($maze, ["N", "E", "E", "E", "E"]) . " ==> Lost\n";
