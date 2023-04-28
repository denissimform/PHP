<?php

/*
strlen() - Returns the length of a string
substr() - Returns a substring from a string
strpos() - Searches for a string inside another string and returns the position of the first occurrence
str_replace() - Replaces all occurrences of a string with another string
strtolower() - Converts a string to lowercase
strtoupper() - Converts a string to uppercase
ucfirst() - Converts the first character of a string to uppercase
ucwords() - Converts the first character of each word in a string to uppercase
str_split() - Splits a string into an array of characters
str_repeat() - Repeats a string a specified number of times
strrev() - Reverses a string
trim() - Removes whitespace and other specified characters from the beginning and end of a string
ltrim() - Removes whitespace and other specified characters from the beginning of a string
rtrim() - Removes whitespace and other specified characters from the end of a string
nl2br() - Inserts HTML line breaks before all newlines in a string
htmlspecialchars() - Converts special characters to HTML entities
htmlentities() - Converts all applicable characters to HTML entities
md5() - Calculates the MD5 hash of a string
explode() - Splits a string into an array using a specified delimiter
implode() - Joins array elements with a string
sprintf() - Formats a string using placeholders
printf() - Outputs a formatted string
strcasecmp() - Compares two strings (case-insensitive)
strcmp() - Compares two strings (case-sensitive)
strnatcmp() - Compares two strings using a natural order algorithm
str_shuffle() - Randomly shuffles a string
addcslashes() - Adds slashes to specified characters in a string
stripslashes() - Removes slashes from a string
strip_tags() - Removes HTML and PHP tags from a string
str_pad() - Pads a string with another string to a specified length
wordwrap() - Wraps a string to a specified number of characters
lcfirst() - Converts the first character of a string to lowercase
chunk_split() - Splits a string into smaller chunks with a specified length
str_word_count() - Counts the number of words in a string
str_ireplace() - Replace all occurrences of the search string with the replacement string
stristr() - Finds the first occurrence of a string inside another string, ignoring case
strripos() - Find the position of the last occurrence of a case-insensitive substring in a string
*/


$str = "This is denis shingala";
echo $str . "<br>";
echo "Length is: " . strlen($str) . "<br>";

echo "Substring(str, 0, 7): " . substr($str, 0, 7) . "<br>";
echo "Substring(str, -6, -2): " . substr($str, -6, -2) . "<br>";
echo "Substring(str, -6, 4): " . substr($str, -6, 4) . "<br>";

echo "strpos(str,'is denis',start_index): " . strpos($str, "is denis") . "<br>";
echo "str_replace('denis', 'yash', str, count): " . str_replace('denis', 'yash', $str, $i) . "<br>";
echo "Replacement: $i <br>";
echo "strtolower(str): " . strtolower($str) . '<br>';
echo "strtoupper(str): " . strtoupper($str) . '<br>';

echo "ucfirst(str): " . ucfirst($str) . "<br>";
echo "ucwords(str): " . ucwords($str) . "<br>";

print_r(str_split($str, 2));
echo '<br>';
echo str_repeat($str, 2) . '<br>';

echo strrev($str) . '<br>';

echo trim($str, "This") . '<br>';
echo rtrim($str, "This") . '<br>';
echo ltrim($str, "This") . '<br>';

echo nl2br("Hii buddy!!\nThis is '\\n'for me!!"); 