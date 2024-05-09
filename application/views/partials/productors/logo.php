<h1 class="page-header">Editar logo</h1>
<div class="row">
    <?php
        if ($productor->num_rows() > 0) {
            $this->load->view('components/productors/logo-form', ['productor' => $productor->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>    
</div>