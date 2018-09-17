menampilkan nama pemasok, leadtime, harga

SELECT p.nama as namaSupplier, mn3.leadtime as leadtime, mn3.harga_beli as hargaSupplier, bb.nama as namaBB
FROM barang_has_nota_jual mn inner join barang b
	on mn.barang_idBarang = b.idBarang
inner join bahanbaku_has_barang mn2
	on b.idBarang = mn2.barang_idBarang
inner join bahanbaku bb
	on mn2.bahanbaku_idBB = bb.idBB
inner join pemasok_has_bahanbaku mn3
	on bb.idBB = mn3.bahanbaku_idBB
inner join pemasok p 
	on mn3.pemasok_idSupplier = p.idSupplier
where mn.nota_jual_idJual = 1
GROUP BY p.idSupplier, bb.nama
order by p.nama

menampilkan spk mana aja di nj tertentu
SELECT b.idBarang as idBarang, nj.idJual as idJual, mn.jumlah as jumlah_pesanan, b.nama as nama_barang, b.harga_jual as harga, s.idSpk as idSpk
                    FROM barang b inner join barang_has_nota_jual mn
                      on b.idBarang = mn.barang_idBarang
                    inner join nota_jual nj
                      on mn.nota_jual_idJual = nj.idJual
                    inner join spk s
                    	on nj.idJual = s.nota_jual_idJual
                    where nj.idJual=1 and s.deleted = 0

ATAU

SELECT spk.idSpk as spk, nj.idJual as nota_jual, nj.tanggal as tanggal_nota, spk.tgl_spk as tglSpk, spk.tgl_perencanaan as tglRencana, spk.rencana_produksi as rencana, spk.status as status, p.namaPelanggan as pelanggan, b.nama as nama_barang, b.idBarang as idBarang
  FROM barang b inner join spk
    on b.idBarang = spk.barang_idBarang
  inner join nota_jual nj
    on spk.nota_jual_idJual = nj.idJual
  inner join pelanggan p 
    on nj.pelanggan_idPelanggan = p.idPelanggan
  where spk.deleted=0 and nj.idJual=1

  MENAMPILKAN PEMASOK HAS BAHAN BAKU SAMPAI KE NOTA BELI 
  SELECT p.nama as namaSupplier, nb.idBeli as idBeli, nb.tgl_beli as tglBeli, bb.nama as namaBB, mn2.jumlah ,mn.leadtime as leadtime , DATE_SUB(nb.tgl_beli, INTERVAL - mn.leadtime DAY) as tglSampai
FROM pemasok_has_bahanbaku mn inner join bahanbaku bb
  on mn.bahanbaku_idBB = bb.idBB
inner join nota_beli_has_bahanbaku mn2
  on bb.idBB = mn2.bahanbaku_idBB
inner join nota_beli nb
  on mn2.nota_beli_idBeli = nb.idBeli
inner join pemasok p
  on p.idSupplier = nb.supplier_idSupplier
where nb.deleted = 0
group by p.nama, nb.idBeli, nb.tgl_beli, bb.nama
order by nb.idBeli desc

MENAMBAH HARI 
SELECT tgl_spk, DATE_SUB(tgl_spk, INTERVAL - 1 DAY)
FROM `spk`


SELECT nb.idBeli as idBeli , DATE_SUB(nb.tgl_beli, INTERVAL - mn.leadtime DAY) as tglSampai, CURDATE() as tglSekarang
FROM pemasok_has_bahanbaku mn inner join bahanbaku bb
  on mn.bahanbaku_idBB = bb.idBB
inner join nota_beli_has_bahanbaku mn2
  on bb.idBB = mn2.bahanbaku_idBB
inner join nota_beli nb
  on mn2.nota_beli_idBeli = nb.idBeli
inner join pemasok p
  on p.idSupplier = nb.supplier_idSupplier
where nb.deleted = 0
  AND DATE_SUB(nb.tgl_beli, INTERVAL - mn.leadtime DAY)=CURDATE()
    AND mn2.validasi=1
