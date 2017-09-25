<?php

namespace AppTest;

use App\TicTacToe;
use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /** @var  TicTacToe */
    private $testSubject;

    public function setUp()
    {
        $this->testSubject = new TicTacToe();
    }

    /**
     * @test
     * @dataProvider gameProvider
     *
     * @param array $gameState
     * @param string $player
     * @param bool $expected
     */
    public function itReturnsTheCorrectAnswer(array $gameState, string $player, bool $expected)
    {
        $this->assertEquals($expected, $this->testSubject->hasWon($gameState, $player));
    }

    public function gameProvider()
    {
        return [
            'horizontal 1'                                     => [
                [
                    ['x', 'x', 'x'],
                    ['', '', ''],
                    ['', '', ''],
                ],
                'x',
                true,
            ],
            'horizontal 2'                                     => [
                [
                    ['', '', ''],
                    ['x', 'x', 'x'],
                    ['', '', ''],
                ],
                'x',
                true,
            ],
            'horizontal 3'                                     => [
                [
                    ['', '', ''],
                    ['', '', ''],
                    ['x', 'x', 'x'],
                ],
                'x',
                true,
            ],
            "x doesn't have the pieces"                        => [
                [
                    ['x', '', ''],
                    ['', '', ''],
                    ['x', '', ''],
                ],
                'x',
                false,
            ],
            'vertical 1'                                       => [
                [
                    ['x', '', ''],
                    ['x', '', ''],
                    ['x', '', ''],
                ],
                'x',
                true,
            ],
            "vertical 2"                                       => [
                [
                    ['', 'x', ''],
                    ['', 'x', ''],
                    ['', 'x', ''],
                ],
                'x',
                true,
            ],
            "vertical 3"                                       => [
                [
                    ['', '', 'x'],
                    ['', '', 'x'],
                    ['', '', 'x'],
                ],
                'x',
                true,
            ],
            "diagonal 1"                                       => [
                [
                    ['x', '', ''],
                    ['', 'x', ''],
                    ['', '', 'x'],
                ],
                'x',
                true,
            ],
            'diagonal 2'                                       => [
                [
                    ['', '', 'x'],
                    ['', 'x', ''],
                    ['x', '', ''],
                ],
                'x',
                true,
            ],
            "x has won, but we're checking for something else" => [
                [
                    ['x', '', ''],
                    ['', 'x', ''],
                    ['', '', 'x'],
                ],
                'anything other than x',
                false,
            ],
        ];
    }
}
