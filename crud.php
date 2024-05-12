<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section  id="contact" class="pt-32 container mx-auto ">
    <div class="flex flex-col min-h-screen justify-between w-6/12 mx-auto py-20 space-y-9 shadow-2xl p-5 w-50% " >
    <form action="#" method="POST" enctype="multipart/form-data">
        <h2 class="text-center font-extrabold">Tambahkan Database</h2>
        <label for="merk" >Merk:</label>
        <input type="text" class="border  border-[#787878]-200 mx-10 my-10" id="Merk" name="merk" required><br>

        <label for="model" >Model:</label>
        <input type="text" class="border  border-[#787878]-200 mx-10 my-10" id="Model" name="model" required><br>

        <label for="harga" >Harga:</label>
        <input type="text" class="border  border-[#787878]-200 mx-10 my-10" id="harga" name="harga" required><br>

        <label for="Foto" >Gambar:</label>
        <input type="file" class="border  border-[#787878]-200 mx-10 my-10" id="Gambar" name="gambar" required><br>
        
        <label for="Logo" >Logo:</label>
        <input type="file" class="border  border-[#787878]-200 mx-10 my-10" id="Logo" name="logo" required><br>

        <label for="Tahun_Produksi" >Tahun Produksi:</label>
        <input type="text" class="border  border-[#787878]-200 mx-5 my-10" id="Tahun_Produksi" name="tahun_produksi" required><br>

        <label for="Deskripsi" >Deskripsi:</label>
        <input type="text" class="border  border-[#787878]-200 mx-10 my-10" id="Deskripsi" name="deskripsi" required><br>

        <input type="submit" class="px-5 py-1 rounded-lg font-bold bg-[#E71D4F] text-[#FFFFFF] text-center justify-center"  name="tambah_data_mobil" value="Tambah">
    </form>
    </div>
</section>
</body>
</html>
