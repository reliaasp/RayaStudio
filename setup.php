<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set up Teknisi - Raya Studio</title>
    
    <style>
        /* Menggunakan base style yang sama dengan mitra.php */
        body.mitra-page {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f6f6;
        }

        .mitra-layout { display: flex; min-height: 100vh; }

        /* --- SIDEBAR --- */
        .mitra-sidebar {
            width: 280px; background-color: #4f1d70; color: white;
            padding: 40px 30px; box-sizing: border-box;
            position: relative;
        }
        .mitra-logo-text { font-size: 38px; font-weight: 900; letter-spacing: 4px; margin: 0; }
        .mitra-logo-sub { font-size: 9px; letter-spacing: 1px; margin-bottom: 50px; display: block; }
        .mitra-nav-list { list-style: none; padding: 0; }
        .mitra-nav-list li { margin-bottom: 25px; }
        .mitra-nav-list a { color: white; text-decoration: none; font-size: 20px; font-weight: bold; }

        /* --- CONTENT --- */
        .mitra-content { flex: 1; padding: 60px 50px; }
        .mitra-content h1 { font-size: 34px; font-weight: 800; color: #111; margin-bottom: 30px; }

        .setup-container {
            display: grid;
            grid-template-columns: 1.2fr 1fr; /* Kiri form, Kanan hasil/syarat */
            gap: 30px;
            max-width: 1100px;
        }

        .mitra-card {
            background: white; border-radius: 16px; padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        /* --- FORM STYLE --- */
        .setup-form-title { font-size: 18px; font-weight: bold; margin-bottom: 20px; color: #4f1d70; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 12px; font-weight: bold; text-transform: uppercase; color: #888; margin-bottom: 5px; }
        .form-input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        
        .btn-submit-setup {
            width: 100%; background-color: #4f1d70; color: white; border: none;
            padding: 15px; border-radius: 8px; font-weight: bold; cursor: pointer; margin-top: 10px;
        }

        /* --- HASIL TEKNISI (PREVIEW CARD) --- */
        .preview-card {
            background: linear-gradient(135deg, #855799 0%, #4f1d70 100%);
            border-radius: 20px; padding: 25px; color: white; text-align: center;
        }
        .preview-avatar {
            width: 100px; height: 100px; background: rgba(255,255,255,0.2);
            border-radius: 50%; margin: 0 auto 15px; border: 3px solid white;
            overflow: hidden; display: flex; align-items: center; justify-content: center;
        }
        .preview-name { font-size: 20px; font-weight: bold; margin-bottom: 5px; }
        .preview-price { background: rgba(255,255,255,0.2); display: inline-block; padding: 5px 15px; border-radius: 20px; font-size: 14px; margin-bottom: 15px; }
        .preview-desc { font-size: 13px; opacity: 0.9; line-height: 1.5; }

        /* --- SYARAT SECTION --- */
        .terms-box { margin-top: 20px; font-size: 13px; color: #666; background: #f9f9f9; padding: 15px; border-radius: 8px; border-left: 4px solid #4f1d70; }
    </style>
</head>
<body class="mitra-page">

    <div class="mitra-layout">
        <aside class="mitra-sidebar">
            <div style="margin-bottom: 40px;">
                <h1 class="mitra-logo-text">R°Y°/</h1>
                <span class="mitra-logo-sub">CREATIVE STUDIO</span>
            </div>
             <div class="mitra-menu-label">MENU</div>
            <ul class="mitra-nav-list">
                <li><a href="mitra.php">Home</a></li>
                <li><a href="setup.php" style="color: #d1b3ff;">Set up</a></li>
                <br>
                 <li class="logout-item">
    <a href="logout.php">Log out</a>
</li>
            </ul>
        </aside>

        <main class="mitra-content">
            <h1>Pendaftaran Teknisi</h1>

            <div class="setup-container">
                <div class="mitra-card">
                    <div class="setup-form-title">Registration Form</div>
                    <form action="proses_setup.php" method="POST" enctype="multipart/form-data" onsubmit="return validateSetup()">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Nama Lengkap Anda" required>
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" name="tech_photo" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label>Description / Expertise</label>
                            <textarea name="description" class="form-input" rows="3" placeholder="Contoh: Ahli setting OBS dan Stream Deck..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Price (IDR)</label>
                            <input type="number" id="price" name="price" class="form-input" placeholder="50000" required>
                        </div>
                        
                        <div class="terms-box">
                            <strong>Syarat & Ketentuan:</strong><br>
                            1. Teknisi wajib memiliki alat sendiri.<br>
                            2. Bersedia dipanggil ke lokasi mitra jika diperlukan.<br>
                            3. Komisi 10% untuk platform Raya Studio.
                        </div>

                        <button type="submit" class="btn-submit-setup">Register as Technician</button>
                        <button type="button" onclick="resetForm()" style="
        width: 100%;
        background-color: #ccc;
        color: black;
        border: none;
        padding: 15px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    ">
        Cancel
    </button>
                    </form>
                </div>

                <div>
                    <div style="font-weight: bold; margin-bottom: 10px; color: #888;">PREVIEW CARD</div>
                    <div class="preview-card" id="previewCard">
                        <div class="preview-avatar">
                            <span id="initials">👤</span>
                        </div>
                        <div class="preview-name" id="prevName">Your Name</div>
                        <div class="preview-price" id="prevPrice">Rp 0</div>
                        <p class="preview-desc" id="prevDesc">Deskripsi keahlian kamu akan muncul di sini setelah formulir diisi lengkap.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // JavaScript Interaktif untuk Preview Langsung (Nambah nilai ETS)
        const nameInput = document.getElementById('fullname');
        const priceInput = document.getElementById('price');
        
        nameInput.addEventListener('input', function() {
            document.getElementById('prevName').innerText = this.value || "Your Name";
        });

        priceInput.addEventListener('input', function() {
            let val = this.value ? parseInt(this.value).toLocaleString('id-ID') : "0";
            document.getElementById('prevPrice').innerText = "Rp " + val;
        });

        function validateSetup() {
    const price = document.getElementById('price').value;
    if (price < 10000) {
        alert("Harga jasa minimal Rp 10.000");
        return false;
    }
    if (price > 1000000) {
        alert("Harga jasa maksimal Rp 1.000.000");
        return false;
    }
    return true;
}
function resetForm() {
    // reset form
    document.querySelector("form").reset();

    // reset preview
    document.getElementById('prevName').innerText = "Your Name";
    document.getElementById('prevPrice').innerText = "Rp 0";
    document.getElementById('prevDesc').innerText = "Deskripsi keahlian kamu akan muncul di sini setelah formulir diisi lengkap.";
    document.getElementById('initials').innerText = "👤";
}
    </script>
    <style> .mitra-menu-label { font-size: 13px; font-weight: bold; margin-bottom: 40px; letter-spacing: 1px; }
        .logout-item {
    position: absolute;
    bottom: 20px;
    left: 15px;
}

.logout-item a {
    font-size: 20px;
    color: white;
    text-decoration: none;
}

.logout-item a:hover {
    color: red;
}
    </style>

</body>
</html>