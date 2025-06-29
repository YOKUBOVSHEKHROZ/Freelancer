<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Services Management</h1>
            <p class="text-gray-600 mt-2">Manage the services you offer to clients.</p>
        </div>
        <button class="gradient-bg text-white rounded-xl px-6 py-3 font-medium hover:opacity-90 transition-opacity" onclick="openServiceModal()">
            <i class="fas fa-plus mr-2"></i>Add New Service
        </button>
    </div>
</div>

<!-- Services Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    @php
        $services = [
            [
                'name' => 'Web Design',
                'icon' => 'fas fa-palette',
                'color' => 'from-pink-500 to-rose-500',
                'description' => 'Creating beautiful and modern web designs that convert visitors into customers.',
                'price' => '$500 - $2000',
                'duration' => '1-2 weeks',
                'status' => 'active'
            ],
            [
                'name' => 'Web Development',
                'icon' => 'fas fa-code',
                'color' => 'from-blue-500 to-cyan-500',
                'description' => 'Building responsive and fast websites using modern technologies.',
                'price' => '$1000 - $5000',
                'duration' => '2-4 weeks',
                'status' => 'active'
            ],
            [
                'name' => 'Mobile App Design',
                'icon' => 'fas fa-mobile-alt',
                'color' => 'from-purple-500 to-indigo-500',
                'description' => 'Designing user-friendly mobile applications for iOS and Android.',
                'price' => '$800 - $3000',
                'duration' => '2-3 weeks',
                'status' => 'active'
            ],
            [
                'name' => 'E-commerce Solutions',
                'icon' => 'fas fa-shopping-cart',
                'color' => 'from-green-500 to-emerald-500',
                'description' => 'Complete e-commerce websites with payment integration.',
                'price' => '$2000 - $8000',
                'duration' => '3-6 weeks',
                'status' => 'active'
            ],
            [
                'name' => 'SEO Optimization',
                'icon' => 'fas fa-search',
                'color' => 'from-orange-500 to-amber-500',
                'description' => 'Improving website visibility and search engine rankings.',
                'price' => '$300 - $1000',
                'duration' => '1-2 weeks',
                'status' => 'active'
            ],
            [
                'name' => 'Brand Identity',
                'icon' => 'fas fa-paint-brush',
                'color' => 'from-red-500 to-pink-500',
                'description' => 'Creating complete brand identity including logos and guidelines.',
                'price' => '$500 - $2500',
                'duration' => '1-3 weeks',
                'status' => 'inactive'
            ]
        ];
    @endphp

    @foreach($services as $service)
        <div class="bg-white rounded-2xl shadow-sm p-6 card-hover relative overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-r {{ $service['color'] }} opacity-10 rounded-full -mr-10 -mt-10"></div>

            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-r {{ $service['color'] }} rounded-xl flex items-center justify-center text-white">
                    <i class="{{ $service['icon'] }} text-xl"></i>
                </div>
                <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                    {{ $service['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ ucfirst($service['status']) }}
                </span>
                    <div class="flex space-x-1">
                        <button class="text-indigo-600 hover:text-indigo-800 p-2 hover:bg-indigo-50 rounded-lg transition-all">
                            <i class="fas fa-edit text-sm"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-all">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>

            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $service['name'] }}</h3>
            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $service['description'] }}</p>

            <div class="space-y-2 mb-4">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Price Range:</span>
                    <span class="font-medium text-gray-900">{{ $service['price'] }}</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Duration:</span>
                    <span class="font-medium text-gray-900">{{ $service['duration'] }}</span>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                    View Details
                </button>
                <button class="bg-gradient-to-r {{ $service['color'] }} text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90 transition-opacity">
                    Edit Service
                </button>
            </div>
        </div>
    @endforeach
</div>

<!-- Service Statistics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Service Performance</h3>
            <i class="fas fa-chart-line text-indigo-600"></i>
        </div>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Most Requested</span>
                <span class="text-sm font-medium text-gray-900">Web Development</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Highest Revenue</span>
                <span class="text-sm font-medium text-gray-900">E-commerce Solutions</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Average Project Value</span>
                <span class="text-sm font-medium text-gray-900">$2,500</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Client Satisfaction</h3>
            <i class="fas fa-star text-yellow-500"></i>
        </div>
        <div class="text-center">
            <div class="text-3xl font-bold text-gray-900 mb-2">4.9</div>
            <div class="flex items-center justify-center mb-2">
                @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                @endfor
            </div>
            <p class="text-sm text-gray-600">Based on 127 reviews</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
            <i class="fas fa-bolt text-purple-600"></i>
        </div>
        <div class="space-y-3">
            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2 text-indigo-600"></i>Add New Service
            </button>
            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                <i class="fas fa-edit mr-2 text-green-600"></i>Update Pricing
            </button>
            <button class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                <i class="fas fa-chart-bar mr-2 text-purple-600"></i>View Analytics
            </button>
        </div>
    </div>
</div>

<!-- Add Service Modal -->
<div id="serviceModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeServiceModal()"></div>

        <div class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Add New Service</h3>
                <button onclick="closeServiceModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Name</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="e.g., Web Development">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option>Web Development</option>
                            <option>Design</option>
                            <option>Mobile Development</option>
                            <option>Consulting</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Describe your service..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="e.g., $500 - $2000">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="e.g., 1-2 weeks">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeServiceModal()" class="px-6 py-2 text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-xl hover:opacity-90 transition-opacity">
                        Add Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openServiceModal() {
        document.getElementById('serviceModal').classList.remove('hidden');
    }

    function closeServiceModal() {
        document.getElementById('serviceModal').classList.add('hidden');
    }
</script>
