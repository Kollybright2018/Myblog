<?php
// Function for treat  input data
function treat($text){
    $text = trim($text);
    $text =stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
} 
?>