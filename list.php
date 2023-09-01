<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Lista de Dados</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">Meus Contatos</h1>
            </div>
        </div>
        <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Whatsapp</th>
                                <th>Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         include 'model.php';
                         $model = new Model();
                         $rows = $model->fetch();
                         //var_dump($rows);
                        if(!empty($rows)){
                            foreach ($rows as $row){
                        ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['whatsapp'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td>
                                    <a href="read.php?id=<?php echo $row['id']; ?>" class="badge bg-info p-2 text-decoration-none">Ver</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="badge bg-danger p-2 text-decoration-none">Deletar</a>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge bg-success p-2 text-decoration-none">Editar</a>
                                </td>
                            </tr>
                        <?php
                             }
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
