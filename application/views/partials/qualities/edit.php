<h1 class="page-header">Editar calidad</h1>
<div class="row">
    <?php
        if ($quality->num_rows() > 0) {
            $this->load->view('components/qualities/form', [
                'quality' => $quality->row_array(),
                'form_id' => 'quality-update-form',
                'btn_id' => 'quality-update-btn',
                'btn_text' => '<span class="glyphicon glyphicon-refresh"></span> Actualizar'
            ]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>