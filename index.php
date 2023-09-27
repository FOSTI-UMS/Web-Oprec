<?php

$status = "open";

if ($status == "open") {
    require('./homepage/opening.php');
} else if ($status == "closed") {
    require('./homepage/closing.php');
}

?>