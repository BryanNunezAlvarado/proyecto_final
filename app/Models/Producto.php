<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Scopes\UsuarioScope;

class Producto extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','precio','tipo','url','nombre'];
    
    protected static function booted()
    {
       // static::addGlobalScope(new UsuarioScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }
}
