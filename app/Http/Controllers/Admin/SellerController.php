<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seller\StoreSellerRequest;
use App\Http\Requests\Admin\Seller\UpdateSellerRequest;
use App\Models\Seller;
use App\Models\User;

class SellerController extends Controller
{
    
    public function index()
    {
        $sellers = Seller::with('user')->get();

        return view('admin.Seller.index', compact('sellers'));
    }

   
    public function create()
    {
        return view('admin.Seller.add_seller');
    }

   
    public function store(StoreSellerRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        
        $user->seller()->create([
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('sellers.index');
    }

    
    public function show(Seller $seller)
    {
        //
    }

    
    public function edit(Seller $seller)
    {
        return view('admin.Seller.edit_seller',compact('seller'));
    }

    
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        $validatedData = $request->validated();
    
        $seller->user()->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        $seller->update([
            'status' => $validatedData['status'],
        ]);
    
        return redirect()->route('sellers.index');
    }

    
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('sellers.index');
    }
}
