<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'admin_id'	=> [
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
		]);
		$this->forge->addKey('admin_id');
		$this->forge->createTable('admin');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('admin');
	}
}
