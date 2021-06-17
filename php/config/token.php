<?php

function tokenization()
{
    $token = bin2hex( openssl_random_pseudo_bytes(16));
        return $token;
}
