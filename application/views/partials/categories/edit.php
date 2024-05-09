<h1 class="page-header">Editar categoría</h1>
<div class="row">
    <?php
        if ($category->num_rows() > 0) {
            $this->load->view('components/categories/form', [
                'category' => $category->row_array(),
                'form_action' => site_url('categories/update'),
                'form_id' => 'category-update-form',
                'btn_id' => 'category-update-btn',
                'btn_text' => '<span class="glyphicon glyphicon-refresh"></span> Actualizar'
            ]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>