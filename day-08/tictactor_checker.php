<?php
function is_solved(array $board): array|int
{
	if ($result = isPartiallySolved($board))
		return $result;

	//Let's turn the board
	$turnedBoard = [];

	for ($n = 0; $n < count($board); $n++) {
		$row = [];
		for ($i = 0; $i < count($board); $i++) {
			$row[$i] = $board[$i][$n];
		}
		$turnedBoard[] = $row;
	}
	if ($result = isPartiallySolved($turnedBoard))
		return $result;

	// Let's try diagonal 1
	$diagonal1 = [];
	for ($i = 0; $i < count($board); $i++) {
		$diagonal1[] = $board[$i][$i];
	}
	if (count(array_count_values($diagonal1)) == 1 and !in_array(0, $diagonal1)){
		return $diagonal1[0] == 1 ? 1 : 2;
	}

	// Let's try diagonal2
	$diagonal2 = [];
	for ($i = 0, $j = count($board) - 1; $i < count($board); $i++) {
		$diagonal2[] = $board[$i][$j];
		$j--;
	}
	if (count(array_count_values($diagonal2)) == 1 and !in_array(0, $diagonal2)){
		return $diagonal2[0] == 1 ? 1 : 2;
	}

	// Let's see if there is empty spot
	foreach ($board as $row){
		if (in_array(0, $row)){
			return -1;
		}
	}

	// Draw
	return 0;
}

function isPartiallySolved(array $board): bool|int
{
	foreach($board as $row){
		if (count(array_count_values($row)) == 1 and !in_array(0, $row)){
			return $row[0] == 1 ? 1 : 2;
		}
	}
	return false;
}

/*function printBoard(array $board): void
{
	echo "[\n";
	foreach ($board as $row)
	{
		echo "\t[" . implode(", ", $row) . "],\n";
	}
	echo "]";
}*/

var_dump(is_solved([
	[0, 0, 2],
	[0, 0, 0],
	[1, 0, 1],
]));
