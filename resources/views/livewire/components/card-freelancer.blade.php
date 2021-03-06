<div class="items-center justify-center w-full">
   <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:mb-0 mb-7 bg-white p-6 shadow rounded">
      <div class="flex flex-col lg:flex-row items-center border-gray-200 pb-2">
         <img src="{{ $item['profile_photo_url'] }}" alt="avatar" class="object-cover w-full h-36 lg:w-24 lg:h-24 lg:rounded-full rounded-lg" />
         <div class="flex items-start justify-between w-full">
            <a href="{{ url('user/' . $item['username']) }}" class="pl-3 w-full">
               <p tabindex="0" class="focus:outline-none text-xl pt-2 font-medium leading-5 text-gray-800">{{ Str::limit($item['name'], 20) }}
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                     Newbie
                  </span></p>
               <p tabindex="0" class="focus:outline-none text-sm leading-5 py-1 text-gray-600">{{ Str::limit($item['description'], 40) }}</p>
               <div class="pt-2 ">
                  <div tabindex="0" class="focus:outline-none flex justify-start">
                     <div class="py-1 mx-1 px-4 text-xs leading-3 text-grey-700 rounded-full bg-pink-100 justify-between flex">
                        <div class="p-1 text-pink-500">
                           <span>
                           {{ count($item['contracts']) }} Project
                           </span>
                        </div>
                     </div>
                     <div class="py-1 mx-1 px-4 text-xs leading-3 text-grey-700 rounded-full bg-purple-100 justify-between flex">
                        <div class="p-1 text-purple-500">
                           <span>
                           {{ $item['roles']['name'] }}
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
            {{-- <div role="img" aria-label="bookmark">
               <div class="py-2 px-4 ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100 hover:bg-indigo-200 cursor-pointer duration-500">Kontrak</div>
            </div> --}}
         </div>
      </div>
   </div>
</div>