<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barangterbelis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'barangbeli_id'		=> [
				'type'				=> 'INT',
				'constraint'    	=> 5,
				'unsigned'      	=> true,
				'auto_increment'	=> true,
			],
			'transaksi_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 5,		
			],
			'barang_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 5
			],
			'nama_barang'		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 250
			],
			'harga_barang' 	=> [
				'type'				=> 'INT',
				'constraint'		=> 15,
     			'null'				=> true,
			],
			'jumlah_beli' 	=> [
				'type'				=> 'INT',
				'constraint'		=> 15,
     			'null'				=> true,
			],
			'subtotal' 	=> [
				'type'				=> 'INT',
				'constraint'		=> 15,
     			'null'				=> true,
			]
		]);
		$this->forge->addKey('barangbeli_id');
		$this->forge->createTable('barangterbeli');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('barangterbeli');
	}
}
