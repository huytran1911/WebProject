const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})

if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}

window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})

const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})





// Simulated user data
// Simulated user dataimage:
// Simulated user data
let products = [
    {image:'/WebProject/images/product images/chien luoc/alma mater 1tr750.webp' , id: '113' , name: 'Alma mater', menu: 'Chiến lược', price: '1.750.000', quantity: 20, locked: false },
    {image:'/WebProject/images/product images/gia dinh _ tre em/co co tich 350k.webp' , id: '114' ,name: 'Cờ cổ tích', menu: 'Gia đình & trẻ em', price: '350.000', quantity: 14, locked: false },
    {image: '/WebProject/images/product images/co/co tuong 50k.jpg',id: '115' , name: 'Cờ tướng', menu: 'Cờ', price: '50.000', quantity: 28, locked: false },
    // Other users...
];

document.addEventListener('DOMContentLoaded', function() {
    displayProducts(); // Display users on page load
});

function cancelEditProduct() {
    const editProductModal = document.getElementById('editModal');
    editProductModal.style.display = 'none'; 
}

function displayProducts() {
    const tableBody = document.querySelector('#productTable tbody');
    tableBody.innerHTML = '';

    products.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            
            <td><img src="${product.image}" alt="Product Image" class="product-image"></td>
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.menu}</td>
            <td>${product.price}</td>
            <td>${product.quantity}</td>
            <td>
                <button onclick="toggleLock(${index})" class="${product.locked ? 'lock-btn locked' : 'lock-btn'}">
                    ${product.locked ? 'Bỏ khoá' : 'Khoá'}
                </button>
                <button class="edit-btn" onclick="editProduct(${index})" ${product.locked ? 'style="display:none;"' : ''}>Sửa</button>
                <div class="locked-overlay"></div>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function toggleLock(index) {
    products[index].locked = !products[index].locked;
    displayProducts(); // Update table after locking/unlocking
}

function editProduct(index) {
    const editProductModal = document.getElementById('editModal');
    const editProductForm = document.getElementById('editForm');

    document.getElementById('editName').value = products[index].name;
    document.getElementById('editID').value = products[index].id;
    document.getElementById('editMenu').value = products[index].menu;
    document.getElementById('editPrice').value = products[index].price;
    document.getElementById('editQuantity').value = products[index].quantity;

    // Set image preview
    const editImageInput = document.getElementById('editImage');
    const imagePreview = document.getElementById('editImagePreview');
    imagePreview.src = products[index].image;

    editProductModal.style.display = 'block';

    editImageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    editProductForm.addEventListener('submit', function(event) {
        event.preventDefault();

        products[index].name = document.getElementById('editName').value;
        products[index].id = document.getElementById('editID').value;
        products[index].menu = document.getElementById('editMenu').value;
        products[index].price = document.getElementById('editPrice').value;
        products[index].quantity = document.getElementById('editQuantity').value;
        // You might want to update the 'image' property as well if needed

        editProductModal.style.display = 'none';
        displayProducts();
    });

    const cancelEditButton = document.getElementById('cancelEdit');
    cancelEditButton.addEventListener('click', function(event) {
        event.preventDefault();
        cancelEditProduct();
    });
}



function addProduct() {
    const newImage = document.getElementById('addImage').value;
    const newID = document.getElementById('addID').value;
    const newName = document.getElementById('addName').value;
    const newMenu = document.getElementById('addMenu').value;
    const newPrice = document.getElementById('addPrice').value;
    const newQuantity = document.getElementById('addQuantity').value;

    const newProduct = {
        image: newImage,
        id: newID, // Sửa từ idp thành id
        name: newName,
        menu: newMenu,
        price: newPrice,
        quantity: newQuantity,
        locked: false // Không khóa mặc định  
    };

    products.push(newProduct);
    alert("Thêm thành công");
    displayProducts();
}

function chooseFile() {
    const fileInput = document.getElementById('addImage');
    fileInput.click();

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const imagePreview = document.getElementById('addImagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    displayProducts(); // Display users on page load

    const addProductButton = document.querySelector('.add-btn');
    const addProductModal = document.getElementById('addModal');
    const addProductForm = document.getElementById('addForm');
    const cancelAddButton = document.getElementById('cancelAdd');

    addProductButton.addEventListener('click', function() {
        addProductModal.style.display = 'block';
    });

    addProductForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const newProduct = {
            image: document.getElementById('addImage').value,
            id: document.getElementById('addID').value,
            name: document.getElementById('addName').value,
            menu: document.getElementById('addMenu').value,
            price: document.getElementById('addPrice').value,
            quantity: document.getElementById('addQuantity').value,
            locked: false // Set locked status for the new Product
        };

        products.push(newProduct);
        displayProducts();
        addProductModal.style.display = 'none';
        addProductForm.reset();
    });

    cancelAddButton.addEventListener('click', function(event) {
        event.preventDefault();
        addProductModal.style.display = 'none';
        addProductForm.reset();
    });

    // Gọi hàm chooseFile() sau khi DOM hoàn tất tải
    chooseFile();
});


