<x-app-layout>
    <x-slot name="header">
        My Profile
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Header with Avatar -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-8 text-center">
                <div class="relative inline-block">
                    @if($user->profile && $user->profile->avatar)
                        <img src="{{ asset('storage/' . $user->profile->avatar) }}" class="w-24 h-24 rounded-full object-cover border-4 border-white mx-auto">
                    @else
                        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center mx-auto border-4 border-white">
                            <span class="text-4xl font-bold text-blue-600">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                    @endif
                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-400 rounded-full border-2 border-white"></div>
                </div>
                <h2 class="mt-4 text-2xl font-bold text-white">{{ $user->name }}</h2>
                <p class="text-blue-100">{{ $user->email }}</p>
                <span class="mt-2 inline-block px-3 py-1 bg-white/20 text-white text-sm rounded-full">
                    {{ ucfirst($user->roles->first()->name ?? 'User') }}
                </span>
            </div>

            <!-- Profile Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Phone -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs font-semibold text-gray-500 uppercase">Phone</label>
                        <p class="mt-1 text-gray-800 font-medium">{{ $user->profile->phone ?? '-' }}</p>
                    </div>

                    <!-- Birth Date -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs font-semibold text-gray-500 uppercase">Birth Date</label>
                        <p class="mt-1 text-gray-800 font-medium">
                            {{ $user->profile && $user->profile->birth_date ? \Carbon\Carbon::parse($user->profile->birth_date)->format('d M Y') : '-' }}
                        </p>
                    </div>

                    <!-- Gender -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs font-semibold text-gray-500 uppercase">Gender</label>
                        <p class="mt-1 text-gray-800 font-medium">
                            {{ $user->profile && $user->profile->gender ? ucfirst($user->profile->gender) : '-' }}
                        </p>
                    </div>

                    <!-- Joined -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs font-semibold text-gray-500 uppercase">Member Since</label>
                        <p class="mt-1 text-gray-800 font-medium">{{ $user->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <!-- Address -->
                <div class="mt-6 bg-gray-50 rounded-lg p-4">
                    <label class="text-xs font-semibold text-gray-500 uppercase">Address</label>
                    <p class="mt-1 text-gray-800">{{ $user->profile->address ?? '-' }}</p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                        Edit Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>