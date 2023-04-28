<?php

if (isset($_POST['submit'])) {
    $txt = $_POST['text'];
    $arr = array_flip(array_fill(97, 26, 0));
    foreach (count_chars($txt) as $key => $value) {
        if ($key >= 97 && $key <= 122) {
            echo chr($key) . "->" . $value . "<br>";
        }
    }
}
