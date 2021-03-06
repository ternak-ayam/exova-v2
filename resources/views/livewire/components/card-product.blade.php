<div class="w-full">
   <div class="antialiased py-2 relative text-gray-900">
      <div class="m-2">
         <img src="{{ $product['cover']['getSmall']['path'] }}" alt=" random imgee" class="w-full h-60 object-cover rounded-lg shadow-md">    
         <div class="relative -mt-6 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
            <div class="p-4 bg-white rounded-3xl shadow-lg">
               <a href="{{ url('products/' . $product['slug']) }}">
                  <span class="inline-block px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $product['subcategory']['name'] }}</span>
                  <h2 class="mt-2 mb-2  font-bold">{{ substr($product['title'], 0, 25) }} {{  (strlen($product['title']) > 25) ? '. . .' : '' }}</h2>
                  <p class="text-sm">{{ substr($product['description'], 0, 30) }} {{  (strlen($product['description']) > 30) ? '. . .' : '' }}</p>
                  <div class="flex justify-between">
                     <div class="mt-3 ">
                        <span class="text-sm font-semibold">Rp</span>&nbsp;<span class="font-bold text-xl">{{ number_format(substr($product['price'], 0, -3), 0, ',', '.') }}</span><span class="text-sm font-semibold">K</span>
                     </div>
                     <div class="mt-3">
                        <span class="text-sm font-semibold">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                           </svg>
                        </span>
                     </div>
                  </div>
               </a>
               <div class="flex justify-between">
                  <div class="mt-3">
                     <button class="p-2 bg-blue-600 rounded-full focus:outline-none" type="button" wire:click="addToWish({{ $product['id'] }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                           <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                     </button>
                     <button class="p-2 bg-blue-600 rounded-full focus:outline-none" type="button" wire:click="addToCart({{ $product['id'] }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                           <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                     </button>
                  </div>
                  <div class="mt-3">
                     <span class="text-sm font-semibold">
                     {{ $product['pricetype']['name'] }}
                     </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
