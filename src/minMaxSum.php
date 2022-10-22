<?php

/**
 * The file includes the time conversion function
 *
 * PHP Version 8.1.6
 *
 * @category Coding_Challenge
 * @package  HackerRank
 * @author   Philip Modinos <philipmodino@gmail.com>
 * @license  http://www.php.net/license/3_0.txt PHP License 3.0
 * @version  GIT: 1.0
 * @link
 */

$arr = [1, 3, 5, 7, 9];
/**
 * Converts AM/PM to army time
 *
 * @param $arr is an array of different numbers
 *
 * @author Philip Modinos
 * @return Min and Max Sum
 */
function miniMaxSum($arr)
{

    function minSum($arr)
    {
        $max = max($arr);
        $maxindex = array_search($max, $arr);
        unset($arr[$maxindex]);
        return array_sum($arr);
    }
    function maxSum($arr)
    {
        $min = min($arr);
        $minindex = array_search($min, $arr);
        unset($arr[$minindex]);
        return array_sum($arr);
    }
    echo minSum($arr) . " " . maxSum($arr);
}

echo miniMaxSum($arr);
