<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $brandRepository, $categoryRepository, $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository      =   $brandRepository;
        $this->categoryRepository   =   $categoryRepository;
        $this->productRepository    =   $productRepository;
    }

    public function index()
    {
        $products =  $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Products list');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Create New Product');
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->createProduct($params);

        if (!$product)
        {
            return $this->responseRedirectBack('An error occurred while creating new product', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully!', 'success', false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $productCategoriesIDs = $product->categories->pluck('id')->toArray();

        $this->setPageTitle('Product', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'product', 'productCategoriesIDs'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->updateProduct($params);

        if (!$product)
        {
            return $this->responseRedirectBack('Error while updating product!', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully!', 'success', false, false);
    }

    public function delete($id)
    {
        $product = $this->productRepository->deleteProduct($id);

        if (!$product)
        {
            return $this->responseRedirectBack('Error while deleting product', 'error', false, false);
        }
        return $this->responseRedirect('admin.products.index', 'Product deleted successfully!', 'success', false, false);
    }
}
