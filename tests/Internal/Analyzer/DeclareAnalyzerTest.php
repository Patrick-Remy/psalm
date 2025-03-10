<?php

declare(strict_types=1);

namespace Psalm\Tests\Internal\Analyzer;

use Psalm\Tests\TestCase;
use Psalm\Tests\Traits\InvalidCodeAnalysisTestTrait;
use Psalm\Tests\Traits\ValidCodeAnalysisTestTrait;

final class DeclareAnalyzerTest extends TestCase
{
    use ValidCodeAnalysisTestTrait;
    use InvalidCodeAnalysisTestTrait;

    public function providerValidCodeParse(): iterable
    {
        yield 'declareStrictTypes1' => [
            'code' => <<<'PHP'
            <?php declare(strict_types=1);
            PHP,
        ];

        yield 'declareStrictTypes0' => [
            'code' => <<<'PHP'
            <?php declare(strict_types=0);
            PHP,
        ];

        yield 'declareTicks' => [
            'code' => <<<'PHP'
            <?php declare(ticks=5);
            PHP,
        ];

        yield 'declareEncoding' => [
            'code' => <<<'PHP'
            <?php declare(encoding='ISO-8859-1');
            PHP,
        ];
    }

    public function providerInvalidCodeParse(): iterable
    {
        yield 'declareUnknownDirective' => [
            'code' => <<<'PHP'
            <?php declare(whatever=123);
            PHP,
            'error_message' => 'UnrecognizedStatement',
        ];

        yield 'declareUnknownValueForStrictTypes' => [
            'code' => <<<'PHP'
            <?php declare(strict_types='forty-two');
            PHP,
            'error_message' => 'UnrecognizedStatement',
        ];

        yield 'declareInvalidValueForTicks' => [
            'code' => <<<'PHP'
            <?php declare(ticks='often');
            PHP,
            'error_message' => 'UnrecognizedStatement',
        ];

        yield 'declareInvalidValueForEncoding' => [
            'code' => <<<'PHP'
            <?php declare(encoding=88591);
            PHP,
            'error_message' => 'UnrecognizedStatement',
        ];
    }
}
