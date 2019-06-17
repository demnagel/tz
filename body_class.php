<?php

namespace tz;

class Body
{
    public $event = '';
    private $money = 0;

    public function __construct($event, $money)
    {
        $this->event = $event;
        $this->money = $money;
    }

    //Оплатить
    public function getMoney($money)
    {
        $this->money -= $money;
        return $money;
    }

    //Просмотр средст
    public function viewMoney()
    {
        return $this->money;
    }
}
