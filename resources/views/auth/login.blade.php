<x-authlayout>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Logo / Brand Section -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400">Sign in to your account</p>
            </div>

            <!-- Login Form Card -->
            <x-forms.form-card>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-forms.form-input
                        label="Email Address"
                        name="email"
                        type="email"
                        placeholder="you@example.com"
                        autocomplete="email"
                        required
                        autofocus
                    />

                    <x-forms.form-input
                        label="Password"
                        name="password"
                        type="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        required
                    />

                    <!-- Remember Me & Forgot Password Row -->
                    <div class="flex items-center justify-between mb-6">
                        <x-forms.form-checkbox
                            label="Remember me"
                            name="remember"
                        />
                        
                        @if (Route::has('password.request'))
                            <a
                                href="{{ route('password.request') }}"
                                class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                            >
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <x-forms.form-button text="Sign In" variant="primary" />

                    <!-- Divider -->
                    <div class="flex items-center my-6">
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                        <span class="px-3 text-sm text-gray-500 dark:text-gray-400">or</span>
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                    </div>

                    <!-- Sign Up Link -->
                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors"
                            >
                                Sign up
                            </a>
                        @endif
                    </p>
                </form>
            </x-forms.form-card>

            <!-- Security Notice -->
            <div class="text-center text-xs text-gray-500 dark:text-gray-400">
                <p>🔒 Your data is secure and encrypted</p>
            </div>
        </div>
    </div>
</x-authlayout>
