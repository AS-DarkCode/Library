<?php

class Model
{
	protected $connection = '';
	protected $servername = 'localhost';
	protected $username = 'root';
	protected $password = '';
	protected $db = 'library';

	function __construct()
	{

		mysqli_report(MYSQLI_REPORT_STRICT);
		try {
			$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db);
		} catch (Exception $ex) {
			echo "Connection Failed: " . $ex->getMessage();
			exit;
		}
	}

	function InsertData($tbl, $data)
	{
		// insert into tblname (clms) values (values)

		$clms = implode(',', array_keys($data));
		$vals = implode("','", $data);
		$sql = "INSERT INTO $tbl ($clms) VALUES ('$vals')";
		// echo $sql;
		// exit;
		$insert_execute = $this->connection->query($sql);
		if ($insert_execute == true) {
			$response['Data'] = null;
			$response['Code'] = true;
			$response['Message'] = 'Data Inserted Successfully';
		} else {
			$response['Data'] = null;
			$response['Code'] = false;
			$response['Message'] = 'Data Insertion failed';
		}
		return $response;
	}

	function LoginData($email, $password)
	{
		// select * from users where email = '';
		$loginSql = "SELECT * FROM users WHERE email = '$email'";
		$loginEx = $this->connection->query($loginSql);
		$fetch_Data = $loginEx->fetch_object();

		if ($loginEx->num_rows > 0 && password_verify($password, $fetch_Data->password)) {
			$response['Data'] = $fetch_Data;
			$response['Code'] = true;
			$response['Message'] = 'Login Successfully';
		} else {
			$response['Data'] = null;
			$response['Code'] = false;
			$response['Message'] = 'Email or Password is incorrect';
		}
		return $response;
	}

	function Select_Data(string $table_name, array $where = [])
	{
		// select * from users where userid = 2 and age = 21 and address ;

		$selsql = "SELECT * FROM $table_name";
		if (!empty($where)) {
			$selsql .= " WHERE ";

			foreach ($where as $key => $value) {
				$selsql .= " $key = '$value' AND";
			}
			$selsql = rtrim($selsql, "AND");
		}
		$sqlEx = $this->connection->query($selsql);

		if ($sqlEx->num_rows > 0) {
			while ($fetchdata = $sqlEx->fetch_object()) {
				$students[] = $fetchdata;
			}
			$response['Data'] = $students;
			$response['Code'] = true;
			$response['Message'] = 'Data retrieved successfully';
		} else {
			$response['Data'] = [];
			$response['Code'] = false;
			$response['Message'] = 'Data not retrieved';
		}
		return $response;
	}
	function UpdateData($tbl, $data, $where)
	{
		// update tblname set fname = 'this' where id  =1
		$sql = "UPDATE $tbl SET ";
		foreach ($data as $key => $value) {
			$sql .= "$key = '$value',";
		}
		$sql = rtrim($sql, ',');
		$sql .= " WHERE ";

		foreach ($where as $key => $value) {
			$sql .= "$key = '$value' AND";
		}
		$sql = rtrim($sql, 'AND');
		return $UpdateExecuation = $this->connection->query($sql);
	}

	function DeleteData($tbl, $where)
	{
		//delete from tblname where id = 1;
		$sql = "DELETE FROM $tbl WHERE ";
		foreach ($where as $key => $value) {
			$sql .= " $key = '$value';";
		}
		return $delEx = $this->connection->query($sql);
		// echo $sql;
	}
}
