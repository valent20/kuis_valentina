<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'mahasiswa_id';
    protected $fillable   = [
        'nama_mahasiswa',
        'NIM',
        'email',
        'jurusan',
        'alamat',
    ];
}
