<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Profile Management</h1>
            <p class="text-gray-600 mt-2">Update your personal information and portfolio details.</p>
        </div>
        <button class="gradient-bg text-white rounded-xl px-6 py-3 font-medium hover:opacity-90 transition-opacity">
            <i class="fas fa-save mr-2"></i>Save All Changes
        </button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Profile Picture -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Profile Picture</h3>
            <div class="text-center">
                <div class="relative inline-block">
                    <img class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg"
                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF&size=128"
                         alt="Profile Picture" id="profile-preview">
                    <button class="absolute bottom-0 right-0 bg-indigo-600 text-white rounded-full p-2 hover:bg-indigo-700 transition-colors">
                        <i class="fas fa-camera text-sm"></i>
                    </button>
                </div>
                <div class="mt-4">
                    <input type="file" id="profile-upload" class="hidden" accept="image/*">
                    <label for="profile-upload" class="cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <i class="fas fa-upload mr-2"></i>Upload New Photo
                    </label>
                </div>
                <p class="text-xs text-gray-500 mt-2">JPG, PNG or GIF (max. 2MB)</p>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mt-6 card-hover">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Profile Stats</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Profile Completion</span>
                    <span class="text-sm font-medium text-gray-900">85%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-green-400 to-blue-500 h-2 rounded-full" style="width: 85%"></div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">24</p>
                        <p class="text-xs text-gray-500">Projects</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">4.9</p>
                        <p class="text-xs text-gray-500">Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
            <form class="space-y-6" method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('PUT')

                <!-- Personal Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone', '+012 345 6789') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                            <input type="date" name="birthday" value="{{ old('birthday', '1990-04-01') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                </div>

                <!-- Professional Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Professional Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                            <input type="text" name="job_title" value="{{ old('job_title', 'UI/UX Designer & Web Developer') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Experience Level</label>
                            <select name="experience" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                                <option value="10 Years">10+ Years</option>
                                <option value="5-10 Years">5-10 Years</option>
                                <option value="2-5 Years">2-5 Years</option>
                                <option value="1-2 Years">1-2 Years</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Education</label>
                            <input type="text" name="degree" value="{{ old('degree', 'Master in Computer Science') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                            <input type="text" name="address" value="{{ old('address', 'New York, USA') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">About Me</h3>
                    <textarea name="about" rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                              placeholder="Tell us about yourself, your experience, and what makes you unique...">{{ old('about', 'I am a passionate UI/UX Designer and Web Developer with over 10 years of experience creating beautiful and functional digital experiences. I specialize in modern web technologies and have a keen eye for design that converts.') }}</textarea>
                </div>

                <!-- Social Links -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Links</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fab fa-linkedin text-blue-600 mr-2"></i>LinkedIn
                            </label>
                            <input type="url" name="linkedin" value="{{ old('linkedin', 'https://linkedin.com/in/katewinslet') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fab fa-github text-gray-800 mr-2"></i>GitHub
                            </label>
                            <input type="url" name="github" value="{{ old('github', 'https://github.com/katewinslet') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fab fa-twitter text-blue-400 mr-2"></i>Twitter
                            </label>
                            <input type="url" name="twitter" value="{{ old('twitter', 'https://twitter.com/katewinslet') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fab fa-dribbble text-pink-500 mr-2"></i>Dribbble
                            </label>
                            <input type="url" name="dribbble" value="{{ old('dribbble', 'https://dribbble.com/katewinslet') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-6">
                    <button type="submit" class="gradient-bg text-white px-8 py-3 rounded-xl font-medium hover:opacity-90 transition-opacity">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
