<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use TCPDF;
use App\Models\DatabarangModel;
use App\Models\DatalokasiModel;
use App\Models\PejabatModel;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->databarangModel = new DatabarangModel();
        $this->datalokasiModel = new DatalokasiModel();
        $this->pejabatModel = new PejabatModel();
    }
    public function index()
    {


        $data = [
            'title' => 'Laporan',
            'lokasi' => $this->datalokasiModel->findAll(),
            'isi' => 'laporan'
        ];

        return view('layout/wrapper', $data);
    }

    public function result()
    {

        $filter = $this->request->getPost('lokasi');

        if ($filter == '*') {
            $data = [
                'title' => 'result',
                'ids' => '0',
                'lokasi' => $this->datalokasiModel->findAll(),
                'pejabat' => $this->pejabatModel->findAll(),
                'filter' => '*',
                'databarang' => $this->databarangModel
                    ->select('databarang.*, lokasi.nama_lokasi')
                    ->join('lokasi', 'lokasi.id = databarang.lokasi_id', 'left')
                    ->findAll(),
                'isi' => 'result'
            ];
        } else {
            $data = [
                'title' => 'result',
                'ids' => $filter,
                'lokasi' => $this->datalokasiModel->findAll(),
                'pejabat' => $this->pejabatModel->findAll(),
                'filter' => 'filter',
                'databarang' => $this->databarangModel
                    ->select('databarang.*, lokasi.nama_lokasi')
                    ->join('lokasi', 'lokasi.id = databarang.lokasi_id', 'left')
                    ->where('databarang.lokasi_id', $filter)
                    ->findAll(),
                'isi' => 'result'
            ];
        }

        return view('layout/wrapper', $data);
    }

    public function generatePDF($id)
    {

        $data = [
            'databarang' => $this->databarangModel
                ->select('databarang.*, lokasi.nama_lokasi')
                ->join('lokasi', 'lokasi.id = databarang.lokasi_id', 'left')
                ->where('databarang.id', $id)
                ->findAll(),
        ];

        $html = view('pdf/laporan', $data);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetTopMargin(4);
        $pdf->setFooterMargin(3);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage();
        $pdf->SetFont('pdfahelvetica', 'R', 16);


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');
    }
    public function laporanPDF()
    {
        $id = $this->request->getPost('ids');
        $id1 = $this->request->getPost('sekretaris');
        $id2 = $this->request->getPost('penguna');
        $id3 = $this->request->getPost('bagianumum');


        $pejabatSekretaris = $this->pejabatModel->select('nama_pejabat, nip')->where('id', $id1)->get()->getRow();
        $pejabatPenguna = $this->pejabatModel->select('nama_pejabat, nip')->where('id', $id2)->get()->getRow();
        $pejabatBagianUmum = $this->pejabatModel->select('nama_pejabat, nip')->where('id', $id3)->get()->getRow();
        if ($id == 0) {
            $data = [
                'databarang' => $this->databarangModel
                    ->select('databarang.*, lokasi.nama_lokasi')
                    ->join('lokasi', 'lokasi.id = databarang.lokasi_id', 'left')
                    ->findAll(),
                'sekretaris' => $pejabatSekretaris->nama_pejabat,
                'sekretarisnip' => $pejabatSekretaris->nip,
                'penguna' => $pejabatPenguna->nama_pejabat,
                'pengunanip' => $pejabatPenguna->nip,
                'bagianumum' => $pejabatBagianUmum->nama_pejabat,
                'bagianumumnip' => $pejabatBagianUmum->nip,
                'tanggal' => $this->request->getPost('tanggal'),
            ];
            $html = view('pdf/laporansemua', $data);
        } else {
            $data = [
                'databarang' => $this->databarangModel
                    ->select('databarang.*, lokasi.nama_lokasi')
                    ->join('lokasi', 'lokasi.id = databarang.lokasi_id', 'left')
                    ->where('databarang.id', $id)
                    ->findAll(),
                'sekretaris' => $pejabatSekretaris->nama_pejabat,
                'sekretarisnip' => $pejabatSekretaris->nip,
                'penguna' => $pejabatPenguna->nama_pejabat,
                'pengunanip' => $pejabatPenguna->nip,
                'bagianumum' => $pejabatBagianUmum->nama_pejabat,
                'bagianumumnip' => $pejabatBagianUmum->nip,
                'tanggal' => $this->request->getPost('tanggal'),
            ];
            $html = view('pdf/laporanfilter', $data);
        }


        $pdf = new TCPDF('L', 'mm', [215, 330], true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetTopMargin(4);
        $pdf->setFooterMargin(3);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage();
        $pdf->SetFont('pdfahelvetica', 'R', 10);


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');
    }
}
