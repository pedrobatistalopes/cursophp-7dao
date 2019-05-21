<?php 
	class usuario{

		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;


		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($value){
			$this->idusuario = $value;
		}

		public function getDeslogin(){
			return $this->idusuario;
		}

		public function setDeslogin($value){
			$this->idusuario = $value;
		}
		public function getDessenha(){
			return $this->idusuario;
		}

		public function setDessenha($value){
			$this->idusuario = $value;
		}

		public function getDtcadastro(){
			return $this->idusuario;
		}

		public function setIDtcadastro($value){
			$this->idusuario = $value;
		}

		public function loadById($id){

			$sql = new Sql();

			$result = $sql->select("SELECT *FROM  tb_usuarios WHERE idusuario = :ID", array(
				":ID"=>$id

			));

			if(count($result)>0){
				$row = $result[0];
				$this->setIdusuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setIDtcadastro(new DAteTime($row['dtcadastro']));

			}

		}

		public static function getList(){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
		}

		public static function search($login){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
				':SEARCH'=>"%".$login."%"
			));

		}

		public function login($login, $password){
			$sql = new Sql();

			$result = $sql->select("SELECT *FROM  tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
				":LOGIN"=>$login,
				":PASSWORD"=>$password

			));

			if(count($result)>0){
				$row = $result[0];
				$this->setIdusuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setIDtcadastro(new DAteTime($row['dtcadastro']));

			}else{
				throw new Execption("Login e/ ou senha invalidos");
			}

		}

		public function __toString(){
			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s") 
			));
		}






	}
?>