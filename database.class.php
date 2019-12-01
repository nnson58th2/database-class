<?php 
  class Database {
    protected $connection = null;
    protected $table = '';
    protected $statement = null;

    protected $host = '';
    protected $user = '';
    protected $pass = '';
    protected $databasename = '';
    

    public function __construct($config) {
      $this->host = $config['host'];
      $this->user = $config['user'];
      $this->pass = $config['pass'];
      $this->databasename = $config['databasename'];

      // connect to mysql
      $this->connect();
    }

    protected function connect() {
      $this->connection = new mysqli(
        $this->host, 
        $this->user, 
        $this->pass, 
        $this->databasename
      );
      
      if ($this->connection->connect_errno) {
        exit($this->connection->connect_error);
      }
    }

    public function table($tableName) {
      $this->table = $tableName;
      return $this;
    }

    public function get() {

    }

    public function insert($data = []) {
      // INSERT INTO table(..., ..., ...) VALUE(..., ..., ...)
      $fields = implode(',', array_keys($data));

      $valuesStr = implode(',', array_fill(0, count($data), '?')); // [?, ?] -> ?, ?
      $values = array_values($data);


      $sql = "INSERT INTO $this->table($fields) VALUE($valuesStr)";
      $this->statement = $this->connection->prepare($sql);
      $this->statement->bind_param(str_repeat('s', count($data)), ...$values);
      $this->statement->execute();
      return $this->statement->affected_rows;
    }

    public function update() {

    }

    public function deleteId($id) {
      
    }
  }
?>