<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasehistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('casehistories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('customer_id');
            $table->string('titolo');
            $table->string('slug')->unique();
            $table->string('cliente')->nullable();
            $table->string('brand')->nullable();
            $table->string('categoria')->nullable();
            $table->text('esigenza')->nullable();
            $table->text('soluzione')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('casehistories');
	}

}
