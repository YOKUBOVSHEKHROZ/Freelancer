<div class="mb-8">
    <h1 class="text-2xl font-semibold text-gray-900">Messages</h1>
    <p class="mt-1 text-sm text-gray-600">View and respond to client messages.</p>
</div>

<div class="bg-white shadow rounded-lg">
    <div class="p-6">
        <div class="space-y-4">
            @php
                $messages = [
                    [
                        'name' => 'John Doe',
                        'email' => 'john@example.com',
                        'subject' => 'Web Development Project Inquiry',
                        'message' => "Hi Kate, I'm interested in hiring you for a web development project. Could we schedule a call to discuss the requirements?",
                        'time' => '2 hours ago',
                        'status' => 'new'
                    ],
                    [
                        'name' => 'Sarah Smith',
                        'email' => 'sarah@example.com',
                        'subject' => 'Portfolio Feedback',
                        'message' => 'Love your portfolio design! The layout is clean and professional. Would love to work with you on my upcoming project.',
                        'time' => '5 hours ago',
                        'status' => 'read'
                    ]
                ];
            @endphp

            @foreach($messages as $message)
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <img src="https://via.placeholder.com/40x40" alt="{{ $message['name'] }}" class="w-10 h-10 rounded-full">
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $message['name'] }}</h4>
                                <p class="text-sm text-gray-500">{{ $message['email'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($message['status'] === 'new')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">New</span>
                            @endif
                            <span class="text-sm text-gray-500">{{ $message['time'] }}</span>
                        </div>
                    </div>
                    <h5 class="font-medium mb-2">{{ $message['subject'] }}</h5>
                    <p class="text-gray-600 text-sm mb-3">{{ $message['message'] }}</p>
                    <div class="flex space-x-2">
                        <button class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded text-white bg-indigo-600 hover:bg-indigo-700">
                            Reply
                        </button>
                        <button class="inline-flex items-center px-3 py-1 border border-gray-300 text-sm font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                            {{ $message['status'] === 'new' ? 'Mark as Read' : 'Archive' }}
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
