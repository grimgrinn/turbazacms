<?php

function splitIntoColumns ($inputString, $columns, $splitString = null) {

    // Source: http://blog.tjitjing.com
    //
    // Splits a string into x number of columns and returns result as an array of columns
    //
    // Parameters:
    // $InputString String to be split into columns
    // $Columns     Number of columns
    // $SplitString String to look for to not split midtext etc
    //
    // Change history:
    // 2011-01-25/Max   Version 1
    //

    // Find middle of text
    $colLength = strlen($inputString)/$columns;
    $lastPos = null;
    // Split into columns
    for($colCount = 1; $colCount <= $columns; $colCount++) {

        // Find $SplitString, position to cut
        $pos = @strpos($inputString , $splitString , $lastPos + $colLength);
        if ($pos === false) {
            $pos = strlen($inputString);
        }

        // Cut out column
        $output[$colCount - 1] = @substr($inputString, $lastPos, $pos - $lastPos);

        $lastPos = $pos;

    }

    return $output;

}