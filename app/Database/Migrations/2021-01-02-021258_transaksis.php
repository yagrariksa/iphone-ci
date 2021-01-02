<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'transaksi_id'		=> [
				'type'				=> 'INT',
				'constraint'    	=> 5,
				'unsigned'      	=> true,
				'auto_increment'	=> true,
			],
			'id_pembeli'		=> [
				'type'				=> 'INT',
				'constraint'		=> 5,		
			],
			'status'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250,
				'null'				=> true,
			],
			'waktu_transaksi' 	=> [
				'type'				=> 'TIMESTAMP',
			]
		]);
		$this->forge->addKey('transaksi_id');
		$this->forge->createTable('transaksi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('transaksi');
	}
}
