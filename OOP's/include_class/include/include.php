<?php

spl_autoload_register("callback");

function callback($callName)
{
    include('./classes/' . $callName . ".php");
}
