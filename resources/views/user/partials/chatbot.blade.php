<div id="chatbot-container" class="fixed bottom-4 right-4 z-50">
    <div id="chat-window" class="hidden bg-white rounded-lg shadow-lg w-80 h-[400px] flex flex-col transform transition-all duration-300 ease-in-out">
        <!-- Chat Header -->
        <div class="bg-green-600 text-white px-4 py-3 rounded-t-lg flex justify-between items-center">
            <h3 class="font-semibold text-sm">Chatbot BumbuMasak</h3>
            <button id="close-chat" class="text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chat-messages" class="flex-1 p-2 overflow-y-auto space-y-2 text-xs max-h-80 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            <!-- Chat messages will be appended here -->
        </div>

        <!-- Chat Input -->
        <div class="p-2 border-t">
            <div class="grid grid-cols-2 gap-1 mb-2">
                <button type="button" class="quick-btn" data-question="Metode Pembayaran">Pembayaran</button>
                <button type="button" class="quick-btn" data-question="Status Pesanan">Cek Pesanan</button>
                <button type="button" class="quick-btn" data-question="Produk Promo">Promo</button>
                <button type="button" class="quick-btn" data-question="Alamat Toko">Lokasi</button>
                <button type="button" class="quick-btn" data-question="Jam Operasional">Jam Buka</button>
            </div>
            <form id="chat-form" class="flex gap-1">
                <input type="text" id="chat-input" placeholder="Ketik pesan..."
                       class="flex-1 px-2 py-1 border rounded-lg focus:ring-2 focus:ring-green-600 text-sm">
                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 text-sm">
                    Kirim
                </button>
            </form>
        </div>
    </div>

    <!-- Chat Toggle Button -->
    <button id="chat-toggle" class="bg-green-600 text-white p-3 rounded-full shadow-lg hover:bg-green-700">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
    </button>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatWindow = document.getElementById('chat-window');
    const chatToggle = document.getElementById('chat-toggle');
    const closeChat = document.getElementById('close-chat');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    // Load chat history from session storage
    const chatHistory = JSON.parse(sessionStorage.getItem('chatHistory') || '[]');
    chatHistory.forEach(msg => appendMessage(msg.role, msg.message));

    // Toggle chat window
    chatToggle.addEventListener('click', () => {
        chatWindow.classList.toggle('hidden');
    });

    // Close chat window
    closeChat.addEventListener('click', () => {
        chatWindow.classList.add('hidden');
    });

    // Handle chat form submission
    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (!message) return;

        // Add user message
        appendMessage('user', message);
        chatInput.value = '';

        try {
            // Send message to server
            const response = await fetch('{{ route("chatbot.handle") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message })
            });

            const data = await response.json();
            appendMessage('bot', data.response);
        } catch (error) {
            console.error('Error:', error);
            appendMessage('bot', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
        }
    });

    function appendMessage(role, message) {
        const messageElement = document.createElement('div');
        messageElement.className = `flex ${role === 'user' ? 'justify-end' : 'justify-start'}`;
        messageElement.innerHTML = `
            <div class="max-w-[80%] p-2 rounded-lg text-sm ${
                role === 'user' ? 'bg-green-100 text-green-900' : 'bg-gray-100 text-gray-900'
            }">
                ${message}
            </div>
        `;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Save to session storage
        const chatHistory = JSON.parse(sessionStorage.getItem('chatHistory') || '[]');
        chatHistory.push({ role, message });
        sessionStorage.setItem('chatHistory', JSON.stringify(chatHistory));
    }

    // Handle quick buttons
    document.querySelectorAll('.quick-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const question = this.dataset.question;
            chatInput.value = question;
            chatForm.dispatchEvent(new Event('submit'));
        });
    });
});
</script>
