<?php
require 'pass_class.php';
require 'body_class.php';

$input = new Pass(30, ['input' => true]);
$input_output = new Pass(30, ['input' => true, 'output' => true]);

$count_inp = 0;
$count_inp_out = 0;

for($i=0; $i<1000; $i++){
    $event = rand(0,1);
    $pas = rand(0,1);
    $money = rand(0,100);

    if($event) $event = 'input';
    else $event = 'output';

    if($pas){
        $input->controlUser(new Body($event, $money));
        $count_inp++;
    }
    else{
        $input_output->controlUser(new Body($event, $money));
        $count_inp_out++;
    }
}
echo '-- Турникет вход - (платный) Тариф ' . $input->viewPay() . '<br/>';
echo 'Подошло к турникету ' . $count_inp . '<br/>';
echo 'Вышло ' . $input->countOut() . '<br/>';
echo 'Вошло ' . $input->countInp() . '<br/>';
echo 'Собрано средст ' . $input->getMoney() . '<br/>';
echo 'Кол-во человек у которых не хватило средств для оплаты ' . $input->getCountNoMoney() . '<br/>';
echo 'Кол-во человек которые хотели выйти через этот турникет ' . $input->getCountNoEvent() . '<br/><br/>';
echo '-- Турникет вход/выход - (платный) Тариф ' . $input_output->viewPay() . '<br/>';
echo 'Подошло к турникету ' . $count_inp_out . '<br/>';
echo 'Вышло ' . $input_output->countOut() . '<br/>';
echo 'Вошло ' . $input_output->countInp() . '<br/>';
echo 'Собрано средст ' . $input_output->getMoney() . '<br/>';
echo 'Кол-во человек у которых не хватило средств для оплаты ' . $input_output->getCountNoMoney() . '<br/>';


