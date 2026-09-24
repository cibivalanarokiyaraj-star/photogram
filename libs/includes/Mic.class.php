<?php

/**
 * Access specifiers
 * ----------
 * public
 * private
 * protected
 */

class Mic
{
public $brand;
public $color;
public $usb_port;
public $model;
private $light;
public $price;

public function setLight($light)
{
    $this->light = $light;
}

public function getLight()
{
    return $this->light;
}
}
