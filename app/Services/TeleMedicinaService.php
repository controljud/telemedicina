<?php

namespace App\Services;

use App\Services\HttpService;

class TeleMedicinaService extends HttpService
{
    public function __construct()
    {
        $local = "";
        if (env('APP_ENV') == 'local') {
            $local = "_SANDBOX";
        }

        $this->url = env('TELEMEDICINA_URL' . $local);
        $this->headers = [
            'token' => env('TELEMEDICINA_TOKEN' . $local)
        ];
    }

    public function getListaAtendimentos()
    {
        return $this->get('integration/app-paciente/atendimento/listar');
    }

    public function getProximosAtendimentos()
    {
        return $this->get('integration/app-paciente/atendimento/listar/proximos');
    }

    public function getAtendimentosRealizados()
    {
        return $this->get('integration/app-paciente/atendimento/listar/realizados');
    }

    public function getAtendimentoAtivo()
    {
        return $this->get('integration/app-paciente/atendimento/imediato/ativo');
    }
}