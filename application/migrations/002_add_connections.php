<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_connections extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'conn_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'created_at' => array(
                'type' => 'timestamp'
            ),
            'updated_at' => array(
                'type' => 'timestamp'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('active_connections');
    }

    public function down()
    {
        $this->dbforge->drop_table('active_connections');
    }
}