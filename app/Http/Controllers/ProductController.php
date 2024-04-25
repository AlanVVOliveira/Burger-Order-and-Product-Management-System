<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('is_active', 1)->get();

        // Define os cabeçalhos de controle de cache para garantir que a página seja sempre recarregada e evite só exibir o json
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        if ($request->ajax()) {
            // Se for uma chamada AJAX, retorna os dados JSON
            return response()->json(['products' => $products]);
        } else {
            // Se for uma solicitação regular, retorna a página HTML
            return view('products.index', compact('products'));
        }
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
            // Regras de validação dos dados do formulário
            $rules = [
                'name' => 'required|regex:/^[\pL\s\d]+$/u|min:2|max:255',
                'description' => 'required|min:2|max:255',
                'price' => 'required|numeric|max:10',
            ];
            
            $messages = [
                'name.required' => 'O nome do produto é obrigatório.',
                'name.regex' => 'O nome do produto pode conter letras, números e espaços.',
                'name.max' => 'O nome do produto precisa ter no máximo 255 caracteres.',
                'name.min' => 'O nome do produto precisa ter no mínimo 2 caracteres.',
                'description.required' => 'A descrição do produto é obrigatória.',
                'description.max' => 'A descrição precisa ter no máximo 255 caracteres.',
                'description.min' => 'A descrição precisa ter no mínimo 2 caracteres.',
                'price.required' => 'O preço do produto é obrigatório.',
                'price.numeric' => 'O preço deve ser um valor numérico.',
                'price.max' => 'O preço precisa ter no máximo 10 caracteres.'
            ];

            // Validação das entradas
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            } else {
                // Criação do novo produto
                Product::create([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                ]);
                return response()->json(['message' => 'Produto cadastrado com sucesso!'], Response::HTTP_CREATED);
            }

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::info($request->all());
            return response()->json(['message' => 'Erro ao processar cadastro do produto. Por favor, tente novamente mais tarde.'], 500);
        }
    }

    public function edit($id)
    {
        // Marca a página como acessada pela rota de edição
        session()->put('editing_product', true);

        // Retorna os dados para a página de edição
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            // Regras de validação dos dados do formulário
            $rules = [
                'name' => 'required|regex:/^[\pL\d\s.,-]*$/u|min:2|max:255',
                'description' => 'required|min:2|max:255',
                'price' => 'required|numeric|max:10',
            ];
            
            $messages = [
                'name.required' => 'O nome do produto é obrigatório.',
                'name.regex' => 'O nome do produto pode conter letras, números e espaços.',
                'name.max' => 'O nome do produto precisa ter no máximo 255 caracteres.',
                'name.min' => 'O nome do produto precisa ter no mínimo 2 caracteres.',
                'description.required' => 'A descrição do produto é obrigatória.',
                'description.max' => 'A descrição precisa ter no máximo 255 caracteres.',
                'description.min' => 'A descrição precisa ter no mínimo 2 caracteres.',
                'price.required' => 'O preço do produto é obrigatório.',
                'price.numeric' => 'O preço deve ser um valor numérico.',
                'price.max' => 'O preço precisa ter no máximo 10 caracteres.'
            ];

            // Validação das entradas
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            } else {
                
                // Lógica para atualizar os dados
                $product->update($request->all());
                return response()->json(['message' => 'Produto atualizado com sucesso.']);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::info($request->all());
            return response()->json(['message' => 'Erro ao processar atualização do produto. Por favor, tente novamente mais tarde.'], 500);
        }
    }

    public function destroy($id)
    {
        // Lógica para desabilitar o produto (não apaga o produto, apenas altera o is_active)
        $product = Product::findOrFail($id);
        $product->is_active = 0;
        $product->save();
    
        return response()->json(['message' => 'Produto desativado com sucesso.']);
    }
}