<?php

namespace App\Modules\Business\Core\Domain\Model\Business;

use App\Modules\Shared\Model\MarcheEnum;

class BusinessCategory extends MarcheEnum
{
    public const PERTANIAN = 'Pertanian';
    public const PERIKANAN = 'Perikanan';
    public const OTOMOTIF = 'Otomotif';
    public const MAKANAN_MINUMAN = 'Makanan dan Minuman';
    public const PRODUK_DIGITAL = 'Produk Digital';
    public const PERALATAN_RUMAH_TANGGA = 'Peralatan Rumah Tangga';
    public const KESEHATAN = 'Kesehatan';
    public const ALAT_OLAHRAGA = 'Alat Olahraga';
    public const RETAIL = 'Retail';
    public const LAIN_LAIN = 'Lain-Lain';
}
