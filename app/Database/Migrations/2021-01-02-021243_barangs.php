<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barangs extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'barang_id'			=> [
				'type'				=> 'INT',
				'constraint'    	=> 5,
				'unsigned'      	=> true,
				'auto_increment'	=> true,
			],
			'nama_barang' 		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,		
			],
			'satuan_barang' 		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,		
			],
			'harga_barang' 		=> [
				'type'				=> 'INT',
				'constraint'		=> 14,		
			],
			'stok_barang' 		=> [
				'type'				=> 'INT',
				'constraint'		=> 5,		
			],
			'kategori'			=> [
				'type'				=> 'INT',
				'constraint'		=> 5,
			]
		]);
		$this->forge->addKey('barang_id');
		$this->forge->createTable('barang');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('barang');
	}
}
