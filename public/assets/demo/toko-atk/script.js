const produk = [
  // KATEGORI: Alat Tulis
  {
    nama: "Pulpen Standard",
    kategori: "Alat Tulis",
    harga: 3000,
    gambar: "https://down-id.img.susercontent.com/file/sg-11134201-22120-x9646mj3swkv99",
    deskripsi: "Pulpen tinta hitam dengan aliran tinta lancar, ideal untuk penggunaan harian."
  },
  {
    nama: "Pensil 2B Faber-Castell",
    kategori: "Alat Tulis",
    harga: 2500,
    gambar: "https://ecs7.tokopedia.net/img/cache/700/product-1/2017/11/16/14804937/14804937_ba9679e5-ce11-4477-b3d6-1e986af7f137_550_550.jpg",
    deskripsi: "Pensil 2B cocok untuk ujian dan menggambar dengan hasil goresan halus."
  },
  {
    nama: "Spidol Whiteboard Snowman",
    kategori: "Alat Tulis",
    harga: 7000,
    gambar: "https://down-id.img.susercontent.com/file/sg-11134201-23020-7ejr1jcczcnv2e",
    deskripsi: "Spidol untuk papan tulis putih dengan tinta pekat dan mudah dihapus."
  },
  {
    nama: "Correction Tape Kenko",
    kategori: "Alat Tulis",
    harga: 8500,
    gambar: "https://siplahtelkom.com/public/products/172981/3165338/correction-tape.1640252042.jpg",
    deskripsi: "Pita koreksi praktis untuk menghapus kesalahan tulisan tanpa noda."
  },

  // KATEGORI: Penjilidan dan Penyimpanan
  {
    nama: "Stapler Kenko HD-10",
    kategori: "Penjilidan dan Penyimpanan",
    harga: 15000,
    gambar: "https://img.mbizmarket.co.id/products/thumbs/800x800/2023/02/22/bda9f2e8f40a7ed0b71ff944102149d2.jpg",
    deskripsi: "Stapler mini berkualitas yang mampu menjilid hingga 20 lembar kertas."
  },
  {
    nama: "Map Plastik A4",
    kategori: "Penjilidan dan Penyimpanan",
    harga: 2000,
    gambar: "https://siplahtelkom.com/public/products/177340/3709436/mapplastik.1659042409.jpg",
    deskripsi: "Map plastik transparan untuk menyimpan dokumen agar tetap rapi dan aman."
  },
  {
    nama: "Ordner Besar A4",
    kategori: "Penjilidan dan Penyimpanan",
    harga: 22000,
    gambar: "https://cdn-images.otto-office.com/oode/b2b/deu/mediadatacat/art/1200/OODE_ART_288/OODE_ART_288280HT_01.jpg",
    deskripsi: "Ordner kuat dengan tuas pengunci logam, cocok untuk arsip volume besar."
  },
  {
    nama: "Sheet Protector A4",
    kategori: "Penjilidan dan Penyimpanan",
    harga: 1200,
    gambar: "https://m.media-amazon.com/images/S/aplus-media/sota/371f59f9-8062-4839-b959-203f2e332085.__CR0,0,300,300_PT0_SX300_V1___.png",
    deskripsi: "Plastik pelindung lembaran dokumen, mencegah kertas rusak atau sobek."
  },

  // KATEGORI: Produk Kertas
  {
    nama: "Kertas HVS A4 70gsm",
    kategori: "Produk Kertas",
    harga: 55000,
    gambar: "https://img.mbizmarket.co.id/products/thumbs/800x800/2022/06/01/af2a84879a3206a9e90517f1d52a5290.jpg",
    deskripsi: "Kertas putih bersih ukuran A4, cocok untuk kebutuhan print dan fotokopi."
  },
  {
    nama: "Sticky Notes 3x3",
    kategori: "Produk Kertas",
    harga: 6000,
    gambar: "https://i5.walmartimages.com/asr/af9eba15-4297-4bf4-b58c-527f317ead58.a904b07756f5d5ed53aeba6935e9567e.jpeg",
    deskripsi: "Kertas tempel warna-warni untuk catatan cepat dan pengingat."
  },
  {
    nama: "Kertas Warna A4 Campuran",
    kategori: "Produk Kertas",
    harga: 18000,
    gambar: "https://siplahtelkom.com/public/products/196935/4176520/277697.f6c2d839-2aab-4319-af5f-26ff475f9125.IMG_202304.jpg",
    deskripsi: "Kertas warna-warni untuk keperluan kreatif atau presentasi."
  },
  {
    nama: "Memo Pad Spiral Kecil",
    kategori: "Produk Kertas",
    harga: 4000,
    gambar: "https://m.media-amazon.com/images/I/71At1Mi7mCL._AC_.jpg",
    deskripsi: "Buku catatan kecil spiral, praktis dibawa untuk mencatat ide cepat."
  },

  // KATEGORI: Perekat dan Label
  {
    nama: "Lem Kertas UHU Stick 21gr",
    kategori: "Perekat dan Label",
    harga: 12000,
    gambar: "https://down-id.img.susercontent.com/file/id-11134207-7r98u-llabjnr2sgp028",
    deskripsi: "Lem stik berkualitas untuk menempelkan kertas tanpa berantakan."
  },
  {
    nama: "Label Nama A4 65 Label",
    kategori: "Perekat dan Label",
    harga: 15000,
    gambar: "https://www.crownlabels.com/wp-content/uploads/2017/11/A4-65.jpg",
    deskripsi: "Label stiker ukuran kecil yang dapat dicetak untuk keperluan pengarsipan."
  },
  {
    nama: "Double Tape 1 Inch",
    kategori: "Perekat dan Label",
    harga: 8000,
    gambar: "https://cf.shopee.co.id/file/2d756bd6d10f107e153c3c38d91aed50",
    deskripsi: "Perekat dua sisi untuk proyek seni atau kebutuhan tempel kuat."
  },
  {
    nama: "Lakban Bening 2 Inch",
    kategori: "Perekat dan Label",
    harga: 10000,
    gambar: "https://down-id.img.susercontent.com/file/id-11134207-7r98x-lm8ajqbvs87i17",
    deskripsi: "Selotip bening kuat untuk pengemasan atau pelindung dokumen."
  },

  // KATEGORI: Pemotong Kertas
  {
    nama: "Cutter Kecil Joyko",
    kategori: "Pemotong Kertas",
    harga: 5000,
    gambar: "https://atkqita.com/wp-content/uploads/Cutter-kecil-JOYKO-A300.jpg",
    deskripsi: "Cutter kecil dengan pisau tajam, cocok untuk kebutuhan kantor dan sekolah."
  },
  {
    nama: "Gunting Kertas Stainless",
    kategori: "Pemotong Kertas",
    harga: 8000,
    gambar: "https://lzd-img-global.slatic.net/g/p/598ef8b6d52d3d918b68dd8d89686657.jpg_720x720q80.jpg",
    deskripsi: "Gunting presisi dengan pegangan nyaman dan mata pisau tahan lama."
  },
  {
    nama: "Paper Trimmer A4",
    kategori: "Pemotong Kertas",
    harga: 125000,
    gambar: "https://images.nexusapp.co/assets/f4/61/79/164903640.jpg",
    deskripsi: "Alat pemotong kertas presisi dengan penggaris ukuran, cocok untuk dokumen."
  },
  {
    nama: "Pisau Cutter Besar",
    kategori: "Pemotong Kertas",
    harga: 9000,
    gambar: "https://id-test-11.slatic.net/p/0b0995e37dcdf81614a96c7c660829c7.jpg",
    deskripsi: "Cutter besar untuk potong kardus atau kertas tebal dengan aman."
  }

];

