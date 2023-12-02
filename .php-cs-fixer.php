<?php

declare(strict_types=1);

use PhpCsFixerCustomFixers\Fixer\ConstructorEmptyBracesFixer;
use PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer;
use PhpCsFixerCustomFixers\Fixer\NoCommentedOutCodeFixer;
use PhpCsFixerCustomFixers\Fixer\NoDoctrineMigrationsGeneratedCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoLeadingSlashInGlobalNamespaceFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessDoctrineRepositoryCommentFixer;
use PhpCsFixerCustomFixers\Fixer\PromotedConstructorPropertyFixer;
use PhpCsFixerCustomFixers\Fixer\ReadonlyPromotedPropertiesFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer;
use PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['bootstrap', 'storage', 'vendor', 'public', 'node_modules'])
    ->name('*.php')
    ->name('_ide_helper')
    ->notName('*.html.twig')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();

return $config
    ->registerCustomFixers(new PhpCsFixerCustomFixers\Fixers())
    ->setRiskyAllowed(true)
    ->setRules([
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sortAlgorithm' => 'alpha'],
        'no_unused_imports' => true,
        '@Symfony' => true,
        '@PSR12' => true,
        'blank_line_after_opening_tag' => true,
        'linebreak_after_opening_tag' => true,
        'simplified_if_return' => true,
        'simplified_null_return' => true,
        'blank_line_before_statement' => true,
        'concat_space' => ['spacing' => 'one'],
        'method_chaining_indentation' => true,
        'no_alternative_syntax' => true,
        'no_useless_else' => true,
        'single_line_throw' => false,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => false,
            'import_functions' => false,
        ],
        'fully_qualified_strict_types' => true,
        'declare_strict_types' => true,
        'nullable_type_declaration' => true,
        ConstructorEmptyBracesFixer::name() => false,
        MultilinePromotedPropertiesFixer::name() => true,
        NoCommentedOutCodeFixer::name() => true,
        NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
        NoLeadingSlashInGlobalNamespaceFixer::name() => true,
        NoUselessCommentFixer::name() => true,
        NoUselessDoctrineRepositoryCommentFixer::name() => true,
        PromotedConstructorPropertyFixer::name() => true,
        ReadonlyPromotedPropertiesFixer::name() => false,
        SingleSpaceAfterStatementFixer::name() => true,
        SingleSpaceBeforeStatementFixer::name() => true,
        StringableInterfaceFixer::name() => true,
    ])
    ->setFinder($finder);
