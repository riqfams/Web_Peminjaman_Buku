<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Prodi;
use App\Models\Anggota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\AnggotaExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\AnggotaRequest;
use App\Models\Ktp;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
    public function list(Request $request) {
        $keyword = $request->keyword;

        $anggota = Anggota::with(['prodi', 'ktp'])
                ->where('nama', 'like', '%'.$keyword.'%')
                ->orWhere('nim', 'like', '%'.$keyword.'%')
                ->orWhereHas('prodi', function($query) use($keyword){
                    $query->where('name', 'like', '%'.$keyword.'%');
                })
                // ->orWhereHas('ktp', function($query) use($keyword){
                //     $query->where('nik', 'like', '%'.$keyword.'%');
                // })
                // dd($anggota);
                ->paginate(10);
                
        return view('anggota/listAnggota',['anggota' => $anggota]); 
    }
    
    public function detail($slug) {
        $anggota = Anggota::where('slug', $slug)->first();
        return view('anggota/detailAnggota', ['anggota' => $anggota]);
    }

    public function tambah() {
        $prodi = Prodi::select('id', 'name')->get();
        return view('anggota/tambahAnggota', ['prodi' => $prodi]);
    }

    public function store(AnggotaRequest $request){
        $anggota = new Anggota;

        $anggota->nama = $request->nama;
        $anggota->kelamin = $request->kelamin;
        $anggota->nim = $request->nim;
        $anggota->prodi_id = $request->prodi_id;
        $anggota->alamat = $request->alamat;
        $anggota->slug = $request['slug'];
        $anggota->save();

        $ktp = new Ktp();
        $ktp->anggota_id = $anggota->id;
        $ktp->nik = $request->nik;
        $ktp->save();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil ditambahkan');
        }
        return redirect()->to('/anggota/list');
    }

    public function edit($slug){
        $anggota = Anggota::with(['prodi', 'ktp'])->where('slug', $slug)->first();
        // $prodi = Prodi::where('id', '!=', $anggota->prodi_id)->get(['id', 'name']);
        $prodi = Prodi::get(['id', 'name']);
        $ktp = Ktp::get(['anggota_id', 'nik']);

        return view('anggota/editAnggota', ['anggota' => $anggota, 'ktp' => $ktp, 'prodi' => $prodi]);
    }

    public function update(Request $request, $slug) {
        $anggota = Anggota::where('slug', $slug)->first();
        // dd($anggota);
        $request['slug'] = Str::slug($request->nama, '-');

        $anggota->nama = $request->nama;
        $anggota->kelamin = $request->kelamin;
        $anggota->nim = $request->nim;
        $anggota->prodi_id = $request->prodi_id;
        $anggota->alamat = $request->alamat;
        $anggota->slug = $request['slug'];
        $anggota->update();

        Ktp::where('anggota_id', $anggota->id)
            ->update([
                'nik' => $request->nik
            ]);

        // $ktp = Ktp::where('anggota_id', $anggota->id)->first();
        // // dd($ktp);
        // $ktp->update([
        //     'anggota_id' => $anggota->id,
        //     'nik' => $request->nik
        // ]);

        // $ktp = Ktp::find($anggota->id)->anggota;
        // dd($ktp);

        // $ktp->anggota_id = $anggota->id;
        // $ktp->nik = $request->nik;
        // $ktp->save();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil diubah');
        }
        return redirect()->to('/anggota/list');
    }

    public function delete($slug){
        $anggota = Anggota::where('slug', $slug)->first();
        return view('anggota/deleteAnggota', ['anggota' => $anggota]);
    }

    public function destroy($slug){
        $anggota = Anggota::where('slug', $slug)->first();
        $anggota->delete();
        
        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil dihapus');
        }
        return redirect()->to('/anggota/list');
    }

    public function deleted(){
        $anggota = Anggota::onlyTrashed()->get();
        return view('anggota/deletedAnggota', ['anggota' => $anggota]);
    }

    public function restore($id){
        $anggota = Anggota::withTrashed()->where('id', $id)->restore();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil dikembalikan');
        }
        return redirect()->to('/anggota/list');
    }

    public function massUpdate(){
        $anggota = Anggota::all();
        collect($anggota)->map(function($item){
            $item->slug = Str::slug($item->nama, '-');
            $item->save();
        });
    }

    public function export() 
    {
        //return Excel::download(new AnggotaExport, 'anggota-'.Carbon::now()->timestamp.'.xlsx');
        return (new AnggotaExport)->download('anggota-'.Carbon::now()->timestamp.'.xlsx');
        return redirect()->to('/anggota/list');
    }
}
