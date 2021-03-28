<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReportedProfile;

class ReportedProfileSelect extends Component
{
    public $url;
    public $reportedProfiles;
    public $activeSearch = false;

    public function render()
    {
        $this->reportedProfiles = ReportedProfile::where('url', 'LIKE', '%'.$this->url.'%')->take(2)->get();
        return view('livewire.reported-profile-select');
    }

    public function updatedUrl(){
        $this->activeSearch = true;           
    }

    public function setAsReported($reportedProfile){
        $this->url = $reportedProfile['url'];
        $this->clearResults();
    }

    public function clearResults(){
        $this->reportedProfiles = null;
        $this->activeSearch = false;
    }
}
