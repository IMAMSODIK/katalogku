{{-- Menggunakan layout dasar dari kode pertama --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $userStore->store_name ?? 'TechZone' }} - Modern Computer Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body class="min-h-screen bg-white">
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 flex items-center justify-center lg:justify-start h-16">
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                @if ($userStore->store_logo)
                    <img class="rounded h-8 w-8 sm:h-10 sm:w-10" src="{{ asset('storage/' . $userStore->store_logo) }}"
                        alt="{{ $userStore->store_name ?? 'TechZone' }} Logo" loading="lazy" decoding="async" />
                @else
                    <img class="rounded h-8 w-8 sm:h-10 sm:w-10"
                        src="{{ asset('assets/demo/toko-komputer/img/temp/logo-toko.png') }}"
                        alt="{{ $userStore->store_name ?? 'TechZone' }} Logo" loading="lazy" decoding="async" />
                @endif
                <h1 class="text-lg sm:text-xl md:text-2xl font-bold text-cyan-500">
                    {{ $userStore->store_name ?? 'TechZone' }}
                </h1>
            </a>
        </div>
    </header>

    {{-- Slider Banner dari kode pertama --}}
    <div class="mx-auto">
        <div class="swiper-container h-80 md:h-96 lg:h-[36rem] overflow-hidden">
            <div class="swiper-wrapper">
                @forelse ($banners as $banner)
                    <div class="swiper-slide relative">
                        <img src="{{ route('tenant.asset', ['path' => $banner->image_url]) }}"
                            class="w-full h-full object-cover" alt="{{ $banner->title ?? 'Banner' }}">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h2 class="text-2xl md:text-4xl font-bold mb-2">{{ $banner->title ?? 'Special Offer' }}
                                </h2>
                                <p class="text-lg md:text-xl mb-4 px-4">
                                    {{ $banner->subtitle ?? 'Check out our latest deals' }}</p>
                                @if ($banner->link)
                                    <a href="{{ $banner->link }}"
                                        class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">{{ $banner->button_text ?? 'Learn More' }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide relative">
                        <div
                            class="w-full h-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h2 class="text-2xl md:text-4xl font-bold mb-2">Welcome to
                                    {{ $userStore->store_name ?? 'Our Store' }}</h2>
                                <p class="text-lg md:text-xl mb-4">Discover our amazing products</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="swiper-pagination relative text-center py-4"></div>
        </div>
        <div class="swiper-pagination relative text-center py-4"></div>
    </div>

    {{-- Main Content dari kode pertama --}}
    <main class="container mx-auto px-4 sm:px-6 py-8">
        <!-- Category Display Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Browse by Category
            </h2>
            <div id="category-display"
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                @if (isset($categories) && $categories->isNotEmpty())
                    @foreach ($categories as $category)
                        <div
                            class="category-card bg-white rounded-xl p-4 border border-gray-200 hover:border-cyan-300 hover:shadow-lg transition-all duration-300 cursor-pointer group">
                            <div class="text-center">
                                <h3
                                    class="category-name font-semibold text-gray-800 group-hover:text-cyan-600 transition-colors mb-2">
                                    {{ $category->name }}</h3>
                                <p
                                    class="category-count text-sm text-gray-500 group-hover:text-cyan-500 transition-colors">
                                    {{ $category->products_count ?? 0 }} Products</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-center col-span-full">No categories available</p>
                @endif
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white p-6 rounded-lg shadow-md top-24 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">
                Search Products
            </h2>

            <div class="mb-6">
                <div class="relative w-full">
                    <i data-lucide="search"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 h-4 w-4"></i>
                    <input type="text" id="search-input" placeholder="Search..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent focus:bg-white transition-all text-sm" />
                </div>
            </div>

            <h2 class="text-xl font-bold text-gray-800 mb-4">Filters</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6">
                <div>
                    <h3 class="font-semibold mb-2 text-gray-700">
                        Category
                    </h3>
                    <select id="category-filter"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-cyan-500 focus:border-cyan-500 transition">
                        <option value="all">All</option>
                        @if (isset($categories) && $categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 text-gray-700">
                        Price Range
                    </h3>
                    <select id="price-range"
                        class="w-full py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-cyan-500 focus:border-cyan-500 transition">
                        <option value="">All Prices</option>
                        @if (isset($priceRanges) && $priceRanges->isNotEmpty())
                            @foreach ($priceRanges as $range)
                                <option data-min="{{ $range->min ?? 0 }}" data-max="{{ $range->max ?? '' }}">
                                    {{ $range->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="mb-6">
                <h3 class="font-semibold mb-2 text-gray-700">Brand</h3>
                <div class="relative">
                    <div class="relative">
                        <i data-lucide="search"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 h-4 w-4 z-10"></i>
                        <input type="text" id="brand-search" placeholder="Cari brand..."
                            class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-t-lg focus:ring-cyan-500 focus:border-cyan-500 transition text-sm" />
                        <button id="brand-dropdown-toggle"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition">
                            <i data-lucide="chevron-down" class="h-4 w-4"></i>
                        </button>
                    </div>
                    <div id="brand-dropdown"
                        class="hidden absolute top-full left-0 right-0 bg-white border border-t-0 border-gray-300 rounded-b-lg shadow-lg max-h-60 overflow-y-auto z-20">
                        <div id="brand-options" class="py-2">
                            @if (isset($brands) && $brands->isNotEmpty())
                                @foreach ($brands as $brand)
                                    <div
                                        class="brand-option px-3 py-2 hover:bg-gray-100 cursor-pointer flex items-center justify-between">
                                        <span class="brand-name text-sm">{{ $brand->name }}</span>
                                        <i data-lucide="check" class="brand-check h-4 w-4 text-green-500 hidden"></i>
                                    </div>
                                @endforeach
                            @else
                                <div class="px-3 py-2 text-gray-500 text-sm">No brands available</div>
                            @endif
                        </div>
                    </div>
                    <div id="selected-brands" class="mt-2 flex flex-wrap gap-2 hidden">
                    </div>
                </div>
            </div>
            <button id="reset-filters"
                class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors">
                Reset Filters
            </button>
        </div>

        <div class="flex items-center justify-between mb-4">
            <div class="text-sm text-gray-600">
                <span id="result-count">
                    @if (isset($products))
                        Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk
                    @else
                        Menampilkan 0 produk
                    @endif
                </span>
            </div>
            <div class="flex items-center gap-2">
                <label for="sort-select" class="text-sm text-gray-600">Urutkan:</label>
                <select id="sort-select"
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <option value="relevance">Relevance</option>
                    <option value="price-asc">Price: Lowest</option>
                    <option value="price-desc">Price: Highest</option>
                    <option value="name-asc">Name: A-Z</option>
                    <option value="name-desc">Name: Z-A</option>
                    <option value="newest">Newest</option>
                </select>
            </div>
        </div>

        {{-- Product Grid dari kode pertama --}}
        <div id="product-grid"
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 md:gap-6">
            @forelse ($products as $product)
                {{-- Kartu produk menggunakan style dari kode pertama, tetapi harus punya data-product-id --}}
                <div class="product-card bg-white rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 group border border-gray-200 relative cursor-pointer"
                    data-product-id="{{ $product->id }}">
                    <div class="relative overflow-hidden aspect-square bg-gray-100">
                        {{-- Logika gambar disesuaikan agar bisa menangani koleksi 'productimgs' --}}
                        @php $src = $product->primary_image_src; @endphp
                        @if ($src)
                            <img class="product-image w-full h-full object-contain transform transition-transform duration-300 group-hover:scale-105"
                                loading="lazy" decoding="async" src="{{ $src }}"
                                alt="{{ $product->name }}" />
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif

                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-gray-800 line-clamp-2">{{ $product->name }}</h3>
                        <p class="text-xs text-gray-500 mb-2">{{ $product->category->name ?? 'Uncategorized' }}</p>
                        <div class="flex flex-col">
                            <span
                                class="text-lg font-bold text-gray-900">{{ number_format($product->price ?? 0, 0, ',', '.') }}</span>
                            @if (isset($product->old_price) && $product->old_price > 0)
                                <span
                                    class="text-sm text-gray-500 line-through">{{ number_format($product->old_price, 0, ',', '.') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No products found.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination dari kode pertama --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </main>

    <div id="product-modal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col">
            <div class="relative p-6 md:p-8 overflow-y-auto">
                <button id="modal-close" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 z-10">
                    <i data-lucide="x" class="h-6 w-6"></i>
                </button>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- Kolom Gambar --}}
                    <div class="space-y-4">
                        <div class="relative aspect-square bg-gray-100 rounded-xl overflow-hidden">
                            <img id="main-image" src="" alt="Product image"
                                class="w-full h-full object-contain" />
                            <button id="fullscreen-button"
                                class="absolute top-3 right-3 bg-gray-900/50 p-2 rounded-full text-white hover:bg-gray-900 transition-colors"
                                title="Lihat gambar penuh">
                                <i data-lucide="maximize" class="h-6 w-6"></i>
                            </button>
                        </div>
                        <div id="thumbnail-container" class="grid grid-cols-4 gap-3">
                            {{-- Thumbnails akan diisi oleh JavaScript --}}
                        </div>
                    </div>
                    {{-- Kolom Detail --}}
                    <div class="space-y-6">
                        <div>
                            <p id="modal-product-category" class="text-cyan-600 font-medium"></p>
                            <h1 id="modal-product-name"
                                class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900"></h1>
                        </div>
                        <div class="flex items-baseline space-x-3 flex-wrap">
                            <span id="modal-product-price"
                                class="text-2xl sm:text-3xl font-bold text-gray-900"></span>
                            <span id="modal-product-oldprice"
                                class="text-sm sm:text-lg text-gray-500 line-through"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi</h3>
                            <p id="modal-product-description" class="text-gray-700 leading-relaxed"></p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Spesifikasi</h3>
                            <ul id="modal-product-specs" class="space-y-2">
                                {{-- Spesifikasi akan diisi oleh JavaScript --}}
                            </ul>
                        </div>
                        <div class="pt-6 border-t border-gray-200">
                            <a id="modal-chat-button" href="#" target="_blank"
                                class="w-full flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i data-lucide="message-circle" class="h-5 w-5 mr-2"></i>
                                Chat Toko
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Lightbox --}}
    <div id="image-lightbox"
        class="hidden fixed inset-0 bg-black bg-opacity-80 z-[60] flex items-center justify-center p-4">
        <img id="lightbox-image" src="" alt="Fullscreen product image"
            class="max-w-full max-h-full object-contain" />
        <button id="lightbox-close" class="absolute top-4 right-4 text-white/80 hover:text-white">
            <i data-lucide="x" class="h-8 w-8"></i>
        </button>
        <button id="lightbox-prev"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-gray-900/50 p-2 rounded-full text-white hover:bg-gray-900 transition-colors">
            <i data-lucide="chevron-left" class="h-8 w-8"></i>
        </button>
        <button id="lightbox-next"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-gray-900/50 p-2 rounded-full text-white hover:bg-gray-900 transition-colors">
            <i data-lucide="chevron-right" class="h-8 w-8"></i>
        </button>
    </div>
    {{-- Footer dari kode pertama --}}
    <footer class="bg-gray-900 text-gray-300">
        {{-- ... Isi footer dari kode pertama ... --}}
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        lucide.createIcons();

        // Inisialisasi Swiper Banner
        var swiper = new Swiper(".swiper-container", {
            loop: true,
            autoplay: {
                delay: 5000
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });

        // --- SCRIPT MODAL DAN LIGHTBOX DARI KODE KEDUA (TELAH DISESUAIKAN) ---
        document.addEventListener('DOMContentLoaded', function() {
            const productsData = @json($products->items());

            // --- Elemen Modal & Lightbox ---
            const modal = document.getElementById('product-modal');
            const modalClose = document.getElementById('modal-close');
            const mainImage = document.getElementById('main-image');
            const thumbnailContainer = document.getElementById('thumbnail-container');
            const productName = document.getElementById('modal-product-name');
            const productCategory = document.getElementById('modal-product-category');
            const productPrice = document.getElementById('modal-product-price');
            const productOldPrice = document.getElementById('modal-product-oldprice');
            const productDescription = document.getElementById('modal-product-description');
            const productSpecsList = document.getElementById('modal-product-specs');
            const chatButton = document.getElementById('modal-chat-button');
            const productGrid = document.getElementById('product-grid');
            const imageLightbox = document.getElementById('image-lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxClose = document.getElementById('lightbox-close');
            const lightboxPrev = document.getElementById('lightbox-prev');
            const lightboxNext = document.getElementById('lightbox-next');
            const fullscreenButton = document.getElementById('fullscreen-button');

            let currentLightboxImages = [];
            let currentLightboxIndex = 0;

            if (!modal || !productGrid) {
                console.error("Elemen modal atau grid produk tidak ditemukan.");
                return;
            }

            function formatRupiah(angka) {
                if (angka === null || typeof angka === 'undefined' || isNaN(Number(angka)))
                    return 'Harga tidak tersedia';
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }

            productGrid.addEventListener('click', function(event) {
                const card = event.target.closest('[data-product-id]');
                if (!card) return;

                const productId = parseInt(card.dataset.productId, 10);
                const product = productsData.find(p => p.id === productId);

                if (!product) {
                    console.error('Produk tidak ditemukan:', productId);
                    return;
                }

                // --- Isi Konten Modal ---
                productName.textContent = product.name || 'Produk';
                productCategory.textContent = product.category ? product.category.name : 'Uncategorized';
                productPrice.textContent = formatRupiah(product.price);

                if (product.old_price && product.old_price > product.price) {
                    productOldPrice.textContent = formatRupiah(product.old_price);
                    productOldPrice.style.display = 'inline';
                } else {
                    productOldPrice.style.display = 'none';
                }

                productDescription.textContent = product.description ||
                    'Tidak ada deskripsi untuk produk ini.';

                const phoneNumber = '{{ $userStore->store_phone ?? '628123456789' }}';
                const message = `Halo, saya tertarik dengan produk "${product.name}".`;
                chatButton.href = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

                // Isi Galeri Gambar
                thumbnailContainer.innerHTML = '';
                if (product.productimgs && product.productimgs.length > 0) {
                    mainImage.src = asset(product.productimgs[0].image_url);
                    product.productimgs.forEach((img, index) => {
                        const thumbButton = document.createElement('button');
                        thumbButton.className =
                            `thumbnail aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 ${index === 0 ? 'border-cyan-600' : 'border-transparent hover:border-gray-300'}`;
                        const fullImageUrl = asset(img.image_url);
                        thumbButton.dataset.imageSrc = fullImageUrl;
                        thumbButton.innerHTML =
                            `<img src="${fullImageUrl}" alt="Thumbnail" class="w-full h-full object-cover">`;
                        thumbnailContainer.appendChild(thumbButton);
                    });
                } else {
                    mainImage.src = '{{ asset('path/to/default-image.png') }}';
                }

                // Isi Spesifikasi
                productSpecsList.innerHTML = '';
                if (product.specs && Object.keys(product.specs).length > 0) {
                    Object.entries(product.specs).forEach(([key, value]) => {
                        if (value) {
                            const li = document.createElement('li');
                            li.className = 'flex justify-between py-1 border-b';
                            li.innerHTML =
                                `<span class="text-gray-600">${key.replace(/_/g, ' ')}</span><span class="font-medium text-right">${value}</span>`;
                            productSpecsList.appendChild(li);
                        }
                    });
                } else {
                    productSpecsList.innerHTML =
                        '<li class="text-gray-500 italic">Spesifikasi tidak tersedia.</li>';
                }

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            function asset(path) {
                // Helper function in JS to mimic Laravel's asset()
                let base_url = "{{ url('/') }}";
                return base_url + "/" + path;
            }

            function closeModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }

            modalClose.addEventListener('click', closeModal);
            modal.addEventListener('click', (event) => {
                if (event.target === modal) closeModal();
            });

            // --- Event Listener untuk Modal ---
            thumbnailContainer.addEventListener('click', function(event) {
                const thumb = event.target.closest('.thumbnail');
                if (thumb) {
                    mainImage.src = thumb.dataset.imageSrc;
                    document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove(
                        'border-cyan-600'));
                    thumb.classList.add('border-cyan-600');
                }
            });

            // --- Logika Lightbox ---
            function showLightboxImage() {
                if (currentLightboxImages.length === 0) return;
                lightboxImage.src = currentLightboxImages[currentLightboxIndex];
            }

            fullscreenButton.addEventListener('click', function() {
                currentLightboxImages = Array.from(thumbnailContainer.querySelectorAll('.thumbnail')).map(
                    t => t.dataset.imageSrc);
                if (currentLightboxImages.length === 0) currentLightboxImages.push(mainImage.src);

                const currentMainSrc = mainImage.src;
                currentLightboxIndex = currentLightboxImages.findIndex(src => src === currentMainSrc);
                if (currentLightboxIndex === -1) currentLightboxIndex = 0;

                showLightboxImage();
                imageLightbox.classList.remove('hidden');
            });

            lightboxClose.addEventListener('click', () => imageLightbox.classList.add('hidden'));
            lightboxNext.addEventListener('click', () => {
                currentLightboxIndex = (currentLightboxIndex + 1) % currentLightboxImages.length;
                showLightboxImage();
            });
            lightboxPrev.addEventListener('click', () => {
                currentLightboxIndex = (currentLightboxIndex - 1 + currentLightboxImages.length) %
                    currentLightboxImages.length;
                showLightboxImage();
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    if (!modal.classList.contains('hidden')) closeModal();
                    if (!imageLightbox.classList.contains('hidden')) imageLightbox.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
