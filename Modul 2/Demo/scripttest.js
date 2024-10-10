const taskInput = document.querySelector('.form-control');
const addTaskBtn = document.querySelector('.btn-add');
const taskList = document.querySelector('.list-task');


addTaskBtn.addEventListener('click', function() {
    const taskText = taskInput.value.trim();
    
  
    if (taskText) {
        // Membuat elemen baru untuk daftar tugas
        const listItem = document.createElement('li');
        listItem.textContent = taskText;

        // Membuat tombol untuk menghapus tugas
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.className = 'delete-btn btn btn-danger btn-sm';
        deleteBtn.onclick = function() {
            taskList.removeChild(listItem);
            checkListEmpty(); 
        };

        // Membuat tombol untuk mengedit tugas
        const editBtn = document.createElement('button');
        editBtn.textContent = 'Edit';
        editBtn.className = 'edit-btn btn-info btn-sm';
        editBtn.onclick = function() {
            taskInput.value = taskText; // Mengisi input dengan tugas yang ada
            taskList.removeChild(listItem); 
            checkListEmpty(); 
        };

        // Menambahkan tombol ke elemen daftar tugas
        const wrapper = document.createElement('div');
        wrapper.className = 'wrapper';
        wrapper.appendChild(editBtn);
        wrapper.appendChild(deleteBtn);
        listItem.appendChild(wrapper);
        
        // Menambahkan tugas baru ke daftar
        taskList.appendChild(listItem);
        taskInput.value = ''; 
    }
    
    // Cek jika daftar kosong setelah penambahan
    checkListEmpty();
});

// Fungsi untuk mengecek apakah daftar kosong dan menyembunyikan atau menampilkan daftar
function checkListEmpty() {
    if (taskList.children.length === 0) {
        taskList.style.display = 'none'; 
    } else {
        taskList.style.display = 'block'; 
    }
}

// Menyembunyikan daftar jika awalnya kosong
checkListEmpty();
