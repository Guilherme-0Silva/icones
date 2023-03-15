<figure class="text-end" style="margin-right:30px;">
    <blockquote class="blockquote">
        <p>A well-know quote, contained in a blockquote elemente.</p>
    </blockquote>
    <figcaption class="blockquote-footer">
        Someone famous in <cite title="Source Title">Source Title</cite>
    </figcaption>
</figure>

<div class="container-fluid" style="margin-top:30px;">
    <div class="shadow-lg p-3 mb-5 bg-body rounded">

        <h1 class="display-6">Lista de usuarios</h1>

        <button style="margin-right:20px; margin-bottom:20px;" class="btn btn-primary float-end" data-bs-toggle="modal"
            data-bs-target="#cadastro_modal">
            <i class="fa fa-plus"></i>
            Novo usuário
        </button>

        <div class="modal fade" id="cadastro_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="static BackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Novo usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="medal-body">

                        <form method="post" id="cadastro_form" action="#" autocomplete="off">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" value="&nbps">
                            </div>
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control" id="login" value="&nbps">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" aria-describedby="dicaPassword">
                                <div id="dicaPassword" class="form-text">Sua senha deve possuir 8 caracteres ou mais.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" class="form-select">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="papel" class="form-label">Papel</label>
                                <select id="papel" class="form-select">
                                    <option value="estudante"> Estudante</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" id="enviar" class="btn btn-primary"
                                onclick="salvarCadastro()">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- PHP -->
    <?php
    echo '<table class="table">';
    ;
    echo '<tr>';
    echo '<th>Nome</th>';
    echo '<th>Login</th>';
    echo '<th>Papel</th>';
    echo '<th>Status</th>';
    echo '<th>Ações</th>';
    echo '</tr>';

    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user->nome . '</td>';
        echo '<td>' . $user->login . '</td>';
        echo '<td>' . $user->papel . '</td>';
        if ($user->ativo == 1) {
            echo '<td>ativo</td>';
        } else {
            echo '<td>inativo</td>';
        }
        echo '<td>';
        echo '<i class="fa fa-eye text-primary" style="margin-right:5px"></i>';
        echo '<i class="fa fa-edit text-primary" style="margin-right:5px"></i>';
        echo '<i class="fa fa-trash text-primary" style="margin-right:5px"></i>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
    ?>
</div>
</div>












<script>
    function salvarCadastro() {

        var nome = document.getElementById('nome').value;
        var login = document.getElementById('login').value;
        var senha = document.getElementById('senha').value;
        var status = document.getElementById('status').value;
        var papel = document.getElementById('papel').value;

        $.post("<?php echo base_url("usuarios/novousuario") ?>",
            { nome: nome, login: login, senha: senha, status: status, papel: papel },
            function (data) {
                if (data) {
                    Swal.fire({
                        title: 'Sucesso',
                        text: 'O usuário foi cadastrado com sucesso.',
                        icon: 'success',
                        confirmButtonText: 'Ok!',
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Contate o administrador do sistema e informe o código: 1000',
                        icon: 'error',
                        confirmButtonText: 'Ok!',
                    }).then(function () {
                        location.reload();
                    });
                }
            }
        );
    }


</script>