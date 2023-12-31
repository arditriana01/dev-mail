<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

use Illuminate\Support\Facades\DB;

use App\Models\User;

class DataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function data()
    {
        $getDataUser = User::groupBy('created_at', 'status')
                            ->select('created_at', DB::raw('count(*) as total'))
                            ->select('status')
                            ->get();
        
        return view('data', compact('getDataUser'));
    }

    public function show()
    {
        return view('show');
    }

    public function storeDataName(Request $request)
    {           
        $request->validate([
            'file' => 'required|mimes:csv,xlsx'
        ]);        

        $file = $request->file('file');

        Excel::import(new UsersImport, $file);        
            
        return redirect()->route('data.data')->with('success', 'Data Berhasil di Import');
    }

    private function getShortenedName($fullName)
    {
        $nameParts = explode(" ", $fullName);
        $shortenedName = substr($nameParts[0], 0, 1);

        if (count($nameParts) > 1) {
            $shortenedName .= $nameParts[1];
        }

        return $shortenedName;
    }

    public function updateDataEmail()
    {
        $dataBalineseName = [
            "Wayan",
            "Made",
            "Nyoman",
            "Ketut",
            "I Wayan",
            "I Made",
            "I Nyoman",
            "I Ketut",
            "Ni Wayan",
            "Ni Made",
            "Ni Nyoman",
            "Ni Ketut",
            "Putu",
            "Gede",
            "Kadek",
            "Nengah",
            "Komang",
            "I Putu",
            "I Gede",
            "I Kadek",
            "I Nengah",
            "I Komang",
            "Ni Putu",
            "Ni Gede",
            "Ni Kadek",
            "Ni Nengah",
            "Ni Komang",    
            "Cokorda",
            "Tjokorda",
            "Ida Bagus",
            "Ida Bagus Wayan",
            "Ida Bagus Made",
            "Ida Bagus Nengah",
            "Ida Bagus Nyoman",
            "Ida Bagus Ketut",
            "Ida Bagus Putu",
            "Ida Bagus Kadek",
            "Ida Bagus Komang",
            "Ida Ayu",
            "Ida Ayu Wayan",
            "Ida Ayu Made",
            "Ida Ayu Nengah",
            "Ida Ayu Nyoman",
            "Ida Ayu Ketut",
            "Ida Ayu Putu",
            "Ida Ayu Kadek",
            "Ida Ayu Komang",
            "Anak Agung",
            "Anak Agung Wayan",
            "Anak Agung Made",
            "Anak Agung Nengah",
            "Anak Agung Nyoman",
            "Anak Agung Ketut",
            "Anak Agung Putu",
            "Anak Agung Kadek",
            "Anak Agung Komang",
            "Dewa Gede",
            "Dewa Gede Wayan",
            "Dewa Gede Made",
            "Dewa Gede Nengah",
            "Dewa Gede Nyoman",
            "Dewa Gede Ketut",
            "Dewa Gede Putu",
            "Dewa Gede Kadek",
            "Dewa Gede Komang",
            "Dewa Ayu",
            "Dewa Ayu Wayan",
            "Dewa Ayu Made",
            "Dewa Ayu Nengah",
            "Dewa Ayu Nyoman",
            "Dewa Ayu Ketut",
            "Dewa Ayu Putu",
            "Dewa Ayu Kadek",
            "Dewa Ayu Komang",
            "I Gusti Ngurah",
            "I Gusti",
            "Gusti",
            "Ngurah",
            "Desak",
            "Ngakan",
            "Kompyang",
            "Sang",
            "Sang Wayan",
            "Sang Made",
            "Sang Nengah",
            "Sang Nyoman",
            "Sang Ketut",
            "Sang Putu",
            "Sang Kadek",
            "Sang Komang",
            "Luh",
            "Luh Wayan",
            "Luh Made",
            "Luh Nengah",
            "Luh Nyoman",
            "Luh Ketut",
            "Luh Putu",
            "Luh Kadek",
            "Luh Komang",
            "Ni Luh",
            "Ni Luh Wayan",
            "Ni Luh Made",
            "Ni Luh Nengah",
            "Ni Luh Nyoman",
            "Ni Luh Ketut",
            "Ni Luh Putu",
            "Ni Luh Kadek",
            "Ni Luh Komang",
        ];
        $dataProdi = [
            "Manajemen" => "MM",
            "Akuntansi" => "AK",
            "Bisnis Digital" => "BD",
            "Desain Komunikasi Visual" => "DKV",
            "Informatika" => "IF",
            "Sistem Informasi" => "SI",
            "Sistem Informasi Akuntansi" => "SIA",
        ];

        $dataUser = User::all();
                
        function getFirstName($nama) {
            $namaArray = explode(' ', $nama);
            return $namaArray[0];
        }    

        foreach ($dataUser as $user) {
            $name = $user->name;
            $studyProgram = $user->prodi;
            $batch = $user->year;

            while (true) {
                $matchFound = false;
                $nameLowercase = strtolower($name);
                foreach ($dataBalineseName as $balineseName) {
                    $balineseNameLowercase = strtolower($balineseName);
                    if (strpos($nameLowercase, $balineseNameLowercase) === 0) {
                        $name = substr($name, strlen($balineseName));
                        $name = ltrim($name);
                        $matchFound = true;
                        break;
                    }
                }

                if (!$matchFound) {
                    break;
                }
            }    

            $firstName = getFirstName(strtolower($name));
            
            $prodi = isset($dataProdi[$studyProgram]) ? $dataProdi[$studyProgram] : $studyProgram;

            $newBatch = substr($batch, -2);

            $email = $firstName.$prodi.$newBatch.'@std.primakara.ac.id';

            // Cek apakah email sudah ada di database
            $count = User::where('email', $email)->count();

            if ($count > 0) {
                // Jika email sudah ada, tambahkan shortened name di belakang email
                $shortenedName = $this->getShortenedName($name);
                $newEmail = $shortenedName . $prodi . $newBatch . '@std.primakara.ac.id';
    
                // Pastikan shortened name yang baru juga unik
                $i = 2;
                while (User::where('email', $newEmail)->count() > 0) {
                    $newEmail = $shortenedName . $prodi . $newBatch . $i . '@std.primakara.ac.id';
                    $i++;
                }
    
                $user->email = $newEmail;
            } else {
                $user->email = $email;
            }
            
            $user->status = '1';
            $user->updated_at = now(); 
            $user->save();
        }

        return redirect()->back()->with('successGenerete', 'Email Berhasil di Generate!');
    }

    public function exportEmail()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
