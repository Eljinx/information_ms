<x-authlayout>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <!-- Logo / Brand Section -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400">Create your account</p>
            </div>

            <!-- Register Form Card -->
            <x-forms.form-card>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <x-forms.form-input
                        label="Full Name"
                        name="name"
                        type="text"
                        placeholder="John Doe"
                        autocomplete="name"
                        required
                        autofocus
                    />

                    <x-forms.form-input
                        label="Email Address"
                        name="email"
                        type="email"
                        placeholder="you@example.com"
                        autocomplete="email"
                        required
                    />

                    <x-forms.form-input
                        label="Password"
                        name="password"
                        type="password"
                        placeholder="••••••••"
                        autocomplete="new-password"
                        required
                        hint="At least 8 characters with uppercase, lowercase, and numbers"
                    />

                    <x-forms.form-input
                        label="Confirm Password"
                        name="password_confirmation"
                        type="password"
                        placeholder="••••••••"
                        autocomplete="new-password"
                        required
                    />

                    <!-- Terms and Conditions -->
                    <x-forms.form-checkbox
                        label="I agree to the Terms and Conditions"
                        name="agree_terms"
                    />

                    <x-forms.form-button text="Create Account" variant="primary" />

                    <!-- Divider -->
                    <div class="flex items-center my-6">
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                        <span class="px-3 text-sm text-gray-500 dark:text-gray-400">or</span>
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                    </div>

                    <!-- Sign In Link -->
                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        @if (Route::has('login'))
                            <a
                                href="{{ route('login') }}"
                                class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors"
                            >
                                Sign in
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
