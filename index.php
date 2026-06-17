<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feane - Fast Food Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Navbar Style */
        .navbar-custom {
            background-color: #1a1a1a;
            padding: 15px 0;
        }
        .navbar-brand-custom {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: #ffffff !important;
            font-weight: 700;
        }
        .nav-link-custom {
            color: #ffffff !important;
            text-transform: uppercase;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: #ffbe33 !important;
        }

        /* Yellow Button and Search Style */
        .btn-yellow {
            background-color: #ffbe33;
            color: #ffffff;
            font-weight: 600;
            border-radius: 30px;
            padding: 8px 24px;
            border: none;
            transition: all 0.3s;
        }
        .btn-yellow:hover {
            background-color: #e69c00;
            color: #ffffff;
        }
        .search-input-custom {
            border-radius: 30px;
            padding: 8px 15px;
            border: 1px solid #444;
            background-color: #222;
            color: white;
            width: 180px;
            font-size: 0.9rem;
        }
        .search-input-custom::placeholder {
            color: #888;
        }
        .search-input-custom:focus {
            background-color: #333;
            color: white;
            border-color: #ffbe33;
            box-shadow: none;
        }

        /* Hero Banner Section */
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.81), rgba(179, 124, 124, 0.85)), url('f6.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 160px 0 160px 0;
            position: relative;
        }
        .hero-title {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            color: #ffffff;
            margin-bottom: 20px;
        }
        .hero-subtitle {
            font-size: 1rem;
            color: #bfbfbf;
            max-width: 450px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* Product Menu Section */
        .section-title {
            font-family: 'Dancing Script', cursive;
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
        }
        
        /* ស្ទីលសម្រាប់ប៊ូតុងលីងប្រភេទអាហារ (Category Links) */
        .category-link {
            color: #222831;
            background-color: #f0f0f0;
            padding: 8px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            text-transform: capitalize;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        .category-link:hover, .category-link.active {
            background-color: #ffbe33;
            color: #ffffff !important;
            box-shadow: 0 4px 10px rgba(255, 190, 51, 0.3);
        }
        
        /* ស្ទីលកាតអាហារ៖ រូបភាពតូចសមសួន ផ្ទៃស បាតមានស្រមោលព្រាលៗ */
        .product-card {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            background-color: #ffffff;
            color: #333333;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-8px);
        }
        .product-card .card-img-top {
            width: 100%;
            height: 230px; /* កម្ពស់រូបភាពរួមតូចជាងមុន បើធៀបនឹង 220px ចាស់ */
            object-fit: cover;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .product-card .card-body {
            padding: 20px;
        }
        .product-card .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #222831;
        }
        .product-card .card-text {
            color: #6c757d !important; /* ពណ៌អក្សរស្រទន់ងាយស្រួលមើល */
            font-size: 0.85rem;
        }
        .product-price {
            font-weight: 600;
            font-size: 1.25rem;
            color: #ffbe33;
        }

        /* Slider dots indicators */
        .dot-container {
            margin-top: 40px;
        }
        .dot {
            height: 12px;
            width: 12px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin: 0 4px;
        }
        .dot.active {
            background-color: #ffbe33;
            width: 25px;
            border-radius: 10px;
        }
    </style>
</head>
<body onload="loadProducts()">

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="#" onclick="window.location.reload();">Feane</a>
            
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="#" onclick="window.location.reload();">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="#menu_section">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="#about_section">About</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center gap-4">
                    <button class="btn btn-yellow btn-sm" onclick="showAddModal()">
                        Add New Product
                    </button>
                    <input class="form-control search-input-custom" type="search" id="search_input" placeholder="Search product..." onkeyup="loadProducts()">
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="hero-title">Fast Food Restaurant</h1>
                    <p class="hero-subtitle">Welcome to the restaurant Fast Food Restaurant </p>
                    <button class="btn btn-yellow py-2 px-4" onclick="document.getElementById('menu_section').scrollIntoView({ behavior: 'smooth' });">Next</button>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        
        <section id="menu_section" class="mb-5">
            <h2 class="section-title">Our Menu</h2>
            
            <div class="d-flex justify-content-center flex-wrap gap-2 mb-4 mt-3">
                <a href="#" class="category-link active" onclick="filterCategory('all', event)">All</a>
                <a href="#" class="category-link" onclick="filterCategory('berger', event)">Berger</a>
                <a href="#" class="category-link" onclick="filterCategory('pizza', event)">Pizza</a>
                <a href="#" class="category-link" onclick="filterCategory('salad', event)">Salad</a>
                <a href="#" class="category-link" onclick="filterCategory('drink', event)">Drink</a>
                <a href="#" class="category-link" onclick="filterCategory('fries', event)">Fries</a>
            </div>
            
            <div class="row" id="product_list"></div>
        </section>
        
        <hr class="my-5">

        <section id="about_section" class="py-5 bg-white rounded p-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <h2 class="section-title text-start" style="font-size: 2.5rem;">We Are Feane</h2>
                    <p class="text-muted mt-3">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                    </p>
                    <button class="btn btn-yellow mt-3" onclick="alert('Thank you for support us!')">Thanks You</button>
                </div>
                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="f5.jpg" class="img-fluid rounded shadow" alt="About Food">
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden; border: none;">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="form_title">Add New Product</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3 bg-light">
                    <form id="productForm" onsubmit="saveProduct(event)">
                        <input type="hidden" id="product_id">
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Product Image</label>
                            <input type="file" id="product_image" class="form-control" accept="image/*">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text" id="product_name" class="form-control" required placeholder="e.g. Delicious Burger">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Price ($)</label>
                            <input type="number" step="0.01" id="price" class="form-control" required placeholder="0.00">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea id="description" class="form-control" rows="3" placeholder="Write something about this food..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-yellow w-100 py-2 mt-2" id="save_btn" style="border-radius: 6px;">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden; border: none;">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="modal_product_name">Product Detail</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center bg-light">
                    <img id="modal_product_img" src="" class="img-fluid mb-3 rounded shadow-sm" style="max-height: 250px; width: 100%; object-fit: cover; display: none;">
                    <div class="text-start p-3 bg-white rounded shadow-sm">
                        <p><strong>Product ID:</strong> <span id="modal_product_id" class="text-muted"></span></p>
                        <p><strong>Price:</strong> <span class="product-price">$<span id="modal_price"></span></span></p>
                        <p><strong>Description:</strong></p>
                        <p id="modal_description" class="text-muted" style="white-space: pre-line; line-height: 1.5;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const apiUrl = 'api.php';
        let productModal;
        let currentCategory = 'all'; // បង្កើត Variable សម្រាប់ចាំចំណាំប្រភេទអាហារដែលកំពុងជ្រើសរើស

        document.addEventListener("DOMContentLoaded", function() {
            productModal = new bootstrap.Modal(document.getElementById('productModal'));
        });

        // [READ & SEARCH] រៀបចំឱ្យទាញទិន្នន័យមកបង្ហាញតាមការ Search ផង និងតាម Category ផង
        

// ២. អនុគមន៍ loadProducts ថ្មី ធានាដើរទាំង All និងប្រភេទផ្សេងៗ
function loadProducts() {
    const searchValue = document.getElementById('search_input').value.toLowerCase();
    
    // ទាញទិន្នន័យទាំងអស់ពី API មកសិន
    fetch(`${apiUrl}?action=read`)
        .then(res => res.json())
        .then(data => {
            let html = '';
            
            // ចាប់ផ្តើមត្រង (Filter) ទិន្នន័យតាមប៊ូតុងដែលបានចុច និងការវាយស្វែងរក
            let filteredData = data.filter(p => {
                const productName = (p.product_name || '').toLowerCase();
                const productDesc = (p.description || '').toLowerCase();
                
                // ពិនិត្យលក្ខខណ្ឌ Search
                const matchesSearch = productName.includes(searchValue) || productDesc.includes(searchValue);
                
                // ពិនិត្យលក្ខខណ្ឌប្រភេទអាហារ (Category)
                let matchesCategory = true;
                if (currentCategory !== 'all') {
                    // ប្រសិនបើចុចប៊ូតុងណា វានឹងទៅរកមើលពាក្យគន្លឹះនោះ ក្នុងឈ្មោះផលិតផល (ឧទាហរណ៍៖ ចុច Burger រកពាក្យ burger)
                    matchesCategory = productName.includes(currentCategory.toLowerCase()) || productDesc.includes(currentCategory.toLowerCase());
                }
                
                return matchesSearch && matchesCategory;
            });

            // បង្ហាញលទ្ធផលលើអេក្រង់
            if(filteredData.length === 0) {
                html = '<div class="col-12"><p class="text-center mt-4 text-muted">No products found in this category.</p></div>';
            } else {
                filteredData.forEach(p => {
                    const imgUrl = p.image_url ? `uploads/${p.image_url}` : 'https://via.placeholder.com/150';
                    const safeName = (p.product_name || '').replace(/'/g, "\\'");
                    const safeDesc = (p.description || '').replace(/'/g, "\\'").replace(/\n/g, " ");

                    html += `
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100 product-card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
            <img src="${imgUrl}" class="card-img-top" alt="Food Image" style="cursor: pointer; height: 220px; object-fit: cover;" onclick="viewDetail(${p.product_id})">
            
            <div class="card-body d-flex flex-column p-4">
                
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold mb-0 text-dark" style="font-size: 1.15rem; max-width: 70%; line-height: 1.3;">
                        ${p.product_name}
                    </h5>
                    <span class="fw-bold" style="color: #ffbe33; font-size: 1.2rem; white-space: nowrap;">
                        $${parseFloat(p.price).toFixed(2)}
                    </span>
                </div>
                
                <p class="card-text text-muted flex-grow-1 mb-4" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.9rem;">
                    ${p.description || 'No description available.'}
                </p>
                
                <div class="d-flex justify-content-end gap-3 mt-auto">
                    <button type="button" class="btn btn-outline-view" text-white rounded-pill px-4" onclick="viewDetail(${p.product_id})">View</button>
                    <button class="btn btn-sm btn-warning text-white rounded-pill px-3" onclick="window.editProduct(event, ${p.product_id}, '${safeName}', ${p.price}, '${safeDesc}')">Edit</button>
                    <button class="btn btn-sm btn-danger rounded-pill px-3" onclick="deleteProduct(${p.product_id})">Delete</button>
                </div>
                
            </div>
        </div>
    </div>
`;
                });
            }
            document.getElementById('product_list').innerHTML = html;
        })
        .catch(err => console.error("Error loading products:", err));
}

// ៣. អនុគមន៍ filterCategory សម្រាប់ប្តូរពណ៌ប៊ូតុង និងកំណត់ប្រភេទអាហារ
function filterCategory(categoryName, event) {
    if(event) event.preventDefault();
    
    // ដក Class active ពីប៊ូតុងទាំងអស់ រួចដាក់ឱ្យតែប៊ូតុងដែលបានចុច
    const links = document.querySelectorAll('.category-link');
    links.forEach(link => link.classList.remove('active'));
    if(event) event.currentTarget.classList.add('active');
    
    // កំណត់ប្រភេទអាហារ រួចហៅទៅបង្ហាញឡើងវិញ
    currentCategory = categoryName;
    loadProducts();
}
        // មុខងារសម្រាប់ Filter ប្រភេទអាហារពេលចុចលើលីងនីមួយៗ
        function filterCategory(categoryName, event) {
            if(event) event.preventDefault();
            
            // ដក Class active ពីលីងទាំងអស់ រួចដាក់ឱ្យតែលីងដែលបានចុច
            const links = document.querySelectorAll('.category-link');
            links.forEach(link => link.classList.remove('active'));
            if(event) event.currentTarget.classList.add('active');
            
            // កំណត់ប្រភេទ Category ថ្មី រួចហៅអនុគមន៍ loadProducts() មកដំណើរការឡើងវិញ
            currentCategory = categoryName;
            loadProducts();
        }

        // [DETAIL] មើលព័ត៌មានលម្អិត
        function viewDetail(id) {
            fetch(`${apiUrl}?action=detail&product_id=${id}`)
                .then(res => res.json())
                .then(p => {
                    document.getElementById('modal_product_name').innerText = p.product_name;
                    document.getElementById('modal_product_id').innerText = p.product_id;
                    document.getElementById('modal_price').innerText = parseFloat(p.price).toFixed(2);
                    document.getElementById('modal_description').innerText = p.description || 'N/A';
                    
                    const modalImg = document.getElementById('modal_product_img');
                    if (p.image_url) {
                        modalImg.src = `uploads/${p.image_url}`;
                        modalImg.style.display = 'inline-block';
                    } else {
                        modalImg.style.display = 'none';
                    }
                    
                    let modal = new bootstrap.Modal(document.getElementById('detailModal'));
                    modal.show();
                });
        }

        // មុខងារបង្ហាញ Modal សម្រាប់បន្ថែមផលិតផលថ្មី (Add New)
        function showAddModal() {
            document.getElementById('productForm').reset();
            document.getElementById('product_id').value = '';
            document.getElementById('form_title').innerText = "Add New Product";
            document.getElementById('save_btn').innerText = "Save Product";
            productModal.show();
        }

        // មុខងារបង្ហាញ Modal សម្រាប់កែប្រែផលិតផល (Edit)
        window.editProduct = function(event, id, name, price, desc) {
            event.stopPropagation();
            document.getElementById('product_id').value = id;
            document.getElementById('product_name').value = name;
            document.getElementById('price').value = price;
            document.getElementById('description').value = desc;

            document.getElementById('form_title').innerText = "Edit Product";
            document.getElementById('save_btn').innerText = "Update Product";
            productModal.show();
        };

        // [CREATE / UPDATE] រក្សាទុកទិន្នន័យ
        function saveProduct(e) {
            e.preventDefault();
            const id = document.getElementById('product_id').value;
            const name = document.getElementById('product_name').value;
            const price = document.getElementById('price').value;
            const desc = document.getElementById('description').value;
            const imageFile = document.getElementById('product_image').files[0];

            const formData = new FormData();
            formData.append('product_id', id);
            formData.append('product_name', name);
            formData.append('price', price);
            formData.append('description', desc);
            
            if (imageFile) {
                formData.append('product_image', imageFile);
            }

            const action = id ? 'update' : 'create';

            fetch(`${apiUrl}?action=${action}`, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                productModal.hide();
                loadProducts();
            });
        }

        // [DELETE] លុបទិន្នន័យ
        function deleteProduct(id) {
            if(confirm("Are you sure you want to delete this product?")) {
                fetch(`${apiUrl}?action=delete&product_id=${id}`)
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                        loadProducts();
                    });
            }
        }

        // មុខងារកំណត់ Active Link នៅពេលធ្វើការ Scroll អេក្រង់
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('header, #menu_section, #about_section');
            const navLinks = document.querySelectorAll('.nav-link-custom');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 150) {
                    current = section.getAttribute('id') || '';
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current) && current !== '') {
                    link.classList.add('active');
                } else if (current === '' && link.getAttribute('href') === '#') {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>