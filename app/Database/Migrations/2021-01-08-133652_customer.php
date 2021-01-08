<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'customer_id'	=> [
				'type'				=> 'INT',
				'constraint'    	=> 5,
				'unsigned'      	=> true,
				'auto_increment'	=> true,
			],
			'email' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,		
			],
			'password' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,	
			],
			'alamat' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,	
			],
			'nama' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,	
			],
		]);
		$this->forge->addKey('customer_id');
		$this->forge->createTable('customer');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('customer');
	}
}
