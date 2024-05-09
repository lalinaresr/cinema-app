<h1 class="page-header">Ver género</h1>
<div class="row">
    <?php
        if ($gender->num_rows() > 0) {
            $this->load->view('components/genders/view', ['gender' => $gender->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>