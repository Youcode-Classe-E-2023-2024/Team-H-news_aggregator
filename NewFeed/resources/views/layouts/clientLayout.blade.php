<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News-Feed</title>
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
    @vite('resources/css/app.css')
    <script>
        function openSideBar(){
            alert('eae')
        }

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');

        if (sidebar.classList.contains('hidden')) {
      // If the sidebar is hidden, replace 'hidden' with 'fixed' and 'translate-x-0'
      sidebar.classList.remove('hidden', 'translate-x-minus-100');
      sidebar.classList.add('fixed', 'translate-x-0');
    } else {
      // If the sidebar is fixed, replace 'fixed' with 'hidden' and 'translate-x-[-100%]'
      sidebar.classList.remove('fixed', 'translate-x-0');
      sidebar.classList.add('hidden', 'translate-x-minus-100');
    }
    }
    </script>

</head>
<body>
    <nav class="h-auto bg-black z-[999] p-4 fixed w-full text-white">
        <div class="flex justify-between w-full items-center pb-4">
            <span class="text-white font-light cursor-pointer flex-1" onclick="toggleSidebar()"><img src={{{ asset('images/icons8-menu-50.png') }}} alt="" srcset=""></span>
            <h1 class="text-center text-[#fc444a] font-light sm:text-[23px] text-[19px] xxl:text-[40px] flex-1">
                <span class="text-white">News</span> Forum
            </h1>
            <div class="text-white sm:text-md text-sm flex-1 text-end">
                <span class="border border-white p-1 text-sm">Subscribe</span>
            </div>
        </div>
        <hr class="w-[100%] mx-auto" />
        <div class="w-full pt-5 font-thin px-8 flex justify-center gap-7 sm:text-[20px] sm:gap-9 text-sm items-center">
            <a href=""><p>Home</p></a>
            <a href=""><p>News</p></a>
            <a href=""><p>Technology</p></a>
            <a href=""><p>Business</p></a>
            <a href=""><p>Sports</p></a>
            <a href=""><p>About</p></a>
        </div>
    </nav>
    <div id="sidebar" class="hidden sm:w-[30%] w-[60%] h-full bg-white z-[1000] flex items-center justify-start px-3 py-8 ">
        <p class="absolute right-5 top-5 cursor-pointer" onclick="toggleSidebar()" ><img src={{{ asset('images/icons8-close-50.png') }}} alt="" srcset=""></p>
        <ul class="flex flex-col gap-5 relative">
            <a href="/"><p class="uppercase sm:text-[35px] text-[28px] font-light cursor-pointer hover:text-[#fc444a] hover:tracking-[0.2em]">Home</p></a>
            <a href="/news"><p class="uppercase sm:text-[35px] text-[28px] font-light cursor-pointer hover:text-[#fc444a] hover:tracking-[0.2em]">News</p></a>
            <a href="/business"><p class="uppercase sm:text-[35px] text-[28px] font-light cursor-pointer hover:text-[#fc444a] hover:tracking-[0.2em]">Business</p></a>
            <a href="/politics"><p class="uppercase sm:text-[35px] text-[28px] font-light cursor-pointer hover:text-[#fc444a] hover:tracking-[0.2em]">Politics</p></a>
            <a href="/sports"><p class="uppercase sm:text-[35px] text-[28px] font-light cursor-pointer hover:text-[#fc444a] hover:tracking-[0.2em]">Sports</p></a>
            <a href="/about"><p class="uppercase sm:text-[35px] text-[28px] font-light cursor-pointer hover:text-[#fc444a] hover:tracking-[0.2em]">About</p></a>
        </ul>
        {{-- <div class="absolute bottom-8 left-5 flex gap-7 justify-center items-center">
            <BsTwitter class="cursor-pointer hover:text-[#fc444a] text-[20px] sm:text-[30px] hover:scale-[120%]"></BsTwitter>
            <FaFacebookF class="cursor-pointer hover:text-[#fc444a] text-[20px] sm:text-[30px] hover:scale-[120%]"></FaFacebookF>
            <BsYoutube class="cursor-pointer hover:text-[#fc444a] text-[20px] sm:text-[30px] hover:scale-[120%]"></BsYoutube>
            <BsLinkedin class="cursor-pointer hover:text-[#fc444a] text-[20px] sm:text-[30px] hover:scale-[120%]"></BsLinkedin>
        </div> --}}
    </div>

<!-- ./header -->

<!-- navbar -->

<!-- ./navbar -->


<!-- footer -->

<!-- ./footer -->


</body>


</html>