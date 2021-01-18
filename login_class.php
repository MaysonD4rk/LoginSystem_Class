<?php 
session_start();

		class Formulario{

				//verifica posts
		function __construct($tabela='users', $connect){

			$this->connect = $connect;
			$this->tabela = $tabela;

			if(empty($this->connect)){
				echo "não foi possivel se conectar ao servidor";
				die();
			}
		}





		function Logar($lLogin, $lPassword, $loginTB="username", $passTB="password", $redirecionamento, $redirecionamento_err){

			$this->login = $lLogin;$this->pass = $lPassword;
			if (empty($this->login) || empty($this->pass)) {
				header("location".$redirecionamento_err);	
			}

			$login = mysqli_real_escape_string($connect, $this->login);
			$pass = mysqli_real_escape_string($connect, $this->pass);

			$query = "SELECT $loginTB FROM $this->tabela WHERE $loginTB = '$login' AND $passTB = md5('$pass')";
			
			$result = mysqli_query($this->connect, $query);

			$row = mysqli_num_rows($result);
				
			if ($row == 1) {
				
				$_SESSION['login'] = $login;
				header("location: ". $redirecionamento);
				die();
			}else{
				header("location: ". $redirecionamento_err);
				//die();
			}
	}

		function Logout($redirecionamento){
			session_destroy();
			header("location: ". $redirecionamento);
		}

		//CADASTRAR
		//aqui você pode decidir quais utilizar, então apague e modifique... logo após, um layout bastante utilizado:
		/*

			function cadastro($login, $pass, $confirmPass){

		 		 $login = mysqli_real_escape_string($this->connect, $login);
				 $password = mysqli_real_escape_string($this->connect, $pass);
				 $confirmPass = mysqli_real_escape_string($this->connect, $confirmPass);

				 //verificação de existência
				 $VDE = "SELECT login from $this->tabela where login = '$login';";
				 $result = mysqli_query($this->connect, $VDE);
				 $VDER = mysqli_num_rows($result);
				 if ($VDER == 1) {
				 	echo 'não man, nem pensa nisso.';
				 }else{

				 	$queryInsert = "INSERT INTO $this->tabela(login,`password`)values('$login', md5('$password'));";

				 	modifique do seu modo, do jeito que melhor se sentir confortável.
	

		*/
		 function cadastro($name=null, $secondName=null, $surname=null, $email='', $dateOfBirth=null, $Username=null, $password='', $confirmPass=null ){

		 		 $name = mysqli_real_escape_string($this->connect, $name);
				 $secondName = mysqli_real_escape_string($this->connect, $secondName);
				 $surname = mysqli_real_escape_string($this->connect, $surname);
				 $email = mysqli_real_escape_string($this->connect, $email);
				 $dateOfBirth = mysqli_real_escape_string($this->connect, $dateOfBirth);
				 $Username = mysqli_real_escape_string($this->connect, $Username);
				 $password = mysqli_real_escape_string($this->connect, $password);
				 $confirmPass = mysqli_real_escape_string($this->connect, $confirmPass);

				 //verificação de existência
				 $VDE = "SELECT email from $this->tabela where email = '$email';";
				 $result = mysqli_query($this->connect, $VDE);
				 $VDER = mysqli_num_rows($result);
				 if ($VDER == 1) {
				 	echo 'não man, nem pensa nisso.';
				 }else{

				 	$queryInsert = "INSERT INTO $this->tabela(name,second_name,surname,email,date_birth,username,`password`, campoints)values('$name','$secondName','$surname','$email','$dateOfBirth','$Username',md5('$password'), 0);";
				 	$query_result = mysqli_query($this->connect, $queryInsert);

				 	if ($query_result) {
				 		echo 'cadastro deu certo';
				 	}else{
				 		echo 'algo deu errado';
				 	}

				 }


		}

							}



 ?>