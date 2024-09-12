<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background-custom">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
<style>
    .background-custom{
        background: #16697a !important;
    }
</style>
