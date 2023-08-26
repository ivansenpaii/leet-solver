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
        $counts = array();

        for ($i = 0; $i < $n; $i++) {
            $price = $prices[$i];
            if (!isset($counts[$price])) {
                $counts[$price] = 0;
            }
            $counts[$price]++;
        }

        $totalPayment = 0;


        foreach ($counts as $price => $count) {
            $discountedCount = $count - floor($count / 3);
            $totalPayment += $discountedCount * $price;
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

