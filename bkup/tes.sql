SELECT s.idSpk,
	b.idBarang ,
	b.nama ,
	s.rencana_produksi,
	bb.nama as nama_bb,
	bb.stok,
	bhb.jumlah as resep,
	(s.rencana_produksi * bhb.jumlah) as butuhnya,
	((s.rencana_produksi * bhb.jumlah) - bb.stok) as kurangnya

FROM spk s 
	inner join barang b 
		on s.barang_idBarang = b.idBarang
	inner join bahanbaku_has_barang bhb 
		on bhb.barang_idBarang = b.idBarang 
	inner join bahanbaku bb 
		on bb.idBB = bhb.bahanbaku_idBB 
WHERE s.deleted=0 
order by bb.idBB 



------
SELECT s.idSpk,
	b.idBarang ,
	b.nama ,
	s.rencana_produksi,
	bb.nama as nama_bb,
	bb.stok,
	bhb.jumlah as resep,
	(s.rencana_produksi * bhb.jumlah) as butuhnya,
	((s.rencana_produksi * bhb.jumlah) - bb.stok) as kurangnya

FROM spk s 
	inner join barang b 
		on s.barang_idBarang = b.idBarang
	inner join bahanbaku_has_barang bhb 
		on bhb.barang_idBarang = b.idBarang 
	inner join bahanbaku bb 
		on bb.idBB = bhb.bahanbaku_idBB 
WHERE s.deleted=0 
order by s.idSpk 