<h1 class="page-header">Editar usuario</h1>
<div class="row">
    <?php
        if ($user->num_rows() > 0) {
            $this->load->view('components/users/form', [
                'user' => $user->row_array(),
                'form_id' => 'user-update-form',
                'btn_id' => 'user-update-btn',
                'btn_text' => '<span class="glyphicon glyphicon-refresh"></span> Actualizar'
            ]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>