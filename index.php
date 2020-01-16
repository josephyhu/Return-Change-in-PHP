<?php
$stdin = fopen('php://stdin', 'r');
define('QUARTER', .25);
define('DIME', .1);
define('NICKEL', .05);
define('PENNY', .01);
$cost = -1;
$amount = 0;
$change = 0;
$numQuarters = 0;
$numDimes = 0;
$numNickels = 0;
$numPennies = 0;
$totalChange = 0;

while ($cost < 0 || is_nan($cost)) {
  echo 'Enter the cost ';
  $cost = floatval(trim(fgets($stdin)));
}

while ($amount < $cost || is_nan($amount)) {
  echo 'Enter the amount given ';
  $amount = floatval(trim(fgets($stdin)));
}

$change = $amount - $cost;
$change = round($change, 2, PHP_ROUND_HALF_DOWN);
$totalChange = $change;

if ($change >= QUARTER) {
  $numQuarters = floor($change/QUARTER);
  $change = $change - QUARTER * $numQuarters;
}
if ($change >= DIME) {
  $numDimes = floor($change/DIME);
  $change = $change - DIME * $numDimes;
}
if ($change >= NICKEL) {
  $numNickels = floor($change/NICKEL);
  $change = $change - NICKEL * $numNickels;
}
if ($change >= PENNY) {
  $numPennies = $change/PENNY;
}

echo "total change: " . $totalChange . "\n" . "quarters: " . $numQuarters . ", dimes: " . $numDimes . ", nickels: " . $numNickels . ", pennies: " . $numPennies . "\n";
