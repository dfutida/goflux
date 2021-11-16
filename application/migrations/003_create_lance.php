<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_lance extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_provider' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'id_offer' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'value' => array(
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
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('lance');
        }

        public function down()
        {
                $this->dbforge->drop_table('lance');
        }
}