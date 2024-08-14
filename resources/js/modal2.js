document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(event) {
        if (event.target.closest('.edit-button')) {
            var button = event.target.closest('.edit-button');
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var price = button.getAttribute('data-price');
            var status = button.getAttribute('data-status');

            document.getElementById('edit_name').value = name;
            document.getElementById('edit_price').value = price;
            document.getElementById('edit_status').value = status;
            document.getElementById('editForm').action = `/products/${id}`;
            document.getElementById('editModal').classList.remove('hidden');
        }
    });

    document.getElementById('closeEditModal').addEventListener('click', function () {
        document.getElementById('editModal').classList.add('hidden');
    });
});

// MODAL DELETE
document.addEventListener('DOMContentLoaded', function() {
    var deleteModal = document.getElementById('deleteModal');
    var confirmDeleteButton = document.getElementById('confirmDelete');
    var cancelDeleteButton = document.getElementById('cancelDelete');
    var deleteFormAction = '';

    document.body.addEventListener('click', function(event) {
        if (event.target.closest('.delete-button')) {
            var button = event.target.closest('.delete-button');
            var id = button.getAttribute('data-id');
            deleteFormAction = `/products/${id}`;

            deleteModal.classList.remove('hidden');
        }
    });

    confirmDeleteButton.addEventListener('click', function() {
        fetch(deleteFormAction, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal menghapus produk');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    cancelDeleteButton.addEventListener('click', function() {
        deleteModal.classList.add('hidden');
    });
});
