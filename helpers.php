<?php declare(strict_types = 1);

use Matthewbdaly\Proper\Collection;

if (!function_exists('collect')) {
    function collect(array $items) {
        return Collection::make($items);
    }
}

if (!function_exists('dd')) {
    function dd($val) {
        var_dump($val);
        die();
    }
}
