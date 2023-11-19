<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\ArrayPushFixer;
use PhpCsFixer\Fixer\Basic\CurlyBracesPositionFixer;
use PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer;
use PhpCsFixer\Fixer\Casing\LowercaseStaticReferenceFixer;
use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer;
use PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer;
use PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleTraitInsertPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededCurlyBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\LambdaNotUsedImportFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnneededImportAliasFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\IsNullFixer;
use PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer;
use PhpCsFixer\Fixer\Naming\NoHomoglyphNamesFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\NoUselessNullsafeOperatorFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoEmptyReturnFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimConsecutiveBlankLineSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer;
use PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer;
use PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SpaceAfterSemicolonFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\Strict\StrictParamFixer;
use PhpCsFixer\Fixer\StringNotation\SimpleToComplexStringVariableFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer;
use PhpCsFixer\Fixer\Whitespace\CompactNullableTypehintFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesInsideParenthesisFixer;
use PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer;
use PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer;
use PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer;
use PhpCsFixerCustomFixers\Fixer\ConstructorEmptyBracesFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer;
use PhpCsFixerCustomFixers\Fixer\PromotedConstructorPropertyFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer;
use PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/app',
    ]);

    $ecsConfig->skip([
        // directories to skip
    ]);

    // this way you add a single rule
    $ecsConfig->rules([
        NoUnusedImportsFixer::class,
        OrderedImportsFixer::class,
        NoLeadingImportSlashFixer::class,
        NoUnneededImportAliasFixer::class,
        ArrayPushFixer::class,
        CurlyBracesPositionFixer::class,
        SingleSpaceAfterStatementFixer::class,
        SingleSpaceBeforeStatementFixer::class,
        BlankLineBeforeStatementFixer::class,
        SingleBlankLineAtEofFixer::class,
        ConstructorEmptyBracesFixer::class,
        SingleClassElementPerStatementFixer::class,
        SingleTraitInsertPerStatementFixer::class,
        NewWithBracesFixer::class,
        StandardizeIncrementFixer::class,
        SelfAccessorFixer::class,
        MagicConstantCasingFixer::class,
        NoUselessElseFixer::class,
        PhpdocTrimConsecutiveBlankLineSeparationFixer::class,
        PhpdocTrimFixer::class,
        NoEmptyPhpdocFixer::class,
        PhpdocNoEmptyReturnFixer::class,
        PhpdocIndentFixer::class,
        MethodChainingIndentationFixer::class,
        FunctionTypehintSpaceFixer::class,
        NoBlankLinesAfterClassOpeningFixer::class,
        NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
        PhpdocSingleLineVarSpacingFixer::class,
        NoLeadingNamespaceWhitespaceFixer::class,
        NoSpacesAroundOffsetFixer::class,
        NoWhitespaceInBlankLineFixer::class,
        ReturnTypeDeclarationFixer::class,
        SpaceAfterSemicolonFixer::class,
        TernaryOperatorSpacesFixer::class,
        MethodArgumentSpaceFixer::class,
        IsNullFixer::class,
        StrictParamFixer::class,
        NoEmptyStatementFixer::class,
        NoUnneededControlParenthesesFixer::class,
        NoUnneededCurlyBracesFixer::class,
        CastSpacesFixer::class,
        VoidReturnFixer::class,
        NoExtraBlankLinesFixer::class,
        NullableTypeDeclarationForDefaultNullValueFixer::class,
        PromotedConstructorPropertyFixer::class,
        StringableInterfaceFixer::class,
        VisibilityRequiredFixer::class,
        LowercaseCastFixer::class,
        LowercaseStaticReferenceFixer::class,
        CompactNullableTypehintFixer::class,
        ShortScalarCastFixer::class,
        CleanNamespaceFixer::class,
        UnaryOperatorSpacesFixer::class,
        NoUselessParenthesisFixer::class,
        NoSpacesInsideParenthesisFixer::class,
        ObjectOperatorWithoutWhitespaceFixer::class,
        FunctionDeclarationFixer::class,
        SimpleToComplexStringVariableFixer::class,
        NoEmptyCommentFixer::class,
        MagicMethodCasingFixer::class,
        NativeFunctionCasingFixer::class,
        LambdaNotUsedImportFixer::class,
        NoHomoglyphNamesFixer::class,
        NoUselessNullsafeOperatorFixer::class,
        NoUselessReturnFixer::class,
        StatementIndentationFixer::class,
        NoTrailingCommaInSinglelineFixer::class,
        StrictComparisonFixer::class
    ]);

    // this way you can add sets - group of rules
    $ecsConfig->sets([
        // run and fix, one by one
        SetList::PSR_12,
    ]);

    $ecsConfig->ruleWithConfiguration(SingleClassElementPerStatementFixer::class, ['elements' => ['const', 'property']]);
    $ecsConfig->ruleWithConfiguration(TrailingCommaInMultilineFixer::class, [
        "elements" => [
            "arrays",
            "parameters",
            "arguments",
            "match",
        ]]);
    $ecsConfig->ruleWithConfiguration(BlankLineBeforeStatementFixer::class, [
        "statements" => [
            "break",
            "continue",
            "declare",
            "return",
            "throw",
            "try",
            "if",
            "do",
            "for",
            "foreach",
            "while",
        ]]);
};
