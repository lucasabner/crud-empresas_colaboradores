<body class="hold-transition skin-blue sidebar-mini">
<script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>
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
                                extract($empresa);
                                ?>
                                Atualização do Cadastro da Empresa
                            </h1>

                            <form method="POST" action="<?php echo base_url() ?>empresa/atualizar/<?php echo $empresa_id; ?>">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-lg-12">
                                        <div class=" col-lg-3 form-group">
                                            <label>CNPJ</label>
                                            <div>
                                                <input placeholder="Digite o CNPJ da Empresa" id="cnpj" maxlength="18" value="<?= $cnpj ?>" type="text" name="cnpj" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Nome</label>
                                            <div>
                                                <input placeholder="Digite o Nome da Empresa" value="<?= $nome ?>" type="text" name="nome" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Email</label>
                                            <div>
                                                <input placeholder="Digite o Email da Empresa" value="<?= $email ?>" type="email" name="email" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Telefone</label>
                                            <div>
                                            <input placeholder="Digite o Telefone da Empresa" id="phone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" value="<?= $telefone ?>"  type="text" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <label>Endereço</label>
                                            <div>
                                                <textarea placeholder="Digite o Endereço da Empresa" oninput="eylem(this, this.value)" class="form-control elasticteste" name="endereco"><?= $endereco ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <button id="submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url('empresas'); ?>">
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
<script src="<?= base_url() ?>assets/js/maskcnpj.js"></script>
<script src="<?= base_url() ?>assets/js/masktel.js"></script>


<?php $this->load->view('frame/footer_view') ?>