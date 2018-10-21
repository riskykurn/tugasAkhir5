


SELECT  idBarang
    from barang b 
    where 1=1 
    AND idBarang in (select barang_idBarang from barang_has_nota_jual where nota_jual_idJual=1)
    AND idBarang not in 
    (
        select barang_idBarang 
        from spk 
        where nota_jual_idJual=1 
        AND deleted=0   
        AND (
                (hasil_produksi >= rencana_produksi or hasil_produksi is null )  
                or 
                status=0
            )
      )