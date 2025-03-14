<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create(): View
    {
        return view('categories.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Категория успешно создана.');
    }
    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Категория успешно обновлена.');
    }
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Категория успешно удалена.');
    }
} 