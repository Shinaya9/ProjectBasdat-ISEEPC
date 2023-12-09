<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/uploadproduk.css">
    <title>Tambah Produk</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa-solid fa-bars" style="color: #000000;" id="btn"></i>
            <i class="fa-solid fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>
                <p><img src="gambar/logonobg.png" alt="logo"> I See PC</p>
            </header>
            <ul>
                <li style="height: 60px;"><a href="../lainnya/homepage2.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li style="height: 60px;"><a href="explorepage.php"><i class="fa-solid fa-magnifying-glass"></i> Explore</a></li>
                <li style="height: 60px;"><a href="myproduct2.php"><i class="fa-solid fa-plus" style="color: #000000;"></i>My Product</a></li>
                <li style="height: 60px;"><a href="halprofil.php"><i class="fa-solid fa-user" style="color: #000000;"></i> User</a></li>
                <li style="height: 60px;"><a href="contact.php"><i class="fa-regular fa-address-book"></i>Contact Us</a></li>
                <li style="height: 60px;"><a href="../../proses/lainnya/proseslogout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>Log out</a></li>
            </ul>
        </div>
        <section>
            <div class="isi">
                <h1>Tambah produk</h1>
                <form action="../../proses/create/prosesbuatproduk.php" method="post" id="produkForm" enctype="multipart/form-data">
                    <!-- Formulir Informasi Produk -->
                    <h2>Informasi Produk</h2>
                    <div class="foto">
                        <div class="tulisan">
                            <h2>Foto Produk</h2>
                            <p>Foto yang ditunjukkan menggunakan format .jpg, .png, .jpeg dengan ukuran min. 240x240 dan maks. 700x700, disarankan foto yang jernih dan tidak pixelated.</p>
                            <p>Produk yang dijual difoto dengan menarik sehingga menarik banyak pelanggan.</p>
                            <div class="submit" id="customFileInput" style="margin-top:20px;">
                            Upload Gambar
                            <input type="file" name="prd_pic" accept="image/*" style="display: none;" id="FileInput">
                            </div>
                        </div>
                        <div class="isian">
                            <div class="barang" id="previewImage">
                                <img src="" alt="Gambar Produk">
                            </div>
                        </div>
                            <script>
                            document.getElementById('customFileInput').addEventListener('click', function() {
                                // Ketika div diklik, kirim klik ke elemen input file tersembunyi
                                document.querySelector('input[name="prd_pic"]').click();
                            });
                            document.getElementById('FileInput').addEventListener('change', function(event) {
                                // Mengambil elemen input file
                                var input = event.target;

                                // Memastikan bahwa file telah dipilih
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    // Mengatur fungsi callback ketika pembacaan selesai
                                    reader.onload = function(e) {
                                        // Mengupdate sumber gambar pada elemen div.pp
                                        document.getElementById('previewImage').getElementsByTagName('img')[0].src = e.target.result;
                                    };

                                    // Membaca file gambar sebagai URL data
                                    reader.readAsDataURL(input.files[0]);
                                }
                            });
                            </script>
                    </div>

                    <!-- Informasi Produk -->
                    <div class="semwa">
                        <div class="tulisan">
                            <h2>Nama Produk</h2>
                            <p>Nama produk menjelaskan merek, model, dan tipe.
                            Disarankan untuk tidak menggunakan nama yang panjang (maks. 64 karakter).
                            Nama tidak bisa diubah setelah produk diupload.</p>
                        </div>
                        <div class="isian">
                            <input type="text" name="prd_name" required>
                        </div>
                    </div>
                    <div class="semwa">
                        <div class="tulisan">
                            <h2>Kategori</h2>
                            <p>Kategori yang digunakan berhubungan dengan produk yang akan dijual.
                            Kategori yang terlihat kurang tepat akan diubah oleh ISeePC</p>
                        </div>
                        <div class="isian">
                            <label><input type="radio" name="prd_type" value="Komputer/Laptop" required onchange="togglePCForm()">Komputer/Laptop</label>
                            <label><input type="radio" name="prd_type" value="Lainnya" required onchange="togglePCForm()">Lainnya</label>
                        </div>
                    </div>
                    <div class="semwa">
                        <div class="tulisan">
                            <h2>Kondisi</h2>
                            <p>kondisi produk apakah baru atau second.</p>
                        </div>
                        <div class="isian">
                            <label><input type="radio" name="prd_condition" value="Baru" required>Baru</label>
                            <label><input style="margin-left:85px;" type="radio" name="prd_condition"  value="Bekas" required>Bekas</label>
                        </div>
                    </div>
                    <div class="semwa">
                        <div class="tulisan">
                            <h2>Deskripsi Produk</h2>
                            <p>Produk dideskripsikan dengan baik dan benar, ditunjukan spesifikasi dari produk yang ingin dijual.
                            Pastikan deskriosi yang diberikan sesuai dengan produk yang dijual sehingga pembeli mudah mengerti dan membeli produk anda.</p>
                        </div>
                        <div class="isian2">
                            <input type="textarea" name="prd_desc" required>
                        </div>
                    </div>
                    <div class="semwa">
                        <div class="tulisan">
                            <h2>Harga Produk</h2>
                            <p>Harga produk yang diberikan WAJIB sesuai dengan kualitas produk untuk pencegahan penipuan atau sebagainya.</p>
                        </div>
                        <div class="isian">
                            <input type="text" name="prd_price" required>
                        </div>
                    </div>

                    <!-- Formulir tambahan untuk produk PC -->
                    <div id="pcForm" style="display: none;">
                        <h1 style="margin-top:20px;">Spesifikasi PC</h1>
                        <div class="semwa">
                            <div class="tulisan">
                                <h2>Prosessor Komputer</h2>
                                <p>Contoh : Intel Core i5-10040K</p>
                            </div>
                            <div class="isian">
                                <input type="text" name="pc_processor" >
                            </div>
                        </div>
                        <div class="semwa">
                            <div class="tulisan">
                                <h2>RAM (Random Access Memory)</h2>
                            </div>
                            <div class="isian">
                                <input type="text" name="pc_mem" >
                            </div>
                        </div>
                        <div class="semwa">
                            <div class="tulisan">
                                <h2>Storage</h2>
                                <p>Penyimpanan SSD atau HDD.</p>
                                <p>contoh : SSD 500 GB</p>
                            </div>
                            <div class="isian">
                                <input type="text" name="pc_storage" >
                            </div>
                        </div>
                        <div class="semwa">
                            <div class="tulisan">
                                <h2>Kartu grafis Komputer</h2>
                                <p>contoh : NVIDIA GeForce RTX 2060</p>
                            </div>
                            <div class="isian">
                                <input type="text" name="pc_graph" >
                            </div>
                        </div>
                        <div class="semwa">
                            <div class="tulisan">
                                <h2>Display Komputer</h2>
                                <p>contoh: 15" (inchi)</p>
                            </div>
                            <div class="isian">
                                <input type="text" name="pc_display" >
                            </div>
                        </div>
                        <div class="semwa">
                            <div class="tulisan">
                                <h2>Operating System</h2>
                                <p>Contoh : Windows 10</p>
                            </div>
                            <div class="isian">
                                <input type="text" name="pc_opsys" >
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <button class="submit" type="submit" name="tambah_produk" style="margin-top:20px;">Tambah Produk</button>
                </form>
            </div>
        </section>
    </div>

    <!-- Script JavaScript -->
    <script>
        function togglePCForm() {
            var selectedCategory = document.querySelector('input[name="prd_type"]:checked').value;
            var pcForm = document.getElementById("pcForm");

            // Show the additional form for PC if selectedCategory is "Komputer/Laptop", hide otherwise
            pcForm.style.display = selectedCategory === "Komputer/Laptop" ? "block" : "none";

            // Toggle the 'required' attribute based on selectedCategory
            var pcInputs = pcForm.querySelectorAll('input');
            for (var i = 0; i < pcInputs.length; i++) {
                pcInputs[i].required = selectedCategory === "Komputer/Laptop";
            }
        }
    </script>
</body>
</html>
