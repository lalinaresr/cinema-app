<h1 class="page-header">Ver categoría</h1>
<div class="row">
    <?php
        if ($category->num_rows() > 0) {
            $this->load->view('components/categories/view', ['category' => $category->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>