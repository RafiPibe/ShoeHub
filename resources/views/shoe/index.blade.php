<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="form-container">
                    <form action="{{ route('shoe.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-label for="name" :value="__('Shoe Form')" />

                            {{-- Shoe Name --}}
                            <div class="mt-4">
                                <x-input-label for="shoeName" :value="__('Name')" />
                                <x-text-input id="shoeName" class="block mt-1 w-full" type="text" name="shoeName" :value="old('shoeName')" required autofocus autocomplete="shoeName" />
                                <x-input-error :messages="$errors->get('shoeName')" class="mt-2" />
                            </div>

                            {{-- Shoe Size --}}
                            <div class="mt-4">
                                <x-input-label for="shoeSize" :value="__('Shoe Size')" />
                                <x-select-input id="shoeSize" class="block mt-1 w-full" name="shoeSize" :value="old('ShoeSize')" required autofocus autocomplete="shoeSize">
                                    <option selected value="">-</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                </x-select-input>
                                <x-input-error :messages="$errors->get('shoeSize')" class="mt-2" />
                            </div>

                            {{-- Mines --}}
                            {{-- <div class="mt-4">
                                <x-input-label for="minesId" :value="__('minesId')" />
                                <x-select-input id="minesId" class="block mt-1 w-full" name="minesId" :value="old('minesId')" required autofocus autocomplete="minesId">
                                    <option selected value="">-</option>
                                    @foreach ($mines as $mines)
                                        <option value="{{$mines->id}}">{{$mines->name}}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('minesId')" class="mt-2" />
                            </div> --}}

                            {{-- Image --}}
                            <div class="mt-4 flex flex-col">
                                <x-input-label for="shoeImage" class="form-label form-dark bg-dark color-dark text-black">Upload Shoe Image</x-input-label>
                                <input class="btn-dark form-control form-dark bg-dark color-dark text-white" type="file" id="image" name="shoeImage">
                                @error('shoeImage')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="mt-4">
                                <x-input-label for="shoePrice" :value="__('Shoe Price')" />
                                <x-text-input id="shoePrice" class="block mt-1 w-full" type="number" step="0.01" name="shoePrice" :value="old('shoePrice')" required autofocus autocomplete="shoePrice" />
                                <x-input-error :messages="$errors->get('shoePrice')" class="mt-2" />
                            </div>

                            <div class="flex justify-center mb-4">
                                <x-primary-button class="mx-auto">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
