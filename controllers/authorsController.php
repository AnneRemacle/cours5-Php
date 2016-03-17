<?php
    namespace Controller;

    use Model\Authors;
    class AuthorsController {
        private $authors_model = null;

        public function __construct() {
            $this -> authors_model = new Authors();
        }

        public function index() {

            $authors = $this->authors_model->all();
            $view = 'indexAuthors.php';

            return [
                'authors' => $authors,
                'view' => $view,
                'page_title' => 'Tous les auteurs - ebooks'
            ];
        }

        public function show() {
            if (!isset($_GET['id'])) {
                die('Il manque l‘identifiant de votre livre');
            }
            $id = intval($_GET['id']);
            $author = $this->authors_model->find($id);
            $view = 'showAuthors.php';

            return [
                'author' => $author,
                'view' => $view,
                'page_title' => 'la fiche de ' . $author->name
            ];
        }
    }
