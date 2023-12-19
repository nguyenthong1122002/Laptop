<?php
// Controller.php
class Controllersearch {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function searchLaptops($searchTerm) {
        if (!empty($searchTerm)) {
            $productsArray = $this->model->searchLaptops($searchTerm);
            $totalProducts = count($productsArray);

            if ($totalProducts > 0) {
                $this->view->renderLaptopList($productsArray, $totalProducts);
            } else {
                $this->view->renderNoResult();
            }
        } else {
            $this->view->renderEmptySearch();
        }
    }
}
?>
