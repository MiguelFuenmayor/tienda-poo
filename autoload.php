<?php

spl_autoload_extensions(".php"); // comma-separated list

    function my_autoload ($pClassName) {
        include(__DIR__ . "/" . $pClassName . ".php");
    }
    spl_autoload_register("my_autoload");

