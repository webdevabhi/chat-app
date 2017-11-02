<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_messages extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'sender_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'receiver_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'msg' => array(
                'type' => 'text',
                'null' => true
            ),
            'created_at' => array(
                'type' => 'timestamp'
            ),
            'updated_at' => array(
                'type' => 'timestamp'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('active_chat_messages');
    }

    public function down()
    {
        $this->dbforge->drop_table('active_chat_messages');
    }
}