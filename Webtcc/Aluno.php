<?php
/**
 * 
 */
class Aluno extends Usuario
{
	protected $nome;

    public	function __construct($nomeUsuario, $senha,$nome)
	{
		# code...
		$this->nomeUsuario=$nomeUsuario;
		$this->senha=$senha;
		$this->nome=$nome;
	}
	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

}
 