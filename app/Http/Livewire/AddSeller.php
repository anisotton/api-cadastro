<?php

namespace App\Http\Livewire;

use App\Http\Resources\SellerResource;
use App\Models\Seller;
use Livewire\Component;

class AddSeller extends Component
{
    public $nome;
    public $email;
    protected $sellers;

    public function render()
    {
        $this->sellers = SellerResource::collection(Seller::paginate());
        return view('livewire.add-seller', ['sellers'=>$this->sellers]);
    }

    public function create()
    {
        Seller::create([
            'nome' => $this->nome,
            'email' => $this->email,
        ]);
        $this->email = '';
        $this->nome = '';
    }

    public function listSales(){
        return redirect()->to('/');
    }
}
