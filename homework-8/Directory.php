<?php

$dir = new DirectoryIterator("path");
foreach ($dir as $item) {
echo $item . "<br>";
}