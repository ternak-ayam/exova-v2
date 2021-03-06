<?php

namespace App\Http\Livewire\Uploads\Components;

use Image;
use App\Models\File;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadPictures;
use App\Models\ProductImageDimension;
use Illuminate\Support\Facades\Storage;

class ImagesFieldUploads extends Component
{
    use WithFileUploads, UploadPictures;

    public $pictures;
    public $uuid;
    public $product;

    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
    }
    
    public function updatedPictures()
    {
        $this->updatePictures($this->pictures, 'pictures');
    }

    public function deletePicture($id)
    {
        $this->deletePictures($id);
    }

    public function render()
    {
        $this->product = Product::where('uuid', $this->uuid)->first();
        $this->product = Product::with(['images' => function($q) {
            return $q->where('id', '!=', $this->product['cover_id']);
        }, 'images.getSmall'])->where('uuid', $this->uuid)->first();
        return view('livewire.uploads.components.images-field-uploads', ['product' => $this->product]);
    }
}
