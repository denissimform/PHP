<?php

echo "<h2>File Management in PHP</h2><br>";
// $f = fopen('./files/file.txt', "r");

// while (!feof($f)) {
//     echo fgets($f) . "<br>";
// }
// fseek($f, 0);

// while (!feof($f)) {
//     echo fgetc($f);
// }
// $f = fopen("./files/file-dg.txt", 'a');

// $f = fopen("./files/file.txt", 'w+');
// fwrite($f, "This is first line!!<br>\n");
// fseek($f, 0);
// $content = fread($f, filesize('./files/file.txt'));
// echo $content;
// fclose($f);

// $f = fopen("./files/file.txt", 'a+');
// fwrite($f, "This is second line!!<br>\n");
// // print_r(stat('./files/file.txt'));
// // clearstatcache();
// // print_r(stat('./files/file.txt'));
// fseek($f, 0);
// $content = fread($f, strlen(file_get_contents('./files/file.txt')));
// echo $content;
// fclose($f);

// readfile('./files/file.txt');
// echo strlen(file_get_contents('./files/file.txt'));
// file_put_contents("./files/file.txt", "That's idea!!");
// echo file_get_contents('./files/file.txt') . "<br>";

// unlink('./files/file-dg.txt');

readfile('./files/file.txt');
echo readlink('./files/file-sym.txt');
echo "<br>";
if (file_exists('./files/file1.txt')) {
    echo 'File is exists!!';
} else {
    echo 'File is not exists!!';
}
echo "<br>";
$filename = './files/file.txt';
if (file_exists($filename)) {
    echo "Last accessed: " . date("F d Y H:i:s.", fileatime($filename)) . "<br>";
    echo "Last changed: " . date("F d Y H:i:s.",filectime($filename)) . "<br>";
    echo "Group of file: " . filegroup($filename) . "<br>";
    echo "File inode: " . date("F d Y H:i:s.",fileinode($filename)) . "<br>";
    echo "File modified time: " . date("F d Y H:i:s.",filemtime($filename)) . "<br>";
    echo "File permission: " . fileperms($filename) . "<br>";
}

echo move_uploaded_file('./files/file.txt', './file/');

