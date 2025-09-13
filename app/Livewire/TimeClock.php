<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeClock as TimeClockModel;

class TimeClock extends Component
{
    public $timeClocks = [];

    public function mount()
    {
        $this->loadTimeClocks();
    }

    public function loadTimeClocks()
    {
        $this->timeClocks = Auth::user()->timeClocks()->latest()->limit(5)->get();
    }

    public function punch()
    {
        $user = Auth::user();
        TimeClockModel::create(['user_id' => $user->id]);
            $this->loadTimeClocks();
    }

    public function render()
    {
        return view('livewire.time-clock', [
            'timeClocks' => $this->timeClocks,
        ]);
    }
}
