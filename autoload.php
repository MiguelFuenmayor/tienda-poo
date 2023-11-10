<?php

spl_autoload_extensions(".php"); // comma-separated list

    function my_autoload ($pClassName) {
        include( "controllers/" . $pClassName . ".php");
    }
    spl_autoload_register("my_autoload");

