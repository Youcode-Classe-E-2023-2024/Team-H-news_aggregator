<x-layouts.client-layout title="Home">


    <h1 class='text-5xl '>Latest Headlines</h1>
    <div class='w-full py-5'>
        <div class='flex flex-wrap w-full items-center justify-center gap-7 mt-5' id="headlineContainer">

{{--            <?php--}}
{{--                for ($i=0;$i<=6;$i++) {--}}
{{--            ?>--}}
{{--            <x-news-card />--}}
{{--            <?php } ?>--}}
        </div>
    </div>

    <h1 class='text-5xl font-light my-4 text-center uppercase'>Business</h1>
    <div class='w-full py-5 flex flex-col items-center justify-center' id="businessContainer">
        <?php
                for ($i=0;$i<=3;$i++) {
            ?>
        <x-news-card2 />
        <?php } ?>
    </div>

    <h1 class='text-5xl font-light my-4 text-center uppercase'>Sports</h1>
    <div class='w-full py-5 flex flex-col items-center justify-center'>
        <?php
                for ($i=0;$i<=3;$i++) {
            ?>
        <x-news-card2 />
        <?php } ?>
    </div>

    <h1 class='text-5xl font-light my-4 text-center uppercase'>Technology</h1>
    <div class='w-full py-5 flex flex-col items-center justify-center'>
        <?php
                for ($i=0;$i<=3;$i++) {
            ?>
        <x-news-card2 />
        <?php } ?>
    </div>




</x-layouts.client-layout>
