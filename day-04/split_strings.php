<?php

function solution(string $str): array {
	$result = [];
	for ($i = 0; $i < strlen($str); $i++) {
		if (!($i % 2)){
	        $result[] = $str[$i] . ($i + 1 < strlen($str) ? $str[$i+1] : '_' );
		}
	}
	return $result;
}

var_dump(solution("abcdef") == ["ab", "cd", "ef"]);
var_dump(solution("abcdefg") == ["ab", "cd", "ef", "g_"]);
var_dump(solution("") == []);
