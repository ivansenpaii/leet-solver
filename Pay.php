<?php

class Pay {

    private function readInput(): array
    {
        $n = intval(trim(fgets(STDIN)));
        $prices = array_map('intval', explode(' ', trim(fgets(STDIN))));
        return [$n, $prices];
    }

    private function calculatePayment($n, $prices): int
    {
        $count = array();
        for ($i = 0; $i < $n; $i++) {
            if (!isset($count[$prices[$i]])) {
                $count[$prices[$i]] = 0;
            }
            $count[$prices[$i]]++;
        }

        $totalPayment = 0;
        foreach ($count as $price => $quantity) {
            $totalPayment += ($quantity - floor($quantity / 3)) * $price;
        }

        return $totalPayment;
    }

    public function solve(): void
    {
        $t = intval(trim(fgets(STDIN)));

        for ($i = 0; $i < $t; $i++) {
            list($n, $prices) = $this->readInput();
            $payment = $this->calculatePayment($n, $prices);
            echo "{$payment}\n";
        }
    }

}

$solution = new Pay();
$solution->solve();
