<?php

namespace App\Http\Controllers;

use App\Services\TeleMedicinaService;

class AtendimentoController extends Controller
{
    public function getListaAtendimentos()
    {
        $teleMedicinaService = new TeleMedicinaService;
        $atendimentos = $teleMedicinaService->getListaAtendimentos();
        if (isset($atendimentos['success'])) {
            return $atendimentos['content'];
        }

        return $atendimentos;
    }
}