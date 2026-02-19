<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AISYI STORE') }} - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }
        
        .sidebar-clean {
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
        }
        
        .nav-link {
            color: #64748b;
            border-radius: 6px;
            transition: all 0.15s ease;
            position: relative;
        }
        
        .nav-link:hover {
            background-color: #f8fafc;
            color: #0f172a;
        }
        
        .nav-link.active {
            background-color: #eff6ff;
            color: #3b82f6;
            font-weight: 500;
        }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background-color: #3b82f6;
            border-radius: 0 3px 3px 0;
        }
        
        .top-header {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .flat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }
        
        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            transition: box-shadow 0.2s ease;
        }
        
        .stat-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        
        .btn-flat {
            background-color: #3b82f6;
            color: white;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.15s ease;
        }
        
        .btn-flat:hover {
            background-color: #2563eb;
        }
        
        .notification-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            width: 320px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
            z-index: 50;
        }
        
        .notification-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .notification-item {
            padding: 12px 16px;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.15s ease;
            cursor: pointer;
        }
        
        .notification-item:hover {
            background-color: #f8fafc;
        }
        
        .notification-item:last-child {
            border-bottom: none;
        }
        
        .notification-item.unread {
            background-color: #eff6ff;
        }
        
        .notification-badge {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 8px;
            height: 8px;
            background-color: #ef4444;
            border-radius: 50%;
            border: 2px solid white;
        }
        
        .notification-badge.hidden {
            display: none;
        }
        
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }
        
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
        
        @media (max-width: 768px) {
            .sidebar-clean {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                box-shadow: 4px 0 24px rgba(0,0,0,0.1);
            }
            
            .sidebar-clean.open {
                transform: translateX(0);
            }
            
            .notification-dropdown {
                width: 280px;
                right: -40px;
            }
        }
    </style>
</head>
<body class="antialiased text-slate-800">

    <div id="overlay" class="fixed inset-0 bg-black/20 z-40 hidden md:hidden backdrop-blur-sm" onclick="toggleSidebar()"></div>

    <div class="flex h-screen">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-clean w-64 flex flex-col h-full fixed md:relative transition-transform duration-200 z-50">
            
            <div class="h-16 flex items-center px-6 border-b border-slate-200">
                <div class="w-8 h-8 bg-blue-500 rounded flex items-center justify-center mr-3">
                    <span class="text-white font-bold text-sm">A</span>
                </div>
                <span class="font-semibold text-slate-800">AISYI STORE</span>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <div class="px-3 mb-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">Main</div>
                
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <div class="px-3 mt-6 mb-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">Inventory</div>
                
                <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Products
                </a>
                
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Categories
                </a>
                
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
                <a href="{{ route('transactions.index') }}" class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    Transactions
                </a>
                @endif

                <div class="px-3 mt-6 mb-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">Settings</div>
                
                <a href="{{ route('profile.show') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }} flex items-center px-3 py-2.5 text-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile
                </a>
            </nav>

            <div class="p-4 border-t border-slate-200">
                <div class="flex items-center mb-3">
                    <div class="w-9 h-9 bg-slate-200 rounded-full flex items-center justify-center text-slate-600 font-semibold text-sm mr-3">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-500 truncate">{{ ucfirst(Auth::user()->roles->first()->name ?? 'User') }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-3 py-2 text-sm text-red-600 bg-red-50 hover:bg-red-100 rounded transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 md:ml-0">
            
            <!-- Header -->
            <header class="top-header h-16 flex items-center justify-between px-6 sticky top-0 z-30">
                <div class="flex items-center">
                    <button onclick="toggleSidebar()" class="md:hidden p-2 -ml-2 mr-2 text-slate-500 hover:bg-slate-100 rounded">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="text-lg font-semibold text-slate-800">{{ $header ?? 'Dashboard' }}</h1>
                </div>

                <div class="flex items-center space-x-3">
                    <span class="text-sm text-slate-500 hidden sm:block">{{ now()->format('M d, Y') }}</span>
                    
                    <!-- Notification -->
                    <div class="relative">
                        <button onclick="toggleNotification()" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded relative transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span id="notifBadge" class="notification-badge"></span>
                        </button>

                        <div id="notificationDropdown" class="notification-dropdown">
                            <div class="flex items-center justify-between px-4 py-3 border-b border-slate-100">
                                <h3 class="font-semibold text-slate-800 text-sm">Notifications</h3>
                                <button onclick="markAllRead()" class="text-xs text-blue-500 hover:text-blue-700 font-medium">Mark all read</button>
                            </div>
                            
                            <div id="notificationList" class="max-h-80 overflow-y-auto">
                                <!-- Notifikasi dari database akan di-loop di sini -->
                                <div class="notification-item unread" onclick="markAsRead(this)">
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-slate-800 font-medium">New product added</p>
                                            <p class="text-xs text-slate-500 mt-0.5">Product has been added to inventory</p>
                                            <p class="text-xs text-slate-400 mt-1">Just now</p>
                                        </div>
                                        <div class="w-2 h-2 bg-blue-500 rounded-full ml-2 mt-1.5 flex-shrink-0 unread-dot"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="px-4 py-3 border-t border-slate-100 text-center">
                                <a href="#" class="text-sm text-blue-500 hover:text-blue-700 font-medium">View all notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded flex items-center text-green-700 text-sm">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded flex items-center text-red-700 text-sm">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Stats Grid - KOSONG -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="stat-card p-4">
                        <div class="text-sm text-slate-500 mb-1">Total Products</div>
                        <div class="text-2xl font-bold text-slate-800">-</div>
                        <div class="text-xs text-slate-400 mt-1">-</div>
                    </div>
                    <div class="stat-card p-4">
                        <div class="text-sm text-slate-500 mb-1">Categories</div>
                        <div class="text-2xl font-bold text-slate-800">-</div>
                        <div class="text-xs text-slate-400 mt-1">-</div>
                    </div>
                    <div class="stat-card p-4">
                        <div class="text-sm text-slate-500 mb-1">Transactions</div>
                        <div class="text-2xl font-bold text-slate-800">-</div>
                        <div class="text-xs text-slate-400 mt-1">-</div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="flat-card p-6 min-h-[400px]">
                    {{ $slot }}
                </div>

                <footer class="mt-8 text-center text-xs text-slate-400">
                    &copy; {{ date('Y') }} AISYI STORE. All rights reserved.
                </footer>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('hidden');
        }

        function toggleNotification() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('show');
        }

        function markAsRead(element) {
            element.classList.remove('unread');
            const dot = element.querySelector('.unread-dot');
            if (dot) {
                dot.remove();
            }
            checkUnreadNotifications();
        }

        function markAllRead() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            unreadItems.forEach(item => {
                item.classList.remove('unread');
                const dot = item.querySelector('.unread-dot');
                if (dot) {
                    dot.remove();
                }
            });
            checkUnreadNotifications();
        }

        function checkUnreadNotifications() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            const badge = document.getElementById('notifBadge');
            
            if (unreadItems.length === 0) {
                badge.classList.add('hidden');
            } else {
                badge.classList.remove('hidden');
            }
        }

        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('notificationDropdown');
            const button = event.target.closest('button');
            
            if (!button || !button.querySelector('svg')) {
                if (!event.target.closest('.notification-dropdown')) {
                    dropdown.classList.remove('show');
                }
            }
        });

        checkUnreadNotifications();
    </script>
</body>
</html>