<x-guest-layout>
    <div class="container text-center">
        <div class="row align-items-start">
          <div class="col fs-1" style="margin-left: 50px; margin-bottom:30px">
            <strong style="font-size:1.3em">Xác thực mật khẩu</strong>
          </div>
         
        </div>
      </div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Đây là khu vực an toàn của ứng dụng. Vui lòng xác nhận mật khẩu của bạn trước khi tiếp tục.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Xác nhận') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
