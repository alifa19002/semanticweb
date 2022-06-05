<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

require_once realpath(__DIR__ . '/..') . "../../vendor/autoload.php";
require_once realpath(__DIR__ . '/..') . "../Http/html_tag_helper.php";


// \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('ab', 'http://jobs.com/');
\EasyRdf\RdfNamespace::set('d', 'http://jobs.com/ns/data#');

class Sparql extends Model
{
    use HasFactory;

    function getJobsData($type = 'all', $search = '')
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/jobs');

        $namaLengkap = '';
        $nomorTelp = '';
        $domisili = '';
        $posisi = '';
        $tempatKerja = '';
        $gaji = '';

        if ($type == 'namaLengkap') {
            $namaLengkap = $search;
        } else if ($type == 'nomorTelp') {
            $nomorTelp = $search;
        } else if ($type == 'domisili') {
            $domisili = $search;
        } else if ($type == 'posisi') {
            $posisi = $search;
        } else if ($type == 'tempatKerja') {
            $tempatKerja = $search;
        } else if ($type == 'gaji') {
            $gaji = $search;
        } else if ($type == 'all') {
            $search = '';
        } else {
            return "Unknown type";
        }

        $result = $sparql->query(
            "
            PREFIX ab: <http://jobs.com/>
            PREFIX d: <http://jobs.com/ns/data#>

            SELECT ?namaLengkap ?nomorTelp ?domisili ?posisi ?tempatKerja ?gaji
            WHERE
            { 
            ?phone  d:namaLengkap ?namaLengkap ;
                    d:nomorTelp ?nomorTelp;
                    d:domisili ?domisili;
                    d:posisi ?posisi;
                    d:tempatKerja ?tempatKerja;
                    d:gaji ?gaji.
            FILTER regex (?namaLengkap, \"{$namaLengkap}\", \"i\")
            FILTER regex (?nomorTelp, \"{$nomorTelp}\", \"i\")
            FILTER regex (?domisili, \"{$domisili}\", \"i\")
            FILTER regex (?posisi, \"{$posisi}\", \"i\")
            FILTER regex (?tempatKerja, \"{$tempatKerja}\", \"i\")
            FILTER regex (?gaji, \"{$gaji}\", \"i\")
            }
            "
        );
        return $result;
    }
    function getPlacePosition($places = "", $positions = "")
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/jobs');
        $place = "";
        $position = "";
        if ($places != null) {
            $place = $places;
        }
        if ($positions != null) {
            $position = $positions;
        }
        $result = $sparql->query(
            "
            PREFIX ab: <http://jobs.com/>
            PREFIX d: <http://jobs.com/ns/data#>

            SELECT ?namaLengkap ?nomorTelp ?domisili ?posisi ?tempatKerja ?gaji
            WHERE
            { 
            ?phone  d:namaLengkap ?namaLengkap ;
                    d:nomorTelp ?nomorTelp;
                    d:domisili ?domisili;
                    d:posisi ?posisi;
                    d:tempatKerja ?tempatKerja;
                    d:gaji ?gaji.
            FILTER regex (?tempatKerja, \"{$place}\", \"i\")
            FILTER regex (?posisi, \"{$position}\", \"i\")
            }
            "
        );
        return $result;
    }
}
