<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600" dir="rtl">
        {{ __(' هل نسيت كلمة مرورك؟ لا مشكلة. ما عليك سوى تزويدنا بعنوان بريدك الإلكتروني وسنرسل إليك رابط إعادة تعيين كلمة المرور لاختيار كلمة مرور جديدة. ') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" dir="rtl">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الالكتروني')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            {{-- <x-primary-button> --}}
            <button type="submit" class="add-button pt-2 pb-2 mb-2">
                {{ __('إعادة تعيين كلمة المرور') }}
            </button>
            {{-- </x-primary-button> --}}
        </div>
    </form>
</x-guest-layout>
