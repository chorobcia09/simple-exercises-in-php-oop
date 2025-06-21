<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Book
    {
        private string $title;
        private string $author;
        private int $year;
        private bool $isBorrowed = false;

        public function __construct(string $title, string $author, int $year)
        {
            $this->title = $title;
            $this->author = $author;
            $this->year = $year;
        }

        public function getTitle(): string
        {
            return $this->title;
        }

        public function getAuthor(): string
        {
            return $this->author;
        }

        public function getYear(): int
        {
            return $this->year;
        }

        public function borrow(): void
        {
            $this->isBorrowed = true;
        }

        public function returnBook(): void
        {
            $this->isBorrowed = false;
        }

        public function getStatus(): string
        {
            return $this->isBorrowed ? "Wypożyczona" : "Dostępna";
        }

        public function __toString(): string
        {
            return "{$this->title} ({$this->year}), autor: {$this->author}";
        }

        public function isBorrowed(): bool
        {
            return $this->isBorrowed;
        }
    }

    class Library
    {
        /**
         * @var Book[]
         */
        private array $books = [];

        public function addBook(Book $book): void
        {
            $this->books[] = $book;
        }

        public function removeBook(string $title): bool
        {
            foreach ($this->books as $key => $book) {
                if ($book->getTitle() === $title) {
                    unset($this->books[$key]);
                    $this->books = array_values($this->books);
                    return true;
                }
            }

            return false;
        }

        public function listAvailableBooks(): string
        {
            $available = array_filter($this->books, fn(Book $book) => !$book->isBorrowed());

            if (empty($available)) {
                return "Brak dostępnych książek!";
            }

            $result = "";
            foreach ($available as $book) {
                $result .= $book . "<br>";
            }
            return $result;
        }

        public function borrowBook(string $title): bool
        {
            foreach ($this->books as $book) {
                if ($book->getTitle() === $title && !$book->isBorrowed()) {
                    $book->borrow();
                    return true;
                }
            }

            return false;
        }

        public function returnBook(string $title): bool
        {
            foreach ($this->books as $book) {
                if ($book->getTitle() === $title && $book->isBorrowed()) {
                    $book->returnBook();
                    return true;
                }
            }
            return false;
        }
    }

    // Testowanie klasy

    $book = new Book("Wiedźmin", "Andrzej Sapkowski", 1993);
    $book2 = new Book("Przyklad", "Romek", 2025);

    $library = new Library();

    echo "Dostępne książki: " . $library->listAvailableBooks() . "<br>";

    $library->addBook($book);
    $library->addBook($book2);

    echo "Dostępne książki po dodaniu: <br>" . $library->listAvailableBooks();

    echo "<br>Status książki '{$book2->getTitle()}': " . $book2->getStatus() . "<br>";

    $library->borrowBook("Przyklad");

    echo "Dostępne książki po wypożyczeniu 'Przyklad': <br>" . $library->listAvailableBooks();

    echo "<br>Status książki '{$book2->getTitle()}': " . $book2->getStatus() . "<br>";

    $library->returnBook("Przyklad");

    echo "Dostępne książki po zwróceniu 'Przyklad': <br>" . $library->listAvailableBooks();

    echo "<br>Status książki '{$book2->getTitle()}': " . $book2->getStatus() . "<br>";
    ?>

</body>

</html>