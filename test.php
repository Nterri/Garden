<?php
// Task 1
$arrayNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
function search(array $data, int $number): int
{
    $start = 0;
    $end = count($data) - 1;
    $last_start = $start;
    $last_end = $end;
    while (1) {
        $position = round(($start + $end) / 2);
        if (isset($data[$position])) {
            if ($data[$position] == $number) {
                return $position;
            }
            if ($data[$position] > $number) {
                $end = floor(($start + $end) / 2);
            } elseif ($data[$position] < $number) {
                $start = ceil(($start + $end) / 2);
            }
        }
        if ($last_start == $start && $last_end == $end) {
            return -1;
        }
        $last_start = $start;
        $last_end = $end;
    }
}
echo search($arrayNumbers, 6);
// Task 2
function weekend(string $start, string $end): int
{
    $start = strtotime($start);
    $end = strtotime($end);
    if ($start > $end) {
        return 0;
    } else {
        $weekends = 0;
        $start += date("N", $start) < 7 ? 86400 * (6 - date("N", $start)) : 0;
        if ($start <= $end) {
            $weekends += floor(($end - $start) / 86400 / 7) * 2;
            $start += floor(($end - $start) / 86400) * 86400;
            $weekends += date("N", $end) == 6 ? 1 : 2;
        } else {
            return 0;
        }
        return $weekends;
    }
}
echo weekend('06.06.2020', '06.06.2020');
// Task 3
function rgb(int $r, int $g, int $b): int
{
    if ($r >= 0 && $r <= 255 && $g >= 0 && $g <= 255 && $b >= 0 && $b <= 255) {
        return $r * 65536 + $g * 256 + $b;
    }
    return 0;
}
echo rgb(255, 0, 255);
// Task 4
function fiborow(int $limit): string
{
    if ($limit < 0) return '';
    if ($limit == 0) return '0';
    if ($limit == 1) return '0 1 1';
    $strFib = '0 1';
    $first = 0;
    $second = 1;
    while (($first + $second) <= $limit) {
        $current = $first + $second;
        $strFib .= ' ' . $current;
		$first = $second;
		$second = $current;
    }
    return $strFib;
}
echo fiborow(10);