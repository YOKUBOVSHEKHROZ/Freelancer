<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Messages</h1>
            <p class="text-gray-600 mt-2">Manage client inquiries and communications.</p>
        </div>
        <div class="flex items-center space-x-4">
            <button class="bg-white border border-gray-300 rounded-xl px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
            <button class="gradient-bg text-white rounded-xl px-6 py-3 font-medium hover:opacity-90 transition-opacity">
                <i class="fas fa-envelope mr-2"></i>Compose
            </button>
        </div>
    </div>
</div>

<!-- Message Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white mr-4">
                <i class="fas fa-inbox"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Total Messages</p>
                <p class="text-2xl font-bold text-gray-900">24</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white mr-4">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Unread</p>
                <p class="text-2xl font-bold text-gray-900">3</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center text-white mr-4">
                <i class="fas fa-reply"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Replied</p>
                <p class="text-2xl font-bold text-gray-900">18</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white mr-4">
                <i class="fas fa-star"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Important</p>
                <p class="text-2xl font-bold text-gray-900">5</p>
            </div>
        </div>
    </div>
</div>

<!-- Messages List -->
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Recent Messages</h3>
            <div class="flex items-center space-x-2">
                <button class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-search"></i>
                </button>
                <button class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-sort"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="divide-y divide-gray-200">
        @php
            $messages = [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'email' => 'john@example.com',
                    'avatar' => 'https://ui-avatars.com/api/?name=John+Doe&color=7F9CF5&background=EBF4FF',
                    'subject' => 'Web Development Project Inquiry',
                    'message' => 'Hi Kate, I\'m interested in hiring you for a web development project. Could we schedule a call to discuss the requirements?',
                    'time' => '2 hours ago',
                    'status' => 'unread',
                    'priority' => 'high'
                ],
                [
                    'id' => 2,
                    'name' => 'Sarah Smith',
                    'email' => 'sarah@example.com',
                    'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Smith&color=F59E0B&background=FEF3C7',
                    'subject' => 'Portfolio Feedback',
                    'message' => 'Love your portfolio design! The layout is clean and professional. Would love to work with you on my upcoming project.',
                    'time' => '5 hours ago',
                    'status' => 'read',
                    'priority' => 'medium'
                ],
                [
                    'id' => 3,
                    'name' => 'Mike Johnson',
                    'email' => 'mike@example.com',
                    'avatar' => 'https://ui-avatars.com/api/?name=Mike+Johnson&color=10B981&background=D1FAE5',
                    'subject' => 'E-commerce Website Quote',
                    'message' => 'I need a quote for developing an e-commerce website with payment integration. Can you provide an estimate?',
                    'time' => '1 day ago',
                    'status' => 'replied',
                    'priority' => 'high'
                ],
                [
                    'id' => 4,
                    'name' => 'Emily Davis',
                    'email' => 'emily@example.com',
                    'avatar' => 'https://ui-avatars.com/api/?name=Emily+Davis&color=EF4444&background=FEE2E2',
                    'subject' => 'Mobile App Design',
                    'message' => 'Looking for a talented designer to create UI/UX for our mobile app. Your work looks amazing!',
                    'time' => '2 days ago',
                    'status' => 'read',
                    'priority' => 'medium'
                ]
            ];
        @endphp

        @foreach($messages as $message)
            <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer" onclick="openMessage({{ $message['id'] }})">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-12 h-12 rounded-full" src="{{ $message['avatar'] }}" alt="{{ $message['name'] }}">
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="flex items-center space-x-2">
                                <h4 class="text-sm font-semibold text-gray-900 {{ $message['status'] === 'unread' ? 'font-bold' : '' }}">
                                    {{ $message['name'] }}
                                </h4>
                                @if($message['status'] === 'unread')
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                @endif
                                @if($message['priority'] === 'high')
                                    <i class="fas fa-exclamation text-red-500 text-xs"></i>
                                @endif
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">{{ $message['time'] }}</span>
                                @if($message['status'] === 'replied')
                                    <i class="fas fa-reply text-green-500 text-xs"></i>
                                @endif
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 mb-1">{{ $message['email'] }}</p>
                        <h5 class="text-sm font-medium text-gray-900 mb-2 {{ $message['status'] === 'unread' ? 'font-semibold' : '' }}">
                            {{ $message['subject'] }}
                        </h5>
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $message['message'] }}</p>

                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $message['status'] === 'unread' ? 'bg-blue-100 text-blue-800' :
                                   ($message['status'] === 'replied' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($message['status']) }}
                            </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $message['priority'] === 'high' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($message['priority']) }} Priority
                            </span>
                            </div>

                            <div class="flex items-center space-x-2">
                                <button class="text-gray-400 hover:text-indigo-600 p-1 rounded hover:bg-indigo-50 transition-all" onclick="event.stopPropagation(); replyMessage({{ $message['id'] }})">
                                    <i class="fas fa-reply text-sm"></i>
                                </button>
                                <button class="text-gray-400 hover:text-yellow-600 p-1 rounded hover:bg-yellow-50 transition-all" onclick="event.stopPropagation(); starMessage({{ $message['id'] }})">
                                    <i class="fas fa-star text-sm"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600 p-1 rounded hover:bg-red-50 transition-all" onclick="event.stopPropagation(); deleteMessage({{ $message['id'] }})">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">24</span> messages
            </p>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 disabled:opacity-50" disabled>
                    Previous
                </button>
                <button class="px-3 py-1 text-sm bg-indigo-600 text-white rounded-lg">1</button>
                <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700">2</button>
                <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700">3</button>
                <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openMessage(id) {
        console.log('Opening message:', id);
        // Implement message detail view
    }

    function replyMessage(id) {
        console.log('Replying to message:', id);
        // Implement reply functionality
    }

    function starMessage(id) {
        console.log('Starring message:', id);
        // Implement star functionality
    }

    function deleteMessage(id) {
        console.log('Deleting message:', id);
        // Implement delete functionality
    }
</script>
