<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('FreeFolio Admin Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button">
                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </x-slot>

    @push('styles')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.css" rel="stylesheet">
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
            .stats-card {
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
        </style>
    @endpush

    <div class="min-h-screen bg-gray-50">
        <div class="flex">
            <!-- Sidebar -->
            <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0" id="sidebar">
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

                <nav class="mt-8 px-4">
                    <div class="space-y-2">
                        <a href="#dashboard" class="sidebar-link active group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-tachometer-alt mr-3 text-lg"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="#profile" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-user-circle mr-3 text-lg"></i>
                            <span>Profile</span>
                        </a>
                        <a href="#skills" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-code mr-3 text-lg"></i>
                            <span>Skills</span>
                        </a>
                        <a href="#services" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-briefcase mr-3 text-lg"></i>
                            <span>Services</span>
                        </a>
                        <a href="#portfolio" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-folder-open mr-3 text-lg"></i>
                            <span>Portfolio</span>
                        </a>
                        <a href="#blog" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-blog mr-3 text-lg"></i>
                            <span>Blog</span>
                        </a>
                        <a href="#testimonials" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-star mr-3 text-lg"></i>
                            <span>Testimonials</span>
                        </a>
                        <a href="#messages" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-envelope mr-3 text-lg"></i>
                            <span>Messages</span>
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full animate-pulse">3</span>
                        </a>
                        <a href="#settings" class="sidebar-link group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <i class="fas fa-cog mr-3 text-lg"></i>
                            <span>Settings</span>
                        </a>
                    </div>
                </nav>

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
                    <!-- Dashboard Content -->
                    <div id="dashboard-content" class="content-section">
                        <div class="mb-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}! 👋</h1>
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
                            <div class="stats-card rounded-2xl p-6 text-white card-hover">
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

                        <!-- Quick Actions -->
                        <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <button class="flex flex-col items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                                    <i class="fas fa-plus text-2xl text-gray-400 mb-2"></i>
                                    <span class="text-sm font-medium text-gray-600">Add Project</span>
                                </button>
                                <button class="flex flex-col items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                                    <i class="fas fa-edit text-2xl text-gray-400 mb-2"></i>
                                    <span class="text-sm font-medium text-gray-600">Write Blog</span>
                                </button>
                                <button class="flex flex-col items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                                    <i class="fas fa-cog text-2xl text-gray-400 mb-2"></i>
                                    <span class="text-sm font-medium text-gray-600">Add Skill</span>
                                </button>
                                <button class="flex flex-col items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                                    <i class="fas fa-envelope text-2xl text-gray-400 mb-2"></i>
                                    <span class="text-sm font-medium text-gray-600">Check Messages</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Content -->
                    <div id="profile-content" class="content-section hidden">
                        @include('admin.sections.profile')
                    </div>

                    <!-- Skills Content -->
                    <div id="skills-content" class="content-section hidden">
                        @include('admin.sections.skills')
                    </div>

                    <!-- Services Content -->
                    <div id="services-content" class="content-section hidden">
                        @include('admin.sections.services')
                    </div>

                    <!-- Portfolio Content -->
                    <div id="portfolio-content" class="content-section hidden">
                        @include('admin.sections.portfolio')
                    </div>

                    <!-- Blog Content -->
                    <div id="blog-content" class="content-section hidden">
                        @include('admin.sections.blog')
                    </div>

                    <!-- Testimonials Content -->
                    <div id="testimonials-content" class="content-section hidden">
                        @include('admin.sections.testimonials')
                    </div>

                    <!-- Messages Content -->
                    <div id="messages-content" class="content-section hidden">
                        @include('admin.sections.messages')
                    </div>

                    <!-- Settings Content -->
                    <div id="settings-content" class="content-section hidden">
                        @include('admin.sections.settings')
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden lg:hidden" id="sidebar-overlay"></div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sidebar functionality
                const sidebarLinks = document.querySelectorAll('.sidebar-link');
                const contentSections = document.querySelectorAll('.content-section');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const sidebar = document.getElementById('sidebar');
                const sidebarOverlay = document.getElementById('sidebar-overlay');

                // Handle sidebar navigation
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Remove active class from all links
                        sidebarLinks.forEach(l => l.classList.remove('active'));

                        // Add active class to clicked link
                        this.classList.add('active');

                        // Hide all content sections
                        contentSections.forEach(section => section.classList.add('hidden'));

                        // Show target content section
                        const target = this.getAttribute('href').substring(1) + '-content';
                        const targetSection = document.getElementById(target);
                        if (targetSection) {
                            targetSection.classList.remove('hidden');
                        }

                        // Close mobile sidebar
                        sidebar.classList.add('-translate-x-full');
                        sidebarOverlay.classList.add('hidden');
                    });
                });

                // Mobile menu toggle
                if (mobileMenuButton) {
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
            });
        </script>
    @endpush
</x-app-layout>
