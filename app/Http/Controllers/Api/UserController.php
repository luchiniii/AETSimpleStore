<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $user = User::with('type')->when(request('type_id'), function (Builder $query) {
            $query->where('type_id', request('type_id'));
        })->get();

        return response()->json($user, Response::HTTP_OK);
    }
}
