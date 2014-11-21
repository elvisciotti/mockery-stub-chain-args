Mockery extension to quickly create stubs, supporting chains with arguments
---------------

similar to [Mockery chain](http://docs.mockery.io/en/latest/reference/demeter_chains.html)
but supports the multiple method arguments

Example

    $stub = MockeryStub::stub('MyClass', array(
        // simple method stub
       'foo' => '[1]',
       // chain and arguments
       'getServiceLocator()->get(EntityManager)->getRepository(User)->find(1,2)' => '[2]'
    ));

    $stub->foo() // [1]
    $stub->get('EntityManager')->getRepository('User')->find(1, 2) // [2]


See unit test class for more examples