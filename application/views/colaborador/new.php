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
                                Cadastro Colaborador
                            </h1>

                            <form method="POST" action="<?php echo base_url() ?>colaborador/inserir/<?php echo $empresa_id; ?>" onsubmit="return check_form()">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-lg-12">
                                        <div class=" col-lg-3 form-group">
                                            <label>CPF</label>
                                            <div>
                                                <input placeholder="Digite o CPF do Colaborador" id="cpf" type="text" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );" name="cpf" class="form-control input-md" required><span id="cpfResponse"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Nome</label>
                                            <div>
                                                <input placeholder="Digite o Nome do Colaborador" type="text" name="nome" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Email</label>
                                            <div>
                                                <input placeholder="Digite o Email do Colaborador" type="email" name="email" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 form-group">
                                            <label>Telefone</label>
                                            <div>
                                                <input placeholder="Digite o Telefone do Colaborador" id="phone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" type="text" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <label>Endereço</label>
                                            <div>
                                                <textarea placeholder="Digite o Enredeço do Colaborador" oninput="eylem(this, this.value)" class="form-control elasticteste" name="endereco"></textarea>
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
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
<script src="<?= base_url() ?>assets/js/maskcpf.js"></script>
<script src="<?= base_url() ?>assets/js/masktel.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script>
    function check_form() {
        var cpf = document.getElementById('cpfResponse').innerText;
     console.log(cpf);
        if (cpf == "inválido") {
            alertify.alert("Digite um CPF Válido!");
            return false;
        } else {
            return true;
        }

        
    }
</script>


<?php $this->load->view('frame/footer_view') ?>