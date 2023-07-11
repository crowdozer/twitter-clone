@props(['username', 'name', 'email', 'password', 'errors' => []])

<form hx-post="/api/auth/sign-up" hx-trigger="submit">
    @csrf
    <div class="flex flex-col gap-4">
        {{-- inputs --}}
        <div>
            <h2 class="text-lg font-bold">Register a new account</h2>
            <p class="mt-2 text-stone-400">It doesn't cost any money.</p>
            <p class=" text-stone-400">You pay the price in dignity.</p>
        </div>
        <div>
            <div class="flex flex-row gap-2">
                <p class="text-3xl text-stone-500">@</p>
                <input class="w-full px-4 py-2 rounded-full" placeholder="username" name="username" required
                    value="{{ $username }}" />
            </div>
            @if (array_key_exists('username', $errors))
                <x-error-flash :message="$errors['username'][0]" />
            @endif
        </div>
        <div>
            <input class="w-full px-4 py-2 rounded-full" placeholder="display name" name="name" required
                value="{{ $name }}" />
            @if (array_key_exists('name', $errors))
                <x-error-flash :message="$errors['name'][0]" />
            @endif
        </div>
        <div>
            <input class="w-full px-4 py-2 rounded-full" placeholder="email address" name="email" required
                value="{{ $email }}" />
            @if (array_key_exists('email', $errors))
                <x-error-flash :message="$errors['email'][0]" />
            @endif
        </div>
        <div>
            <input class="w-full px-4 py-2 rounded-full" placeholder="password" type="password" name="password" required
                value="{{ $password }}" />
            @if (array_key_exists('password', $errors))
                <x-error-flash :message="$errors['password'][0]" />
            @endif
        </div>

        <div class="relative">
            <input type="checkbox" id="not-a-trouble-maker" name="not-a-trouble-maker" class="hidden">
            <label for="not-a-trouble-maker" class="flex items-center cursor-pointer select-none">
                <span class="w-5 h-5 border border-stone-700 rounded-lg mr-2">
                    <span id="not-a-trouble-maker-check" class="font-bold text-fuchsia-500 hidden text-center -mt-0.5">
                        <i class="fas fa-check"></i>
                    </span>
                </span>
                <span class="text-stone-500 mb-0.5">I'm not a troublemaker</span>
            </label>
            @if (array_key_exists('not-a-trouble-maker', $errors))
                <x-error-flash message="No troublemakers allowed." />
            @endif
        </div>

        {{-- controls --}}
        <div class="flex flex-col gap-2">
            <button type="submit"
                class="w-full px-4 py-2 rounded-full bg-fuchsia-600 hover:bg-fuchsia-700 active:bg-fuchsia-800">
                Let me in!
            </button>
            <a href="/walled-garden"
                class="w-full px-4 py-2 rounded-full bg-stone-600 hover:bg-stone-700 active:bg-stone-800 text-white hover:text-white text-center font-bold">
                I have an account
            </a>
        </div>
    </div>
</form>

@once
    <script src="/js/jquery.min.js"></script>
@endonce

<script>
    $(document).ready(function() {
        // Handle checkbox toggle
        $('#not-a-trouble-maker').change(function() {
            // On check
            if ($(this).is(':checked')) {
                $('#not-a-trouble-maker-check')
                    .removeClass('hidden')
                    .addClass('block');
                $('#troublemaker-error').addClass('hidden');
            }

            // On uncheck
            else {
                $('#not-a-trouble-maker-check')
                    .removeClass('block')
                    .addClass('hidden');
            }
        });

        // Ensure the checkbox is checked on submit
        $('form').on('submit', function(e) {
            if (!$('#not-a-trouble-maker').is(':checked')) {
                e.preventDefault();
                $('#troublemaker-error').removeClass('hidden');
            }
        });
    });
</script>
