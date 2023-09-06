<?php

namespace App\Exports;

use App\Postulante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PostulanteExport implements FromView
{   
    public function view(): View{

        return view('postulantes.export', [
            'postulantes' => Postulante::all()
        ]);
    }
}