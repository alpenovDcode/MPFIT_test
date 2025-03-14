<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }
    public function create(): View
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Товар успешно создан.');
    }
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }
    public function edit(Product $product): View
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Товар успешно обновлен.');
    }
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Товар успешно удален.');
    }
} 