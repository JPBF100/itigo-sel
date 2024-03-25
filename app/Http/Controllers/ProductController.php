<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!(auth()->check())){
            return redirect()->route('login')->withErrors(['error' => 'Logout']);
        }
        $userId = auth()->user()->id;
        $totalproducts = Product::where('user_id', $userId)->count();
        $products = Product::where('user_id', $userId)->orderByDesc('id')->latest()->paginate(5);
        
        return view('products.index', [
            'products' => $products,
            'total' => $totalproducts
        ])->with(request()->input('page'));
    } 
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     * Cria um valor na dataBase
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'autor' => 'required',
            'titulo' => 'required',
            'spinoff' => 'required',
        ]);

        $request->merge(['user_id' => auth()->user()->id]);
        $request->merge(['capa' => 'https://www.gravatar.com/avatar/' . md5(Str::uuid())]);
        
        Product::create($request->all());
         
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'autor' => 'required',
            'titulo' => 'required',
            'spinoff' => 'required',
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}