group by p.nama, nb.idBeli, nb.tgl_beli, bb.nama
order by nb.idBeli desc

MENGGILA (AMBIL HARGA TERENDAH DIDALAM WHILE)
SELECT p.idSupplier as idSupplier, p.nama as namaSupplier, mn3.leadtime as leadtime, mn3.harga_beli as hargaSupplier, bb.nama as namaBB, 
    (
        SELECT phb.`harga_beli` FROM `pemasok_has_bahanbaku` phb WHERE phb.`bahanbaku_idBB`=bb.`idBB` ORDER BY phb.`harga_beli` asc LIMIT 1
      ) as harga_rendah 
FROM barang_has_nota_jual mn inner join barang b
  on mn.barang_idBarang = b.idBarang
inner join bahanbaku_has_barang mn2
  on b.idBarang = mn2.barang_idBarang
inner join bahanbaku bb
  on mn2.bahanbaku_idBB = bb.idBB
inner join pemasok_has_bahanbaku mn3
  on bb.idBB = mn3.bahanbaku_idBB
inner join pemasok p 
  on mn3.pemasok_idSupplier = p.idSupplier
where mn.nota_jual_idJual = 1 and bb.idBB = 3
GROUP BY p.idSupplier
order by p.nama

MENUNJUKKAN BARANG SAMPAI KAPAN, UNTUK REKOMENDASI BELI
SELECT s.idspk, p.idSupplier as idSupplier, p.nama as namaSupplier, mn3.leadtime as leadtime, S.tgl_perencanaan as tglRencana, DATE_SUB(CURDATE(), INTERVAL - mn3.leadtime DAY) as tglSampai, mn3.harga_beli as hargaSupplier, bb.nama as namaBB, 
            (
              SELECT phb.`harga_beli` FROM `pemasok_has_bahanbaku` phb WHERE phb.`bahanbaku_idBB`=bb.`idBB` ORDER BY phb.`harga_beli` asc LIMIT 1
            ) as harga_rendah
            FROM barang_has_nota_jual mn inner join barang b
              on mn.barang_idBarang = b.idBarang
            inner join spk s
              on b.idBarang = s.barang_idBarang
            inner join bahanbaku_has_barang mn2
              on b.idBarang = mn2.barang_idBarang
            inner join bahanbaku bb
              on mn2.bahanbaku_idBB = bb.idBB
            inner join pemasok_has_bahanbaku mn3
              on bb.idBB = mn3.bahanbaku_idBB
            inner join pemasok p 
              on mn3.pemasok_idSupplier = p.idSupplier
            where mn.nota_jual_idJual = $idJual and bb.idBB = $idBB and s.idSpk = $idSpk
            GROUP BY p.idSupplier
            order by p.nama

QUERY ORIGINAL DETAIL REKOMENDASI
SELECT p.idSupplier as idSupplier, p.nama as namaSupplier, mn3.leadtime as leadtime, mn3.harga_beli as hargaSupplier, bb.nama as namaBB, 
            (
              SELECT phb.`harga_beli` FROM `pemasok_has_bahanbaku` phb WHERE phb.`bahanbaku_idBB`=bb.`idBB` ORDER BY phb.`harga_beli` asc LIMIT 1
            ) as harga_rendah 
            FROM barang_has_nota_jual mn inner join barang b
              on mn.barang_idBarang = b.idBarang
            inner join bahanbaku_has_barang mn2
              on b.idBarang = mn2.barang_idBarang
            inner join bahanbaku bb
              on mn2.bahanbaku_idBB = bb.idBB
            inner join pemasok_has_bahanbaku mn3
              on bb.idBB = mn3.bahanbaku_idBB
            inner join pemasok p 
              on mn3.pemasok_idSupplier = p.idSupplier
            where mn.nota_jual_idJual = $idJual and bb.idBB = $idBB
            GROUP BY p.idSupplier
            order by p.nama