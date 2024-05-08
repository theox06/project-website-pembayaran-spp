<?php
/**
 * 
 */
class Pembayaran extends BaseModel
{

	public $table_name = 'pembayaran';
	public $table_id = 'id_pembayaran';

	public function createPembayaran($id_petugas, $id_siswa, $id_spp)
	{
		$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

		foreach ($bulan as $b) {
			$this->mysqli->query("INSERT INTO pembayaran(id_petugas, id_siswa, id_spp, bulan_dibayar) VALUES($id_petugas, $id_siswa, $id_spp, '$b')");

			return $this->mysqli->affected_rows;
		}
	}

	public function bayar($id_petugas, $jumlah_bayar, $id_pembayaran)
	{
		$tgl_bayar		= date('Y-m-d');
		$tahun_dibayar 	= date('Y');
		
		$this->mysqli->query("UPDATE pembayaran SET id_petugas = $id_petugas, tgl_bayar = '$tgl_bayar' , tahun_dibayar = '$tahun_dibayar', jumlah_bayar = $jumlah_bayar WHERE id_pembayaran = $id_pembayaran");

		return $this->mysqli->affected_rows;
	}
}