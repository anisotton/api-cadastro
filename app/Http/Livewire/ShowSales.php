<?php

namespace App\Http\Livewire;

use App\Http\Resources\SaleResource;
use App\Models\{
    Sale,
    Seller
};
use Livewire\Component;

class ShowSales extends Component
{

    public $vendedor;
    public $valor;

    protected $sales;
    protected $sellers;

    public function render()
    {

        $this->sales = $this->sales??SaleResource::collection(Sale::with('seller')->paginate());
        $this->sellers = Seller::latest()->get();

        return view('livewire.show-sales',[
            'sales'=>$this->sales,
            'sellers'=>$this->sellers
        ]);
    }

    public function create()
    {
        Sale::create([
            'seller_id' => $this->vendedor,
            'valor' => str_replace(',','.',str_replace('.','',$this->valor)),
        ]);
        $this->vendedor = '';
        $this->valor = '';
    }

    public function listSales(){
        $this->sales = SaleResource::collection(Sale::with('seller')->where('seller_id',$this->vendedor)->paginate());
    }

    public function addSeller(){
        return redirect()->to('/add-seller');
    }

}
