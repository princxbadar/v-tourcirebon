<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class SuperAdminController extends Controller
{
    public function showManageCategories(): View{
        $data['categories'] = Category::all();
        return view('super-admin.manage-categories',$data);

    }
    public function createCategories(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'catName' => 'required',
            ]);

            // Data preparation
            $params = [
                'catName' => $request->catName,
            ];

            // Categories creation
            $insert = Category::create($params);

            // Redirection with success message
            return redirect()->route('admin.categories')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (ValidationException $e) {
            dd($e->validator->errors());
            // Handle validation errors
            return back()->withErrors($e->validator->errors());
        }
    }

    public function updateCategory(Request $request, $id): RedirectResponse{
        $request->validate([
            'catName' => 'required',
        ]);
        // get data by ID
        $categories = Category::findOrFail($id);

        $categories->update([
            'catName' => $request->catName
        ]);
        return redirect()->route('admin.categories')->with(['success' => 'Data Berhasil Disimpan!']);

    }
    public function showManageAccount(): View {
        $data['user'] = User::all();

        return view('super-admin.manage-account',$data);
    }
    public function addUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

            return redirect()->route('manage.accounts')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroyCategories($id)
    {
        $categories = Category::findOrFail($id);


            //delete categories
            $categories->delete();
        //redirect to index
        return redirect()->route('admin.categories')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);


            //delete categories
            $user->delete();
        //redirect to index
        return redirect()->route('manage.accounts')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
