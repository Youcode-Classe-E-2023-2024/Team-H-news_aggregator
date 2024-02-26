<x-layouts.client-layout title="Home">


    <h1 class='text-5xl '>Latest Headlines</h1>
    <div class='w-full py-5'>
<<<<<<< HEAD
        <div class='flex flex-wrap w-full items-center justify-center gap-7 mt-5'>

            <?php 
                for ($i=0;$i<=6;$i++) {
            ?>
            <x-news-card />
            <?php } ?>
=======
        <div class='flex flex-wrap w-full items-center justify-center gap-7 mt-5' id="headlineContainer">

{{--            <?php--}}
{{--                for ($i=0;$i<=6;$i++) {--}}
{{--            ?>--}}
{{--            <x-news-card />--}}
{{--            <?php } ?>--}}
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
        </div>
    </div>

    <h1 class='text-5xl font-light my-4 text-center uppercase'>Business</h1>
<<<<<<< HEAD
    <div class='w-full py-5 flex flex-col items-center justify-center'>
        <?php 
=======
    <div class='w-full py-5 flex flex-col items-center justify-center' id="businessContainer">
        <?php
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
                for ($i=0;$i<=3;$i++) {
            ?>
        <x-news-card2 />
        <?php } ?>
    </div>

    <h1 class='text-5xl font-light my-4 text-center uppercase'>Sports</h1>
    <div class='w-full py-5 flex flex-col items-center justify-center'>
<<<<<<< HEAD
        <?php 
=======
        <?php
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
                for ($i=0;$i<=3;$i++) {
            ?>
        <x-news-card2 />
        <?php } ?>
    </div>

    <h1 class='text-5xl font-light my-4 text-center uppercase'>Technology</h1>
    <div class='w-full py-5 flex flex-col items-center justify-center'>
<<<<<<< HEAD
        <?php 
=======
        <?php
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
                for ($i=0;$i<=3;$i++) {
            ?>
        <x-news-card2 />
        <?php } ?>
    </div>




</x-layouts.client-layout>
