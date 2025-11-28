<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/routes',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setRules([
        '@PSR12'                   => true,
        'array_syntax'             => ['syntax' => 'short'],
        'ordered_imports'          => ['sort_algorithm' => 'alpha'],
        'no_unused_imports'        => true,
        'no_extra_blank_lines'     => true,
        'single_quote'             => true,
        'trailing_comma_in_multiline' => ['after_heredoc' => true],
        'binary_operator_spaces'   => ['default' => 'align_single_space'],
        'phpdoc_align'             => ['align' => 'left'],
        'phpdoc_order'             => true,
    ])
    ->setFinder($finder);
