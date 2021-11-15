<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Question;

class QuestionImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function  __construct($exam_id)
    {
        $this->exam_id= $exam_id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Question::create([
                'exam_id' => $this->exam_id,
                'question' => $row['question'],
                'example' => $row['example'],
                'note' => $row['note'],
                'score' => $row['score']
            ]);
        }
    }
}
