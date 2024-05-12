

<section class="container mx-auto  px-10 mt-20" id=>
  <div class="text-center gap-4 flex flex-col">
      <h5 class="font-bold text-[24px] text-[#FF0000]">DATA MOBIL DAIHATSU</h5>
      <h3 class="font-extrabold text-[48px] text-black text-2xl">DAFTAR MOBIL DAIHATSU</h3>
      <p clas="">Daihatsu Sahabatku</p>
    </div>
        <div class="grid grid-cols-4 w-10/12 mx-auto gap-4 my-12 ">
        <?php foreach ($data_mobil as $row): ?>
            <div class="flex flex-col justify-center items-center px-7 py-12 shadow-lg gap-5 rounded-xl">
                <img width="200" src="./img/<?= $row['gambar']; ?>" alt="">
                <p class="text-[#787878] text-center"><?php echo $row['model']; ?></p>
                <p class="text-[#E71D4F] font-extrabold text-center">Rp <?= number_format($row['harga']); ?></p>
                <a href="edit.php?id=<?= $row['id'] ?>" class="px-3 py-1">Edit</a>
                <a href="delete_mobil.php?id=<?= $row['id'] ?>" class="px-3 py-1"
                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a>
            </div>
        <?php endforeach; ?>        
      </div>
</section>