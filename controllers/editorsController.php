<?php
    namespace Controller;

    use Model\Editors;
    class EditorsController {
        private $editors_model = null;

        public function __construct() {
            $this -> editors_model = new Editors();
        }

        public function index() {

            $editors = $this->editors_model->all();
            $view = 'indexEditors.php';

            return ['editors' => $editors, 'view' => $view, 'page_title' => 'ebooks - Les éditeurs'];
        }
        public function show() {
            if (!isset($_GET['id'])) {
                die('il manque un identifiant a votre livre');
            }
            $id = intval($_GET['id']);
            $editor = $this->editors_model->find($id);
            $view = 'showEditors.php';

            return ['editor' => $editor, 'view' => $view, 'page_title' => 'ebooks - ' . $editor->name];
        }
    }
