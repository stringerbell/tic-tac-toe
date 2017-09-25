<?php

namespace App;

class TicTacToe
{
    public function hasWon(array $gameState, string $player): bool
    {
        return $this->checkAcross($gameState, $player)
               || $this->checkAcross($this->rotate($gameState), $player) // vertical
               || $this->checkDiagonal($gameState, $player)
               || $this->checkDiagonal($this->rotate($gameState), $player);
    }

    private function checkAcross(array $gameState, string $player): bool
    {
        foreach ($gameState as $row) {
            if ((array_count_values($row)[$player] ?? 0) === count($row)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Rotates an array clockwise
     *
     * @param array $gameState
     * @return array
     */
    private function rotate(array $gameState): array
    {
        // php grabs the top element off of each array when `null` is passed in as a callable
        // http://php.net/manual/en/function.array-map.php#example-5620
        // :(
        $transposed = call_user_func_array('array_map', [-1 => null] + $gameState);

        return array_map('array_reverse', $transposed);
    }

    private function checkDiagonal(array $gameState, string $player): bool
    {
        $count  = 0;
        $result = [];
        foreach ($gameState as $index => $row) {
            $result[] = $gameState[$count][$index];
            $count++;
        }

        return (array_count_values($result)[$player] ?? 0) === count($gameState);
    }
}
