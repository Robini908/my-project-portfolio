<!-- Backend Skills Card -->
<div class="skill-card group"
     data-category="backend"
     x-show="activeCategory === null || activeCategory === 'backend'"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-95"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-95">

    <div class="relative overflow-hidden rounded-xl h-full">
        <!-- Card Background with Code Snippet -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-800/90 via-slate-800/80 to-purple-900/70 backdrop-blur-sm z-10"></div>
            <pre class="text-[0.5rem] text-purple-300/20 font-mono leading-tight p-4 overflow-hidden absolute inset-0">
&lt;?php

namespace App\Services;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectService
{
    /**
     * Create a new project.
     *
     * @param array $data
     * @param User $user
     * @return Project
     */
    public function createProject(array $data, User $user): Project
    {
        try {
            DB::beginTransaction();

            $project = new Project();
            $project->title = $data['title'];
            $project->description = $data['description'];
            $project->status = $data['status'] ?? 'draft';
            $project->user_id = $user->id;
            $project->save();

            // Attach technologies
            if (isset($data['technologies'])) {
                $project->technologies()->attach($data['technologies']);
            }

            DB::commit();
            return $project;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create project: ' . $e->getMessage());
            throw $e;
        }
    }
}
            </pre>
        </div>

        <!-- Card Content -->
        <div class="relative p-6 z-20 h-full flex flex-col">
            <!-- Icon -->
            <div class="mb-6">
                <div class="w-16 h-16 bg-purple-500/20 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 border border-purple-500/30">
                    <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                    </svg>
                </div>
            </div>

            <!-- Title with Typing Effect -->
            <h3 class="text-xl font-semibold mb-3 group-hover:text-gradient transition-colors duration-300 chalk-text-lg">
                Backend Development
            </h3>

            <!-- Description -->
            <p class="text-gray-400 mb-6 group-hover:text-gray-300 transition-colors duration-300 chalk-text-sm">
                Building robust server-side applications and APIs to power web applications.
            </p>

            <!-- Skills Grid with Logos -->
            <div class="grid grid-cols-3 gap-4 mt-auto">
                <!-- Static Skill Icons for Backend -->
                <div class="relative group/skill" @mouseenter="setHoveredSkill('Node.js')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-purple-500/50">
                        <img src="/images/skills/nodejs.svg" alt="Node.js" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-purple-500/30">
                        Node.js
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('PHP')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-purple-500/50">
                        <img src="/images/skills/php.svg" alt="PHP" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-purple-500/30">
                        PHP
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('Laravel')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-purple-500/50">
                        <img src="/images/skills/laravel.svg" alt="Laravel" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-purple-500/30">
                        Laravel
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('Express')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-purple-500/50">
                        <svg class="w-6 h-6 text-gray-300 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="currentColor" d="M32 24.795c-1.164.296-1.884.013-2.53-.957l-4.594-6.356-.664-.88-5.365 7.257c-.613.873-1.256 1.253-2.4.944l6.87-9.222-6.396-8.33c1.1-.214 1.86-.105 2.535.88l4.765 6.435 4.8-6.4c.615-.873 1.276-1.205 2.38-.883l-2.48 3.288-3.36 4.375c-.4.5-.345.842.023 1.325L32 24.795zM.008 15.427l.975-5.291c.252-1.32 1.023-1.745 2.238-1.34 1.965.648 3.88 1.47 5.837 2.135.485.167.97.286 1.477.433.383-2.43.732-4.786 1.115-7.134.14-.843.525-1.1 1.302-1.082 1.037.024 2.077.017 3.115.002.517-.006.828.28.947.823.437 1.98.9 3.953 1.362 5.926.078.332.241.595.445 1.04.475-.555.8-.982 1.156-1.382 1.57-1.765 3.154-3.52 4.713-5.294.384-.44.81-.563 1.367-.42 1.55.4 3.106.765 4.676 1.092.522.108.688.48.574.964-.118.505-.298.995-.456 1.49l-3.584 11.063c-.26.806-.683 1.08-1.534.996-.884-.087-1.76-.306-2.642-.45-.465-.077-.696-.34-.632-.834.039-.31.111-.615.18-.92.143-.652.296-1.3.452-1.997l-3.992.06-.402 2.26c-.156.878-.518 1.197-1.43 1.143-.969-.058-1.93-.262-2.9-.384-.366-.045-.566-.283-.54-.659.065-.948.193-1.889.23-2.837.035-.94.71-1.896.69-2.83-.036-1.353-.196-2.701-.313-4.226-1.786-.213-3.676-.475-5.577-.666-1.004-.1-1.377.183-1.589 1.206-.42 2.02-.772 4.055-1.164 6.081-.178.924-.54 1.17-1.517 1.057-.908-.103-1.807-.296-2.716-.423-.392-.055-.578-.28-.492-.673zm10.342-3.577c1.508.083 3.044.152 4.577.26.445.033.562-.198.506-.575-.175-1.133-.347-2.267-.5-3.402-.038-.286-.216-.3-.446-.222-.856.29-1.716.571-2.588.79-.81.204-1.638.341-2.492.516.314 1.01.6 1.936.943 3.034z"/></svg>
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-purple-500/30">
                        Express
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('MongoDB')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-purple-500/50">
                        <svg class="w-6 h-6 text-green-600 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="currentColor" d="M15.9.087l.854 1.604c.192.296.4.558.645.802.715.715 1.394 1.464 2.004 2.266 1.447 1.9 2.423 4.01 3.12 6.292.418 1.394.645 2.824.662 4.27.07 4.323-1.412 8.035-4.4 11.12-.488.488-1.01.94-1.57 1.342-.296 0-.436-.227-.558-.436-.227-.383-.366-.802-.436-1.222-.105-.558-.122-1.133-.105-1.7.017-.296.052-.61.105-.906.17-.802.296-1.57.366-2.38.07-.882.07-1.747-.052-2.62-.366-1.96-1.343-3.638-3.172-4.77-.296-.174-.61-.296-.906-.47.21-.244.366-.523.488-.784.557-1.116.627-2.38.366-3.638-.47-2.266-1.394-4.27-2.495-6.254-.296-.523-.61-1.046-.906-1.57-.122-.227-.226-.435-.363-.645-.034 0-.07 0-.087.035m2.188 27.126c.313.01.313-.26.313-.453 0-1.04-.122-2.082-.35-3.106-.21-.906-.488-1.778-.906-2.62-.14-.29-.297-.558-.506-.8-.02-.022-.053-.04-.07-.036-.034.005-.04.04-.028.063.16.297.32.583.414.9.245.767.406 1.558.432 2.358.017.663-.052 1.325-.244 1.96-.07.245-.176.47-.262.713-.046.133-.176.23-.176.366 0 .104.157.088.244.105.21.052.432.07.65.105.156.035.3.055.488.07z"/></svg>
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-purple-500/30">
                        MongoDB
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('MySQL')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-purple-500/50">
                        <svg class="w-6 h-6 text-blue-500 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z"/></svg>
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-purple-500/30">
                        MySQL
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Hover Effects -->
        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/0 via-purple-500/0 to-purple-500/0 group-hover:from-purple-500/10 group-hover:via-purple-500/5 group-hover:to-purple-500/10 transition-all duration-500 z-10"></div>

        <!-- Glowing Border Effect -->
        <div class="absolute inset-0 rounded-xl border border-purple-500/0 group-hover:border-purple-500/50 transition-all duration-500 z-10 glow-border-purple"></div>
    </div>
</div>
