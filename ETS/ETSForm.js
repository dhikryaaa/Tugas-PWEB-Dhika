document.getElementById('dataDiriForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Ambil nilai dari form
    const nama = document.getElementById('nama').value.trim();
    const gender = document.getElementById('gender').value;
    const telepon = document.getElementById('telepon').value.trim();
    const email = document.getElementById('email').value.trim();
    const alamat = document.getElementById('alamat').value.trim();
    const password = document.getElementById('password').value.trim();

    // Reset pesan error
    document.getElementById('errorNama').textContent = '';
    document.getElementById('errorGender').textContent = '';
    document.getElementById('errorTelepon').textContent = '';
    document.getElementById('errorEmail').textContent = '';
    document.getElementById('errorAlamat').textContent = '';
    document.getElementById('errorPassword').textContent = '';
    document.getElementById('formSuccess').textContent = '';

    let isValid = true;

    // Validasi nama
    if (nama === '') {
        document.getElementById('errorNama').textContent = 'Nama harus diisi';
        isValid = false;
    }

    // Validasi gender
    if (gender === '') {
        document.getElementById('errorGender').textContent = 'Jenis kelamin harus dipilih';
        isValid = false;
    }

    // Validasi nomor telepon
    const teleponPattern = /^[0-9]+$/;
    if (telepon === '') {
        document.getElementById('errorTelepon').textContent = 'Nomor telepon harus diisi';
        isValid = false;
    } else if (!teleponPattern.test(telepon)) {
        document.getElementById('errorTelepon').textContent = 'Nomor telepon hanya boleh angka';
        isValid = false;
    } else if (telepon.length < 10) {
        document.getElementById('errorTelepon').textContent = 'Nomor telepon harus minimal 10 angka';
        isValid = false;
    }

    // Validasi email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        document.getElementById('errorEmail').textContent = 'Email harus diisi';
        isValid = false;
    } else if (!emailPattern.test(email)) {
        document.getElementById('errorEmail').textContent = 'Format email tidak valid';
        isValid = false;
    }

    // Validasi alamat
    if (alamat === '') {
        document.getElementById('errorAlamat').textContent = 'Alamat harus diisi';
        isValid = false;
    }

    // Validasi password
    if (password === '') {
        document.getElementById('errorPassword').textContent = 'Kata sandi harus diisi';
        isValid = false;
    } else if (password.length < 8) {
        document.getElementById('errorPassword').textContent = 'Kata sandi harus minimal 6 karakter';
        isValid = false;
    }

    // Sukses
    if (isValid) {
        document.getElementById('formSuccess').textContent = 'Form berhasil disubmit!';
    }
});
