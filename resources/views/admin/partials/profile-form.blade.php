<div class="mb-8">
    <h1 class="text-2xl font-semibold text-gray-900">Profile Management</h1>
    <p class="mt-1 text-sm text-gray-600">Update your personal information and about section.</p>
</div>

<div class="bg-white shadow rounded-lg">
    <form class="space-y-6 p-6" method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name ?? 'Kate Winslet') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email ?? 'kate@example.com') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone', '+012 345 6789') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                <input type="date" name="birthday" id="birthday" value="{{ old('birthday', '1990-04-01') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                <input type="text" name="degree" id="degree" value="{{ old('degree', 'Master') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                <input type="text" name="experience" id="experience" value="{{ old('experience', '10 Years') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', '123 Street, New York, USA') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="about" class="block text-sm font-medium text-gray-700">About Me</label>
            <textarea name="about" id="about" rows="4"
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('about', 'Tempor eos dolore amet tempor dolor tempor. Dolore ea magna sit amet dolor eirmod. Eos ipsum est tempor dolor. Clita lorem kasd sed ea lorem diam ea lorem eirmod duo sit ipsum. Amet dolor stet lorem diam dolor justo et dolor dolor dolor') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Profile Image</label>
            <div class="mt-1 flex items-center space-x-4">
                <img class="h-20 w-20 rounded-full" src="https://via.placeholder.com/80x80" alt="Profile">
                <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Change Image
                </button>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Changes
            </button>
        </div>
    </form>
</div>
