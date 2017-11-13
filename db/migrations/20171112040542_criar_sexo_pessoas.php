<?php


use Phinx\Migration\AbstractMigration;

class CriarSexoPessoas extends AbstractMigration
{
    public function up()
    {
        $this->table('sexo')
            ->addColumn('nome', 'string')
            ->save();
    }

    public function down()
    {
        $this->dropTable('sexo');
    }
}
