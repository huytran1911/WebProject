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
    {image:'/WebProject/images/product images/chien luoc/alma mater 1tr750.webp' , name: 'Alma mater', menu: 'john@example.com', phone: '123456789', address: '123 Main St', quantity: 20, locked: false },
    {image: '/WebProject/images/product images/gia dinh _ tre em/co co tich 350k.webp', name: 'Cờ cổ tích', menu: 'john@example.com', phone: '123456789', address: '123 Main St', quantity: 20, locked: false },
    {image: '/WebProject/images/product images/co/co tuong 50k.jpg', name: 'Cờ tướng', menu: 'john@example.com', phone: '123456789', address: '123 Main St', quantity: 20, locked: false },
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
    const tableBody = document.querySelector('#customerTable tbody');
    tableBody.innerHTML = '';

    products.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td><img src="${product.image}" alt="Product Image" class="product-image"></td>
            <td>${product.name}</td>
            <td>${product.menu}</td>
            <td>${product.phone}</td>
            <td>${product.address}</td>
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
    document.getElementById('editEmail').value = products[index].email;
    document.getElementById('editPhone').value = products[index].phone;
    document.getElementById('editAddress').value = products[index].address;

    editProductModal.style.display = 'block';

    editProductForm.addEventListener('submit', function(event) {
        event.preventDefault();

        products[index].name = document.getElementById('editName').value;
        products[index].email = document.getElementById('editEmail').value;
        products[index].phone = document.getElementById('editPhone').value;
        products[index].address = document.getElementById('editAddress').value;

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
    const newName = document.getElementById('addName').value;
    const newEmail = document.getElementById('addEmail').value;
    const newPhone = document.getElementById('addPhone').value;
    const newAddress = document.getElementById('addAddress').value;

    const newProduct = {
        name: newName,
        email: newEmail,
        phone: newPhone,
        address: newAddress,
        locked: false // Không khóa mặc định  
    };

    products.push(newProduct);
    alert("Thêm thành công");
    displayProducts();
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
            name: document.getElementById('addName').value,
            email: document.getElementById('addEmail').value,
            phone: document.getElementById('addPhone').value,
            address: document.getElementById('addAddress').value,
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
});


