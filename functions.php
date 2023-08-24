<?php

function generatePassword($length, $chars) {
    if ($length <= 0 || strlen($chars) === 0) {
        return ''; 
    }

    $password = '';
    $charsCount = strlen($chars);

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, $charsCount - 1);
        $password .= $chars[$randomIndex];
    }

    return $password;
}

    $chars = '';
    if ($includeLetters) {
        $chars .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($includeNumbers) {
        $chars .= '0123456789';
    }
    if ($includeSymbols) {
        $chars .= '!@#$%^&*()-_=+';
    }

    if (!empty($chars)) {
        $password = generatePassword($passwordLength, $chars);
    }