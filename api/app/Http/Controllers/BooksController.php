<?php

namespace App\Http\Controllers;
use App\Models\BooksModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = BooksModel::query();

        if ($request->has('title') && !empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $books = $query->orderBy('id', 'desc')->paginate(10);
    
        return response()->json([
            'status' => true,
            'books' => $books,
        ]);
    }

    public function show($id): JsonResponse
    {
        $book = BooksModel::find($id);
    
        if (!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Livro não encontrado',
            ], 404);
        }
    
        return response()->json([
            'status' => true,
            'book' => $book,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        DB::beginTransaction();

        try{
            $book = BooksModel::create([
                'title' => $request->title,
                'author' => $request->author,
                'published_year' => $request->published_year,
                'genre' => $request->genre,
                'synopsis' => $request->synopsis,
                'pages' => $request->pages,
            ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Livro salvo com sucesso!',
                'book' => $book,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Erro ao salvar livro',
            ], 400);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $book = BooksModel::find($id);
    
        if (!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Livro não encontrado',
            ], 404);
        }

        DB::beginTransaction();

        try{
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'published_year' => $request->published_year,
                'genre' => $request->genre,
                'synopsis' => $request->synopsis,
                'pages' => $request->pages,
            ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Livro atualizado com sucesso!',
                'book' => $book,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Erro ao atualizar livro',
            ], 400);
        }
    }

    public function destroy($id): JsonResponse
    {
        $book = BooksModel::find($id);
    
        if (!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Livro não encontrado',
            ], 404);
        }

        DB::beginTransaction();

        try{
            $book->delete();
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Livro deletado com sucesso!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Erro ao deletar livro',
            ], 400);
        }
    }
}
