<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Http\Controllers\Api\BaseController;

class CategoryController extends BaseController
{
    protected CategoryService $svc;

    public function __construct(CategoryService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return $this->success(
            $this->svc->all(),
            'Berhasil mengambil semua data kategori'
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->svc->create(
            $request->validated()
        );

        return $this->success(
            $category,
            'Kategori berhasil dibuat',
            201
        );
    }

    public function show($id)
    {
        try {

            $category = $this->svc->find($id);

            return $this->success(
                $category,
                'Berhasil mengambil detail kategori'
            );

        } catch (\Exception $e) {

            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }

    public function update(
        UpdateCategoryRequest $request,
        $id
    ) {
        try {

            $category = $this->svc->update(
                $id,
                $request->validated()
            );

            return $this->success(
                $category,
                'Kategori berhasil diperbarui'
            );

        } catch (\Exception $e) {

            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }

    public function destroy($id)
    {
        try {

            $category = $this->svc->find($id);

            $this->svc->delete($id);

            return $this->success(
                $category,
                'Kategori berhasil dihapus'
            );

        } catch (\Exception $e) {

            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }
}