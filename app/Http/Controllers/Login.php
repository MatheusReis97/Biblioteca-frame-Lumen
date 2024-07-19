<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Helpers\TokenGenerator;




class Login extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'senha']);
        $user = User::where('nm_email', $credentials['email'])->first();
        $mensagens = []; // Inicializa um array para armazenar as mensagens de erro
    
        if ($user) {
            if ($user->password_user === $credentials['senha']) {
                // Credenciais corretas, gerar o token JWT
                $customToken = TokenGenerator::generateToken($user->login_user);
    
                if ($customToken) {
                    // Cria o cookie com o token
                    setcookie('jwt', $customToken, time() + (60 * 60), '/'); // Cookie válido por 1 hora
                    return response()->json([
                        'access_token' => $customToken,
                        'token_type' => 'bearer',
                        'expires_in' => 3600 // Ajuste conforme necessário
                    ]);
                } else {
                    return response()->json(['error' => 'Erro na criação do token'], 500);
                }
            } else {
                $mensagens[] = 'Senha Inválida'; // Adicionar mensagem ao array de erros
            }
        } else {
            $mensagens[] = 'Email Inválido'; // Adicionar mensagem ao array de erros
        }
    
        // Retorna uma resposta de erro se as credenciais não forem válidas
        return response()->json([
            'errors' => $mensagens
        ], 401);
    }
    
    

    public function refresh()
    {
        $customToken = auth()->refresh();
        return $this->respondWithToken($customToken);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Logout with success!'
        ], 401);
    }

    protected function respondWithToken($customToken)
    {
        return response()->json([
            'access_token' => $customToken,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 // default 1 hour
        ]);
    }
}
