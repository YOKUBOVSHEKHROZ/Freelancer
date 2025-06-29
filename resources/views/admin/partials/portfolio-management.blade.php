<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Portfolio Management</h1>
        <p class="mt-1 text-sm text-gray-600">Manage your portfolio projects and showcase your work.</p>
    </div>
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <i class="fas fa-plus mr-2"></i>
        Add Project
    </button>
</div>

<div class="bg-white shadow rounded-lg">
    <div class="p-6">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $projects = [
                    ['name' => 'E-commerce Website', 'category' => 'Web Development', 'tag' => 'Design'],
                    ['name' => 'Mobile App UI', 'category' => 'UI/UX Design', 'tag' => 'Development'],
                    ['name' => 'Brand Identity', 'category' => 'Branding', 'tag' => 'Marketing']
                ];
            @endphp

            @foreach($projects as $project)
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300x200" alt="{{ $project['name'] }}">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-gray-900">{{ $project['name'] }}</h3>
                            <div class="flex space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $project['category'] }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $project['tag'] }}
                    </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
