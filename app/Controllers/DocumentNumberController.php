<?php

namespace App\Controllers;

use App\Libraries\DocumentNumberGenerator;

class DocumentNumberController  extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === 'post') {
            $prefix = $this->request->getPost('prefix');
            $suffix = $this->request->getPost('suffix');
            $digits = $this->request->getPost('digits');
            $number = $this->request->getPost('number');
            $docNumGenerator = new DocumentNumberGenerator();
            $documentNumber = $docNumGenerator->generate($prefix, $suffix, $digits, $number);
            return view('doc', ['documentNumber' => $documentNumber]);
        }
        return view('doc');
    }
}
