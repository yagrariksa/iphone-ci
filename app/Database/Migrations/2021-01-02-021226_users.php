<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id'	=> [
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
			]
		]);
		$this->forge->addKey('user_id');
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
