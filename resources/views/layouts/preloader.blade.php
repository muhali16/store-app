<section id="preloader" class="fixed z-50 left-0 top-0 w-full h-full flex justify-center items-center flex-col bg-blue-200">
    <div class="p-5">
        <span class="text-4xl font-bold text-blue-700 text-center">Kantin Kejujuran</span>
    </div>
    <div class="flex justify-center items-center">
        <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</section>

<script>
    var loader = document.getElementById('preloader')
    window.addEventListener('load', function(){
        loader.style.display = 'none';
    })
</script>