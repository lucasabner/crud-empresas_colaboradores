<?php

    function validar($num)
    {
        // Se o CPF ou CNPJ já existe vai retornar true
        $obj = &get_instance();
	    $obj->load->model('Validacao_model');
        if (strlen($num) == 18)
            return $obj->Validacao_model->verificaCNPJ($num);
        else if (strlen($num) == 14)
            return $obj->Validacao_model->verificaCPF($num);
        else
            return false;
    }