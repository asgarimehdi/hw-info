<?php

namespace App\Livewire;

use App\Models\DeathRecord;
use Livewire\Component;
use App\Models\Region_counties;
use App\Models\Region_points;
use App\Models\CauseOfDeath;
use Illuminate\Support\Facades\Auth;

class DeathRecordForm extends Component
{
    public $apiKey;
    public $regionCounties;
    public function mount()
    {
        $this->apiKey = env('NESHAN_API_KEY');
        $this->regionCounties = Region_counties::all();
        //$this->causes = CauseOfDeath::all();
        $this->causes = CauseOfDeath::all() ?? collect([]);

        $user = Auth::user();
        if ($user && $user->point_id) {
            $region = Region_points::where('id', $user->point_id)->first();
            $this->point_name = $region->name;
            $this->location = $region->name;
            if ($region && $region->boundary) {

                $this->boundary = json_decode($region->boundary, true);
            }
        }
    }
    public $location;
    public $death_date;
    public $cause_of_death;
    public $lat;
    public $lng;
    public $boundary;
    public $causes;
    public $point_name;
    public $national_id;
    public $description;
    public $national_id_check;
    protected $rules = [
        'location' => 'required|string|max:255',
        'death_date' => 'required|date',
        'cause_of_death' => 'required|string|max:255',
        'lat' => 'required|numeric',
        'lng' => 'required|numeric',
        'description' => 'nullable|string|max:1000',
        'national_id' => 'required|digits:10|unique:death_records,national_id',
    ];
    public function updatedNationalId($value)
    {
        if (!$this->isValidNationalCode($value)) {
            $this->addError('national_id', 'کد ملی نامعتبر است.');
            $this->national_id_check = false;
            // dd($this->getErrorBag()); // تست نمایش خطاها
        } else {
            $this->national_id_check = true;
            $this->resetErrorBag('national_id');
        }
    }



    public function submit()
    {
        //  \Log::info('Lat & Lng Before Validation:', ['lat' => $this->lat, 'lng' => $this->lng]);


        $this->validate();


        if ($this->national_id_check == true) {
            DeathRecord::create([
                'user_id' => auth()->id(),
                'location' => $this->point_name,
                'death_date' => $this->death_date,
                'cause_of_death' => $this->cause_of_death,
                'lat' => $this->lat,
                'lng' => $this->lng,
                'national_id' => $this->national_id,
                'description' => $this->description,
            ]);

            session()->flash('message', 'ثبت مرگ با موفقیت انجام شد.');

            $this->reset(['description', 'national_id']);
        } else {
            $this->addError('national_id', 'کد ملی نامعتبر است.');
        }
    }
    private function isValidNationalCode($code)
    {
        if (!preg_match('/^\d{10}$/', $code)) {
            return false;
        }

        $digits = str_split($code);
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $digits[$i] * (10 - $i);
        }
        $remainder = $sum % 11;
        $controlDigit = $digits[9];

        return ($remainder < 2 && $controlDigit == $remainder) || ($remainder >= 2 && $controlDigit == (11 - $remainder));
    }

    public function render()
    {
        return view('livewire.death-record-form');
    }
}