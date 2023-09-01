<?php

Class Model{
    private $server = "localhost";
    private $username = "root";
    private $pass;
    private $database = "aula_sistema_cadastro";
    private $conn;

    public function __construct(){
        try{
            $this->conn = new mysqli($this->server, $this->username, $this->pass, $this->database);
        }catch(Exception $e){
            echo "A conexão falhou".$e->getMessage();
        }
    }

    public function insert(){
        if (isset($_POST['submit'])){
            // echo "Ok";
            if (isset($_POST['name']) && isset($_POST['whats']) && isset($_POST['email']) && isset($_POST['address'])){
                if(!empty($_POST['name']) && !empty($_POST['whats']) && !empty($_POST['email']) && !empty($_POST['address'])){
                    $name = filter_input(INPUT_POST, 'name');
                    $email = filter_input(INPUT_POST, 'email');
                    $whats = filter_input(INPUT_POST, 'whats');
                    $address = filter_input(INPUT_POST, 'address');
                    
                    $query = "INSERT INTO cadastros (name, email, whatsapp, address) VALUES ('$name', '$email', '$whats', '$address')";
                    if($sql = $this->conn->query($query)){
                        echo "<script>alert('Dados inseridos com sucesso!')</script>";
                        echo "<script>window.location.href='index.php'</script>";
                    }else{
                        echo "<script>alert('Ocorreu um erro!')</script>";
                        echo "<script>window.location.href='index.php'</script>";
                    }
                }else{
                    echo "<script>alert('Preencha os campos!')</script>";
                    echo "<script>window.location.href='index.php'</script>";
                }
            }
        }
    }

    public function fetch(){
        $data = null;
        $query = "SELECT * FROM cadastros";
        if($sql = $this->conn->query($query)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id){
        $query = "DELETE FROM cadastros WHERE id = '$id'";
        if($sql = $this->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }

    public function fetch_unico($id){
        $data = null;
        $query = "SELECT * FROM cadastros WHERE id = '$id'";
        if($sql = $this->conn->query($query)){
            while ($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }

    public function edit($id){
        $data = null;
        $query = "SELECT * FROM cadastros WHERE id = '$id'";
        if($sql = $this->conn->query($query)){
            while ($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data){
        $query = "UPDATE cadastros SET name='$data[name]', email='$data[email]', whatsapp='$data[whatsapp]', address='$data[address]' WHERE id='$data[id]'";
        if($sql = $this->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }
}

?>
