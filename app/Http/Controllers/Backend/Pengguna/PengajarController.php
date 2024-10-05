<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersDetail;
use Illuminate\Http\Request;
use App\Http\Requests\PengajarRequest;
use ErrorException;
use Session;
use App\Models\LaporanAkademik;
use App\Models\dataMurid;
use App\Models\DataKelompokBelajar;
use App\Models\DataSemester;
use App\Models\DataTahunAjaran;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\LaporanAkademikRequest;
use Illuminate\Support\Facades\Auth;






class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = User::with('userDetail')->where('role', 'Guru')->get();
        return view('backend.pengguna.pengajar.index', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengajarRequest $request)
    {
        try {
            DB::beginTransaction();

            $image = $request->file('foto_profile');
            $nama_img = time() . "_" . $image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/profile';
            $image->storeAs($tujuan_upload, $nama_img);

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $user = new User;
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->username         = strtolower($username) . date("s");
            $user->role             = 'Guru';
            $user->status           = 'Aktif';
            $user->foto_profile     = $nama_img;
            $user->password         = bcrypt('12345678');
            $user->save();

            if ($user) {
                $userDetail = new UsersDetail();
                $userDetail->user_id      = $user->id;
                $userDetail->role         = $user->role;
                $userDetail->mengajar     = $request->mengajar;
                $userDetail->nip          = $request->nip;
                $userDetail->email        = $request->email;
                $userDetail->linkidln     = $request->linkidln;
                $userDetail->instagram    = $request->instagram;
                $userDetail->website      = $request->website;
                $userDetail->facebook     = $request->facebook;
                $userDetail->twitter      = $request->twitter;
                $userDetail->youtube      = $request->youtube;
                $userDetail->save();
            }

            $user->assignRole($user->role);
            DB::commit();
            Session::flash('success', 'Pengajar Berhasil ditambah !');
            return redirect()->route('backend-pengguna-pengajar.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
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
        $pengajar = User::with('userDetail')->where('role', 'Guru')->find($id);
        return view('backend.pengguna.pengajar.edit', compact('pengajar'));
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
        try {
            DB::beginTransaction();

            if ($request->foto_profile) {
                $image = $request->file('foto_profile');
                $nama_img = time() . "_" . $image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload, $nama_img);
            }


            $user = User::find($id);
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->status           = $request->status;
            $user->foto_profile     = $nama_img ?? $user->foto_profile;
            $user->password         = bcrypt('12345678');
            $user->save();

            if ($user) {
                $userDetail = UsersDetail::where('user_id', $id)->first();
                $userDetail->user_id      = $user->id;
                $userDetail->is_active    = $user->status == 'Aktif' ? '0' : '1';
                $userDetail->mengajar     = $request->mengajar;
                $userDetail->nip          = $request->nip;
                $userDetail->email        = $request->email;
                $userDetail->linkidln     = $request->linkidln;
                $userDetail->instagram    = $request->instagram;
                $userDetail->website      = $request->website;
                $userDetail->facebook     = $request->facebook;
                $userDetail->twitter      = $request->twitter;
                $userDetail->youtube      = $request->youtube;
                $userDetail->save();
            }

            DB::commit();
            Session::flash('success', 'Pengajar Berhasil diubah !');
            return redirect()->route('backend-pengguna-pengajar.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
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


    public function ListLaporanAkademik()
    {
        // dd(Auth::user()->id);
        $file = LaporanAkademik::with(['murid', 'semester', 'tahunAjaran', 'kelompokBelajar'])->get();
    
        $students = dataMurid::all();
        $kelompokbelajar = DataKelompokBelajar::all();
        $semester = DataSemester::all();
        $tahunajaran = DataTahunAjaran::all();
        
        return view('backend.website.content.LaporanAkademik.index', compact('file','students','kelompokbelajar', 'semester', 'tahunajaran'));
    }

    public function LaporanAkademikstore(Request $request)
    {
        $request->validate([
            'filelaporanakademik' => 'required|mimes:pdf|max:2048', // maksimal ukuran 2MB
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string'
        ]);

        try {
            $uploadFolder = public_path('public/file/laporanakademik');
            if (!is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0775, true);
            }
            chmod($uploadFolder, 0775);
            $file = $request->file('filelaporanakademik');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move('laporanakademik', $filename);

            $laporanAkademik = new LaporanAkademik;
            $laporanAkademik->id_murid     = $request->murid;
            $laporanAkademik->id_guru  = Auth::user()->id;
            $laporanAkademik->id_kelompokbelajar = $request->kelompokbelajar;
            $laporanAkademik->id_semester = $request->semester;
            $laporanAkademik->id_tahunajaran = $request->tahunajaran;
            $laporanAkademik->file     = $filename;
            $laporanAkademik->title     = $request->title;
            $laporanAkademik->desc      = $request->desc;
            $laporanAkademik->moral = $request->moral;
            $laporanAkademik->fisik_motorik = $request->fisik_motorik;
            $laporanAkademik->kognitif = $request->kognitif;
            $laporanAkademik->bahasa = $request->bahasa;
            $laporanAkademik->sosial_emosional = $request->sosial_emosional;
            $laporanAkademik->seni = $request->seni;
            $laporanAkademik->rekomendasi_orangtua = $request->rekomendasi_orangtua;
            $laporanAkademik->save();

            Session::flash('success', 'file laporan akademik Berhasil ditambah !');
            return redirect()->route('backend-laporanakademik.index');
        } catch (ErrorException $e) {

            throw new ErrorException($e->getMessage());
        }
    }

    public function LaporanAkademikedit($id)
    {
        $file = LaporanAkademik::find($id);
        $students = dataMurid::all();
        $kelompokbelajar = DataKelompokBelajar::all();
        $semester = DataSemester::all();
        $tahunajaran = DataTahunAjaran::all();
        return view('backend.website.content.LaporanAkademik.edit', compact('file','students','kelompokbelajar', 'semester', 'tahunajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function LaporanAkademikupdate(Request $request, $id)
    {
        try {
            $uploadFolder = public_path('public/file/laporanakademik');
            if (!is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0775, true);
            }
            chmod($uploadFolder, 0775);
            $file = $request->file('filelaporanakademik');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move('laporanakademik', $filename);


            $laporanAkademik = LaporanAkademik::find($id);
            $laporanAkademik->id_murid     = $request->murid;
            $laporanAkademik->id_guru  = Auth::user()->id;
            $laporanAkademik->id_kelompokbelajar = $request->kelompokbelajar;
            $laporanAkademik->id_semester = $request->semester;
            $laporanAkademik->id_tahunajaran = $request->tahunajaran;
            $laporanAkademik->file     = $filename;
            $laporanAkademik->title     = $request->title;
            $laporanAkademik->desc      = $request->desc;
            $laporanAkademik->moral = $request->moral;
            $laporanAkademik->fisik_motorik = $request->fisik_motorik;
            $laporanAkademik->kognitif = $request->kognitif;
            $laporanAkademik->bahasa = $request->bahasa;
            $laporanAkademik->sosial_emosional = $request->sosial_emosional;
            $laporanAkademik->seni = $request->seni;
            $laporanAkademik->rekomendasi_orangtua = $request->rekomendasi_orangtua;
            $laporanAkademik->save();

            Session::flash('success', 'file laporan akademik Berhasil ditambah !');
            return redirect()->route('backend-laporanakademik.index');
        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }
}
