<?php

class Sum {

    private function readInput(): array
    {
        $input = trim(fgets(STDIN));
        list($a, $b) = explode(' ', $input);
        return [$a, $b];
    }

    public function solve(): void
    {
        $t = intval(trim(fgets(STDIN)));

        for ($i = 0; $i < $t; $i++) {
            list($a, $b) = $this->readInput();
            echo ($a + $b) . "\n";
        }
    }
}

$solution = new Sum();
$solution->solve();
