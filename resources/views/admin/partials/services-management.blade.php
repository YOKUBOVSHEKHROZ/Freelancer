<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Services Management</h1>
        <p class="mt-1 text-sm text-gray-600">Manage the services you offer to clients.</p>
    </div>
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <i class="fas fa-plus mr-2"></i>
        Add Service
    </button>
</div>

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @php
        $services = [
            ['name' => 'Web Design', 'icon' => 'fas fa-laptop', 'description' => 'Creating beautiful and functional web designs'],
            ['name' => 'Web Development', 'icon' => 'fas fa-laptop-code', 'description' => 'Building responsive and dynamic websites'],
            ['name' => 'Apps Design', 'icon' => 'fab fa-android', 'description' => 'Designing user-friendly mobile applications']
        ];
    @endphp

    @foreach($services as $service)
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-indigo-500 text-white rounded-lg">
                    <i class="{{ $service['icon'] }} text-xl"></i>
                </div>
                <div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $service['name'] }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ $service['description'] }}</p>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
            Active
        </span>
        </div>
    @endforeach
</div>

