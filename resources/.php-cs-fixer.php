<?php

/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:3.65.0|configurator
 * you can change this configuration by importing this file.
 */
$config = new PhpCsFixer\Config();

return $config
    ->setParallelConfig(new PhpCsFixer\Runner\Parallel\ParallelConfig(2, 20))
    ->setCacheFile(__DIR__ . "/.php-cs-fixer.cache")
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in([__DIR__ . "/../src", __DIR__ . "/../tests"])
            ->exclude([__DIR__ . "/../var", __DIR__ . "/../vendor"])
            ->append([])
    );
