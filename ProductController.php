<?php

class ProductController
{
    private $productsArray;

    public function __construct($productsArray)
    {
        $this->productsArray = $productsArray;
    }

    public function getTotalProducts()
    {
        return count($this->productsArray);
    }

    public function getProductsPerPage()
    {
        return 20;
    }

    public function getCurrentPage()
    {
        return isset($_GET['page']) ? intval($_GET['page']) : 1;
    }

    public function getStartProduct()
    {
        return ($this->getCurrentPage() - 1) * $this->getProductsPerPage();
    }

    public function getEndProduct()
    {
        return $this->getStartProduct() + $this->getProductsPerPage();
    }

    public function getProductsForCurrentPage()
    {
        $startProduct = $this->getStartProduct();
        $endProduct = $this->getEndProduct();
        $totalProducts = $this->getTotalProducts();

        $productsToDisplay = [];
        for ($i = $startProduct; $i < min($endProduct, $totalProducts); $i++) {
            $productsToDisplay[] = $this->productsArray[$i];
        }

        return $productsToDisplay;
    }

    public function getTotalPages()
    {
        return ceil($this->getTotalProducts() / $this->getProductsPerPage());
    }
}
