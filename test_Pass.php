<?php
use PHPUnit\Framework\TestCase;
use tz\Body;
use tz\Pass;

require 'Body.php';
require 'Pass.php';

class PassTest extends TestCase 
{	
    public function testPassTrue()
    {
        $pass = new Pass(30, ['input' => true]);
	$pass_inp_and_out = new Pass(30, ['input' => true, 'output' => true]);
	
        $this->assertTrue($pass->controlUser(new Body('input', 40))); 
        $this->assertTrue($pass->controlUser(new Body('input', 30))); 
        $this->assertTrue($pass_inp_and_out->controlUser(new Body('output', 30)));	
	}
	
    public function testPassFalse()
    {
        $pass = new Pass(30, ['input' => true]);
		
        $this->assertFalse($pass->controlUser(new Body('input', 20))); 
        $this->assertFalse($pass->controlUser(new Body('output', 50))); 
        $this->assertFalse($pass->controlUser(new Body('eee', 50)));  
	}
}
