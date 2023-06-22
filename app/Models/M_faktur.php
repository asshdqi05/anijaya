<?php

namespace App\Models;

use CodeIgniter\Model;

class M_faktur extends Model
{
    function get_faktur_jual()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) AS kd_max FROM penjualan WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($q->getNumRows() > 0) {
            foreach ($q->getResult() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return "FJ-" . date('dmy') . $kd;
    }

    function get_faktur_pesanan()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) AS kd_max FROM pemesanan WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($q->getNumRows() > 0) {
            foreach ($q->getResult() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
                // $kd = $tmp;
            }
        } else {
            $kd = "0001";
        }

        return "FP-" . date('dmy') . $kd;
    }
}
