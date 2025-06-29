<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Blog Management</h1>
        <p class="mt-1 text-sm text-gray-600">Create and manage your blog posts.</p>
    </div>
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <i class="fas fa-plus mr-2"></i>
        New Post
    </button>
</div>

<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $posts = [
                        ['title' => 'Web Design Trends 2024', 'excerpt' => 'Latest trends in web design...', 'status' => 'Published', 'date' => 'Jan 01, 2024'],
                        ['title' => 'JavaScript Best Practices', 'excerpt' => 'Essential JavaScript tips...', 'status' => 'Draft', 'date' => 'Dec 28, 2023']
                    ];
                @endphp

                @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded object-cover" src="https://via.placeholder.com/40x40" alt="">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $post['title'] }}</div>
                                    <div class="text-sm text-gray-500">{{ $post['excerpt'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $post['status'] === 'Published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $post['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post['date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
