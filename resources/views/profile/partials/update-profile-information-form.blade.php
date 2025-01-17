<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informacion del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza la informacion de tu perfil,  la direccion de email e imagen") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Foto de perfil')" />
            @if ($user->image)
                <div class="w-52 p-4 rounded-full">
                    <img class="rounded-full h-52 mb-2 mt-2" src="{{asset('storage/' . $user->image) }}" alt="Foto de perfil actual">
                </div>
            @endif
            <input type="file" class="form-input-file" accept="image/*" id="image" name="image">
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="nick" :value="__('Nickname')" />
            <x-text-input id="nick" name="nick" type="text" class="mt-1 block w-full" :value="old('nick', $user->nick)"  autofocus autocomplete="nick" />
            <x-input-error class="mt-2" :messages="$errors->get('nick')" />
        </div>
        <div>
            <x-input-label for="locality" :value="__('Localidad')" />
            <x-text-input id="locality" name="locality" type="text" class="mt-1 block w-full" :value="old('locality', $user->locality)"  autofocus autocomplete="locality" />
            <x-input-error class="mt-2" :messages="$errors->get('locality')" />
        </div>
        <div>
            <x-input-label for="province" :value="__('Provincia')" />
            <x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('province', $user->province)" autofocus autocomplete="province" />
            <x-input-error class="mt-2" :messages="$errors->get('province')" />
        </div>
        <div>
            <x-input-label for="country" :value="__('País')" />
            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $user->country)"  autofocus autocomplete="country" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('Teléfono')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)"  autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>




        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"  autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado') }}</p>
            @endif
        </div>
    </form>
</section>
