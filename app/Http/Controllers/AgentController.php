<?php

namespace App\Http\Controllers;
use App\Neuron\Testagent;
use Illuminate\Http\Request;
use NeuronAI\Chat\Messages\UserMessage;

class AgentController extends Controller
{
    public function ask_form()
    {
        return view('askai');
    }
    public function ask()
    {
        $agent = Testagent::make();
        $response = $agent->chat(
            new UserMessage('hello who are you')
        );
        return view('', ['response' => $response->getContent()]);
    }

}
