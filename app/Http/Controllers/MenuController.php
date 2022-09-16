<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('canteen-dashboard');
        $active_menus = Menu::where('is_active', 'on')->get();
        $empty_menus = Menu::where('is_empty', 'on')->where('is_active', 'on')->get();
        $recomended_menus = Menu::where('is_recomended', 'on')->where('is_active', 'on')->get();
        $inactive_menus = Menu::where('is_active', null)->get();
        return view('canteen-dashboard.menu.index', [
            'title' => 'Dashboard Kantin - Menu',
            'active_menus' => $active_menus,
            'empty_menus' => $empty_menus,
            'recomended_menus' => $recomended_menus,
            'inactive_menus' => $inactive_menus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('canteen-dashboard');
        return view('canteen-dashboard.menu.add-menu', [
            'title' => 'Dashboard Kantin - Add Menu',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('canteen-dashboard');

        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'required|image|file|mimes:jpg,png|max:1024',
            'harga' => 'required|integer',
            'category_id' => 'required|integer|max:10',
            'deskripsi' => 'max:255',
        ]);

        $validated['name'] = str($validated['name'])->title();

        try{
            $validated['photo'] = $request->file('photo')->store('menu-photo');

            if($validated['photo'] == $request->photo){
                throw new Exception('Fotonya gak kesimpan');
            }
        } catch (Exception $e){
            echo $e->getMessage();
            die();
        }

        $validated['canteen_id'] = auth()->user()->id;

        Menu::create($validated);
        
        return redirect(route('menu.index'))->with('success-add-menu', 'Berhasil menambahkan item ke menu.');
    
        
    }

    /**
     * Display the specified resource.
     *1
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($menu)
    {
        $this->authorize('canteen-dashboard');

        $menu = Menu::find($menu);
        Storage::delete($menu->photo);
        $menu->delete();

        return redirect(route('menu.index'))->with('success-delete-menu', 'Berhasil menghapus item dari menu');
    }

    public function setting($menu)
    {
        $this->authorize('canteen-dashboard');
        $detail = Menu::find($menu);
        $recomended_menus = count(Menu::where('is_recomended', 'on')->where('is_active', 'On')->get()) == 3;
        return view('canteen-dashboard.menu.setting', [
            'title' => 'Setting Menu',
            'detail' => $detail,
            'recomended_menus' => $recomended_menus,
        ]);
    }

    public function tst(Request $request, $menu)
    {
        $this->authorize('canteen-dashboard');
        
        if($request->is_active == null){
            $request->is_active = null;
            $request->is_recomended = null;
            // dd($request);
        }

        $res = Menu::where('id', $menu)->update([
            'is_empty' => $request->is_empty ?? null,
            'is_active' => $request->is_active ?? null,
            'is_recomended' => $request->is_recomended ?? null,
        ]);

        $menus = Menu::find($menu);
        $message = '';

        if($res){
            $message = "Berhasil mengatur menu " . $menus->name;
        } else {
            $message = "Gagal mengatur menu " . $menus->name . ". Coba lagi!";
        }
        
        return redirect(route('menu.index'))->with('success-setting', $message);
    }
}