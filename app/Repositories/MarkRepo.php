<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Mark;
use App\Models\StudentRecord;

class MarkRepo
{
    public function getGrade($total, $class_type_id)
    {
        if($total < 1) { return NULL; }

        $grades = Grade::where(['class_type_id' => $class_type_id])->get();

        if($grades->count() > 0){
            $gr = $grades->where('mark_from', '<=', $total)->where('mark_to', '>=', $total);
            return $gr->count() > 0 ? $gr->first() : $this->getGrade2($total);
        }
        return $this->getGrade2($total);
    }

    public function getGrade2($total)
    {
        $grades = Grade::whereNull('class_type_id')->get();
        if($grades->count() > 0){
            return $grades->where('mark_from', '<=', $total)->where('mark_to', '>=', $total)->first();
        }
        return NULL;
    }

    public function getSubTotalTerm($st_id, $sub_id, $term, $class_id, $year)
    {
        // You may wish to get exam id from term Exam::where(['term' => $term, 'year' => $yr])
        $d = ['student_id' => $st_id, 'subject_id' => $sub_id, 'my_class_id' => $class_id, 'year' => $year];

        $tex = 'tex'.$term;
        $sub_total = Mark::where($d)->select($tex)->get()->where($tex, '>', 0);
        return $sub_total->count() > 0 ? $sub_total->first()->$tex : NULL;
    }

    public function getExamTotalTerm($exam, $st_id, $class_id, $year)
    {
        $d = ['student_id' => $st_id, 'exam_id' => $exam->id, 'my_class_id' => $class_id, 'year' => $year];

        $tex = 'tex'.$exam->term;
        $mk =Mark::where($d);
        return $mk->select($tex)->sum($tex);

      /*  unset($d['exam_id']);
        $mk =Mark::where($d);
        $t1 = $mk->select('tex1')->sum('tex1');
        $t2 = $mk->select('tex2')->sum('tex2');
        $t3 = $mk->select('tex3')->sum('tex3');
        return $t1 + $t2 + $t3;*/
    }

    public function getExamAvgTerm($exam, $st_id, $class_id, $sec_id, $year)
    {
        $d = ['student_id' => $st_id, 'exam_id' => $exam->id, 'my_class_id' => $class_id, 'section_id' => $sec_id, 'year' => $year];

        $tex = 'tex'.$exam->term;

        $mk = Mark::where($d)->where($tex, '>', 0);
        $avg = $mk->select($tex)->avg($tex);
        return round($avg, 1);

        /*unset($d['exam_id']);
        $mk = Mark::where($d); $count = 0;

        $t1 = $mk->select('tex1')->avg('tex1');
        $t2 = $mk->select('tex2')->avg('tex2');
        $t3 = $mk->select('tex3')->avg('tex3');

        $count = $t1 ? $count + 1 : $count;
        $count = $t2 ? $count + 1 : $count;
        $count = $t3 ? $count + 1 : $count;

        $avg = $t1 + $t2 + $t3;
        return ($avg > 0) ? round($avg/$count, 1) : 0;*/
    }

    public function getSubCumTotal($tex3, $st_id, $sub_id, $class_id, $year)
    {
        $tex1 = $this->getSubTotalTerm($st_id, $sub_id, 1, $class_id, $year);
        $tex2 = $this->getSubTotalTerm($st_id, $sub_id, 2, $class_id, $year);
        return $tex1 + $tex2 + $tex3;
    }

    public function getSubCumAvg($tex3, $st_id, $sub_id, $class_id, $year)
    {
        $count = 0;
        $tex1 = $this->getSubTotalTerm($st_id, $sub_id, 1, $class_id, $year);
        $count = $tex1 ? $count + 1 : $count;
        $tex2 = $this->getSubTotalTerm($st_id, $sub_id, 2, $class_id, $year);
        $count = $tex2 ? $count + 1 : $count;
        $count = $tex3 ? $count + 1 : $count;
        $total = $tex1 + $tex2 + $tex3;

        return ($total > 0) ? round($total/$count, 1) : 0;
    }

    public function getSubjectMark($exam, $class_id, $sub_id, $st_id, $year)
    {
        $d = [ 'exam_id' => $exam->id, 'my_class_id' => $class_id, 'subject_id' => $sub_id, 'student_id' => $st_id, 'year' => $year ];
        $tex = 'tex'.$exam->term;

        return Mark::where($d)->select($tex)->get()->first()->$tex;
    }

    public function getSubPos($st_id, $exam, $class_id, $sub_id, $year)
    {
        $d = ['exam_id' => $exam->id, 'my_class_id' => $class_id, 'subject_id' => $sub_id, 'year' => $year];
        $tex = 'tex'.$exam->term;

        $sub_mk = $this->getSubjectMark($exam, $class_id, $sub_id, $st_id, $year);

        $sub_mks = Mark::where($d)->whereNotNull($tex)->orderBy($tex, 'DESC')->select($tex)->get()->pluck($tex);
        return $sub_pos = $sub_mks->count() > 0 ? $sub_mks->search($sub_mk) + 1 : NULL;
    }

    public function countExSubjects($exam, $st_id, $class_id, $year)
    {
        $d = [ 'exam_id' => $exam->id, 'my_class_id' => $class_id, 'student_id' => $st_id, 'year' => $year ];
        $tex = 'tex'.$exam->term;

        if($exam->term == 3){ unset($d['exam_id']); }

        return Mark::where($d)->whereNotNull($tex)->count();
    }

    public function getClassAvg($exam, $class_id, $year)
    {
        $d = [ 'exam_id' => $exam->id, 'my_class_id' => $class_id, 'year' => $year ];
        $tex = 'tex'.$exam->term;

        $avg = Mark::where($d)->select($tex)->avg($tex);
        return round($avg, 1);
    }

    public function getPos($st_id, $exam, $class_id, $sec_id, $year)
    {

        $d = ['exam_id' => $exam->id, 'my_class_id' => $class_id, 'section_id' => $sec_id, 'year' => $year ];
        $tex = 'tex'.$exam->term;
        $mk = Mark::where($d);
        $students = $mk->select('student_id')->distinct()->get();
        $totaux = [];
        foreach($students as $s){
            $totaux[$s->student_id] = $this->getExamTotalTerm($exam, $s->student_id, $class_id, $year);
        }
        arsort($totaux); // Tri décroissant par total

        // Classement avec gestion des ex-aequo
        $rangs = [];
        $last_total = null;
        $rang = 0;
        $ex_count = 0;
        foreach($totaux as $student_id => $total){
            if($last_total === null || $total < $last_total){
                $rang++;
                $ex_count = 0;
                $rangs[$student_id] = $rang;
            }else{
                $ex_count++;
                $rangs[$student_id] = $rang . 'ex';
            }
            $last_total = $total;
        }

        // Retourne le rang du student_id demandé
        return $rangs[$st_id] ?? null;
    }

    public function getSubjectIDs($data)
    {
        return Mark::distinct()->select('subject_id')->where($data)->get()->pluck('subject_id');
    }

    public function getStudentIDs($data)
    {
        return Mark::distinct()->select('student_id')->where($data)->get()->pluck('student_id');
    }

}