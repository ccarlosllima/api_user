<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

  
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function rules()
    {
        return [
            'name'      => 'required|string|min:20',
            'email'     => 'required|string|email|unique:users,email',
            'password'  => 'required|string|min:6' 
        ];
    }

    public function feedback()
    {
        return [
            // Validação de nome
            'name.required' => 'O nome e obrigatorio!',
            'name.string' => 'O nome tem que ser em formato string.',
            'nome.min' => "O minimo permitido e 20 caracteres.",

            // validação do email
            'email.required' => 'Obrigatorio informar o email',
            'email.string' => 'Email invalido, informe em formato de string',
            'email.email' => 'Informe um email valido',
            'email.unique' => 'Email ja esta cadastrado',
            
            // validação da senha

            'password.required' => 'Informe a senha',
            'password.string' => 'A senha tem que ser string',
            'password.max' => 'A senha deve possuir no minimo 6 caracteres'
        ];
    }
}
