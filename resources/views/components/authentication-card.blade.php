<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background-custom">


    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div>
            {{ $logo }}
        </div>   
        {{ $slot }}
    </div>
</div>
<style>
    .background-custom {
        background-image: url('/fondo_foto/costanera.jpeg') !important;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

