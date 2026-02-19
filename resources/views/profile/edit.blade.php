<x-app-layout>
    <x-slot name="header">
        Edit Profile
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">Edit Your Profile</h3>
            </div>

            <div class="p-6">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email (Read Only) -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" value="{{ $user->email }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled>
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->profile->phone ?? '') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Birth Date -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Birth Date</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $user->profile->birth_date ?? '') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('birth_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                        <select name="gender" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender', $user->profile->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $user->profile->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', $user->profile->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea name="address" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('address', $user->profile->address ?? '') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Avatar -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                        @if($user->profile && $user->profile->avatar)
                            <img src="{{ asset('storage/' . $user->profile->avatar) }}" class="h-24 w-24 rounded-full object-cover mb-2">
                        @endif
                        <input type="file" name="avatar" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG. Max: 1MB</p>
                        @error('avatar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Update Profile
                        </button>
                        <a href="{{ route('profile.show') }}" class="text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>