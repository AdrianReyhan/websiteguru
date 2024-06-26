<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default');
        }

        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        //satu siswa memiliki banyak mapel
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimestamps();
    }
}
