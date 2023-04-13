<div class="flex h-screen">
    <div class="w-1/4 bg-gray-200">
        <div class="p-4">
            <button class="block mb-2 text-gray-600 hover:text-gray-800 font-bold text-sm uppercase" onclick="toggleMenu()">Menu</button>
            <ul class="menu hidden">
                <li class="mb-2"><a href="#" class="text-gray-600 hover:text-gray-800">Menu item 1</a></li>
                <li class="mb-2"><a href="#" class="text-gray-600 hover:text-gray-800">Menu item 2</a></li>
                <li class="mb-2"><a href="#" class="text-gray-600 hover:text-gray-800">Menu item 3</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.menu');
        menu.classList.toggle('hidden');
    }
</script>
