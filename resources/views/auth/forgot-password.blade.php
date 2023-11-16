<x-guest-layout>
    <div class="container text-center">
        <div class="row align-items-start">
          <div class="col fs-1" style="margin-left: 150px; margin-bottom:30px">
            <strong style="font-size:1.3em">Quên mật khẩu</strong>
          </div>
         
        </div>
      </div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Quên mật khẩu? Không có gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn liên kết đặt lại mật khẩu qua email để cho phép bạn chọn địa chỉ mới.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Liên kết đặt lại mật khẩu email') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
