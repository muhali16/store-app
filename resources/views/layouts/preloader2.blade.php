<section id="preloader" class="fixed z-50 left-0 top-0 w-full h-full flex flex-col bg-white px-4 py-5">
    {{-- Header --}}
    <div class="w-full bg-gray-100 shadow-sm border border-gray-200 flex flex-col rounded h-1/5 animate-pulse">
        <div class="w-1/3 rounded-full h-5 m-3 bg-gray-200"></div>
        <hr class="border border-gray-200">
        <div class="flex flex-wrap m-3 gap-4">
            <div class="w-12 h-3 rounded-full bg-gray-200"></div>
            <div class="w-12 h-3 rounded-full bg-gray-200"></div>
            <div class="w-12 h-3 rounded-full bg-gray-200"></div>
            <div class="w-12 h-3 rounded-full bg-gray-200"></div>
        </div>
    </div>

    {{-- Banner --}}
    <div class="w-full bg-gray-200 h-1/3 rounded animate-pulse mt-5"></div>

    {{-- Profile --}}
    <div class="shadow rounded-md p-4 w-full mt-10">
        <div class="animate-pulse flex space-x-4">
          <div class="rounded-full bg-slate-200 h-20 w-20"></div>
          <div class="flex-1 space-y-6 py-1">
            <div class="h-2 bg-slate-200 rounded"></div>
            <div class="space-y-3">
              <div class="grid grid-cols-3 gap-4">
                <div class="h-2 bg-slate-200 rounded col-span-2"></div>
                <div class="h-2 bg-slate-200 rounded col-span-1"></div>
              </div>
              <div class="h-2 bg-slate-200 rounded"></div>
            </div>
          </div>
        </div>
      </div>
    {{-- <div class="w-full bg-white shadow-sm border border-gray-200 flex flex-col">
        <div></div>
        <div></div>
    </div> --}}
</section>

<script>
    var loader = document.getElementById('preloader')
    window.addEventListener('load', function(){
        loader.style.display = 'none';
    })
</script>