<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

define("VERSION", "1.0.0");
define("DESA_ID", "8d869d403f9003d5f504070e13f9e553b5bf5fc5fb8f92971761e1859e4fca0308c3e2aa7a88f1eb5837c8ac08f76221f8aacc644767513651500de6519a033eANhribiFJPHqUr+VqtGZ1BuPljyUozYMV3aAeZdft7s=");
define("LOKASI_ARSIP", "assets/surat/arsip/");
define("SESSION", "kejari_session");
define("LOKASI_TEMPLATE", "assets/surat/template/");
define("LOKASI_FILE", "assets/file/");
define("LOKASI_VIEW", "application/views/");
define("LOKASI_VIEW_SURAT", LOKASI_VIEW . "surat/form/");
define("ASSET_DESA", "assets/website/desa/");
define("LOKASI_TEMPLATE_DOKUMEN", "assets/surat/template/default/dokumen/");
define("LOKASI_TEMPLATE_KESEKRETARIATAN", "assets/surat/template/default/kesekretariatan/");
define("LOKASI_ASSET_DESA", "assets/website/desa/");

if (!function_exists('isTemplateExist')) {
    function isTemplateExist($surat = "")
    {
        return is_file(LOKASI_VIEW_SURAT . $surat . ".php") ? TRUE : FALSE;
    }
}
