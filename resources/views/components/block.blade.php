<div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
    @if (! empty($icon))
        <div class="flex size-12 shrink-0 items-center justify-center rounded-full text-sky-500 sm:size-16">
            @include($icon)
        </div>
    @endif

    <div class="flex flex-col flex-auto pt-3 sm:pt-5">
        @if (! empty($title))
            <h2 class="mb-8 text-xl font-semibold text-black dark:text-white">{{ $title }}</h2>
        @endif

        {{ $slot }}
    </div>
</div>
