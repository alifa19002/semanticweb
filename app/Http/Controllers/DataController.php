<?php

namespace App\Http\Controllers;

use App\Models\Sparql;

class DataController extends Controller
{

    function search($search)
    {
        $sparql = new Sparql();

        $namaLengkap = $sparql->getJobsData('namaLengkap', $search);
        $nomorTelp = $sparql->getJobsData('nomorTelp', $search);
        $domisili = $sparql->getJobsData('domisili', $search);
        $posisi = $sparql->getJobsData('posisi', $search);
        $tempatKerja = $sparql->getJobsData('tempatKerja', $search);
        $gaji = $sparql->getJobsData('gaji', $search);

        return compact('namaLengkap', 'nomorTelp', 'domisili', 'posisi', 'tempatKerja', 'gaji');
    }

    function getAllJobsData()
    {
        $sparql = new Sparql();

        return $sparql->getJobsData('all');
    }
    function getSamePlacePosition($place, $position)
    {
        $sparql = new Sparql();
        $tempat_posisi = $sparql->getPlacePosition($place, $position);
        return compact('tempat_posisi');
    }
}
