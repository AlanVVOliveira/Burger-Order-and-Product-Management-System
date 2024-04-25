<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\ProductController;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('is_active', 1)->with('products')->get();

        // Define os cabeçalhos de controle de cache para garantir que a página seja sempre recarregada e evite só exibir o json
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        if ($request->ajax()) {
            // Se for uma chamada AJAX, retorna os dados JSON
            return response()->json(['orders' => $orders]);
        } else {
            // Se for uma solicitação regular, retorna a página HTML
            return view('orders.index', compact('orders'));
        }
    }

    public function create(Request $request)
    {
        $products = Product::where('is_active', 1)->get();

        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        if ($request->ajax()) {

            return response()->json(['products' => $products]);
        } else {

            return view('orders.create', compact('products'));
        }
    }

    public function store(Request $request)
    {
        try {
            // Regras de validação dos dados do formulário
            $rules = [
                'client_name' => 'required|regex:/^[\pL\s]+$/u|max:255',
                'bill' => 'required|numeric',
            ];
            
            $messages = [
                'client_name.required' => 'O nome do cliente é obrigatório.',
                'client_name.regex' => 'O nome do cliente deve conter apenas letras.',
                'client_name.max' => 'O nome do cliente precisa ter no máximo 255 caracteres.',
                'bill.required' => 'O valor total do pedido é obrigatório.',
                'bill.numeric' => 'O valor total deve ser um valor numérico.'
            ];

            // Validação das entradas
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            } else {

                // Cria um novo pedido
                $order = Order::create([
                    'client_name' => $request->input('client_name'),
                    'bill' => $request->input('bill')
                ]);

                // Adiciona os produtos ao pedido
                foreach ($request->products as $productData) {
                    $product = Product::findOrFail($productData['id']);
                    $quantity = $productData['quantity'];

                    // Anexa o produto ao pedido com a quantidade fornecida
                    $order->products()->attach($product->id, ['quantity' => $quantity]);
                }

                return response()->json(['message' => 'Pedido feito com sucesso!', 'order' => $order]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::info($request->all());
            return response()->json(['message' => 'Erro ao processar o pedido. Por favor, tente novamente.'], 500);
        }
        
    }

    public function update(Request $request, $id) 
    {
        try {
            // Lógica para desabilitar o registro (Oposto do método destroy, onde o pedido recebe o status de cancelado)
            $order = Order::findOrFail($id);
            $order->is_active = 0;
            $order->status = 'delivered';
            $order->save();
        
            return response()->json(['message' => 'Pedido entregue com sucesso.']);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::info($request->all());
            return response()->json(['message' => 'Erro ao processar entrega do pedido. Por favor, tente novamente.'], 500);
        }
    }

    public function destroy(Request $request, $id) 
    {
        try {
            $order = Order::findOrFail($id);
            $order->is_active = 0;
            $order->status = 'canceled';
            $order->save();
        
            return response()->json(['message' => 'Pedido cancelado.']);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::info($request->all());
            return response()->json(['message' => 'Erro ao processar cancelamento do pedido. Por favor, tente novamente.'], 500);
        }
    }
}