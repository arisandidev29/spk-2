<?php
namespace App\Service;

use App\Models\Token;
use Illuminate\Support\Str;


class TokenService 
{
    public function generateToken($length = 5) {
        $newToken = Str::random($length);

        $token = new Token();
        $token->token = $newToken;
        $token->save();


        return $token;
    }


    public function getToken() {
        $token = Token::latest()->first()->token;

        return $token;
    }
}



?>