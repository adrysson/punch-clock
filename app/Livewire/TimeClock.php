<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeClock as TimeClockModel;

class TimeClock extends Component
{
    public array $timeClocks = [];

    public function mount()
    {
        $this->loadTimeClocks();
    }

    public function loadTimeClocks()
    {
        $this->timeClocks = Auth::user()->timeClocks()->paginate()->items();
    }

    public function punch()
    {
        Auth::user()->timeClocks()->create();
        $this->loadTimeClocks();
    }

    public function render()
    {
        return view('livewire.time-clock', [
            'timeClocks' => $this->timeClocks,
        ]);
    }
}
