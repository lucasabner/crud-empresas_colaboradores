<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                <?php
                                extract($colaborador);
                                ?>
                                Atualização do Cadastro do Colaborador
                            </h1>

                            <form method="POST" action="<?php echo base_url() ?>colaborador/atualizar/<?php echo $colaborador_id; ?>">
                           
                            <input type="hidden" value="<?php echo $empresa_id; ?>" name="empresa_id">
                               
                            <div class="row" style="margin-top: 20px;">
                                    <div class="col-lg-12">
                                        <div class=" col-lg-3 form-group">
                                            <label>CPF</label>
                                            <div>
                                                <input disabled placeholder="Digite o CPF do Colaborador" id="cpf" value="<?= $cpf ?>" type="text" name="cpf" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Nome</label>
                                            <div>
                                                <input placeholder="Digite o Nome do Colaborador" value="<?= $nome ?>" type="text" name="nome" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Email</label>
                                            <div>
                                                <input placeholder="Digite o Email do Colaborador" value="<?= $email ?>" type="email" name="email" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Telefone</label>
                                            <div>
                                                <input placeholder="Digite o Telefone do Colaborador" id="phone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" value="<?= $telefone ?>" type="text" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <label>Endereço</label>
                                            <div>
                                                <textarea placeholder="Digite o Enredeço do Colaborador" oninput="eylem(this, this.value)" class="form-control elasticteste" name="endereco"><?= $endereco ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <button id="submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url() ?>colaboradores/empresa/<?php echo $empresa_id; ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i>
                                    <?= $this->lang->line('btn-back') ?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<script src="<?= base_url() ?>assets/js/maskcpf.js"></script>
<script src="<?= base_url() ?>assets/js/masktel.js"></script>


<?php $this->load->view('frame/footer_view') ?>