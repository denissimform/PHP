<?php

// whether the errors will be shown to the user or remain hidden
ini_set("display_errors", 1);

// which is used to find the errors encountered during the PHP startup sequence.
ini_set("display_startup_errors", 1);

// is a native PHP function that is used to show errors
// error_reporting(E_ALL);
error_log(E_ALL);
