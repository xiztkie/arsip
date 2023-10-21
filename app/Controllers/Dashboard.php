<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsalusulModel;
use App\Models\TahunModel;
use App\Models\DatalokasiModel;
use App\Models\PejabatModel;
use App\Models\DatabarangModel;



class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->datalokasiModel = new DatalokasiModel();
        $this->databarangModel = new DatabarangModel();
        $this->asalusulModel = new AsalusulModel();
        $this->pejabatModel = new PejabatModel();
        $this->tahunModel = new TahunModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'countbarang' => $this->databarangModel->countAll(),
            'countbarangrusak' => $this->databarangModel->whereIn('kondisi', ['Kurang Baik', 'Rusak Berat'])->countAllResults(),
            'countbarangbaik' => $this->databarangModel->where('kondisi', 'Baik')->countAllResults(),
            'countlokasi' => $this->datalokasiModel->countAll(),
            'isi' => 'dashboard'
        ];
        return view('layout/wrapper', $data);
    }
}
