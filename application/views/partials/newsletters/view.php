<h1 class="page-header">Ver seguidor</h1>
<div class="row">
    <?php
        if ($newsletter->num_rows() > 0) {
            $this->load->view('components/newsletters/view', ['newsletter' => $newsletter->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>