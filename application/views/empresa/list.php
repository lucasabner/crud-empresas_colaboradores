<body class="hold-transition skin-blue sidebar-mini">
    <script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <!-- Inicio sistema de feedbacks -->
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('delete')) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('delete'); ?></strong>
                    </div>
                <?php endif; ?>
                <!-- Fim sistema de feedbacks -->

                <style>
                    /* @media (min-width: 1200px) {
                        .texttd {
                            display: block;
                            width: 200px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1199px) {
                        .texttd {
                            display: block;
                            width: 450px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1160px) {
                        .texttd {
                            display: block;
                            width: 300px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 767px) {
                        .panel-body {
                            margin-top: 50px;
                        }
                    } */
                </style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                            <!-- Titulo  -->
                            <h1 class="page-header">
                                Empresas
                            </h1>

                            <!-- botao criar empresas  -->
                            <div class="row">
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>empresa/cadastrar'"><i class="fa fa-plus-circle"></i> Cadastrar Empresa</button>
                                </div>
                            </div>
                            <br><br>

                            <table class="table table-bordered table-striped" id="table_empresas">
                                <thead>
                                    <tr>
                                        <th>CNPJ</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($empresas as $item) {
                                    ?>
                                        <tr>
                                            <td><?= $item->cnpj ?></td>
                                            <td><?= $item->nome; ?></td>
                                            <td><?= $item->email ?></td>
                                            <td><?= $item->telefone; ?></td>
                                            <td><?= $item->endereco ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <form action="<?php echo base_url() ?>empresa/editar/<?php echo $item->empresa_id; ?>" method="post">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->empresa_id; ?>)"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <form action="<?php echo base_url() ?>colaboradores/empresa/<?php echo $item->empresa_id; ?>" method="post">
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-folder-open"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<?php $this->load->view('frame/footer_view') ?>
<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<script type="text/javascript">
    'use strict'
    let table;

    $(document).ready(function() {
        table = $('#table_empresas').DataTable({
            "columns": [{
                    "data": "cnpj"
                },
                {
                    "data": "nome"
                },
                {
                    "data": "email"
                },
                {
                    "data": "telefone"
                },
                {
                    "data": "endereco"
                },
                {
                    "data": "btn-actions",
                    "orderable": false
                },
            ],
            "order": [
                [1, 'attr'] // ordenar por ordem alfabeticos (nomes)
            ]
        });
    });
</script>

<script type="text/javascript">
    function deletar(id) {
        alertify.confirm('Deletando uma Empresa, todos os colaboradores também serão deletados! Tem certeza que deseja deletar esta Empresa?').setting({
            'title': "Deletar Empresa",
            'labels': {
                ok: 'Aceitar',
                cancel: 'Cancelar'
            },
            'reverseButtons': false,
            'onok': function() {
                $.post("<?php echo base_url() ?>empresa/deletar/" + id);

                alertify.success('Empresa Deletada com Sucesso!');
                location.reload();
            },
            'oncancel': function() {
                alertify.error('Empresa Não Deletada!');
            }
        }).show();
    }
</script>