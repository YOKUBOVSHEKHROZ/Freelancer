<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#667eea',
                        secondary: '#764ba2',
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px 0 rgba(102, 126, 234, 0.4);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .stats-card-1 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .stats-card-2 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        .stats-card-3 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        .stats-card-4 {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        .skill-bar {
            animation: fillBar 2s ease-in-out;
        }
        @keyframes fillBar {
            from { width: 0%; }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
<!-- Success/Error Messages -->
@if(session('success'))
    <div class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    </div>
@endif/placeholder.svg?height=200&width=300

@if(session('error'))
    <div class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
        </div>
    </div>
@endif

<div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0" id="sidebar">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-center h-16 gradient-bg">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-crown text-white text-2xl"></i>
                </div>
                <div class="ml-3">
                    <h1 class="text-xl font-bold text-white">FreeFolio</h1>
                    <p class="text-xs text-indigo-200">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-tachometer-alt mr-3 text-lg"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.profile') }}" class="sidebar-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-user-circle mr-3 text-lg"></i>
                    <span>Profile</span>
                </a>
                <a href="{{ route('admin.skills') }}" class="sidebar-link {{ request()->routeIs('admin.skills*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-code mr-3 text-lg"></i>
                    <span>Skills</span>
                </a>
                <a href="{{ route('admin.services') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-briefcase mr-3 text-lg"></i>
                    <span>Services</span>
                </a>
                <a href="{{ route('admin.portfolio') }}" class="sidebar-link {{ request()->routeIs('admin.portfolio*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-folder-open mr-3 text-lg"></i>
                    <span>Portfolio</span>
                </a>
                <a href="{{ route('admin.blog') }}" class="sidebar-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-blog mr-3 text-lg"></i>
                    <span>Blog</span>
                </a>
                <a href="{{ route('admin.testimonials') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-star mr-3 text-lg"></i>
                    <span>Testimonials</span>
                </a>
                <a href="{{ route('admin.messages') }}" class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-envelope mr-3 text-lg"></i>
                    <span>Messages</span>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full animate-pulse">3</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }} group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <i class="fas fa-cog mr-3 text-lg"></i>
                    <span>Settings</span>
                </a>
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-4">
            <div class="bg-gradient-to-r from-purple-400 to-pink-400 rounded-xl p-4 text-white">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-rocket text-2xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Upgrade to Pro</p>
                        <p class="text-xs opacity-75">Get more features</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 lg:ml-0">
        <!-- Top Bar -->
        <div class="bg-white shadow-sm border-b border-gray-200 lg:hidden">
            <div class="flex items-center justify-between px-4 py-3">
                <button type="button" class="text-gray-500 hover:text-gray-600" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>
                <div class="w-6"></div>
            </div>
        </div>

        <!-- Content Area -->
        <main class="p-6">
            @if(request()->routeIs('admin.dashboard*') || request()->routeIs('admin.dashboard.index'))
                <!-- Dashboard Content -->
                <div class="fade-in">
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name ?? 'Shehroz Yoqubov' }}! 👋</h1>
                                <p class="text-gray-600 mt-2">Here's what's happening with your portfolio today.</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                    <i class="fas fa-download mr-2"></i>Export
                                </button>
                                <button class="gradient-bg text-white rounded-lg px-4 py-2 text-sm font-medium hover:opacity-90 transition-opacity">
                                    <i class="fas fa-plus mr-2"></i>Add New
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stats-card-1 rounded-2xl p-6 text-white card-hover">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm opacity-75">Total Views</p>
                                    <p class="text-3xl font-bold mt-2">12,345</p>
                                    <p class="text-sm opacity-75 mt-1">
                                        <i class="fas fa-arrow-up mr-1"></i>+12% from last month
                                    </p>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-full p-3">
                                    <i class="fas fa-eye text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="stats-card-2 rounded-2xl p-6 text-white card-hover">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm opacity-75">Projects</p>
                                    <p class="text-3xl font-bold mt-2">24</p>
                                    <p class="text-sm opacity-75 mt-1">
                                        <i class="fas fa-arrow-up mr-1"></i>+3 this week
                                    </p>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-full p-3">
                                    <i class="fas fa-folder text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="stats-card-3 rounded-2xl p-6 text-white card-hover">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm opacity-75">Messages</p>
                                    <p class="text-3xl font-bold mt-2">8</p>
                                    <p class="text-sm opacity-75 mt-1">
                                        <i class="fas fa-arrow-up mr-1"></i>+2 today
                                    </p>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-full p-3">
                                    <i class="fas fa-envelope text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="stats-card-4 rounded-2xl p-6 text-white card-hover">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm opacity-75">Reviews</p>
                                    <p class="text-3xl font-bold mt-2">15</p>
                                    <p class="text-sm opacity-75 mt-1">
                                        <i class="fas fa-star mr-1"></i>4.9 average
                                    </p>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-full p-3">
                                    <i class="fas fa-star text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts and Recent Activity -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Chart -->
                        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 card-hover">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-gray-900">Analytics Overview</h3>
                                <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm">
                                    <option>Last 7 days</option>
                                    <option>Last 30 days</option>
                                    <option>Last 3 months</option>
                                </select>
                            </div>
                            <canvas id="analyticsChart" height="100"></canvas>
                        </div>

                        <!-- Recent Activity -->
                        <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Activity</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600 text-xs"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">New client inquiry</p>
                                        <p class="text-xs text-gray-500">John Doe sent a message</p>
                                        <p class="text-xs text-gray-400">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-check text-green-600 text-xs"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">Project completed</p>
                                        <p class="text-xs text-gray-500">E-commerce website finished</p>
                                        <p class="text-xs text-gray-400">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-star text-purple-600 text-xs"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">New review received</p>
                                        <p class="text-xs text-gray-500">5-star rating from Sarah</p>
                                        <p class="text-xs text-gray-400">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Messages -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Messages</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-semibold">
                                    JD
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h4 class="text-sm font-semibold text-gray-900">John Doe</h4>
                                        <span class="text-xs text-gray-500">2 hours ago</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Interested in web development project...</p>
                                    <div class="flex items-center space-x-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">New</span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">High Priority</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 font-semibold">
                                    SS
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h4 class="text-sm font-semibold text-gray-900">Sarah Smith</h4>
                                        <span class="text-xs text-gray-500">5 hours ago</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Love your portfolio design...</p>
                                    <div class="flex items-center space-x-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Replied</span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Medium Priority</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(request()->routeIs('admin.skills*'))
                <!-- Skills Content -->
                <div class="fade-in">
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">Skills Management</h1>
                                <p class="text-gray-600 mt-2">Manage your technical skills and proficiency levels.</p>
                            </div>
                            <button class="gradient-bg text-white rounded-xl px-6 py-3 font-medium hover:opacity-90 transition-opacity" onclick="openSkillModal()">
                                <i class="fas fa-plus mr-2"></i>Add New Skill
                            </button>
                        </div>
                    </div>

                    <!-- Skills Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        @php
                            $skills = [
                                ['name' => 'HTML/CSS', 'percentage' => 95, 'color' => 'from-orange-400 to-red-500', 'icon' => 'fab fa-html5'],
                                ['name' => 'JavaScript', 'percentage' => 90, 'color' => 'from-yellow-400 to-orange-500', 'icon' => 'fab fa-js-square'],
                                ['name' => 'React', 'percentage' => 85, 'color' => 'from-blue-400 to-blue-600', 'icon' => 'fab fa-react'],
                                ['name' => 'PHP', 'percentage' => 88, 'color' => 'from-purple-400 to-purple-600', 'icon' => 'fab fa-php'],
                                ['name' => 'Laravel', 'percentage' => 92, 'color' => 'from-red-400 to-red-600', 'icon' => 'fab fa-laravel'],
                                ['name' => 'Node.js', 'percentage' => 80, 'color' => 'from-green-400 to-green-600', 'icon' => 'fab fa-node-js'],
                            ];
                        @endphp

                        @foreach($skills as $skill)
                            <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gradient-to-r {{ $skill['color'] }} rounded-xl flex items-center justify-center text-white mr-4">
                                            <i class="{{ $skill['icon'] }} text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $skill['name'] }}</h3>
                                            <p class="text-sm text-gray-500">{{ $skill['percentage'] }}% Proficiency</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="text-indigo-600 hover:text-indigo-800 p-2 hover:bg-indigo-50 rounded-lg transition-all">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-all">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-600">Progress</span>
                                        <span class="font-medium text-gray-900">{{ $skill['percentage'] }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-gradient-to-r {{ $skill['color'] }} h-3 rounded-full skill-bar" style="width: {{ $skill['percentage'] }}%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Default Content for other routes -->
                <div class="fade-in">
                    <div class="bg-white rounded-2xl shadow-sm p-8 text-center">
                        <div class="w-24 h-24 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-cog text-white text-3xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Section Under Development</h2>
                        <p class="text-gray-600 mb-6">This section is currently being developed. Please check back later.</p>
                        <a href="{{ route('admin.dashboard') }}" class="gradient-bg text-white px-6 py-3 rounded-xl font-medium hover:opacity-90 transition-opacity">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            @endif
        </main>
    </div>
</div>

<!-- Mobile Sidebar Overlay -->
<div class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden lg:hidden" id="sidebar-overlay"></div>

<!-- Add Skill Modal -->
<div id="skillModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeSkillModal()"></div>

        <div class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Add New Skill</h3>
                <button onclick="closeSkillModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Skill Name</label>
                    <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="e.g., React.js" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                        <option value="">Select Category</option>
                        <option value="Frontend Development">Frontend Development</option>
                        <option value="Backend Development">Backend Development</option>
                        <option value="Design & Tools">Design & Tools</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Proficiency Level</label>
                    <input type="range" name="percentage" min="0" max="100" value="50" class="w-full" id="skillRange">
                    <div class="flex justify-between text-sm text-gray-500 mt-1">
                        <span>0%</span>
                        <span id="skillValue">50%</span>
                        <span>100%</span>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeSkillModal()" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg hover:opacity-90 transition-opacity">
                        Add Skill
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        // Mobile menu toggle
        if (mobileMenuButton && sidebar && sidebarOverlay) {
            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            });
        }

        // Close sidebar when clicking overlay
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });
        }

        // Analytics Chart
        const ctx = document.getElementById('analyticsChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Views',
                        data: [120, 190, 300, 500, 200, 300, 450],
                        borderColor: 'rgb(102, 126, 234)',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Update skill range value
        const skillRange = document.getElementById('skillRange');
        const skillValue = document.getElementById('skillValue');
        if (skillRange && skillValue) {
            skillRange.addEventListener('input', function() {
                skillValue.textContent = this.value + '%';
            });
        }

        // Auto-hide success/error messages
        setTimeout(function() {
            const messages = document.querySelectorAll('.fixed.top-4.right-4');
            messages.forEach(function(message) {
                message.style.opacity = '0';
                setTimeout(function() {
                    message.remove();
                }, 300);
            });
        }, 5000);
    });

    // Modal functions
    function openSkillModal() {
        document.getElementById('skillModal').classList.remove('hidden');
    }

    function closeSkillModal() {
        document.getElementById('skillModal').classList.add('hidden');
    }
</script>
</body>
</html>
