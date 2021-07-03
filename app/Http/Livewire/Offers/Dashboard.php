<?php

namespace App\Http\Livewire\Offers;

use Livewire\Component;
use App\Models\Location;
use App\Http\Traits\Cart;

class Dashboard extends Component
{
    use Cart;
    public $data = array();
    public $namaproject;
    public $price;
    public $contract_end;
    public $meet_date;
    public $meet_time;
    public $meet_location;
    public $city;
    public $village;
    public $state;
    public $addr_name;
    public $district;
    public $latitude;
    public $longitude;
    public $country;
    public $job_description;
    public $meetSeller;
    public $location;

    protected $listeners = ["selectProduct", "saveToSession", "updateLocation"];

    public function selectProduct($cartDetail)
    {
        $this->namaproject = $cartDetail['title'];
        $this->price = $cartDetail['price'];
        $this->meetSeller = $cartDetail['is_meet_seller'];
        $this->meet_date = $cartDetail['meet_date'];
        $this->meet_time = $cartDetail['meet_time'];
        $this->contract_end = $cartDetail['contract_end'];
        $this->job_description = $cartDetail['job_description'];
        $this->location = Location::where('id', $cartDetail['meet_location'])->first();
        $this->meet_location = $this->location['address'];
        if($this->meetSeller) {
            $this->dispatchBrowserEvent('maps:load');
        }
    }

    public function updatedMeetSeller()
    {
        if($this->meetSeller) {
            $this->dispatchBrowserEvent('maps:load');
        }
    }

    public function updateLocation($data)
    {
        foreach ($data as $key => $value) {
            $this->addr_name = $value['name'];
            $this->meet_location = $value['address'];
            $this->village = $value['village'];
            $this->district = $value['district'];
            $this->city = $value['city'];
            $this->state = $value['state'];
            $this->country = $value['country'];
            $this->latitude = $value['latitude'];
            $this->longitude = $value['longitude'];
        }
    }

    public function saveToSession($id)
    {
        $data = array(
            "title" => $this->namaproject,
            "job_description" => $this->job_description,
            "price" => $this->price,
            "is_meet_seller" => $this->meetSeller,
            "contract_end" => $this->contract_end,
            "meet_date" => $this->meet_date,
            "meet_time" => $this->meet_time,
            "meet_location" => $this->meet_location,
            "addr_name" => $this->addr_name,
            "village" => $this->village,
            "district" => $this->district,
            "city" => $this->city,
            "state" => $this->state,
            "country" => $this->country,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
        );
        $this->update($id, $data);
        $this->emit("updateCart");
    }

    public function render()
    {
        return view('livewire.offers.dashboard');
    }
}