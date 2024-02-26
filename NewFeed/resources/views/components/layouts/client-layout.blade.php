<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} </title>
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
<<<<<<< HEAD
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
=======
    <script src="{{'js/client.js'}}"></script>
    @vite('resources/css/app.css')

>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175

</head>
<body class="">

{{-- Header --}}
<nav class="h-auto  z-[999] p-4 fixed w-full text-white">
    <div class="flex justify-between w-full items-center pb-4">
        <span class="text-white font-light cursor-pointer flex-1" onclick="toggleSidebar()"><img src={{{ asset('images/icons8-menu-50.png') }}} alt="" srcset=""></span>
        <h1 class="text-center text-[#fc444a] font-light sm:text-[23px] text-[19px] xxl:text-[40px] flex-1">
            <span class="text-white">News</span> Forum
        </h1>
        <div class="flex justify-end gap-4 mr-2 text-white sm:text-md text-sm flex-1  " >
<<<<<<< HEAD
            <span class="w-24 text-center h-14 border border-white p-4 cursor-pointer text-sm hover:bg-[#fc444a] ">SignIn</span>
            <span class="w-24 text-center h-14 border border-white p-4 cursor-pointer text-sm hover:bg-[#fc444a] ">Sign Up</span>
=======
            <span class="w-24 text-center h-14 border border-white p-4 cursor-pointer text-sm hover:bg-[#fc444a] ">Subscribe</span>
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
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
<<<<<<< HEAD
    
</div>
    
=======

</div>

>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175

<!-- ./header -->
{{-- Main --}}
<div class='w-[85%] mx-auto ' >
    <div class='text-white relative pt-[9.5rem] '>
{{$slot}}
    </div>
</div>
{{-- Main --}}

{{-- Footer --}}
<div class='w-full h-[240px] text-white'>
    <hr class='w-full text-slate-600 h-[0.1px] font-thin' />
<div class='w-[85%] mx-auto pt-[2.3rem] pb-2 '>
    <div class='w-[60%]'>
     <h1 class='text-3xl mb-4'>Subscribe to our <span class='text-[#fc444a]'>Newsletter</span> for <span class='text-[#fc444a]'>daily updates!</span> </h1>
     <input class='bg-black border-b mr-2 border-b-white outline-none text-2xl text-gray-400 my-4 w-[140%] sm:w-[50%]' type="email" placeholder='Email' /><br></br>
     <button type='submit' class='my-3 uppercase text-xl font-light border p-1 hover:text-[#fc444a] hover:border-[#fc444a]'>Subscribe</button>
    </div>
</div>

<<<<<<< HEAD
    
=======

>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175

</div>

<footer class='text-center text-white bg-black mt-3 mb-[1.3rem]'>
<<<<<<< HEAD
       
        <p class='text-center font-thin text-slate-500'>&#169;2023-2024 Designed and Developed by 
=======

        <p class='text-center font-thin text-slate-500'>&#169;2023-2024 Designed and Developed by
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
        <a href="https://github.com/kidusfmariam" target="_blank" class='text-[#fc444a]'> Team H</a>
        </p>
    </footer>
</div>
{{-- Footer --}}
</body>


<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
