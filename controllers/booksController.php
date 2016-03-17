<?php
    namespace Controller;

    use Model\Books;
    use Model\Authors;
    use Model\Editors;

    class BooksController {
        private $books_model = null;

        public function __construct() {
            $this -> books_model = new Books();
        }
        //fct qui s'exécute quand on fait le new pour créer une instance
        //créer une instance du controleur => quand on fait new

        public function index() {
            $books = $this->books_model->all();
            $view = 'indexBooks.php';

            return ['books' => $books, 'view' => $view, 'page_title' => 'ebooks - Les livres'];
        }

        public function show() {
            if( !isset( $_GET[ 'id' ] ) ) {
                die( 'Il manque l’id' );
            }
            $id = intval($_GET['id']);
            $book = $this->books_model->find($id);
            $authors = null;
            $editors = null;


            if( isset( $_GET[ 'with' ]) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'authors', $with ) ){
                    $authors_model = new Authors();
                    $authors = $authors_model -> getAuthorsByBookId( $book -> id );
                }
                if( in_array( 'editors', $with ) ) {
                    $editors_model = new Editors();
                    $editors = $editors_model -> getEditorsByBookId( $book -> id );
                }
            }

            return ['book' => $book,
                    'view' => 'showBooks.php',
                    'page_title' => 'ebooks - '.$book->title,
                    'authors' => $authors,
                    'editors' => $editors,
                    
                ];
        }

    }
