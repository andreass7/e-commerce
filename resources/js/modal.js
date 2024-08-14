
// JavaScript to handle modal opening and closing
document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('myModal').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('myModal').classList.add('hidden');
});



document.addEventListener('DOMContentLoaded', function() {
    // Seleksi elemen dengan ID 'success-alert'
    const alertElement = document.getElementById('success-alert');
    
    // Cek jika elemen ada
    if (alertElement) {
        // Atur timeout untuk menghapus elemen setelah 3 detik
        setTimeout(function() {
            alertElement.remove();
        }, 3000); // 3000 ms = 3 detik
    }
});