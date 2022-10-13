<?php
function generateHashtag($str): string
{
	$hashtag = implode(array_map(function ($word) {
		return ucfirst(trim($word));
	}, explode(' ', $str)));
	return empty($str) || empty($hashtag) || strlen($hashtag) > 139 ? false : "#" . $hashtag;
}


echo false == generateHashtag(''); // 'Expected an empty string to return false'
echo false == generateHashtag(str_repeat(' ', 200)); // "Still an empty string";
echo '#Codewars' == generateHashtag('Codewars'); // 'Should handle a single word and add a hashtag at the beginning.';
echo '#Codewars' == generateHashtag('Codewars      '); // 'Should handle trailing whitespace.';
echo '#CodewarsIsNice' == generateHashtag('Codewars Is Nice'); // 'Should remove spaces.';
echo '#CodewarsIsNice' == generateHashtag('codewars is nice'); // 'Should capitalize first letters of words.';
echo '#CodeWars' == generateHashtag('Code' . str_repeat(' ', 140) . 'wars');
echo false == generateHashtag('Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Cat'); // 'Should return false if the final word is longer than 140 chars.'
echo "#A" . str_repeat("a", 138) == generateHashtag(str_repeat("a", 139)); // "Should work";
echo false == generateHashtag(str_repeat("a", 140)); // "Too long";
