<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Canteen;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hor = 3;
        $ver = 7;
        echo "Nilai horizontal: $hor <br>";
        echo "Nilai vertikal  : $ver <br> <br>";
        for ($i = 1 ; $i < $hor+1 ; $i++){
            for ($j = 1 ; $j < $ver+1 ; $j++){
                echo "Hasil perkalian $i x $j adalah " . $i*$j . "<br>";
            }
            echo "<br><br>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.canteen.add-canteen', [
            'title' => 'Form Buka Kantin',
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
        if(!auth()->check()){
            return abort(403);
        }

        $validated = $request->validate([
            'nama_pemilik' => 'required|max:100',
            'nama_kantin' => 'required|max:100',
            'no_hp' => 'required|unique:canteens|min:10|max:13',
            'alamat' => 'required|max:255',
            'foto' => 'required|image|file|mimes:jpg,png|max:1024',
            'banner' => 'required|image|file|mimes:jpg,png|max:1024',
            'deskripsi' => 'required|min:20|max:255',
            'snk' => 'required',
        ]);
        
        $validated['user_id'] = auth()->user()->id;
        $validated['foto'] = $request->file('foto')->store('foto-kantin');
        $validated['banner'] = $request->file('banner')->store('banner-kantin');

        User::where('id', auth()->user()->id)->update(['level' => 2]);
        Canteen::create($validated);

        return redirect()->back()->with('canteen-success', 'Pengajuan pembukaan kantin berhasil. Silakan tunggu 2x24 jam untuk proses verifikasi atau anda bisa langsung menguhubungi administrator.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $recomended_menus = Menu::where('is_recomended', 'on')->where('is_active', 'on')->get();
        $all_menus = Menu::where('is_active', 'on')->get();
        
        // membuat collection category untuk kantin
        $menus = Menu::where('is_active', 'on')->get();
        $counts = $menus->countBy(function($menu){
            return $menu->category_id;
        });
        $categories_temp = array_keys($counts->all()) ;
        $categories = [];
        foreach($categories_temp as $cat){
            foreach(Category::all() as $cate){
                if($cat == $cate->id){
                    $cat = $cate->name;
                    $categories[] = $cat;
                }
            }
        }

        $categories_temp = collect($categories_temp);
        $categories = $categories_temp->combine($categories);
        $canteen = Canteen::find($id);
        if(!$canteen){
            return abort(404);
        }
        return view('main.canteen.index', [
            'title' => 'Kantin - ' . $canteen->nama_kantin,
            'canteen' => $canteen,
            'menus' => $all_menus,
            'categories' => $categories,
            'recomended_menus' => $recomended_menus,
        ]);
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
    public function destroy($id)
    {
        //
    }
}
