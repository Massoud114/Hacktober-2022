<?php

function encryptWord(string $word) : string
{
	$asciiWord = [];
	for ($i = 0; $i < strlen($word); $i++) {
		if ($i == 0)
			$asciiWord[] = ord($word[$i]);
		else if ($i == 1)
			$asciiWord[] = $word[strlen($word) - 1];
		else if ($i == (strlen($word) - 1))
			$asciiWord[] = $word[1];
		else
			$asciiWord[] = $word[$i];
	}
	return implode('', $asciiWord);
}

function encryptThis(string $text): string
{
	$words = [];
	foreach (explode(' ', $text) as $word){
		$words[] = encryptWord($word);
	}
	return implode(' ', $words);
}
echo encryptThis('A wise old owl lived in an oak');
