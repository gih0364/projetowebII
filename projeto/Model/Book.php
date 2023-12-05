
<?php

namespace QI\SistemaDeChamados\Model;

class Book
{
    private $id;
    private $titlebook;
    private $authorname;
    private $numberchapters;
    private $description;
    private $genderbook;

    /**
     * This method create a new Book object
     * @param TitleBook $titlebook
     * @param AuthorName $authorname
     * @param GenderBook $genderbook
     * @param NumberChapters $numberchapters
     * @param string $description
     */

    public function __construct($titlebook, $authorname, $numberchapters, $description, $genderbook)
    {
        $this->titlebook = $titlebook;
        $this->authorname = $authorname;
        $this->numberchapters = $numberchapters;
        $this->description = $description;
        $this->genderbook = $genderbook;
    }

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }
}