function formatRupiah(angka) {
  return "Rp " + angka.toLocaleString("id-ID");
}

function tampilkanProduk(produkList) {
  const katalog = document.getElementById("katalog");
  katalog.innerHTML = "";

  if (produkList.length === 0) {
    katalog.innerHTML = "<p>Tidak ada produk ditemukan.</p>";
    return;
  }

  produkList.forEach((p) => {
    const card = document.createElement("div");
    card.className = "product-card";
    card.innerHTML = `
      <div class="image-wrapper">
        <img src="${p.gambar}" alt="${p.nama}">
      </div>

      <div class="product-info">
        <h3>${p.nama}</h3>
        <div class="harga">${formatRupiah(p.harga)}</div>
        <p>${p.kategori}</p>
        <button class="detail-btn">Lihat Detail</button>
      </div>
    `;

    card.querySelector(".detail-btn").addEventListener("click", () => {
      tampilkanModal(p);
    });

    katalog.appendChild(card);
  });
}

function tampilkanModal(produk) {
  document.getElementById("modal-gambar").src = produk.gambar;
  document.getElementById("modal-nama").textContent = produk.nama;
  document.getElementById("modal-harga").textContent = formatRupiah(produk.harga);
  document.getElementById("modal-deskripsi").textContent = produk.deskripsi;
  document.getElementById("modal").style.display = "block";
}

function tutupModal() {
  document.getElementById("modal").style.display = "none";
}

function filterProduk() {
  const kategori = document.getElementById("kategori").value;
  const keyword = document.getElementById("pencarian").value.toLowerCase();

  let hasil = produk;

  if (kategori !== "semua") {
    hasil = hasil.filter(p => p.kategori === kategori);
  }

  if (keyword.trim() !== "") {
    hasil = hasil.filter(p => p.nama.toLowerCase().includes(keyword));
  }

  tampilkanProduk(hasil);
}

window.onclick = function(event) {
  const modal = document.getElementById("modal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};

filterProduk();

