<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class catFactController extends Controller
{
    public function show()
    {
        try {
            $catFact = Http::get('https://catfact.ninja/fact')->json('fact');
        } catch (\Exception $e) {
            $catFact = "Failed to get cat facts due to some error: " . $e->getMessage();
        }

        $response = [
            "status" => "success",
            "user" => [
                "email" => "anotarodney30@gmail.com",
                "name" => "Anita Rodney-Ajayi",
                "stack" => "PHP/Laravel"
            ],
            "timestamp" => now()->toIso8601String(),
            "fact" => $catFact
        ];

        return response()->json($response, 200)
            ->header('Content-Type', 'application/json');
    }
}
