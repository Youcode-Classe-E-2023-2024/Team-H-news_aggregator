<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the popup */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
    </style>
</head>

<body class="bg-gray-100">
<div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Category Management</h1>


    @if(session('message'))
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-medium">Info alert!</span> {{ session('message') }}
    </div>
    @endif

    @error('name')
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> {{ $message }}
    </div>
    @enderror

    <!-- Category Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($categories as $category)
            <!-- Example Category Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-2">{{ $category->name }}</h2>
                <p class="text-gray-600">{{ $category->description }}</p>
                <div class="mt-4">
                    <!-- Button to open the popup -->
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2"
                            onclick="openEditPopup({{ $category->id }}, '{{ $category->name }}', '{{ $category->description }}')" >Edit</button>

                    <form action="{{ route('add-category') }}" method="post" style="display: inline">
                        @csrf
                        @method('delete')

                        <!-- Button to delete the category -->
                        <input name="id" type="hidden" value="{{ $category->id }}">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Delete</button>
                    </form>
                </div>
            </div>
            <!-- End Example Category Card -->
        @endforeach


        <!-- Add Category Card -->
        <div class="bg-gray-200 rounded-lg border-dashed border-2 border-gray-400 flex items-center justify-center p-6">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md" onclick="openAddPopup()">Add Category</button>
        </div>
        <!-- End Add Category Card -->
    </div>
    <!-- End Category Cards -->

    <!-- Add Popup Form -->
    <div class="overlay" id="overlayAddPopup"></div>
    <div class="popup" id="addPopup" style="width: 50vw; min-width: 300px">
        <form action="{{ route('add-category') }}" method="post">
            @csrf
            <h2 class="text-lg font-semibold mb-2">Add Category</h2>

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input id="name" name="name" type="text" class="border border-gray-300 rounded-md px-3 py-2 w-full mb-4" placeholder="New Category Name">

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Write description here..."></textarea>

            <div class="flex justify-end">
                <!-- Button to close the popup -->
                <a class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md mr-2" href="#" onclick="closeAddPopup()">Cancel</a>
                <!-- Button to save changes -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit">Save</button>
            </div>
        </form>
    </div>
    <!-- End Add Popup Form -->

    <!-- Edit Popup Form -->
    <div class="overlay" id="overlayEditPopup"></div>
    <div class="popup" id="editPopup" style="width: 50vw; min-width: 300px">
        <form action="{{ route('update-category') }}" method="post">
            @csrf
            @method('put')
            <h2 class="text-lg font-semibold mb-2">Edit Category</h2>
            <input name="id" type="hidden" id="categoryId">

            <label for="nameInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input id="nameInput" name="name" type="text" class="border border-gray-300 rounded-md px-3 py-2 w-full mb-4" placeholder="Edit Category Name">

            <label for="messageInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="messageInput" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Write description here..."></textarea>

            <div class="flex justify-end">
                <!-- Button to close the popup -->
                <a class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md mr-2" href="#" onclick="closeEditPopup()">Cancel</a>
                <!-- Button to save changes -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit">Save</button>
            </div>
        </form>
    </div>
    <!-- End Edit Popup Form -->
</div>

<!-- JavaScript to control the popup -->
<script>
    function openEditPopup(id, name, description) {
        document.getElementById("overlayEditPopup").style.display = "block";
        document.getElementById("editPopup").style.display = "block";

        // Set the value of the hidden input field with the category ID
        document.getElementById("categoryId").value = id;
        document.getElementById("nameInput").value = name;
        document.getElementById("messageInput").value = description;
    }

    function closeEditPopup() {
        document.getElementById("overlayEditPopup").style.display = "none";
        document.getElementById("editPopup").style.display = "none";
    }

    function openAddPopup() {
        document.getElementById("overlayAddPopup").style.display = "block";
        document.getElementById("addPopup").style.display = "block";
    }

    function closeAddPopup() {
        document.getElementById("overlayAddPopup").style.display = "none";
        document.getElementById("addPopup").style.display = "none";
    }
</script>
</body>

</html>
