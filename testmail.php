<?php

$headers = 'From: sitandplay98@gmail.com' . "\r\n".
            'MIME-Version: 1.0' . "\r\n".
            'Content-Type: text\html; charset-utf-8';

$result = mail("yobel.oktavinus98@gmail.com","Hello World","This is Hello World");
var_dump($result);