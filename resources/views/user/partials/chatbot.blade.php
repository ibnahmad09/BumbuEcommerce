<div id="chatbot-container" class="fixed bottom-4 right-4 hidden">
    <div class="bg-white rounded-lg shadow-lg w-96">
        <div class="bg-green-600 text-white px-4 py-3 rounded-t-lg flex justify-between items-center">
            <h3 class="font-semibold">BumbuMasak Assistant</h3>
            <button id="chatbot-close" class="p-1 hover:bg-green-700 rounded-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-4 h-64 overflow-y-auto" id="chatbot-messages">
            <!-- Chat messages will appear here -->
        </div>
        <div class="p-4 border-t">
            <input type="text" id="chatbot-input" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" placeholder="Tulis pesan Anda...">
        </div>
    </div>
</div> 