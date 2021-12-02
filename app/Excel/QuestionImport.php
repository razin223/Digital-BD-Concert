<?php

namespace App\Excel;

use App\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow {

    public function __construct($category_id, $language) {
        $this->category_id = $category_id;
        $this->language = $language;
    }

    public function model(array $row) {
        //dd($row);
        
        return new Question([
            'category_id' => $this->category_id,
            'language' => $this->language,
            'question' => $row['question'],
            'option_1' => $row['option_1'],
            'option_2' => $row['option_2'],
            'option_3' => $row['option_3'],
            'option_4' => $row['option_4'],
            'answer' => str_replace(['১', '২', '৩', '৪'], ['1', '2', '3', '4'], $row['answer']),
            'created_by' => auth()->id(),
            'updated_by' => auth()->id()
        ]);
    }

}
