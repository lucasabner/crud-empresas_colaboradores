    <?php
    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }

    class Colaborador extends CI_Controller
    {

        public function __Construct()
        {
            parent::__Construct();

            $this->load->model('Colaborador_model');

        }

        public function list($empresa_id)
        {
            $query['colaboradores'] = $this->Colaborador_model->getAll($empresa_id);
            $query['empresa_id'] = $empresa_id;

            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('colaborador/list', $query);
        }

        public function new($empresa_id)
        {
            $query['empresa_id'] = $empresa_id;

            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('colaborador/new', $query);
        }

        public function edit($colaborador_id)
        {
            $query['colaborador'] = $this->Colaborador_model->get($colaborador_id);


            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('colaborador/edit', $query);
        }

        public function insert($empresa_id)
        {

            $colaborador['cpf'] = $this->input->post('cpf');
            $colaborador['nome'] = $this->input->post('nome');
            $colaborador['email'] = $this->input->post('email');
            $colaborador['telefone'] = $this->input->post('telefone');
            $colaborador['endereco'] = $this->input->post('endereco');
            $colaborador['empresa_id'] = $empresa_id;


            $query = $this->Colaborador_model->insert($colaborador);

            if ($query) {
                $this->session->set_flashdata('success', 'Colaborador Cadastrado com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Falha ao Cadastrar Colaborador!');
            }
            redirect('colaboradores/empresa/' . $empresa_id);
        }
        public function update($colaborador_id)
        {
            $colaborador['cpf'] = $this->input->post('cpf');
            $colaborador['nome'] = $this->input->post('nome');
            $colaborador['email'] = $this->input->post('email');
            $colaborador['telefone'] = $this->input->post('telefone');
            $colaborador['endereco'] = $this->input->post('endereco');


            $query = $this->Colaborador_model->update($colaborador, $colaborador_id);

            if ($query) {
                $this->session->set_flashdata('success', 'Colaborador Editado com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Falha ao Editar Colaborador!');
            }
            redirect('colaboradores/empresa/' . $this->input->post('empresa_id'));
        }

        public function delete($colaborador_id, $empresa_id)
        {
            $query = $this->Colaborador_model->delete($colaborador_id);
            // confirmação e aviso q vai excluir os colaboradores

            if ($query) {
                $this->session->set_flashdata('success', 'Colaborador Deletado com sucesso!');
            } else {
                $this->session->set_flashdata('delete', 'Falha ao Deletar Colaborador!');
            }
            redirect('colaboradores/empresa/' .$empresa_id);
        }
    }
