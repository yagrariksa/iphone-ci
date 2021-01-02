<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategoris extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kategori_id'	=> [
				'type'				=> 'INT',
				'constraint'    	=> 5,
				'unsigned'      	=> true,
				'auto_increment'	=> true,
			],
			'nama_kategori' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,		
			]
		]);
		$this->forge->addKey('kategori_id');
		$this->forge->createTable('kategori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('kategori');
	}
}
