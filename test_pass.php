<?php
use PHPUnit\Framework\TestCase;

require 'body_class.php';
require 'pass_class.php';

class PassTest extends TestCase 
{	
    public function testPassTrue()
    {
        $pass = new tz\Pass(30, ['input' => true]);
	$pass_inp_and_out = new tz\Pass(30, ['input' => true, 'output' => true]);
	
        $this->assertTrue($pass->controlUser(new tz\Body('input', 40))); 
        $this->assertTrue($pass->controlUser(new tz\Body('input', 30))); 
        $this->assertTrue($pass_inp_and_out->controlUser(new tz\Body('output', 30)));	
	}
	
    public function testPassFalse()
    {
        $pass = new tz\Pass(30, ['input' => true]);
		
        $this->assertFalse($pass->controlUser(new tz\Body('input', 20))); 
        $this->assertFalse($pass->controlUser(new tz\Body('output', 50))); 
        $this->assertFalse($pass->controlUser(new tz\Body('eee', 50)));  
	}
}
