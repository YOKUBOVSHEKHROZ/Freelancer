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
                    <div class="bg-gradient-to-r {{ $skill['color'] }} h-3 rounded-full transition-all duration-1000 ease-out"
                         style="width: {{ $skill['percentage'] }}%"></div>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs text-gray-500 mt-4">
                <span>Beginner</span>
                <span>Expert</span>
            </div>
        </div>
    @endforeach
</div>

<!-- Skill Categories -->
<div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
    <h3 class="text-lg font-semibold text-gray-900 mb-6">Skill Categories</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-code text-white text-2xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Frontend Development</h4>
            <p class="text-sm text-gray-600 mb-4">HTML, CSS, JavaScript, React, Vue.js</p>
            <div class="text-2xl font-bold text-indigo-600">6 Skills</div>
        </div>

        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-server text-white text-2xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Backend Development</h4>
            <p class="text-sm text-gray-600 mb-4">PHP, Laravel, Node.js, Python</p>
            <div class="text-2xl font-bold text-emerald-600">4 Skills</div>
        </div>

        <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-paint-brush text-white text-2xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Design & Tools</h4>
            <p class="text-sm text-gray-600 mb-4">Figma, Photoshop, Illustrator</p>
            <div class="text-2xl font-bold text-violet-600">3 Skills</div>
        </div>
    </div>
</div>

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

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Skill Name</label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="e.g., React.js">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option>Frontend Development</option>
                        <option>Backend Development</option>
                        <option>Design & Tools</option>
                        <option>Other</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Proficiency Level</label>
                    <input type="range" min="0" max="100" value="50" class="w-full" id="skillRange">
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
    function openSkillModal() {
        document.getElementById('skillModal').classList.remove('hidden');
    }

    function closeSkillModal() {
        document.getElementById('skillModal').classList.add('hidden');
    }

    // Update skill range value
    document.getElementById('skillRange').addEventListener('input', function() {
        document.getElementById('skillValue').textContent = this.value + '%';
    });
</script>
