<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

/**
 * CRUD Product controller
 */
class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::with(['category', 'vendor'])
            ->when(request('category_id'), function (Builder $query): void {
                $query->where('category_id', request('category_id'));
            })
            ->when(request('name'), function (Builder $query): void {
                $query->where('name', request('name'));
            })
            ->when(request('vendor_name'), function (Builder $query): void {
                $query->byVendorName(request('vendor_name'));
            })
            ->when(request('vendor_id'), function (Builder $query): void {
                $query->where('user_id', request('vendor_id'));
            })
            ->when(request('sort_name'), function (Builder $query): void {
                $query->orderBy('name', request('sort_name', 'asc'));
            })
            ->when(request('sort_price'), function (Builder $query): void {
                $query->orderBy('price', request('sort_price', 'asc'));
            })
            ->ratingAvg()
            ->paginate(8);

        return response()->json($products, Response::HTTP_OK);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  Request  Request object with Product's data
     * @return JsonResponse Json response with created product
     */
    public function store(CreateProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return response()->json($product, Response::HTTP_CREATED);
    }

    /**
     * Display the requested product.
     *
     * @param  int  $product requested product to show
     * @return JsonResponse Json response with requested product
     */
    public function show(int $product): JsonResponse
    {
        $product = Product::with(['category', 'vendor', 'rating.user'])->ratingAvg()->find($product);
        return response()->json($product, Response::HTTP_OK);
    }
}
