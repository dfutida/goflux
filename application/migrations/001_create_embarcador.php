<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_embarcador extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'doc' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'about' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'active' => array(
                                'type' => 'TINYINT',
                                'null' => TRUE,
                        ),
                        'site' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('embarcador');
        }

        public function down()
        {
                $this->dbforge->drop_table('embarcador');
        }
}