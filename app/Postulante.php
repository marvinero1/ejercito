<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $auditTimestamps = true;
    protected $auditStrict = true;
    protected $auditThreshold = 100;

    protected $auditEvents = [
        'created',
        'saved',
        'deleted',
        'restored',
        'updated'
    ];
    
    protected $fillable = ['primer_nombre',
                        'segundo_nombre',
                        'primer_apellido',
                        'segundo_apellido',
                        'email',
                        'celular',
                        'ciudad',
                        'whatsapp',
                        'telefono',
                        'code',
                        'boucher'
                        ];
}
