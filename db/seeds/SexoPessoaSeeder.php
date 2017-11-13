<?php


use Phinx\Seed\AbstractSeed;

class SexoPessoaSeeder extends AbstractSeed
{
    public function run()
    {
        $sexoPessoas = $this->table('sexo');
        $sexoPessoas->insert([
            [
                'nome' => 'Masculino'
            ],
            [
                'nome' => 'Feminino'
            ],
            [
                'nome' => 'Não informado'
            ]
        ])
            ->save();
    }
};