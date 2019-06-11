<?php
class Pass{

	private $pay = 0;
    private $money = 0;
	private $events = [
		'input' => 0,
		'output' => 0,
	];

	private $control_event = [];

	private $errors = [
		'no_event' => 0,
        'no_money' => 0
	];

	
	public function __construct($pay, array $control_event = [])
	{
		if($control_event['input'])
			$this->control_event['input'] = true;
		else 
			$this->control_event['input'] = false;
		
		if($control_event['output'])
			$this->control_event['output'] = true;
		else 
			$this->control_event['output'] = false;
		
		$this->pay = $pay;
	}

	//Пропуск
	public function controlUser(Body $user)
	{
        if(array_key_exists($user->event, $this->events) && $this->control_event[$user->event]){
            if ($user->viewMoney() >= $this->pay){
                //Забираем деньги
                $this->money += $user->getMoney($this->pay);
                $this->events[$user->event]++;
                return true;
            }
            else{
                $this->errors['no_money']++;
                return false;
            }
        }
        else{
            $this->errors['no_event']++;
            return false;
        }

	}
    //Вывести тариф
	public function viewPay()
	{
		return $this->pay;
	}
    //Устанавить тариф
    public function setPay($pay)
    {
        $this->pay = $pay;
    }
    //Забрать деньги
    public function getMoney(){
	    $money = $this->money;
        $this->money = 0;
	    return $money;
    }
    //Кол-во выходивших
	public function countOut()
	{
		return $this->events['output'];
	}
    //Кол-во входивших
	public function countInp()
	{
		return $this->events['input'];
	}
	//Всего прошло
	public function countAll()
	{
		return $this->events['output'] + $this->events['input'];
	}
	//Кол-во не хватило средств
    public function getCountNoMoney(){
        return $this->errors['no_money'];
    }
    //Кол-во "не туда"
    public function getCountNoEvent(){
        return $this->errors['no_event'];
    }
}
