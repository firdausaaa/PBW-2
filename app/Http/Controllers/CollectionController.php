<?php

// Firdaus Akbar Amrullah 6706223004 //


namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\DataTables\CollectionsDataTable;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $collections  = Collection ::all();
    //     return view('koleksi.daftarKoleksi', compact('collections'));
    // }
     public function index(CollectionsDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKoleksi'       => ['required', 'string', 'max:100' ],
            'jenisKoleksi'      => ['required', 'numeric', 'in:0,1,2'],
            'jumlahKoleksi'     => ['required', 'integer'],
        ]);

        $collection = Collection::create([
            'namaKoleksi'       => $request->namaKoleksi,
            'jenisKoleksi'      => $request->jenisKoleksi,
            'jumlahKoleksi'     => $request->jumlahKoleksi
        ]);
        return redirect()->route("koleksi.daftarKoleksi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view("koleksi.infoKoleksi", compact('collection'));
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
    public function update(Request $request, Collection $collections) //controller buat edit
    {
    $request->validate([
        'namaKoleksi' => 'required',
        'jenisKoleksi' => 'required|in:1,2,3',
        'jumlahKoleksi' => 'required|numeric',
    ]);
    
    // Perbarui data koleksi dengan data yang dikirimkan dari formulir
    
    $affacted = DB::table('collections')->where('id', $request->id)->update([
        'namaKoleksi' => $request->namaKoleksi,
        'jenisKoleksi' => $request->jenisKoleksi,
        'jumlahKoleksi' => $request->jumlahKoleksi,
    ]
    );
    // Redirect ke halaman yang sesuai, misalnya, halaman daftar koleksi
    return redirect()->route('koleksi.daftarKoleksi')->with('success', 'Koleksi berhasil diperbarui.');
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
