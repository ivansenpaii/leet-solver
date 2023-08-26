<?php

class DateValidate {

    private function readInput(): array
    {
        $count = intval(trim(fgets(STDIN)));
        $timeIntervals = [];

        for ($i = 0; $i < $count; $i++) {
            $interval = trim(fgets(STDIN));
            $timeIntervals[] = $interval;
        }

        return [$count, $timeIntervals];
    }

    private function timeValidate($n, $intervals): string
    {
        $startTimes = [];
        $endTimes = [];

        foreach ($intervals as $interval) {
            list($start, $end) = explode('-', $interval);

            $start = new DateTime($start);
            $end = new DateTime($end);

            if (
                $start->format('H') <= 23 &&
                $start->format('i') <= 59 &&
                $start->format('s') <= 59 &&
                $end->format('H') <= 23 &&
                $end->format('i') <= 59 &&
                $end->format('s') <= 59
            ) {
                $startTimes[] = $start;
                $endTimes[] = $end;
            } else {
                return 'NO';
            }
        }

        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($startTimes[$i] <= $endTimes[$j] && $startTimes[$j] <= $endTimes[$i]) {
                    return 'NO';
                }
            }
        }

        return 'YES';
    }

    public function solve(): void
    {
        $t = intval(trim(fgets(STDIN)));
        for ($i = 0; $i < $t; $i++) {
            list($count, $timeInterval) = $this->readInput();
            $validateResult = $this->timeValidate($count, $timeInterval);
            echo "{$validateResult}\n";
        }
    }

}

$solution = new DateValidate();
$solution->solve();

