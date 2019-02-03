<?php
	
	require_once 'conexao.php';
	require_once 'crudoo.php';

	class usuariosOO extends crudoo
	{
		protected $table = 'usuarios';
		private $nome;
		private $email;
		private $con;

		//construtor
		public function  __construct(){
			$this->con =  new conexao();
		}

		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getEmail(){
			return $this->email;
		}
		
		public function insert()
		{
			try {

				$stmt = $this->con->conectar()->prepare("INSERT INTO $this->table (nome,email) VALUES (:nome,:email);");
				$stmt->bindParam(':nome',$this->nome, PDO::PARAM_STR);
				$stmt->bindParam(':email',$this->email, PDO::PARAM_STR);

				return ($stmt->execute()) ? 'ok' : 'erro';
					
			} catch (Exception $e) {

				return 'erro' . $e->getMessage();
			}

			$conexao = null;
		}

		public function update($id)
		{
			$sql = "INSERT INTO $this->table SET nome = :nome, email = :email WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nome',$this->nome);
			$stmt->bindParam(':email',$this->email);
			$stmt->bindParam(':id',$this->id);
			return $stmt->execute();
		}	
	}

?>