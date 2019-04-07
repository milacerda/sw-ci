<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_planets extends CI_Migration {

    // $table->increments('id');
    //         $table->string('nome');
    //         $table->string('clima');
    //         $table->string('terreno');
    //         $table->integer('filmes')->nullable();
    //         $table->timestamps();
    //         $table->softDeletes();

    public function up()
    {
        $this->dbforge->add_field(
           array(
              'id' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'nome' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '255',
              ),
              'clima' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '255',
              ),
              'terreno' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '255',
              ),
              'filmes' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'null' => true,
              ),
              'created_at' => array(
                 'type' => 'DATETIME', 
                 'default' => 'CURRENT_TIMESTAMP'
              ),
              'updated_at' => array(
                 'type' => 'DATETIME', 
                 'null' => true,
                 'default' => 'CURRENT_TIMESTAMP'
              ),
           )
        );
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('planets');
    }

    public function down()
    {
        $this->dbforge->drop_table('planets');
    }
}