<?php

require __DIR__ . '/../MockeryStub.php';

class MockeryStubTest extends PHPUnit_Framework_TestCase
{
    public function testStub()
    {
        $stub = MockeryStub::stub('Mockery', array(
            'foo' => '[1]',
            'foo(1)' => '[2]',
            'foo(2)' => '[3]',
            'foo(2.5,2.6)' => '[4]',
            'foo(3)->foo(4,)' => '[5]',
            'getServiceLocator()->get(Doctrine\ORM\EntityManager)->getRepository(User)->find(1)' => '[6]'
        ));
        
        $this->assertEquals('[1]',  $stub->foo()  );
        $this->assertEquals('[2]', $stub->foo('1') );
        $this->assertEquals('[2]', $stub->foo(1) ); // no difference with string or integer
        $this->assertEquals('[3]', $stub->foo('2') );
        $this->assertEquals('[4]', $stub->foo('2.5', 2.6) );
        $this->assertEquals('[5]', $stub->foo('3')->foo('4', null) );
        $this->assertEquals('[6]', $stub->getServiceLocator()->get('Doctrine\ORM\EntityManager')->getRepository('User')->find(1));
    }
}

