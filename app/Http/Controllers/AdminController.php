<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Call;

class AdminController extends Controller
{
    public function Admin()
    {
        return view('admin/admindashboard');
    }
    
    public function Create()
    {
        return view('admin/create');
    }
    
    public function View()
    {
        // return view('admin/view');
        $data = Slider::all();
        return view('admin/view', compact('data'));
    }
    
    public function Call()
    {
        return view('admin/callcreate');
    }
    
    public function Callview()
    {
        // return view('admin/view');
        $data = Call::all();
        return view('admin/callview', compact('data'));
    }
    
    public function Product()
    {
        return view('admin/Productcreate');
    }
    
    public function Productview()
    {
        // return view('admin/view');
        $data = Product::all();
        return view('admin/productview', compact('data'));
    }
    public function ProductEditY($id)
    {
        $data = Product::findOrFail($id);
        return view('admin/productedit', compact('data'));
    }
    
    
    
    
    /*================================news============================*/
    
    // Store a newly created resource in storage
    public function store(Request $request)
    {
        
        $products = new Product();
        $products->title2 = $request->title2;
        $products->description2 = $request->description2;
        $products->category_id = $request->input('category');
        
        if ($request->hasFile('image2')) {
            $imagePath2 = $request->file('image2')->store('/storage', 'public');
            $products->image2 = $imagePath2;
        }
        
        $products->save();
        
        return redirect()->back()->with('message', 'Product updated successfully!');
    }
    
    // Display the specified resource
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }
    
    // Show the form for editing the specified resource
    // public function edit($id)
    // {
        //     $news = News::findOrFail($id);
        //     return view('admin.news.edit', compact('news'));
        // }
        
        // Update the specified resource in storage
        public function update(Request $request, $id)
        {
            
            
            $data = Product::findOrFail($id);
            $data->title2 = $request->input('title2');
            $data->description2 = $request->input('description2');
            
            
            if ($request->hasFile('image2')) {
                $imgPath2 = $request->file('image2')->store('storage/', 'public');
                $data->image2 = $imgPath2;
            }
            
            $data->save();
            
            return redirect()->back()->with('message', 'Product updated successfully!');
            // return redirect()->route('product.view')->with('message', 'News updated successfully!');
        }
        
        // Remove the specified resource from storage
        // public function destroydel($id)
        // {
        //     $news = Product::findOrFail($id);
        //     $news->delete();
            
        //     return redirect()->back()->with('message', 'Product deleted successfully!');
        //     // return redirect()->route('product.view')->with('message', 'News deleted successfully!');
        // }


        public function destroydel($id)
{
    try {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete product: ' . $e->getMessage());
    }
}

        
        
        
        
        
        
        public function destroy(Request $request): RedirectResponse
        {
            Auth::guard('web')->logout();
            
            $request->session()->invalidate();
            
            $request->session()->regenerateToken();
            
            return redirect('/login');
        }
    }