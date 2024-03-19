<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidos',
        'fecha_nacimiento',
        'dni',
        'direccion',
        'email',
        'password',
        'genero',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    //RELACIONES

    public function dietista()
    {
        return $this->hasOne(Dietista::class);
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }


    //Tipo de usuario que accede
    //HEMOS HECHO MODIFICACIONES MOMENTANEAS PARA PODER ACCEDER SIN PROBLEMA COMO ADMINISTRADOR, POR AHORA HE ANULADO TODO LO DE PACIENTE

    public function getTipoUsuarioIdAttribute(){
        if ($this->dietista()->exists()){
            return 1;
        }
        else {
            return 2;
        }
       // else{
         //   return 3;
        //}
    }

    public function getTipoUsuarioAttribute(){
        $tipos_usuario = [1 => trans('Dietista'), 2 => trans('Administrador')];
        //, 3 => trans('Administrador')
        return $tipos_usuario[$this->tipo_usuario_id];
    }

    //public function getEsPacienteAttribute(){
      //  return $this->tipo_usuario_id == 2;
    //}

    public function getEsDietistaAttribute(){
        return $this->tipo_usuario_id == 1;
    }

    public function getEsAdministradorAttribute(){
        return $this->tipo_usuario_id == 2;
    }


}
