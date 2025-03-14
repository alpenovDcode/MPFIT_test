<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }
    public function create(): View
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);
        Order::create($request->all());
        return redirect()->route('orders.index')
            ->with('success', 'Заказ успешно создан.');
    }
    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }
    public function edit(Order $order): View
    {
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }
    public function update(Request $request, Order $order): RedirectResponse
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:новый,выполнен',
            'comment' => 'nullable|string',
        ]);
        $order->update($request->all());
        return redirect()->route('orders.index')
            ->with('success', 'Заказ успешно обновлен.');
    }
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('orders.index')
            ->with('success', 'Заказ успешно удален.');
    }
    public function complete(Order $order): RedirectResponse
    {
        $order->update(['status' => 'выполнен']);
        return redirect()->route('orders.index')
            ->with('success', 'Статус заказа изменен на "выполнен".');
    }
} 