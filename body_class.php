<?php
class Body
{
	public $event = '';
	private $money = 0;
	public function __construct($event, $money){
		$this->event = $event;
		$this->money = $money;
	}
    //Заплатить
	public function getMoney($money){
	    $this->money -= $money;
	    return $money;
    }
    //Посмотреть деньги
    public function viewMoney(){
        return $this->money;
    }
}