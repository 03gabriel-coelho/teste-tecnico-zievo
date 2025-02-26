<?php

namespace App\Http\Controllers;
use App\Models\BooksModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index():JsonResponse
    {
        $books = BooksModel::orderBy('id', 'desc')->paginate(10);
        return response()->json([
            'status' => true,
            'books' => $books,
        ]);
    }
}
