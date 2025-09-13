<?php

namespace App\Controller;

use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UploadController extends AbstractController
{
    #[Route('/upload', name: 'app_upload', methods: ['POST'])]
    public function upload(Request $request, FilesystemOperator $uploadsStorage): Response
    {
        $file = $request->files->get('file');

        if (!$file) {
            return $this->json(['error' => 'No file provided'], Response::HTTP_BAD_REQUEST);
        }

        $stream = fopen($file->getPathname(), 'r');
        $filename = uniqid() . '_' . $file->getClientOriginalName();

        $uploadsStorage->writeStream($filename, $stream);

        if (is_resource($stream)) {
            fclose($stream);
        }

        return $this->json(['success' => true, 'filename' => $filename]);
    }
}
