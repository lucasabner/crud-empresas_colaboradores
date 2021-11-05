    <?php
    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }

    class Empresa extends CI_Controller
    {

        public function __Construct()
        {
            parent::__Construct();

            $this->load->model('Empresa_model');
        }

        public function index(){
            redirect("empresas");
        }

        public function list()
        {
            $query['empresas'] = $this->Empresa_model->getAll();

            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('empresa/list', $query);
        }


        public function new()
        {
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('empresa/new');
        }

        public function edit($empresa_id)
        {
            $query['empresa'] = $this->Empresa_model->get($empresa_id);


            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('empresa/edit', $query);
        }

        public function insert()
        {

            $empresa['cnpj'] = $this->input->post('cnpj');
            $empresa['nome'] = $this->input->post('nome');
            $empresa['email'] = $this->input->post('email');
            $empresa['telefone'] = $this->input->post('telefone');
            $empresa['endereco'] = $this->input->post('endereco');


            $query = $this->Empresa_model->insert($empresa);

            if ($query) {
                $this->session->set_flashdata('success', 'Empresa Cadastrada com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Falha ao Cadastrar Empresa!');
            }
            redirect('empresas');
        }
        public function update($empresa_id)
        {
            $empresa['cnpj'] = $this->input->post('cnpj');
            $empresa['nome'] = $this->input->post('nome');
            $empresa['email'] = $this->input->post('email');
            $empresa['telefone'] = $this->input->post('telefone');
            $empresa['endereco'] = $this->input->post('endereco');


            $query = $this->Empresa_model->update($empresa, $empresa_id);

            if ($query) {
                $this->session->set_flashdata('success', 'Empresa Editada com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Falha ao Editar Empresa!');
            }
            redirect('empresas');
        }
        
        public function delete($empresa_id)
        {
            $query = $this->Empresa_model->delete($empresa_id);
            // confirmação e aviso q vai excluir os colaboradores

            if ($query) {
                $this->session->set_flashdata('success', 'Empresa Deletada com sucesso!');
            } else {
                $this->session->set_flashdata('delete', 'Falha ao Deletar Empresa!');
            }
            redirect('empresas');
        }
    }
