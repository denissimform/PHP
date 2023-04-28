<?php
echo "<pre>";

/**************** arry_change_key_case *******************/
// $arr = ["name" => "Denis", "surname" => "Shingala"];
// print_r(array_change_key_case($arr, CASE_UPPER));
/*
Array
(
    [NAME] => Denis
    [SURNAME] => Shingala
)
*/

/**************** arry_chunk *******************/
// $arr = [1, 2, 3, 4, 5, 6, 7];
// $arr1 = [1];
// $arr2 = [2, 1];
// $arr3 = [5, 1];
// $arr4 = [6, 1];
// print_r(array_diff_assoc($arr, $arr1));
// print_r(array_diff($arr, $arr1, $arr2, $arr3, $arr4));
// print_r(array_intersect($arr, $arr1, $arr2));

// $arr1 = [
//     "color" => "green",
//     "name" => [
//         "person1" => "Denis",
//         "person2" => "Yash",
//         "person3" => "Mehul"
//     ],
//     "age" => [
//         "person1" => 21,
//         "person2" => 19,
//         "person3" => 21
//     ]
// ];

// $arr2 = [
//     "color" => "yellow",
//     "name" => [
//         "person1" => "Harshil",
//     ],
//     "age" => [
//         "person1" => 22
//     ]
// ];

// print_r(array_merge_recursive($arr1, $arr2));
// print_r(array_merge($arr1, $arr2));

// $arr1 = [
//     "color",
//     "name",
//     "age"
// ];

// $arr2 = [
//     "yellow",
//     "Harshil",
//     22
// ];

// print_r(array_combine($arr1, $arr2));


// $input = array(12, 10, 9, 15, 18);
// print_r($input);

// $result = array_pad($input, 5, 0);
// print_r($result);

// $result = array_pad($input, -7, -1);
// print_r($result);

// $result = array_pad($input, 16, "noop");
// print_r($result);

// $a = array(2, 4, 6, 8);
// echo "product(a) = " . array_product($a) . "\n";
// echo "product(array()) = " . array_product(array()) . "\n";
// echo "product(['Denis', 'Shingala']) = " . array_product(['Denis', 'Shingala']) . "\n";

// $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
// $rand_keys = array_rand($input, 2);
// print_r($rand_keys);

// function my_fn($value)
// {
//     echo $value . "<br>";
//     return $value == 1;
// }

// $entry = [
//     0 => 'foo',
//     1 => true,
//     2 => -1,
//     3 => null,
//     4 => '',
//     5 => '1',
//     6 => 0,
// ];

// function my_function($value, $key)
// {
//     return $value == "Denis" || $key == "surname" || $key=="1";
// }
// $arr = [
//     "name" => 'Denis',
//     "surname" => "Shingala",
//     1, 2, 3, 4, 5
// ];
// print_r(array_filter($arr, "my_function", ARRAY_FILTER_USE_BOTH));
// print_r(array_filter($entry, "my_fn", 0));

// function my_function($value)
// {
//     return $value == "Denis" ? true : $value;
// }
// $arr = [
//     "name" => 'Denis',
//     "surname" => "Shingala",
//     1, 2, 3, 4, 5
// ];
// print_r(array_map("my_function", $arr));

// $arr = [
//     "name" => "Denis",
//     "surname" => "Shingala",
//     "age" => 21,
//     1 => 1, 2 => 2, 3 => 3, 1 => 3
// ];

// print_r(array_reverse($arr));
// print_r(array_reverse($arr, true));

// print_r(["name" => "Denis", "name" => "denis"]);

// echo array_search("3", $arr, false);

// $arr = [0,1,2,3,4,5,6,7];

// $output = array_slice($arr, 2);
// $output = array_slice($arr, -2, 1);
// $output = array_slice($arr, 0, 3);

// // note the differences in the array keys
// print_r(array_slice($arr, 2, -4));
// print_r(array_slice($arr, 2, -1, true));

// $input = array("red", "green", "blue", "yellow");
// array_splice($input, 2);
// var_dump($input);

// $input = array("red", "green", "blue", "yellow");
// array_splice($input, 1, -1);
// var_dump($input);

// $input = array("red", "green", "blue", "yellow");
// array_splice($input, 1, count($input), "orange");
// var_dump($input);

// $input = array("red", "green", "blue", "yellow");
// print_r(array_splice($input, -1, 1, array("black", "maroon")));
// var_dump($input);

// $arr = [1,2,3,4,5,6];
// array_unshift($arr,"3");
// print_r($arr);

// $arr = [
//     "name" => 'Denis',
//     "surname" => "Shingala",
//     "education" => [
//         "SSC" => "Shishu vihar vidhyalaya",
//         "HSC" => "T & T.V. Sarvajanik vidhyalaya",
//         "Graduation" => "VGEC"
//     ]
// ];

// function my_function($value, $key, $prefix)
// {
//     echo $key . " $prefix " . $value . '<br>';
// }

// array_walk_recursive($arr, "my_function", ":");
// array_walk($arr, "my_function", ":");

// echo "********** asort **********<br>";
// $arr = [0 => 0, 2 => 1, 1 => 2, 4 => 3, 3 => 4, "nickname" => "Denis", "name" => "Denis","surname" => "Shingala", "brother" => "Keyur"];
// asort($arr);
// print_r($arr);

// echo "********** ksort **********<br>";
// $arr = [0 => 0, 2 => 1, 1 => 2, 4 => 3, 3 => 4, "name" => "Denis", "surname" => "Shingala", "brother" => "Keyur"];
// ksort($arr);
// print_r($arr);

// echo "********** sort **********<br>";
// $arr = [0 => 0, 2 => 1, 1 => 2, 4 => 3, 3 => 4, "name" => "Denis", "surname" => "Shingala", "brother" => "Keyur"];
// sort($arr);
// print_r($arr);

// echo "********** arsort **********<br>";
// $arr = [0 => 0, 2 => 1, 1 => 2, 4 => 3, 3 => 4, "name" => "Denis", "surname" => "Shingala", "brother" => "Keyur"];
// arsort($arr);
// print_r($arr);

// echo "********** krsort **********<br>";
// $arr = [0 => 0, 2 => 1, 1 => 2, 4 => 3, 3 => 4, "name" => "Denis", "surname" => "Shingala", "brother" => "Keyur"];
// krsort($arr);
// print_r($arr);

// echo "********** rsort **********<br>";
// $arr = [0 => 0, 2 => 1, 1 => 2, 4 => 3, 3 => 4, "name" => "Denis", "surname" => "Shingala", "brother" => "Keyur"];
// rsort($arr);
// print_r($arr);

// $city  = "San Francisco";
// $state = "CA";
// $event = "SIGGRAPH";

// $location_vars = array("city", "state");

// $result = compact("event", $location_vars);
// print_r($result);

// $arr = [0, 1, 2, 3, 4, 5];
// print_r($arr);
// echo (current($arr)) . "<br>";
// echo (current($arr)) . "<br>";
// echo (next($arr)) . "<br>";
// echo (current($arr)) . "<br>";
// echo (end($arr)) . "<br>";
// echo (current($arr)) . "<br>";
// echo (next($arr)) . "<br>";

// $arr = range(0, 10, 3);
// shuffle($arr);
// print_r($arr);

$arr = [0=>1, 2=>2, 1=>3, 5=>4];
asort($arr);
print_r($arr);
$arr = [0=>1, 2=>2, 1=>3, 5=>4];
sort($arr);
print_r($arr);
echo "</pre>";
