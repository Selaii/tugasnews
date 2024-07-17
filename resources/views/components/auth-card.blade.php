<div {{ $attributes->merge(['class' => 'flex flex-col items-center pt-6 sm:pt-0']) }}>
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-4 mb-2 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
