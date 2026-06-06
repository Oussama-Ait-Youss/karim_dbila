@extends('layouts.admin')

@section('title', 'Profile Settings')

@section('admin_content')
    <div class="max-w-4xl mx-auto space-y-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Account Settings</h1>
            <p class="mt-2 text-sm text-slate-600">Manage your administrative profile and security credentials.</p>
        </div>

        <!-- Profile Information Form -->
        <div class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-200 bg-slate-50">
                <h3 class="text-lg font-semibold text-slate-900">Profile Information</h3>
                <p class="mt-1 text-sm text-slate-500">Update your account's public name and secure email address.</p>
            </div>
            <form action="{{ route('admin.profile.update') }}" method="POST" class="p-8">
                @csrf
                @method('PATCH')
                
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Display Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="w-full sm:max-w-md px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('name') border-red-500 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full sm:max-w-md px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('email') border-red-500 @enderror">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="bg-indigo-600 text-white font-bold px-6 py-2.5 rounded-lg shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Save Profile
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Password Form -->
        <div class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-200 bg-slate-50 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900">Security Credentials</h3>
                    <p class="mt-1 text-sm text-slate-500">Ensure your account is using a long, random password to stay secure.</p>
                </div>
                <div class="hidden sm:block">
                    <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
            </div>
            <form action="{{ route('admin.password.update') }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="current_password" class="block text-sm font-bold text-slate-700 mb-2">Current Password</label>
                        <input type="password" id="current_password" name="current_password" required class="w-full sm:max-w-md px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('current_password') border-red-500 ring-red-100 @enderror">
                        @error('current_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-bold text-slate-700 mb-2">New Password</label>
                        <input type="password" id="new_password" name="new_password" required class="w-full sm:max-w-md px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('new_password') border-red-500 ring-red-100 @enderror">
                        @error('new_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-bold text-slate-700 mb-2">Confirm New Password</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="w-full sm:max-w-md px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="bg-slate-900 text-white font-bold px-6 py-2.5 rounded-lg shadow-sm hover:bg-slate-800 focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-colors">
                        Update Password
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
