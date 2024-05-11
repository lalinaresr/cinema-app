<h1 class="page-header">Editar productor</h1>
<div class="row">
    <?php
        if ($productor->num_rows() > 0) {
            $this->load->view('components/productors/form', [
                'productor' => $productor->row_array(),
                'form_id' => 'productor-update-form',
                'btn_id' => 'productor-update-btn',
                'btn_text' => '<span class="glyphicon glyphicon-refresh"></span> Actualizar'
            ]);
        } else {
            $this->load->view('components/common/not-found');
        }
        
    ?>
</div>