<?php


namespace App\Controller;


class ConnectFourController
{
    public function whoIsWinner(array $piecesPositionList): string
    {
        // Helpers
        $board = [];
        $last = '';

        // Initialize empty board (matrix)
        foreach ($piecesPositionList as $piecePosition) {
            $move = explode('_', $piecePosition);
            $board[$move[0]][] = $move[1];
        }

        //test horizontal for winner
        for ($y = 0; $y <= 6; $y++) {
            $currentCount = 0; // Start again
            foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G'] as $x) {
                if (! empty($board[$x][$y])) {
                    if ($last === $board[$x][$y]) {
                        $currentCount++;
                    } else {
                        $last = $board[$x][$y];
                        $currentCount = 1;
                    }

                    if ($currentCount > 3) {
                        return $last;
                    }
                }
            }
        }

        //test diagonal right for winner
        for ($offset = -3; $offset <= 4; $offset++) {
            $currentCount = 0; // Start again
            foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G'] as $i => $x) {
                $y = $i + $offset;
                if (! empty($board[$x][$y])) {
                    if ($last === $board[$x][$y]) {
                        $currentCount++;
                    } else {
                        $last = $board[$x][$y];
                        $currentCount = 1;
                    }

                    if ($currentCount > 3) {
                        return $last;
                    }
                }
            }
        }

        //test diagonal left for winner
        for ($offset = -3; $offset <= 4; $offset++) {
            $currentCount = 0; // Start again
            foreach (array_reverse(['A', 'B', 'C', 'D', 'E', 'F', 'G']) as $i => $x) {
                $y = $i + $offset;
                if (! empty($board[$x][$y])) {
                    if ($last === $board[$x][$y]) {
                        $currentCount++;
                    } else {
                        $last = $board[$x][$y];
                        $currentCount = 1;
                    }

                    if ($currentCount > 3) {
                        return $last;
                    }
                }
            }
        }

        //test vertical for winner
        foreach ($board as $x => $values) {
            $currentCount = 0; // Start again
            foreach ($values as $y => $value) {
                if ($last === $value) {
                    $currentCount++;
                } else {
                    $last = $value;
                    $currentCount = 1;
                }

                if ($currentCount > 3) {
                    return $last;
                }
            }
        }

        return "Draw";
    }
}