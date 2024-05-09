<h1 class="page-header">Editar género</h1>
<div class="row">
    <?php
        if ($gender->num_rows() > 0) {
            $this->load->view('components/genders/form', [
                'gender' => $gender->row_array(),
                'form_action' => site_url('genders/update'),
                'form_id' => 'gender-update-form',
                'btn_id' => 'gender-update-btn',
                'btn_text' => '<span class="glyphicon glyphicon-refresh"></span> Actualizar'
            ]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>