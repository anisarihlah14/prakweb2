<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class ItemController extends BaseController
{
    protected ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * GET /api/v1/items
     */
   public function index(Request $request)
{
    $items = $this->itemService->all();

    if ($request->filled('category_id')) {
        $items = $items->where(
            'category_id',
            $request->category_id
        )->values();
    }

    return $this->success(
        $items,
        'Berhasil mengambil semua data item'
        );
    }

    /**
     * GET /api/v1/items/{id}
     */
    public function show(int $id)
    {
        try {

            $item = $this->itemService->find($id);

            return $this->success(
                $item,
                'Berhasil mengambil detail item'
            );

        } catch (\Exception $e) {

            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }

    /**
     * POST /api/v1/items
     */
    public function store(StoreItemRequest $request)
    {
        $item = $this->itemService->create(
            $request->validated()
        );

        return $this->success(
            $item,
            'Item berhasil ditambahkan',
            201
        );
    }

    /**
     * PUT /api/v1/items/{id}
     */
    public function update(
        UpdateItemRequest $request,
        int $id
    ) {
        try {

            $item = $this->itemService->update(
                $id,
                $request->validated()
            );

            return $this->success(
                $item,
                'Item berhasil diperbarui'
            );

        } catch (\Exception $e) {

            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }

    /**
     * DELETE /api/v1/items/{id}
     */
    public function destroy(int $id)
    {
        try {

            $item = $this->itemService->find($id);

            $this->itemService->delete($id);

            return $this->success(
                $item,
                'Item berhasil dihapus'
            );

        } catch (\Exception $e) {

            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }
}