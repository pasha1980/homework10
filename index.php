<?php

require_once 'vendor/autoload.php';

$password = new \App\Password('12345678');

/* Bcrypt */

// 1. Хеширование
$bcrypt = new \App\Algorithm\Bcrypt();
var_dump($password->hash($bcrypt)); //$2y$10$aputweCKAmAsTho8TL24juyTKoUZPq3nnc2.Ptfgc3hAPsIuiosp6

// 2. Проверка хеша
$password = new \App\Password('12345678');
var_dump($password->verify('$2y$10$aputweCKAmAsTho8TL24juyTKoUZPq3nnc2.Ptfgc3hAPsIuiosp6')); //true
var_dump($password->verify('$2y$10$aputweCKAmAsTho8TL24juyTKoUZPq3nnc2.Ptfgc3hAPsIuiosp61')); //false
// 3. Проверка на соответствие алгоритму
var_dump(\App\Password::needsRehash('$2y$10$aputweCKAmAsTho8TL24juyTKoUZPq3nnc2.Ptfgc3hAPsIuiosp6', $bcrypt)); //false
var_dump(\App\Password::needsRehash('$2y$10$aputweCKAmAsTho8TL24juyTKoUZPq3nnc2.Ptfgc3hAPsIuiosp6', new \App\Algorithm\Bcrypt(null , 12))); //true

/* Argon2i */

// 1. Хеширование
$argon2i = new \App\Algorithm\Argon2i();
var_dump($password->hash($argon2i)); //$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE

// 2. Проверка хеша
$password = new \App\Password('12345678');
var_dump($password->verify('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE')); //true
var_dump($password->verify('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE1')); //false

// 3. Проверка на соответствие алгоритму
var_dump(\App\Password::needsRehash('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE', $argon2i)); //false
var_dump(\App\Password::needsRehash('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE', new \App\Algorithm\Argon2i(100))); //true

/* Argon2id */

// 1. Хеширование
$argon2id = new \App\Algorithm\Argon2id();
var_dump($password->hash($argon2id)); //$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw

// 2. Проверка хеша
$password = new \App\Password('12345678');
var_dump($password->verify('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw')); //true
var_dump($password->verify('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw1')); //false

// 3. Проверка на соответствие алгоритму
var_dump(\App\Password::needsRehash('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw', $argon2id)); //false
var_dump(\App\Password::needsRehash('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw', new \App\Algorithm\Argon2id(100))); //true
