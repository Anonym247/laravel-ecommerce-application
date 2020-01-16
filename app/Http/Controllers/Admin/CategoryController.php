<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'List of all categories');

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listCategories('id', 'asc');

        $this->setPageTitle('Categories', 'Create Category');

        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'parent_id' => 'required|not_in:0',
            'image' => 'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if (!$category)
        {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }

        return $this->responseRedirect('admin.categories.index', 'The category added successfully', 'success', false, false);
    }

    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'Edit Category : ' . $targetCategory->name);
        return view('admin.categories.edit', compact('categories', 'targetCategory'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'parent_id' => 'required|not_in:0',
            'image' => 'mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);

        if (!$category)
        {
            return $this->responseRedirectBack('Error! Category can not been updated', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index','Success! Category is updated successfully!', 'success', false, false);
    }

    public function delete($id)
    {
        $category =  $this->categoryRepository->deleteCategory($id);

        if (!$category)
            return $this->responseRedirectBack('Error occurred while deleting a category', 'error', true, true);

        return $this->responseRedirect('admin.categories.index', 'Success! The category deleted successfully!', 'success', false, false);
    }
}
