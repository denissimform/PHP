<?php

#  start session
if (!isset($_SESSION))
    session_start();

include('./Library/LinkedIn.php');

use LinkedIn\LinkedIn;

# create object for linkedin class
$obj = new LinkedIn("783znj6gyz3rma", "BVMC7dlbTJGd2K2u", "http://www.myphp.com/LinkedIn/action.php");

switch (true) {
    case isset($_GET['code']):
        # generate the token
        $token = $obj->generateToken($_GET['code']);

        # set it on session variable
        $_SESSION['token'] = $token;

        # get profile details
        $_SESSION['profile'] = $obj->getProfileData($token);

        # redirect on main page
        header("Location: ./index.php");
        break;

        # post normal text
    case (isset($_POST['post_text'])):
        $text = str_replace("\r\n", "\\n", $_POST['text']) . $_POST['tag'];
        $res = $obj->postTextOnLinkedIn($_SESSION['profile']['id'], $_SESSION['token'], $text);
        print_r($res);
        break;

        # post article
    case (isset($_POST['post_article'])):
        $text = str_replace("\r\n", "\\n", $_POST['text']) . $_POST['tag'];
        $res = $obj->postArticleOnLinkedIn($_SESSION['profile']['id'], $_SESSION['token'], $_POST);
        print_r($res);
        break;

        # post images
    case (isset($_POST['post_image'])):
        $text = str_replace("\r\n", "\\n", $_POST['text']) . $_POST['tag'];
        $res = $obj->postOnLinkedIn($_SESSION['profile']['id'], $_SESSION['token'], $_POST, $_FILES);
        print_r($res);
        break;
}
