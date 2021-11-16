<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_oferta extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_customer' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'from' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'to' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'initial_value' => array(
                                'type' => 'DECIMAL',
                                'constraint' => '10,2',
                                'null' => FALSE,
                                'default' => 0.00
                        ),
                        'amount' => array(
                                'type' => 'DECIMAL',
                                'constraint' => '10,2',
                                'null' => FALSE,
                                'default' => 0.00
                        ),
                        'amount_type' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('oferta');
        }

        public function down()
        {
                $this->dbforge->drop_table('oferta');
        }
}