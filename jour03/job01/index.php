<?php
    $n1 = 200;
    $n2 = 204;
    $n3 = 173;
    $n4 = 98;
    $n5 = 171;
    $n6 = 404;
    $n7 = 459;

    for ($i = 1; $i <= 7; $i++) {
        $value = ${"n" . $i};

        if ($value % 2 == 0) {
            echo "$value est paire <br/>";
        } else {
            echo "$value est impaire <br/>";
        }
    }
    ?>