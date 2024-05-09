<h1 class="page-header">Editar avatar</h1>
<div class="row">
    <?php
        if ($user->num_rows() > 0) {
            $this->load->view('components/users/avatar-form', ['user' => $user->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>