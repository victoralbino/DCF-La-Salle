<?php
require 'vendor/autoload.php';

use App\Customer;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet"
          href="../../node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <title>Hello, world!</title>
</head>
<body>
<body class="bg-light" style="">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="public/images/logo.svg" alt=""
             width="72" height="72">
        <h2>Lista de Clientes Salvos</h2>
        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit turpis. Cras condimentum
            tincidunt suscipit. Phasellus convallis dapibus congue. Ut sit amet eleifend ipsum. Donec luctus ligula eget
            felis vulputate, eget posuere neque congue.
        </p>
    </div>

    <p class="text-center mb-5">
        <a href="/" class="btn btn-primary my-2">Cadastrar Clientes</a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Pais</th>
                <th>Área de Interesse</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach (Customer::selectAll() as $customer){
            ?>
            <tr>
                <td><?php echo $customer['firstName'] ?></td>
                <td><?php echo $customer['lastName'] ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td><?php echo $customer['country'] ?></td>
                <td><?php echo $customer['areaOfInterest'] ?></td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>



    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Company Name</p>
    </footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="../../node_modules/bootstrap-material-design/dist/js/bootstrap-material-design.min.js"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });
</script>


</body>
</html>