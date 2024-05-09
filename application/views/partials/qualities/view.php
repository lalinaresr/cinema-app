<h1 class="page-header">Ver calidad</h1>
<div class="row">
    <?php
        if ($quality->num_rows() > 0) {
            $this->load->view('components/qualities/view', ['quality' => $quality->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>