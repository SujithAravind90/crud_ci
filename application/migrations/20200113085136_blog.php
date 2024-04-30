<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Blog extends CI_Migration {

    public function up() {
        // Create 'posts' table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('posts');

        // Create 'comments' table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'post_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'email' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (post_id) REFERENCES posts(id)');
        $this->dbforge->create_table('comments');
    }

    public function down() {
        $this->dbforge->drop_table('comments');
        $this->dbforge->drop_table('posts');
    }
}
