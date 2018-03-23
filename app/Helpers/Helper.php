<?php

/**
 * 	Converts text to blocks of <p> elements
 * @param  [type] $string [description]
 * @return [type]         [description]
 */
function nl2p($string)
{
    $paragraphs = '';

    foreach (explode("\n", $string) as $line) {
        if (trim($line)) {
            $paragraphs .= '<p>' . $line . '</p>';
        }
    }

    return $paragraphs;
}

/**
 * Converts text to an array of paragraphs.
 * @param  [string] $string [description]
 * @return [array]         [description]
 */
function nl2a($string)
{
    $paragraphs = [];

    foreach (explode("\n", $string) as $line) {
        if (trim($line)) {
            $paragraphs[] = $line;
        }
    }

    return $paragraphs;
}