<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Editar Registro</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">
                    Editar Registro
                </h1>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <?php
                        include 'model.php';
                        $model = new Model();
                        $id = $_REQUEST['id'];
                        $row = $model->edit($id);

                        if(isset($_POST['update'])){
                            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['whats']) && isset($_POST['address'])){
                                if(!empty($_POST['name']) && !empty($_POST['email']) && isset($_POST['whats']) && isset($_POST['address'])){
                                    $data['id'] = $id;
                                    $data['name'] = $_POST['name'];
                                    $data['email'] = $_POST['email'];
                                    $data['whatsapp'] = $_POST['whats'];
                                    $data['address'] = $_POST['address'];

                                    $update = $model->update($data);
                                    if($update){
                                        echo "<script>alert('Gravado com sucesso!')</script>";
                                        echo "<script>window.location.href='list.php'</script>";
                                    }else{
                                        echo "<script>alert('Falhou')</script>";
                                        echo "<script>window.location.href='list.php'</script>";
                                    }
                                }else{
                                    echo "<script>alert('Erro')</script>";
                                    header ("Location: edit.php?id=$id");
                                }
                            }
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Whatsapp</label>
                            <input type="tel" name="whats" value="<?php echo $row['whatsapp']; ?>" class="form-control" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" required>
                            <span>Formato do telefone: (99) 99999-9999</span>
                        </div>
                        <div class="form-group">
                            <label for="">Endereço</label>
                            <textarea type="text" name="address" rows="3" class="form-control" required><?php echo $row['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>