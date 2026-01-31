<?php

class Animal {
    public int $total_kaki = 4;
    public string $darah_dingin = "no";

    public function __construct(
        public string $identitas
    ) {}
}