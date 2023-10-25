<x-app-layout>

    <!-- Firdaus Akbar Amrullah 6706223004 -->
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pengguna') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PUT') 


                        <input type="hidden" name="id" value="{{ $user->id }}" />
                        <!-- Username -->
                        <div>
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <!-- Fullname -->
                        <div>
                            <x-input-label for="fullname" :value="__('Fullname')" />
                            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="$user->fullname" required autocomplete="fullname" />
                            <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        
                        <!-- Address -->
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$user->address" required autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Birthdate -->
                        <div>
                            <x-input-label for="birthdate" :value="__('Tanggal lahir')" />
                            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="$user->birthdate" required autocomplete="birthdate" />
                            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                        </div>

                        <!-- PhoneNumber -->
                        <div>
                            <x-input-label for="phoneNumber" :value="__('Nomor Telepon')" />
                            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="$user->phoneNumber" required autocomplete="phoneNumber" />
                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                        </div>
                            
                        <!-- Religion -->
                        <div>
                            <x-input-label for="agama" :value="__('Agama')" />
                            <x-text-input id="agama" class="block mt-1 w-full" type="text" name="agama" :value="$user->agama" required autocomplete="agama" />
                            <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                        <x-input-label for="jenisKelamin" :value="__('Jenis Kelamin')" style="color: white;" />
                        <input id="Laki-Laki" type="radio" class="block mt-1" name="jenisKelamin" value="0" required autocomplete="jenisKelamin" @if($user->jenisKelamin === 0) checked @endif>
                        <label for="Laki-Laki" style="color: white;">Laki-Laki</label>
                        <input id="Perempuan" type="radio" class="block mt-1" name="jenisKelamin" value="1" required autocomplete="jenisKelamin" @if($user->jenisKelamin === 1) checked @endif>
                        <label for="Perempuan" style="color: white;">Perempuan</label>
                        <x-input-error :messages="$errors->get('jenisKelamin')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Edit Pengguna') }}
                        </x-primary-button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>