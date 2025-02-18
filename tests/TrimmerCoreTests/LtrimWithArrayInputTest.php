<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class LtrimWithArrayInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  array  $input
     * @param  array  $expected
     * @return void
     */
    #[DataProvider('ltrimWithArrayInputProvider')]
    public function testLtrimWithArrayInput(array $input, array $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithArrayInputProvider(): array
    {
        return [
            [[' trimmerA '], ['trimmerA ']],
            [[' trimmerA ', [' trimmerB ']], ['trimmerA ', ['trimmerB ']]],
            [["\n trimmerA \t"], ["trimmerA \t"]],
            [["\n trimmerA \t", ["\n trimmerB \t"]], ["trimmerA \t", ["trimmerB \t"]]],
            [[' trimmerA ', 1, 1.0, true, null], ['trimmerA ', 1, 1.0, true, null]],
            [[' trimmerA ', [' trimmerB ', 1, 1.0, true, null]], ['trimmerA ', ['trimmerB ', 1, 1.0, true, null]]],
            [[1, 1.0, true, null], [1, 1.0, true, null]],
            [[1, 1.0, true, null, [1, 1.0, true, null]], [1, 1.0, true, null, [1, 1.0, true, null]]],
            [[], []],
            [[[]], [[]]],
        ];
    }
}
