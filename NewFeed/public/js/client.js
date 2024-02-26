const serverUrl = 'http://127.0.0.1:8000/'
const newsData = [
    {
        id: 1,
        title: "Breaking News: Major Event",
        description: "A major event occurred today, shaking the world...",
        categoryId: 101,
        image:'https://images.freeimages.com/images/large-previews/2cd/chain-link-fence-1187941.jpg?fmt=webp&h=350'

    },
    {
        id: 2,
        title: "Technology Advancement",
        description: "New technological breakthrough announced, promising...",
        categoryId: 102,
        image:'https://images.freeimages.com/images/large-previews/2cd/chain-link-fence-1187941.jpg?fmt=webp&h=350'
    },
    {
        id: 3,
        title: "Sports Update",
        description: "In the latest match, the underdog team emerged victorious...",
        categoryId: 103,
        image:'https://images.freeimages.com/images/large-previews/2cd/chain-link-fence-1187941.jpg?fmt=webp&h=350'
    },
];

const newsBusinessData = [
    {
        id: 4,
        title: "Breaking News: Major Event",
        description: "A major event occurred today, shaking the world...",
        categoryId: 101,
        image:'https://images.freeimages.com/images/large-previews/2cd/chain-link-fence-1187941.jpg?fmt=webp&h=350'

    },
    {
        id: 5,
        title: "Technology Advancement",
        description: "New technological breakthrough announced, promising...",
        categoryId: 102,
        image:'https://images.freeimages.com/images/large-previews/2cd/chain-link-fence-1187941.jpg?fmt=webp&h=350'
    },
    {
        id: 6,
        title: "Sports Update",
        description: "In the latest match, the underdog team emerged victorious...",
        categoryId: 103,
        image:'https://images.freeimages.com/images/large-previews/2cd/chain-link-fence-1187941.jpg?fmt=webp&h=350'
    },
];



document.addEventListener('DOMContentLoaded', function() {

    displayHeadline()
    displaYBusinessNews()



});


function displayHeadline(){
    const headlineContainer = document.getElementById('headlineContainer');

    const headlineCard = newsData.map((news)=>{
        const newImg = serverUrl+'images/news.webp'
        const iconHeart = serverUrl+'images/heart1.png';

        return(
            `
                <a href="#" data-news-id=${news.id}>
                    <div class='w-[350px] h-[300px] relative hover:scale-[110%]'>
                        <img src="${newImg}" alt={title} class='object-cover w-full h-full absolute top-0 left-0 z-1' />
                        <div class='w-full h-full flex flex-col relative z-2 items-center justify-end p-3 bg-gradient-to-b from-transparent to-black font-thin'>
                            <p class='text-sm'>NASA Spots Asteroid 2024 DW Which Is Closer Than Moon Towards Earth Today</p>
                            <img src="${iconHeart}" onclick="addFavoris(${news.id})" id="icon-heart" class="" alt="" srcset="" style="position: relative;background: white;bottom: 90%;left: 45%;border-radius: 15px;padding: 5px">
                        </div>
                    </div>
                </a>

            `
        )
    })



    headlineContainer.innerHTML += headlineCard.join('')
}

function displaYBusinessNews(){
    const businessContainer = document.getElementById('businessContainer');
    const businessCard = newsBusinessData.map((news)=>{
        const newImg = serverUrl+'images/news.webp'
        const iconHeart = serverUrl+'images/heart1.png';

        return(
            `
                <div data-news-id=${news.id} class='md:w-[900px] w-[400px] h-[400px] sm:h-[250px] flex flex-col sm:flex-row gap-2 items-center justify-center border border-slate-900 my-4 sm:p-3 py-3 rounded-sm'>
                    <img src="${newImg}"alt="title" class='sm:w-[200px] w-full h-[170px] my-1  sm:h-[200px] object-cover'/>

                    <div class='px-3'>
                        <h1 class='text-[15px] sm:text-lg my-1'>Voda Idea to discuss fundraising on Feb 27, mulls rights issue, QIP, FPO, other means; stock up 6% - Moneycontrol</h1>
                        <p class='sm:text-sm text-[13px] text-gray-400 my-1 font-thin'>Shares of Vodafone Idea closed 6 percent higher on November 22 after Aditya Birla Group Chairman Kumar Mangalam Birla on Thursday said that the group was committed to the cash-strapped Vodafone Idea.</p>
                        <p class='text-md text-gray-300 my-1'>Admin</p>
                        <a href={link} target="_blank" class='text-sm mt-3 font-light flex gap-2 items-center text-[#fc444a] '>Read More <AiOutlineArrowRight/></a>
                        <img src="${iconHeart}" onclick="addFavoris(${news.id})" id="icon-heart" class="" alt="" srcset="" style="position: relative;left: 95%;bottom:10%;background: white;border-radius: 15px;padding: 5px">

                    </div>
                </div>

            `
        )
    })



    businessContainer.innerHTML += businessCard.join('')
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

    function addFavoris(newsId){
        const notLiked = serverUrl+'images/heart1.png'
        const liked = serverUrl+'images/heart2.png'
        const iconHeart = document.querySelector(`[data-news-id="${newsId}"] #icon-heart`);
        console.log(iconHeart)
        if(iconHeart.src !== liked){
            iconHeart.src = liked;
            console.log('liked')
        }else{
            iconHeart.src = notLiked;
            console.log('not liked')

        }

    }
