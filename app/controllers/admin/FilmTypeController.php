<?php
use Core\Attributes\Route;

class FilmTypeController {
    #[Route("/admin/the-loai-phim", "GET")]
    public function abc() {
        return view("admin/the-loai-phim/index");
    }
}