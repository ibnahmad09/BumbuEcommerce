@extends('layouts.user')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sidebar Profil -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto mb-4 relative">
                            <img src="{{ asset('images/default-avatar.png') }}" alt="User Avatar"
                                class="w-full h-full rounded-full object-cover border-4 border-green-100">
                            <button
                                class="absolute bottom-0 right-0 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="mt-6 space-y-4">
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center p-3 text-gray-600 hover:bg-green-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Edit Profil
                        </a>
                        <a href="{{ route('orders.index') }}"
                            class="flex items-center p-3 text-gray-600 hover:bg-green-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Riwayat Pesanan
                        </a>
                        <a href="{{ route('profile.security') }}"
                            class="flex items-center p-3 text-gray-600 hover:bg-green-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Keamanan Akun
                        </a>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Profil</h2>

                    <div class="space-y-6">
                        <!-- Informasi Dasar -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                                <p class="text-gray-800 font-medium">{{ auth()->user()->name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                                <p class="text-gray-800 font-medium">{{ auth()->user()->email }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Nomor Telepon</label>
                                <p class="text-gray-800 font-medium">{{ auth()->user()->phone ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                                <p class="text-gray-800 font-medium">{{ auth()->user()->address ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Statistik Transaksi -->
                        <div class="bg-green-50 rounded-xl p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Statistik Transaksi</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="text-center">
                                    <p class="text-sm text-gray-500">Total Pesanan</p>
                                    <p class="text-2xl font-bold text-green-600">12</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm text-gray-500">Pesanan Selesai</p>
                                    <p class="text-2xl font-bold text-green-600">8</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm text-gray-500">Pesanan Diproses</p>
                                    <p class="text-2xl font-bold text-green-600">2</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm text-gray-500">Total Belanja</p>
                                    <p class="text-2xl font-bold text-green-600">Rp 1.250.000</p>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat Pengiriman -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Alamat Pengiriman</h3>
                            <div class="space-y-4">
                                @foreach ($addresses as $address)
                                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $address->label }}</p>
                                                <p class="text-sm text-gray-600">{{ $address->full_address }}</p>
                                            </div>
                                            <button class="text-green-600 hover:text-green-700"
                                                onclick="openEditAddressModal({{ $address->id }})">Edit</button>
                                        </div>
                                    </div>
                                @endforeach

                                <button onclick="openAddressModal()"
                                    class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    Tambah Alamat Baru
                                </button>
                            </div>
                        </div>

                        <!-- Modal Tambah Alamat -->
                        <div id="addressModal"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                            <div class="bg-white rounded-lg w-full max-w-2xl p-6">
                                <h3 class="text-xl font-semibold mb-4">Tambah Alamat Baru</h3>
                                <form id="addressForm" method="POST" action="{{ route('profile.address.store') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Label Alamat</label>
                                        <input type="text" name="label" class="w-full px-4 py-2 border rounded-lg"
                                            placeholder="Rumah/Kantor" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cari Alamat</label>
                                        <input id="address-search" type="text"
                                            class="w-full px-4 py-2 border rounded-lg" placeholder="Masukkan alamat">
                                    </div>
                                    <div id="map" class="h-64 mb-4 rounded-lg"></div>
                                    <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude">
                                    <input type="hidden" name="full_address" id="full_address">
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="closeAddressModal()"
                                            class="px-4 py-2 text-gray-600 hover:text-gray-800">Batal</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Edit Alamat -->
                        <div id="editAddressModal"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                            <div class="bg-white rounded-lg w-full max-w-2xl p-6">
                                <h3 class="text-xl font-semibold mb-4">Edit Alamat</h3>
                                <form id="editAddressForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Label Alamat</label>
                                        <input type="text" name="label" id="editLabel"
                                            class="w-full px-4 py-2 border rounded-lg" placeholder="Rumah/Kantor"
                                            required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cari Alamat</label>
                                        <input id="editAddressSearch" type="text"
                                            class="w-full px-4 py-2 border rounded-lg" placeholder="Masukkan alamat">
                                    </div>
                                    <div id="editMap" class="h-64 mb-4 rounded-lg"></div>
                                    <input type="hidden" name="latitude" id="editLatitude">
                                    <input type="hidden" name="longitude" id="editLongitude">
                                    <input type="hidden" name="full_address" id="editFullAddress">
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="closeEditAddressModal()"
                                            class="px-4 py-2 text-gray-600 hover:text-gray-800">Batal</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script>
                            let map;
                            let marker;
                            let editMap; // Tambahkan ini
                            let editMarker; // Tambahkan ini

                            function initMap() {
                                // Coba dapatkan lokasi pengguna
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(
                                        (position) => {
                                            const userLocation = {
                                                lat: position.coords.latitude,
                                                lng: position.coords.longitude
                                            };

                                            // Inisialisasi map dengan lokasi pengguna
                                            map = L.map('map').setView([userLocation.lat, userLocation.lng], 13);

                                            // Tambahkan tile layer dari OpenStreetMap
                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                            }).addTo(map);

                                            // Tambahkan marker di lokasi pengguna
                                            marker = L.marker([userLocation.lat, userLocation.lng]).addTo(map);

                                            // Isi nilai latitude dan longitude
                                            document.getElementById('latitude').value = userLocation.lat;
                                            document.getElementById('longitude').value = userLocation.lng;

                                            // Dapatkan alamat lengkap menggunakan Nominatim (OpenStreetMap)
                                            fetch(
                                                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${userLocation.lat}&lon=${userLocation.lng}`
                                                )
                                                .then(response => response.json())
                                                .then(data => {
                                                    document.getElementById('full_address').value = data.display_name;
                                                });

                                            // Inisialisasi autocomplete setelah map siap
                                            initGeocoder();
                                        },
                                        (error) => {
                                            // Jika gagal mendapatkan lokasi, gunakan default Jakarta
                                            map = L.map('map').setView([-6.200000, 106.816666], 13);

                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                            }).addTo(map);

                                            // Inisialisasi autocomplete setelah map siap
                                            initGeocoder();
                                        }
                                    );
                                } else {
                                    // Browser tidak support Geolocation
                                    map = L.map('map').setView([-6.200000, 106.816666], 13);

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                    }).addTo(map);

                                    // Inisialisasi autocomplete setelah map siap
                                    initGeocoder();
                                }
                            }

                            function initGeocoder() {
                                const addressSearch = document.getElementById('address-search');
                                const searchControl = L.Control.geocoder({
                                    defaultMarkGeocode: false,
                                    placeholder: 'Cari alamat...',
                                    geocoder: L.Control.Geocoder.nominatim()
                                }).on('markgeocode', function(e) {
                                    const {
                                        center,
                                        name
                                    } = e.geocode;

                                    // Set view ke lokasi yang ditemukan
                                    map.setView(center, 13);

                                    // Tambahkan/update marker
                                    if (marker) {
                                        marker.setLatLng(center);
                                    } else {
                                        marker = L.marker(center).addTo(map);
                                    }

                                    // Isi nilai latitude, longitude, dan alamat
                                    document.getElementById('latitude').value = center.lat;
                                    document.getElementById('longitude').value = center.lng;
                                    document.getElementById('full_address').value = name;

                                    // Isi input pencarian
                                    addressSearch.value = name;
                                }).addTo(map);

                                // Event listener untuk input pencarian
                                addressSearch.addEventListener('keypress', function(e) {
                                    if (e.key === 'Enter') {
                                        e.preventDefault();
                                        searchControl.geocode(addressSearch.value);
                                    }
                                });
                            }

                            function openAddressModal() {
                                document.getElementById('addressModal').classList.remove('hidden');
                                initMap();
                            }

                            function closeAddressModal() {
                                document.getElementById('addressModal').classList.add('hidden');
                            }

                            function openEditAddressModal(addressId) {
                                // Ambil data alamat dari server
                                fetch(`/profile/address/${addressId}/edit`)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Isi form dengan data alamat
                                        document.getElementById('editLabel').value = data.label;
                                        document.getElementById('editLatitude').value = data.latitude;
                                        document.getElementById('editLongitude').value = data.longitude;
                                        document.getElementById('editFullAddress').value = data.full_address;
                                        document.getElementById('editAddressSearch').value = data.full_address;

                                        // Inisialisasi peta
                                        initEditMap(data.latitude, data.longitude);

                                        // Set action form
                                        document.getElementById('editAddressForm').action = `/profile/address/${addressId}`;

                                        // Tampilkan modal
                                        document.getElementById('editAddressModal').classList.remove('hidden');
                                    });
                            }

                            function closeEditAddressModal() {
                                document.getElementById('editAddressModal').classList.add('hidden');
                            }

                            function initEditMap(lat, lng) {
                                if (editMap) {
                                    editMap.remove();
                                }

                                editMap = L.map('editMap').setView([lat, lng], 13);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(editMap);

                                editMarker = L.marker([lat, lng]).addTo(editMap);

                                // Inisialisasi geocoder
                                initEditGeocoder();

                                // Tambahkan event click untuk mengubah lokasi
                                editMap.on('click', (e) => {
                                    if (editMarker) {
                                        editMarker.setLatLng(e.latlng);
                                    } else {
                                        editMarker = L.marker(e.latlng).addTo(editMap);
                                    }

                                    document.getElementById('editLatitude').value = e.latlng.lat;
                                    document.getElementById('editLongitude').value = e.latlng.lng;

                                    fetch(
                                            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}`
                                        )
                                        .then(response => response.json())
                                        .then(data => {
                                            document.getElementById('editFullAddress').value = data.display_name;
                                            document.getElementById('editAddressSearch').value = data.display_name;
                                        });
                                });
                            }

                            function initEditGeocoder() {
                                const editAddressSearch = document.getElementById('editAddressSearch');
                                const searchControl = L.Control.geocoder({
                                    defaultMarkGeocode: false,
                                    placeholder: 'Cari alamat...',
                                    geocoder: L.Control.Geocoder.nominatim()
                                }).on('markgeocode', function(e) {
                                    const {
                                        center,
                                        name
                                    } = e.geocode;

                                    // Set view ke lokasi yang ditemukan
                                    editMap.setView(center, 13);

                                    // Tambahkan/update marker
                                    if (editMarker) {
                                        editMarker.setLatLng(center);
                                    } else {
                                        editMarker = L.marker(center).addTo(editMap);
                                    }

                                    // Isi nilai latitude, longitude, dan alamat
                                    document.getElementById('editLatitude').value = center.lat;
                                    document.getElementById('editLongitude').value = center.lng;
                                    document.getElementById('editFullAddress').value = name;

                                    // Isi input pencarian
                                    editAddressSearch.value = name;
                                }).addTo(editMap);

                                // Event listener untuk input pencarian
                                editAddressSearch.addEventListener('keypress', function(e) {
                                    if (e.key === 'Enter') {
                                        e.preventDefault();
                                        searchControl.geocode(editAddressSearch.value);
                                    }
                                });
                            }

                            // Handle form submission
                            document.getElementById('editAddressForm').addEventListener('submit', function(e) {
                                e.preventDefault();

                                const formData = new FormData(this);
                                const addressId = this.action.split('/').pop();

                                fetch(this.action, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                            'X-HTTP-Method-Override': 'PUT'
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            location.reload();
                                        }
                                    });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
