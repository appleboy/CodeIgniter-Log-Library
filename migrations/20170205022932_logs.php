<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Logs extends CI_Migration
{


        /**
         * table name
         * @var string 
         */
        private $table;

        public function __construct($config = array())
        {
                parent::__construct($config);
                /**
                 * get CI reference
                 */
                $CI          = & get_instance();
                /**
                 * load log config
                 */
                $CI->config->load('log', TRUE);
                /**
                 * load log item
                 */
                $this->table = $CI->config->item('log_table_name', 'log');
        }

        public function up()
        {
                $fields = array(
                    'id'         => array(
                        'type'           => 'TINYINT',
                        'constraint'     => '11',
                        'unsigned'       => TRUE,
                        'auto_increment' => TRUE
                    ),
                    'errno'      => array(
                        'type'       => 'INT',
                        'constraint' => '2',
                    ),
                    'errtype'    => array(
                        'type'       => 'VARCHAR',
                        'constraint' => '32',
                    ),
                    'errstr'     => array(
                        'type' => 'TEXT',
                    ),
                    'errfile'    => array(
                        'type'       => 'VARCHAR',
                        'constraint' => '255',
                    ),
                    'errline'    => array(
                        'type'       => 'INT',
                        'constraint' => '4',
                    ),
                    'user_agent' => array(
                        'type'       => 'VARCHAR',
                        'constraint' => '120',
                    ),
                    'ip_address' => array(
                        'type'       => 'VARCHAR',
                        'constraint' => '45',
                    ),
                    'time'       => array(
                        'type' => 'DATETIME',
                    ),
                );


                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->add_key('ip_address');
                $this->dbforge->add_key('user_agent');

                $this->dbforge->add_field($fields);
                $this->dbforge->create_table($this->table, TRUE);
        }

        public function down()
        {
                $this->dbforge->drop_table($this->table);
        }

}
