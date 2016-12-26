<?php

namespace Fuel\Migrations;

class Create_images
{
	public function up()
	{
		\DBUtil::create_table('images', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'fiename' => array('constraint' => 100, 'type' => 'varchar'),
			'path' => array('constraint' => 200, 'type' => 'varchar'),
			'mimetype' => array('constraint' => 50, 'type' => 'varchar'),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('images');
	}
}
