<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class DocumentationConfiguration extends Component
{

    public $showConfiguration = true;

    public $brandToken = '';
    public $brandUrlUser = '';
    public $brandUrlSale = '';

    protected $rules = [
        'brandToken' => 'required|min:6',
        'brandUrlUser' => 'required|min:6',
        'brandUrlSale' => 'required|min:6',
    ];

    public function mount(bool $showConfiguration)
    {
        $this->showConfiguration = $showConfiguration;
        $brand = Brand::where("id_brand", "6")->where("status", "A")->with("confs", function ($query) {
            $query->where("status", "A")->select(["id_conf_brand", "id_brand", "brand_token", "url_user", "url_sale"]);
        })->first(["id_brand", "name","status"]);
        $this->brandToken = $brand->confs->brand_token;;
        $this->brandUrlUser = $brand->confs->url_user;
        $this->brandUrlSale = $brand->confs->url_sale;
    }

    public function render()
    {
        return view('livewire.documentation-configuration');
    }

    public function submit()
    {
        $this->validate();
 
        $brand = Brand::where("id_brand", "6")->where("status", "A")->with("confs", function ($query) {
            $query->where("status", "A")->select(["id_conf_brand", "id_brand", "brand_token", "url_user", "url_sale"]);
        })->first(["id_brand", "name","status"]);

        $brand->confs->brand_token = $this->brandToken;
        $brand->confs->url_user = $this->brandUrlUser;
        $brand->confs->url_sale = $this->brandUrlSale;
        $brand->confs->save();
        $this->dispatchBrowserEvent('save-brand-config', ['message' => "¡Configuración actualizada con éxito​​​​​​​!"]);
    }
}
