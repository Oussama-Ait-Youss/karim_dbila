<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Everclay Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Jost', sans-serif; } </style>
</head>
<body class="bg-[#fbfaf8] flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 max-w-md w-full p-8 sm:p-10">
        
        <div class="text-center mb-8">
            <!-- Studio Logo -->
            <svg class="w-12 h-12 text-[#115E59] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
            </svg>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Studio Login</h1>
            <p class="text-gray-500 mt-2 font-medium">Sign in to manage Everclay.</p>
        </div>

        <!-- Validation Errors Display -->
        @if($errors->any())
            <div class="bg-red-50 text-red-600 border border-red-100 rounded-xl p-4 mb-6 text-sm font-bold shadow-sm">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Email Address</label>
                <input type="email" id="email" name="email" required autofocus class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#115E59] focus:border-[#115E59] outline-none transition-colors @error('email') border-red-300 ring-red-100 @enderror" value="{{ old('email') }}">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#115E59] focus:border-[#115E59] outline-none transition-colors">
            </div>

            <button type="submit" class="w-full bg-[#115E59] text-white font-bold tracking-wide py-4 rounded-xl hover:bg-[#0f4c48] transition-colors shadow-lg shadow-[#115E59]/20 transform hover:-translate-y-0.5">
                Sign In
            </button>
        </form>

    </div>
</body>
</html>
