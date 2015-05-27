<?php

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

use Laracasts\TestDummy\Factory as TestDummy;

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

    /** @test */
	public function it_display_all_customers()
	{

        $this->visit('/customers')->andSee('Cliente 4');
	}

    /** @test */
    public function it_published_a_new_customers()
    {

        $this->visit('/customers/create')
             ->type('quirkmode@yahoo.com', 'email')
             ->type('123456', 'password')
             ->press('Log In')
             ->see('Crea nuovo')
             ->type('Nome cliente', 'name')
             ->type('http://localhost:8888/lavori/nuovo-cliente-6679.jpg', 'logo')
             ->type('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'description')
             ->select('service_list[]', '4')
             ->type('http://localhost:8888/lavori/nuovo-cliente-6679.jpg', 'file[]')
             ->press('Aggiungi lavoro')
             ->see('Nome cliente')
             ->onPage('/index_customers');
             //->verifyInDatabase('customers', ['name' => 'Nome cliente']);

    }



}
