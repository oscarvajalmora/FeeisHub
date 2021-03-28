<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FacebookGroup;

class FbGroupSelect extends Component
{
    public $facebookGroupName;
    public $facebookGroups;
    public $activeSearch;

    public function render()
    {
        $this->facebookGroups = FacebookGroup::where('name', 'LIKE', '%'.$this->facebookGroupName.'%')->take(2)->get();
        return view('livewire.fb-group-select');
    }

    public function updatedFacebookGroupName(){
        $this->activeSearch = true;           
    }
    public function setAsGroup($facebookGrouo){
        $this->facebookGroupName = $facebookGrouo['name'];
        $this->clearResults();
    }

    public function clearResults(){
        $this->facebookGroups = null;
        $this->activeSearch = false;
    }
}
