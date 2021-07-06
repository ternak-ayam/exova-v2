<?php 
namespace App\Http\Traits;

use App\Models\Location;
use Illuminate\Support\Str;
use App\Models\OrderRequest;

trait CreateOrderRequests { 

    use Chat;
    public $user;
    public $message;
    public $idFiles = [];

    public function createRequest($data)
    {
        try {
            $create = OrderRequest::create([
                'uuid' => Str::uuid(),
                'product_id' => $data['id'],
                'customer_id' => auth()->user()->id,
                'seller_id' => $data['seller_id'],
                'location_id' => $data['location_id'] ?? null,
                'title' => $data['title'],
                'description' => $data['job_description'],
                'max_return' => $data['max_return'],
                'is_meet_seller' => $data['is_meet_seller'] ?? false,
                'price' => $data['price'],
                'due_at' => $data['contract_end'] ?? now()->addDays(10),
                'meet_at' => $data['meet_date'] . ' ' . $data['meet_time'],
                'status' => OrderRequest::IS_REQUESTED,
            ]);
            session()->put('chat.room', $create['id']);
            $this->user = $create['customer_id'];
            $this->message = "Halo, saya ingin menawarkan pekerjaan " . $create['title'] . " apakah bisa?";
            $this->send($create['seller_id']);

            return redirect(url('chats/'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateOrder($data)
    {
        try {
            $loc = Location::where('id', $data['location_id'])->first();
            Location::where('id', $data['location_id'])->update([
                'name' => $data['addr_name'],
                'village' => $data['village'] ? : $loc['village'],
                'district' => $data['district'] ? : $loc['district'],
                'address' => $data['meet_location'] ? : $loc['meet_location'],
                'city' => $data['city'] ? : $loc['city'],
                'state' => $data['state'] ? : $loc['state'],
                'country' => $data['country'] ? : $loc['country'],
                'latitude' => $data['latitude'] ? : $loc['latitude'],
                'longitude' => $data['longitude'] ? : $loc['longitude'],
            ]);
            OrderRequest::where('id', $data['id'])->update([
                'title' => $data['title'],
                'description' => $data['job_description'],
                'is_meet_seller' => $data['is_meet_seller'] ?? false,
                'due_at' => $data['contract_end'],
                'meet_at' => $data['meet_date'] . ' ' . $data['meet_time'],
            ]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Berhasil melakukan perubahan']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Gagal melakukan perubahan']);
        }
    }
}
?>