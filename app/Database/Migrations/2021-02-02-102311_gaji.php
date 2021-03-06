<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gaji extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'Jenis Gaji' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'Jumlah Gaji' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'sampul' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'               => 'DATETIME',
				'null'               => true
			],
			'updated_at' => [
				'type'               => 'DATETIME',
				'null'               => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('gaji');
	}

	public function down()
	{
		$this->forge->dropTable('gaji');
	}
}
