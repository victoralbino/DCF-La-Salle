<?php
require 'vendor/autoload.php';

use Enumeration\Rules;
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
        <h2>Formulário de Captura de Dados</h2>
        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit turpis. Cras condimentum
            tincidunt suscipit. Phasellus convallis dapibus congue. Ut sit amet eleifend ipsum. Donec luctus ligula eget
            felis vulputate, eget posuere neque congue.
        </p>
    </div>
    <?php if (isset($_GET['saved']) && $_GET['saved'] == true){ ?>
    <div class="alert alert-success" role="alert">
        Cliente Salvo com sucesso!
    </div>
    <?php }else if (isset($_GET['saved']) && $_GET['saved'] != true){ ?>
        <div class="alert alert-danger" role="alert">
            Erro ao salvar cliente!
        </div>
    <?php } ?>
    <p class="text-center mb-5">
        <a href="/customers" class="btn btn-secondary my-2">Listar Clientes</a>
    </p>

    <form action="/save" method="post">
        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Informações </h4>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nome</label>
                            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="" value=""
                                   required="required">
                            <div class="invalid-feedback <?php if (isset($_GET['firstName'])){ echo 'd-block';} ?>">
                                <?php echo Rules::validationMessage($_GET['firstName']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Sobrenome</label>
                            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="" value=""
                                   required="required">
                            <div class="invalid-feedback <?php if (isset($_GET['lastName'])){ echo 'd-block';} ?>">
                                <?php echo Rules::validationMessage($_GET['lastName']); ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="meu_email@exemplo.com"
                               required="required">
                        <div class="invalid-feedback <?php if (isset($_GET['email'])){ echo 'd-block';} ?>">
                            <?php echo Rules::validationMessage($_GET['email']); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Pais</label>
                            <select class="custom-select d-block w-100 countries" id="country" name="country" required="required">
                                <option value="">Escolher País...</option>
                                <?php
                                foreach (Enumeration\Country::COUNTRIES_ARRAY as $key => $country) {
                                    echo "<option value='" . $key . "'>" . $country . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback <?php if (isset($_GET['country'])){ echo 'd-block';} ?>">
                                <?php echo Rules::validationMessage($_GET['country']); ?>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="area-of-interest">Área de interesse</label>
                            <select name="areaOfInterest" class="custom-select d-block w-100 area-of-interest" id="state" required="required">
                                <option value="">Escolher Área de Interesse...</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Engenharia">Engenharia</option>
                                <option value="Suporte">Suporte</option>
                                <option value="Administrativo">Administrativo</option>
                            </select>
                            <div class="invalid-feedback <?php if (isset($_GET['areaOfInterest'])){ echo 'd-block';} ?>">
                                <?php echo Rules::validationMessage($_GET['areaOfInterest']); ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </form>

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
    });</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.countries').select2();
        $('.area-of-interest').select2();
    });
</script>

</body>
</html>