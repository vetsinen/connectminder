<?php

class Test1
{
 static function last_word($sentence)
 {
     $trimmedSentence = trim($sentence);
     if (empty($trimmedSentence)) {
         return 0;
     }
     $words = explode(' ', $trimmedSentence);
     $lastWord = end($words);
     return strlen($lastWord);
 }
 static function extract_string($string) {
     // Use a regular expression to find the substring inside square brackets
     if (preg_match('/\[(.*?)\]/', $string, $matches)) {
         return $matches[1];
     } else {
         return '';
     }
 }
}

//echo Test1::last_word("Hello World");
echo Test1::extract_string("Hello [World] from Rasmus");
